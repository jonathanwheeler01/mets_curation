<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * A METS document consists of seven possible subsidiary sections: 
 * metsHdr (METS document header), dmdSec (descriptive metadata section), 
 * amdSec (administrative metadata section), fileGrp (file inventory group), 
 * structLink (structural map linking), structMap (structural map) and 
 * behaviorSec (behaviors section).
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class METS extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var fileSec
     */
    protected $fileSec;
    
    /*
     * @var structMap
     */
    protected $structMap;
    
    /*
     * @param string $ID
     */
    public function set_ID($ID){
        if($this->validate_id($ID)){
            $this->ID = $ID;
        }
        else {
            throw new InvalidIDTokenException($ID);
        }
    }
    
    /*
     * @return string
     */
    public function get_ID() {
        return $this->ID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ID() {
        return (isset($this->ID) && !empty($this->ID));
    }
    
    /*
     * @param FileSec $fileSec
     */
    public function set_fileSec(FileSec $fileSec){
        $this->fileSec = $fileSec;
    }
    
    /*
     * @return fileSec
     */
    public function get_fileSec(){
        return $this->fileSec;
    }
    
    /*
     * @return boolean
     */
    public function isset_fileSec(){
        return (isset($this->fileSec) && !empty($this->fileSec));
    }
    
    /*
     * @param StructMap $structMap
     */
    public function set_structMap(StructMap $structMap){
        $this->structMap = $structMap;
    }
    
    /*
     * @return div
     */
    public function get_structMap(){
        return $this->structMap;
    }
    
    /*
     * @return boolean
     */
    public function isset_structMap(){
        return (isset($this->structMap) && !empty($this->structMap));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        // conditionally add the prefix to the element name and
        // namespace attribute
        if($prefix !== NULL){
            $mets = $dom->createElement($prefix.':mets');
            $mets->setAttribute('xmlns:'.$prefix, 'http://www.loc.gov/METS/');
        }
        else {
            $mets = $dom->createElement('mets'.':mets');
            $mets->setAttribute('xmlns:mets', 'http://www.loc.gov/METS/');
        }
        $mets->setAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
        $mets->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $mets->setAttribute('xsi:schemaLocation', 'http://www.loc.gov/METS/ http://www.loc.gov/standards/mets/mets.xsd');
        
        // handle attributes
        if($this->isset_ID()) {$mets->setAttribute('ID', $this->ID);}
        
        // handle child nodes
        if($this->isset_fileSec()){
            $mets->appendChild($dom->importNode($this->fileSec->get_as_DOM(), TRUE));
        }
        
        if($this->isset_structMap()){
            $mets->appendChild($dom->importNode($this->structMap->get_as_DOM(), TRUE));
        }
        else {
            throw new RequiredElementException('structMap');
        }
        
        return $mets;
    }
}

?>
