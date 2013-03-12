<?php
/**
 * Description: Processes a data set by inserting a meta directory into the 
 * top level folder and creating a METS file inclusive of all project directories
 * and folders.
 *
 * @author Rob Olendorf
 * @author Jon Wheeler
 * 
 * A directory processor for a METS data curation
 * tool, modified from Rob Olendorf's XFDU data curation application
 * at @link https://github.com/olendorf/data_curation
 * 
 * NOTICE
 * This file has been significantly modified from the original to account
 * for differences between XFDU and METS. In particular, the recursive call
 * originally executed in the process_path function has alternatively
 * been moved to the handle_directory function. The result is multiple nested
 * mets:div elements within a single output as opposed to the generation
 * of multiple METS files.
 * 
 * Original properties $contentUnitCount and $dataObjectCount have been changed to
 * $folderCount and $fileCount, respectively. The process_path,
 * handle_file and handle_directory functions have also been revised
 * to reference METS specific methods and attributes. Data/file object handling 
 * has here been added to the handle_file method, though it was originally
 * handled using a specific DataObject class.
 * 
 * $parent ID has been added to the handle_directory function to allow
 * nesting of mets:div elements.
 * 
 * Back and forward links between different METS files are not implemented.
 * 
 * Original methods for handling descriptive metadata have not been implemented.
 * 
 * @todo Replace instances of '/' with DIRECTORY_SEPARATOR and implement
 * original bytestream/data/file object classes as well as descriptive metadata
 * classes. Move all methods to a combined DirectoryProcessor class.
 * 
 * All modifications by Jon Wheeler.
 */

class SingleProcessor {
    /*
     * @var METSBUILDER
     */
    protected $builder;
    
    /*
     * @var settings
     */
    protected $settings;
    
    /*
     * @var integer
     * 
     * The number of files in the directory
     */
    protected $fileCount;
    
    /**
     * 
     * Files to exclude. This is not implemented yet. 
     * @todo Implement exclusion - should allow exclusion based on file type, 
     * file name or partial file names. Most likely a dynamic implementation 
     * of regular expresssions.
     * @var type
     * 
     */
    protected $excludes;
    
    /*
     * @var integer
     * 
     * The number of folders in the directory
     */
    protected $folderCount;
    
    /**
     * 
     * @param METSSetup $settings
     * 
     */
    public function __construct(METSSetup $settings) {
        $this->builder = new METSBuilder();
        $this->settings = $settings;
        $this->excludes = array('.', '..', 'meta');
        $this->fileCount = 0;
        $this->folderCount = 0;
        
    }
    
    public function get_repository() {
        return $this->settings->repository;
    }

    /**
     *
     * @return <string>
     */
    public function get_root() {
        return $this->settings->root;
    }
    
  /**
   * Starts processing the data directory by ensuring the file or directory exists
   * and if it is a bare file enclosing it in a directory. 
   */
    public function process_dataset(){
        if($this->settings->repository == ''){
            echo "No Repository Has Been Specified";
        }
        
        if (!is_file($this->settings->repository . '/' . $this->settings->root) &&
                !is_dir($this->settings->repository . '/' . $this->settings->root)) {
            throw new PathNotFoundException(
                    $this->settings->repository .
                    '/' .
                    $this->settings->root .
                    ' was not found.', E_ERROR);
        }
        
        // If it's a bare file, moves the file into a same named directory.
        // This provides a consistent structure across all data sets.
        if (is_file($this->settings->repository . '/' . $this->settings->root)) {
            // Get the required info from the file
            $pathInfo = pathinfo($this->settings->root);
            $fileName = basename($this->settings->root, $pathInfo['extension']);


            mkdir($this->settings->repository . '/' . $pathInfo['dirname'] . '/' . $fileName);                // make the new directory
            rename($this->settings->repository .
                    '/' .
                    $this->settings->root, $this->settings->repository .
                    '/' . $pathInfo['dirname'] . // Move the file into the new directory
                    '/' . $fileName .
                    '/' . $pathInfo['basename']);

            $this->settings->root = $pathInfo['dirname'] . '/' . $pathInfo['filename'];

            print 'root = ' . $this->settings->root . '====';
        }
        
        
        $this->process_path($this->settings->repository.'/'.$this->settings->root);  
    }
    
