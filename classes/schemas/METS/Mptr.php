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
 * Like the <fptr> element, the METS pointer element <mptr> 
 * represents digital content that manifests its parent <div> element. 
 * Unlike the <fptr>, which either directly or indirectly points to 
 * content represented in the <fileSec> of the parent METS document, 
 * the <mptr> element points to content represented by an external METS 
 * document. Thus, this element allows multiple discrete and separate METS 
 * documents to be organized at a higher level by a separate METS document. 
 * For example, METS documents representing the individual issues in the series 
 * of a journal could be grouped together and organized by a higher level METS 
 * document that represents the entire journal series. Each of the <div> 
 * elements in the <structMap> of the METS document representing the 
 * journal series would point to a METS document representing an issue.  
 * It would do so via a child <mptr> element. Thus the <mptr> 
 * element gives METS users considerable flexibility in managing the depth of 
 * the <structMap> hierarchy of individual METS documents. The 
 * <mptr> element points to an external METS document by means of an 
 * xlink:href attribute and associated XLink attributes.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Mptr extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $LOCTYPE;
    
    /*
     * @var string
     */
    protected $OTHERLOCTYPE;
    
    /*
     * @var string
     */
    protected $type;
    
    /*
     * @var string
     */
    protected $xlink_href;
    
    /*
     * @var string
     */
    protected $xlink_role;
    
    /*
     * @var string
     */
    protected $xlink_arcrole;
    
    /*
     * @var string
     */
    protected $xlink_title;
    
    /*
     * @var string
     */
    protected $xlink_show;
    
    /*
     * @var string
     */
    protected $xlink_actuate;
    
    /*
     * @var string
     */
    protected $CONTENTIDS;
    
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
     * @param string LOCTYPE
     */
    public function set_LOCTYPE($LOCTYPE){
        $this->LOCTYPE = $LOCTYPE;
    }
    
    /*
     * @return CONTENTIDS
     */
    public function get_LOCTYPE(){
        return $this->LOCTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_LOCTYPE(){
        return (isset($this->LOCTYPE) && !empty($this->LOCTYPE));
    }
    
    /*
     * @param string OTHERLOCTYPE
     */
    public function set_OTHERLOCTYPE($OTHERLOCTYPE){
        $this->OTHERLOCTYPE = $OTHERLOCTYPE;
    }
    
    /*
     * @return OTHERLOCTYPE
     */
    public function get_OTHERLOCTYPE(){
        return $this->OTHERLOCTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_OTHERLOCTYPE(){
        return (isset($this->OTHERLOCTYPE) && !empty($this->OTHERLOCTYPE));
    }
    
    /*
     * @param string type
     */
    public function set_type($type){
        $this->type = $type;
    }
    
    /*
     * @return type
     */
    public function get_type(){
        return $this->type;
    }
    
    /*
     * @return boolean
     */
    public function isset_type(){
        return (isset($this->type) && !empty($this->type));
    }
    
    /*
     * @param string xlink_href
     */
    public function set_xlink_href($xlink_href){
        $this->xlink_href = $xlink_href;
    }
    
    /*
     * @return xlink_href
     */
    public function get_xlink_href(){
        return $this->xlink_href;
    }
    
    /*
     * @return boolean
     */
    public function isset_xlink_href(){
        return (isset($this->xlink_href) && !empty($this->xlink_href));
    }
    
    /*
     * @param string xlink_role
     */
    public function set_xlink_role($xlink_role){
        $this->xlink_role = $xlink_role;
    }
    
    /*
     * @return xlink_role
     */
    public function get_xlink_role(){
        return $this->xlink_role;
    }
    
    /*
     * @return boolean
     */
    public function isset_xlink_role(){
        return (isset($this->xlink_role) && !empty($this->xlink_role));
    }
    
    /*
     * @param string xlink_arcrole
     */
    public function set_xlink_arcrole($xlink_arcrole){
        $this->xlink_arcrole = $xlink_arcrole;
    }
    
    /*
     * @return xlink_arcrole
     */
    public function get_xlink_arcrole(){
        return $this->xlink_arcrole;
    }
    
    /*
     * @return boolean
     */
    public function isset_xlink_arcrole(){
        return (isset($this->xlink_arcrole) && !empty($this->xlink_arcrole));
    }
    
    /*
     * @param string xlink_title
     */
    public function set_xlink_title($xlink_title){
        $this->xlink_title = $xlink_title;
    }
    
    /*
     * @return xlink_title
     */
    public function get_xlink_title(){
        return $this->xlink_title;
    }
    
    /*
     * @return boolean
     */
    public function isset_xlink_title(){
        return (isset($this->xlink_title) && !empty($this->xlink_title));
    }
    
    /*
     * @param string xlink_show
     */
    public function set_xlink_show($xlink_show){
        $this->xlink_show = $xlink_show;
    }
    
    /*
     * @return xlink_show
     */
    public function get_xlink_show(){
        return $this->xlink_show;
    }
    
    /*
     * @return boolean
     */
    public function isset_xlink_show(){
        return (isset($this->xlink_show) && !empty($this->xlink_show));
    }
    
    /*
     * @param string xlink_actuate
     */
    public function set_xlink_actuate($xlink_actuate){
        $this->xlink_actuate = $xlink_actuate;
    }
    
    /*
     * @return xlink_actuate
     */
    public function get_xlink_actuate(){
        return $this->xlink_actuate;
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function isset_xlink_actuate(){
        return (isset($this->xlink_actuate) && !empty($this->xlink_actuate));
    }
    
     public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $mptr = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            //$mptr = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':mptr');
        }
        else {
            $mptr = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$mptr->setAttribute('ID', $this->ID);}
        if($this->isset_LOCTYPE()) {$mptr->setAttribute('LOCTYPE', $this->LOCTYPE);}
        if($this->isset_OTHERLOCTYPE()) {$mptr->setAttribute('OTHERLOCTYPE', $this->OTHERLOCTYPE);}
        if($this->isset_type()) {$mptr->setAttribute('type', $this->type);}
        if($this->isset_xlink_href()) {$mptr->setAttribute('xlink:href', $this->xlink_href);}
        if($this->isset_xlink_role()) {$mptr->setAttribute('xlink:role', $this->xlink_role);}
        if($this->isset_xlink_arcrole()) {$mptr->setAttribute('xlink:arcrole', $this->xlink_arcrole);}
        if($this->isset_xlink_title()) {$mptr->setAttribute('xlink:title', $this->xlink_title);}
        if($this->isset_xlink_show()) {$mptr->setAttribute('xlink:show', $this->xlink_show);}
        if($this->isset_xlink_actuate()) {$mptr->setAttribute('xlink:actuate', $this->xlink_actuate);}
        if($this->isset_CONTENTIDS()) {$mptr->setAttribute('CONTENTIDS', $this->CONTENTIDS);}
        
        return $mptr;
    }
    
}
?>
