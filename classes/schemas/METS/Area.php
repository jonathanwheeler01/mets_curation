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
 * The area element provides for more sophisticated linking between a div 
 * element and content files representing that div, be they text, image, audio, 
 * or video files.  An area element can link a div to a point within a file, to 
 * a one-dimension segment of a file (e.g., text segment, image line, 
 * audio/video clip), or a two-dimensional section of a file (e.g, subsection 
 * of an image, or a subsection of the  video display of a video file.  
 * The area element has no content; all information is recorded within its 
 * various attributes.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class Area extends aMETSElement {
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
    protected $SHAPE;
    
    /*
     * @var string
     */
    protected $COORDS;
    
    /*
     * @var string
     */
    protected $BEGIN;
    
    /*
     * @var string
     */
    protected $END;
    
    /*
     * @var string
     */
    protected $BETYPE;
    
    /*
     * @var string
     */
    protected $EXTENT;
    
    /*
     * @var string
     */
    protected $EXTTYPE;
    
    /*
     * @var string
     */
    protected $ADMID;
    
    /*
     * @var string
     */
    protected $CONTENTIDS;
    
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
     * @param string ADMID
     */
    public function set_ADMID($ADMID){
        $this->ADMID = $ADMID;
    }
    
    /*
     * @return ADMID
     */
    public function get_ADMID(){
        return $this->ADMID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ADMID(){
        return (isset($this->ADMID) && !empty($this->ADMID));
    }
    
    /*
     * @param string CONTENTIDS
     */
    public function set_CONTENTIDS($CONTENTIDS){
        $this->CONTENTIDS = $CONTENTIDS;
    }
    
    /*
     * @return CONTENTIDS
     */
    public function get_CONTENTIDS(){
        return $this->CONTENTIDS;
    }
    
    /*
     * @return boolean
     */
    public function isset_CONTENTIDS(){
        return (isset($this->CONTENTIDS) && !empty($this->CONTENTIDS));
    }
    
    /*
     * @param string FILEID
     */
    public function set_FILEID($FILEID){
        $this->FILEID = $FILEID;
    }
    
    /*
     * @return FILEID
     */
    public function get_FILEID(){
        return $this->FILEID;
    }
    
    /*
     * @return boolean
     */
    public function isset_FILEID(){
        return (isset($this->FILEID) && !empty($this->FILEID));
    }
    
    /*
     * @param string SHAPE
     */
    public function set_SHAPE($SHAPE){
        $this->SHAPE = $SHAPE;
    }
    
    /*
     * @return SHAPE
     */
    public function get_SHAPE(){
        return $this->SHAPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_SHAPE(){
        return (isset($this->SHAPE) && !empty($this->SHAPE));
    }
    
     /*
     * @param string COORDS
     */
    public function set_COORDS($COORDS){
        $this->COORDS = $COORDS;
    }
    
    /*
     * @return SHAPE
     */
    public function get_COORDS(){
        return $this->COORDS;
    }
    
    /*
     * @return boolean
     */
    public function isset_COORDS(){
        return (isset($this->COORDS) && !empty($this->COORDS));
    }
    
     /*
     * @param string BEGIN
     */
    public function set_BEGIN($BEGIN){
        $this->BEGIN = $BEGIN;
    }
    
    /*
     * @return BEGIN
     */
    public function get_BEGIN(){
        return $this->BEGIN;
    }
    
    /*
     * @return boolean
     */
    public function isset_BEGIN(){
        return (isset($this->BEGIN) && !empty($this->BEGIN));
    }
    
     /*
     * @param string END
     */
    public function set_END($END){
        $this->END = $END;
    }
    
    /*
     * @return END
     */
    public function get_END(){
        return $this->END;
    }
    
    /*
     * @return boolean
     */
    public function isset_END(){
        return (isset($this->END) && !empty($this->END));
    }
    
    /*
     * @param string BETYPE
     */
    public function set_BETYPE($BETYPE){
        $this->BETYPE = $BETYPE;
    }
    
    /*
     * @return BETYPE
     */
    public function get_BETYPE(){
        return $this->BETYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_BETYPE(){
        return (isset($this->BETYPE) && !empty($this->BETYPE));
    }
    
    /*
     * @param string EXTENT
     */
    public function set_EXTENT($EXTENT){
        $this->EXTENT = $EXTENT;
    }
    
    /*
     * @return BETYPE
     */
    public function get_EXTENT(){
        return $this->EXTENT;
    }
    
    /*
     * @return boolean
     */
    public function isset_EXTENT(){
        return (isset($this->EXTENT) && !empty($this->EXTENT));
    }
    
    /*
     * @param string EXTTYPE
     */
    public function set_EXTTYPE($EXTTYPE){
        $this->EXTTYPE = $EXTTYPE;
    }
    
    /*
     * @return EXTTYPE
     */
    public function get_EXTTYPE(){
        return $this->EXTTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_EXTTYPE(){
        return (isset($this->EXTTYPE) && !empty($this->EXTTYPE));
    }
    
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $area = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $area = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':area');
        }
        else {
            $area = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$area->setAttribute('ID', $this->ID);}
        if($this->isset_FILEID()) {$area->setAttribute('FILEID', $this->FILEID);}
        if($this->isset_SHAPE()) {$area->setAttribute('SHAPE', $this->SHAPE);}
        if($this->isset_COORDS()) {$area->setAttribute('COORDS', $this->COORDS);}
        if($this->isset_BEGIN()) {$area->setAttribute('BEGIN', $this->BEGIN);}
        if($this->isset_END()) {$area->setAttribute('END', $this->END);}
        if($this->isset_BETYPE()) {$area->setAttribute('BETYPE', $this->BETYPE);}
        if($this->isset_EXTENT()) {$area->setAttribute('EXTENT', $this->EXTENT);}
        if($this->isset_EXTTYPE()) {$area->setAttribute('EXTTYPE', $this->EXTTYPE);}
        if($this->isset_ADMID()) {$area->setAttribute('ADMID', $this->ADMID);}
        if($this->isset_CONTENTIDS()) {$area->setAttribute('CONTENTIDS', $this->CONTENTIDS);}
        
        return $area;
    }
    
}
?>