  /**
   * Processes a path.
   * 
   * @param <string> $path
   */
    protected function process_path($path){
        // Each directory gets a metadata directory
        if(!file_exists($path.'/'.'meta')){
            mkdir($path.'/'.'meta');
        }
        
        // Sets up the basic METS package.
        $package = new METSPackageSingle($this->settings);
        $parsedPath = explode('/', $path);
       
        // Set the id for the current file.
        $currentID = 'uuid_' . hash('sha1', $path . $this->fileCount);
        
        // Add the container div for the directory.
        $currentDiv = $this->builder->build_div(NULL, $currentID, 
                'directory', $parsedPath[sizeof($parsedPath) -1], NULL);
        
        $package->add($currentDiv);
        
        // Add the containter fileGrp for the directory
        $currentFileGrp = $this->builder->build_fileGrp(NULL, 
                'OBJECTS', NULL, NULL, NULL);
        $package->add($currentFileGrp);
        
        $contents = scandir($path);
        $contents = array_diff($contents, $this->excludes);
        
        // If the content item is a file, create a div containing a 
        // file object pointer that refers to a file object within this mets document. 
        // If it's a directory create a div.
        foreach ($contents as $item) {
            if (is_file($path . '/' . $item)) {
                $trimPath = rtrim($path, '/');
                $this->handle_file($trimPath, $item, $package, $currentID);
            } else if (is_dir($path . '/' . $item)) {
                $this->handle_directory($path . '/' . $item, $package, $currentID);
            }
        }
        
        // Write the package.
        $package->write($path.'/'.'meta'.'/'.$parsedPath[sizeof($parsedPath) - 1].'_mets.xml');
        
    }
    
/**
 *
 * @param string $path path to the directory containing the file
 * @param string $item file name
 * @param METSPackage $package the package passed by reference
 * @param string $parent ID of the parent contentUnit
 */
    protected function handle_file($path, $item, METSPackageSingle &$package, $parent){
        $this->fileCount++;
        set_time_limit(120);
        
        // $fileID will be used to cross reference with fileSec and md sections
        $fileID = 'uuid_' . hash('sha1', $path.'/'.$item);
        
        // create a new FLocat object
        $fileLocation = new FLocat();
        $fileLocation->set_LOCTYPE('URL');
        $fileLocation->set_href(str_replace('/' . '/', 
                        '/', $path).'/'.$item);
        
        // create a new File object
        $fileObject = new File();
        $fileObject->set_ID($fileID);
        $fileObject->set_CHECKSUMTYPE('SHA-1');
        $fileObject->set_CHECKSUM(sha1_file($path.'/'.$item));
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileObject->set_MIMETYPE($finfo->file($path.'/'.$item));
        $fileObject->set_SIZE(filesize($path.'/'.$item));
        
        // add FLocat object to file object
        $fileObject->set_FLocat($fileLocation);
        
        // add file object to fileGrp
        $package->add($fileObject);
        
        // create a mets:fptr for the structMap
        $filePointer = new Fptr();
        $filePointer->set_FILEID($fileID);
        
        $currentID = 'uuid_' . hash('sha1', $path . $this->fileCount);

        $currentDiv = $this->builder->build_div($filePointer, $currentID, 'file', 
                $item, str_replace('/' . '/', 
                        '/', $path). '/' . $item);

        $package->add($currentDiv, $parent);
        
        
    }
    
  /**
   * Created nested mets:div elements. The function calls itself recursively to work
   * through the directory structure.
   * 
   * @param string $path Path to the directy to be handled.
   * @param METSPackage $package the package passed by reference.
   * @param string $parent ID of the parent Div
   */
    protected function handle_directory($path, METSPackageSingle &$package, $parent){
        $this->folderCount++;
        
        $currentID = 'uuid_' . hash('sha1', $path . $this->folderCount);
        $parsedPath = explode('/', $path);
        
        // Add a div for the current directory
        $currentDiv = $this->builder->build_div(NULL, $currentID, 
                'directory', $parsedPath[sizeof($parsedPath) -1], NULL);
        
        $package->add($currentDiv, $parent);
        
        $contents = scandir($path);
        $contents = array_diff($contents, $this->excludes);
        
        // If the content item is a file, create a div containing a 
        // file object pointer that refers to a file object within this mets document. 
        // If it's a directory make a recusrive call.
        foreach ($contents as $item) {
            if (is_file($path . '/' . $item)) {
                $trimPath = rtrim($path, '/');
                $this->handle_file($trimPath, $item, $package, $currentID);
            } else if (is_dir($path . '/' . $item)) {
                $this->handle_directory($path . '/' . $item, $package, $currentID);
            }
        }
             
    }
}
?>
