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
 * The structural map (structMap) outlines a hierarchical structure for the 
 * original object being encoded, using a series of nested div elements.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class StructMap extends aMetsElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $TYPE;
    
    /*
     * @var string
     */
    protected $LABEL;
    
    /*
     * @var div
     */
    protected $div;
    
    
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
     * @param string $TYPE
     */
    public function set_TYPE($TYPE){
        $this->TYPE = $TYPE;
    }
    
    /*
     * @return string
     */
    public function get_TYPE(){
        return $this->TYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_TYPE(){
        return (isset($this->TYPE) && !empty($this->TYPE));
    }
    
    /*
     * @param string $LABEL
     */
    public function set_LABEL($LABEL){
        $this->LABEL = $LABEL;
    }
    
    /*
     * @return string
     */
    public function get_LABEL(){
        return $this->LABEL;
    }
    
    /*
     * @return boolean
     */
    public function isset_LABEL(){
        return (isset($this->LABEL) && !empty($this->LABEL));
    }
    
     /*
     * @param Div $div
     */
    public function set_div(Div $div){
        $this->div = $div;
    }
    
    /*
     * @return div
     */
    public function get_div(){
        return $this->div;
    }
    
    /*
     * @return boolean
     */
    public function isset_div(){
        return (isset($this->div) && !empty($this->div));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $structMap = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            //$structMap = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':structMap');
        }
        else {
            $structMap = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$structMap->setAttribute('ID', $this->ID);}
        if($this->isset_LABEL()) {$structMap->setAttribute('LABEL', $this->LABEL);}
        if($this->isset_TYPE()) {$structMap->setAttribute('TYPE', $this->TYPE);}
        
        if($this->isset_div()){
            $structMap->appendChild($dom->importNode($this->div->get_as_DOM()));
        }
        
        return $structMap;
    }
}
?>
