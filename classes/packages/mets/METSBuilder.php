<?php
require_once dirname(__FILE__).'/../../../curation_tool.inc';
/* 
 *    This file is part of data_curation.

 *    data_curation is free software: you can redistribute it and/or modify
 *    it under the terms of the Apache License, Version 2.0 (See License at the
 *    top of the directory).

 *    data_curation is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

 *    You should have received a copy of the Apache License, Version 2.0
 *    along with data_curation.  If not, see <http://www.apache.org/licenses/LICENSE-2.0.html>.
 */
/*
 * A helper class to create often needed elements
 * 
 * @author Rob Olendorf
 * @author Jon Wheeler
 * 
 * NOTICE
 * This file has been modified from the original. The class name
 * and methods have been revised to include METS specific
 * element and attribute names. 
 * 
 * Multiple methods from the original file have not yet been
 * implemented:
 * build_volumeInfo, build_extension, build_XMLData,
 * build_ReferenceSubtype, build_XFDUPointer, build_contentUnit,
 * build_fileLocation, build_byteStream_from_fileLocation, 
 * build_metadataObject. Some don't map clearly to METS, others
 * (listed below) will be implemented in future versions.
 * 
 * @todo Implement complete METS structure.
 * @todo Implement METS versions of XFDU classes
 * build_extension, build_XMLData, build_ReferenceSubtype,
 * build_fileLocation, build_byteStream_from_fileLocation, 
 * build_metadataObject.
 * 
 * All modifications by Jon Wheeler
 * 
 */

class METSBuilder {
    /**
     * Returns a METS object
     * @param METSSetup $settings
     * @return METS object
     */
    public function build_mets(METSSetup $settings) {
        
        $fileSec = new FileSec();
        $structMap = new StructMap();
        $mets = new METS();
        $mets->set_fileSec($fileSec);
        $mets->set_structMap($structMap);
        return $mets;
    }
    
    
    /**
     * @param aMETSelement $content
     * @param string $ID
     * @param string $TYPE
     * @param string $LABEL
     * @param string $CONTENTIDS
     * @return mets:div
     */
    public function build_div(aMETSElement $content = NULL, $ID = NULL, $TYPE = NULL, $LABEL = NULL, $CONTENTIDS = NULL) {
        if ($content != NULL) {
            if (get_class($content) != 'Mptr' && get_class($content) != 'Fptr' && get_class($content) != 'Div') {
                $message = 'Invalid content type. Expected an fptr, mptr or div. ' .
                        'Encountered ' . get_class($content);
                $code = 0;
                $previous = NULL;
                throw new InvalidArgumentException($message, $code, $previous);
            }
        }
        
        $div = new Div();
        
        if(get_class($content) == 'Mptr') {$div->set_mptr($content);}
        if(get_class($content) == 'Fptr') {$div->set_fptr($content);}
        if(get_class($content) == 'Div') {$div->add_div($content);}
        if($ID) {$div->set_ID($ID);}
        if($LABEL) {$div->set_LABEL($LABEL);}
        if($TYPE) {$div->set_TYPE($TYPE);}
        if($CONTENTIDS) {$div->set_CONTENTIDS($CONTENTIDS);}
        
        return $div;
    }
    
    /**
     * @param aMETSelement $content
     * @param string $ID
     * @param string $VERSDATE
     * @param string $ADMID
     * @param string $USE
     * @return mets:fileGrp
     */
    public function build_fileGrp(aMETSElement $content = NULL, $ID = NULL, $VERSDATE = NULL, $ADMID = NULL, $USE = NULL) {
        if ($content != NULL) {
            if (get_class($content) != 'FileGrp' && get_class($content) != 'File') {
                $message = 'Invalid content type. Expected a FileGrp or File. ' .
                        'Encountered ' . get_class($content);
                $code = 0;
                $previous = NULL;
                throw new InvalidArgumentException($message, $code, $previous);
            }
        }
        
        $fileGrp = new FileGrp();

        if(get_class($content) == 'File') {$fileGrp->set_file($content);}
        if(get_class($content) == 'FileGrp') {$fileGrp->addfileGrp($content);}
        if($ID) {$fileGrp->set_ID($ID);}
        if($VERSDATE) {$fileGrp->set_VERSDATE($VERSDATE);}
        if($ADMID) {$fileGrp->set_ADMID($ADMID);}
        if($USE) {$fileGrp->set_USE($USE);}
        
        
        return $fileGrp;
    }

}

?>
