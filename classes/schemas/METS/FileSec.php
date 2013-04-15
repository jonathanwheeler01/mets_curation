<?php

require_once dirname(__FILE__) . '/../../../curation_tool.inc';
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
/**
 * The overall purpose of the content file section element <fileSec> is to 
 * provide an inventory of and the location for the content files that 
 * comprise the digital object being described in the METS document.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class FileSec extends aMETSElement {
    
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var fileGrp
     */
    protected $fileGrp;
    
    
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
     * @param FileGrp $fileGrp
     */
    public function set_fileGrp(FileGrp $fileGrp){
        $this->fileGrp = $fileGrp;
    }
    
    /*
     * @return string
     */
    public function get_fileGrp() {
        return $this->fileGrp;
    }
    
    /*
     * @return boolean
     */
    public function isset_fileGrp() {
        return (isset($this->fileGrp) && !empty($this->fileGrp));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $fileSec = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            //$fileSec = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fileSec');
        }
        else {
            $fileSec = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$fileSec->setAttribute('ID', $this->ID);}
        
        // handle child nodes
        if($this->isset_fileGrp()){
            $fileSec->appendChild($dom->importNode($this->fileGrp->get_as_DOM()));
        }
        
        return $fileSec;
    }
}

?>
