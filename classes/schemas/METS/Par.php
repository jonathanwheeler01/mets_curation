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
 * The <par> or parallel files element aggregates pointers to files, parts 
 * of files, and/or sequences of files or parts of files that must be played or 
 * displayed simultaneously to manifest a block of digital content represented 
 * by an <fptr> element. This might be the case, for example, with 
 * multi-media content, where a still image might have an accompanying audio 
 * track that comments on the still image. In this case, a <par> element 
 * would aggregate two <area> elements, one of which pointed to the image 
 * file and one of which pointed to the audio file that must be played in 
 * conjunction with the image. The <area> element associated with the 
 * image could be further qualified with SHAPE and COORDS attributes if only a 
 * portion of the image file was pertinent and the <area> element 
 * associated with the audio file could be further qualified with BETYPE, 
 * BEGIN, EXTTYPE, and EXTENT attributes if only a portion of the associated 
 * audio file should be played in conjunction with the image.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Par extends aMETSElement {
    /*
     * @var string
     */

    protected $ID;

    /*
     * @var area
     */
    protected $area;

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
            $par = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $par = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':par');
        }
        else {
            $par = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$par->setAttribute('ID', $this->ID);}
        
        if($this->isset_area()){
            $par->appendChild($dom->importNode($this->area->get_as_DOM()));
        }
        
        if($this->isset_seq()){
            $par->appendChild($dom->importNode($this->seq->get_as_DOM()));
        }
        
        return $par;
    }
}
?>
