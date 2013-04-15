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
 * The file group is used to cluster all of the digital files composing a 
 * digital library object in a hierarchical arrangement (fileGrp is 
 * recursively defined to enable the creation of the hierarchy).  Any file 
 * group may contain zero or more file elements.  File elements in turn can 
 * contain one or more FLocat elements (a pointer to a file containing content 
 * for this object) and/or a FContent element (the contents of the file, in 
 * either XML or  Base64 encoding).
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class FileGrp extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $VERSDATE;
    
    /*
     * @var string
     */
    protected $ADMID;
    
    /*
     * @var string
     */
    protected $USE;
    
    /*
     * @var $file
     */
    protected $file;
    
    public function __construct() {
        $this->fileGrps = array();
    }
    
    /*
     * @param FileGrp $fileGrp
     */
    public function addfileGrp(FileGrp $fileGrp) {
        $this->fileGrps[] = $fileGrp;
    }
    
    /**
     *
     * @return array<fileGrps>
     */
    public function get_fileGrps() {
      return $this->fileGrps;
    }

    /**
     * 
     */
    public function unset_fileGrps() {
      $this->fileGrps = array();
    }

    /**
     * 
     * @return boolean
     */
    public function isset_fileGrps() {
      return (isset($this->fileGrps) && !empty($this->fileGrps));
    }
    
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
     * @param string $ADMID
     */
    public function set_ADMID($ADMID){
        if($this->validate_id($ADMID)){
            $this->ADMID = $ADMID;
        }
        else {
            throw new InvalidIDTokenException($ADMID);
        }
    }
    
    /*
     * @return string
     */
    public function get_ADMID() {
        return $this->ADMID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ADMID() {
        return (isset($this->ADMID) && !empty($this->ADMID));
    }
    
    /*
     * @param string $VERSDATE
     */
    public function set_VERSDATE($VERSDATE){
        $this->VERSDATE = $VERSDATE;
    }
    
    /*
     * @return string
     */
    public function get_VERSDATE() {
        return $this->VERSDATE;
    }
    
    /*
     * @return boolean
     */
    public function isset_VERSDATE() {
        return (isset($this->VERSDATE) && !empty($this->VERSDATE));
    }
    
    /*
     * @param string $USE
     */
    public function set_USE($USE){
        $this->USE = $USE;
    }
    
    /*
     * @return string
     */
    public function get_USE() {
        return $this->USE;
    }
    
    /*
     * @return boolean
     */
    public function isset_USE() {
        return (isset($this->USE) && !empty($this->USE));
    }
    
    /*
     * @param File $file
     */
    public function set_file(File $file){
        $this->file = $file;
    }
    
    /*
     * @return string
     */
    public function get_file() {
        return $this->file;
    }
    
    /*
     * @return boolean
     */
    public function isset_file() {
        return (isset($this->file) && !empty($this->file));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $fileGrp = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            //$fileGrp = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fileGrp');
        }
        else {
            $fileGrp = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
            //$fileGrp = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:fileGrp');
        }
        
        // handle attributes
        if($this->isset_ID()) {$fileGrp->setAttribute('ID', $this->ID);}
        
        if($this->isset_VERSDATE()) {$fileGrp->setAttribute('VERSDATE', $this->VERSDATE);}
        
        if($this->isset_ADMID()) {$fileGrp->setAttribute('ADMID', $this->ADMID);}
        
        if($this->isset_USE()) {$fileGrp->setAttribute('USE', $this->USE);}
        
        if($this->isset_file()){
            $fileGrp->appendChild($dom->importNode($this->file->get_as_DOM()));
        }
        
        $childFileGrpSec = new FileGrp();
        if($this->isset_fileGrps()) {
            foreach($this->fileGrpSecs as $childFileGrpSec) {
                $fileGrp->appendChild($dom->importNode($childFileGrpSec->get_as_DOM($prefix)));
            }
        
        }
        
        return $fileGrp;
        
    }
    
}
?>
