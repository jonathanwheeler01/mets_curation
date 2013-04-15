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
 * The <fptr> or file pointer element represents digital content that manifests 
 * its parent <div> element. The content represented by an <fptr> element must 
 * consist of integral files or parts of files that are represented by <file> 
 * elements in the <fileSec>. Via its FILEID attribute,  an <fptr> may point 
 * directly to a single integral <file> element that manifests a 
 * structural division. However, an <fptr> element may also govern an <area> 
 * element,  a <par>, or  a <seq> which in turn would point to the relevant 
 * file or files. A child <area> element can point to part of a <file> that 
 * manifests a division, while the <par> and <seq> elements can point to 
 * multiple files or parts of files that together manifest a division. More 
 * than one <fptr> element can be associated with a <div> element. Typically 
 * sibling <fptr> elements represent alternative versions, or manifestations, 
 * of the same content
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Fptr extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $FILEID;
    
    /*
     * @var string
     */
    protected $CONTENTIDS;
    
    /*
     * @var area
     */
    protected $area;
    
    /*
     * @var par
     */
    protected $par;
    
    /*
     * @var seq
     */
    protected $seq;
    
    /*
     * @param string $ID
     */

    public function set_ID($ID) {
        if ($this->validate_id($ID)) {
            $this->ID = $ID;
        } else {
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
     * @param string $FILEID
     */

    public function set_FILEID($FILEID) {
        if ($this->validate_id($FILEID)) {
            $this->FILEID = $FILEID;
        } else {
            throw new InvalidIDTokenException($FILEID);
        }
    }

    /*
     * @return string
     */

    public function get_FILEID() {
        return $this->FILEID;
    }

    /*
     * @return boolean
     */

    public function isset_FILEID() {
        return (isset($this->FILEID) && !empty($this->FILEID));
    }
    
    /*
     * @param string $CONTENTIDS
     */

    public function set_CONTENTIDS($CONTENTIDS) {
        if ($this->validate_id($CONTENTIDS)) {
            $this->CONTENTIDS = $CONTENTIDS;
        } else {
            throw new InvalidIDTokenException($ID);
        }
    }

    /*
     * @return string
     */

    public function get_CONTENTIDS() {
        return $this->CONTENTIDS;
    }

    /*
     * @return boolean
     */

    public function isset_CONTENTIDS() {
        return (isset($this->CONTENTIDS) && !empty($this->CONTENTIDS));
    }
    
    /*
     * @param Area $area
     */
    public function set_area(Area $area){
        $this->area = $area;
    }
    
    /*
     * @return area
     */
    public function get_area(){
        return $this->area;
    }
    
    /*
     * @return boolean
     */
    public function isset_area(){
        return (isset($this->area) && !empty($this->area));
    }
    
    /*
     * @param Par $par
     */
    public function set_par(Par $par){
        $this->par = $par;
    }
    
    /*
     * @return par
     */
    public function get_par(){
        return $this->par;
    }
    
    /*
     * @return boolean
     */
    public function isset_par(){
        return (isset($this->par) && !empty($this->par));
    }
    
    /*
     * @param Seq $seq
     */
    public function set_seq(Seq $seq){
        $this->seq = $seq;
    }
    
    /*
     * @return par
     */
    public function get_seq(){
        return $this->seq;
    }
    
    /*
     * @return boolean
     */
    public function isset_seq(){
        return (isset($this->seq) && !empty($this->seq));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $fptr = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            //$fptr = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fptr');
        }
        else {
            $fptr = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$fptr->setAttribute('ID', $this->ID);}
        if($this->isset_FILEID()) {$fptr->setAttribute('FILEID', $this->FILEID);}
        if($this->isset_CONTENTIDS()) {$fptr->setAttribute('CONTENTIDS', $this->CONTENTIDS);}
        
        if($this->isset_area()){
            $fptr->appendChild($dom->importNode($this->area->get_as_DOM()));
        }
        if($this->isset_par()){
            $fptr->appendChild($dom->importNode($this->par->get_as_DOM()));
        }
        
        if($this->isset_seq()){
            $fptr->appendChild($dom->importNode($this->seq->get_as_DOM()));
        }
        
        return $fptr;
    }
}
?>
