<?php
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
 * The file content element <FContent> is used to identify a content file 
 * contained internally within a METS document. The content file must be 
 * either Base64 encoded and contained within the subsidiary <binData> wrapper 
 * element, or consist of XML information and be contained within the 
 * subsidiary <xmlData> wrapper element.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class FContent extends aMETSElement{
	/*
	 * @var string
	 */
	protected $ID;

	/*
	 * @var string
	 * */
	protected $USE;
	
	/*
	 * @var XMLData
	 * */
	protected $xmlData;
	
	/*
	 * 
	 * @var binData;
	 * 
	 * */
	protected $binData;
	
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
     * @param XMLData $xmlData
    */
    public function set_xmlData(XMLData $xmlData){
    	$this->xmlData = $xmlData;
    }
    
    /*
     * @return string
    */
    public function get_xmlData() {
    	return $this->xmlData;
    }
    
    /*
     * @return boolean
    */
    public function isset_xmlData() {
    	return (isset($this->xmlData) && !empty($this->xmlData));
    }
    
    /*
     * @param BinData $binData
    */
    public function set_binData(BinData $binData){
    	$this->binData = $binData;
    }
    
    /*
     * @return string
    */
    public function get_binData() {
    	return $this->binData;
    }
    
    /*
     * @return boolean
    */
    public function isset_binData() {
    	return (isset($this->binData) && !empty($this->binData));
    }
    
    /*
     * @param type $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
    	$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    	if($prefix !== NULL) {
    		$fcontent = $dom->createElement($prefix.':'.get_class($this));
    		//$fcontent = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fcontent');
    	}
    	else {
    		$fcontent = $dom->createElementNS('mets:'.get_class($this));
    	}
    
    	// handle attributes
    	if($this->isset_ID()) {
    		$fcontent->setAttribute('ID', $this->ID);
    	}
    
    	if($this->isset_USE()) {
    		$fcontent->setAttribute('USE', $this->USE);
    	}
    	
    	// handle child elements
    	if($this->isset_binData()){
    		$fcontent->appendChild($dom->importNode($this->binData->get_as_DOM(), TRUE));
    	}
    	
    	if($this->isset_xmlData()){
    		$fcontent->appendChild($dom->importNode($this->xmlData->get_as_DOM(), TRUE));
    	}
    
    		return $fcontent;
    
    	}
    
}    

?>
