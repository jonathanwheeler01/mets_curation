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
 * The transform file element <transformFile> provides a means to access 
 * any subsidiary files listed below a <file> element by indicating the 
 * steps required to "unpack" or transform the subsidiary files. This element 
 * is repeatable and might provide a link to a <behavior> in the 
 * <behaviorSec> that performs the transformation.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class TransformFile extends aMETSElement{
	/*
	 * @var string
	 * 
	 * */
	protected $ID;
	
	/*
	 * @var string
	 * 
	 * */
	protected $TRANSFORMALGORITHM;
	
	/*
	 * @var string
	*
	* */
	protected $TRANSFORMABEHAVIOR;
	
	/*
	 * @var string
	*
	* */
	protected $TRANSFORMKEY;
	
	/*
	 * @var int
	*
	* */
	protected $TRANSFORMORDER;
	
	/*
	 * @var string
	*
	* */
	protected $TRANSFORMTYPE;
	
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
	 * @param string $TRANSFORMALGORITHM
	*/
	public function set_TRANSFORMALGORITHM($TRANSFORMALGORITHM){
		$this->TRANSFORMALGORITHM = $TRANSFORMALGORITHM;
	}
	
	/*
	 * @return string
	*/
	public function get_TRANSFORMALGORITHM() {
		return $this->TRANSFORMALGORITHM;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_TRANSFORMALGORITHM() {
		return (isset($this->TRANSFORMALGORITHM) && !empty($this->TRANSFORMALGORITHM));
	}
	
	/*
	 * @param string $TRANSFORMBEHAVIOR
	*/
	public function set_TRANSFORMBEHAVIOR($TRANSFORMBEHAVIOR){
		$this->TRANSFORMBEHAVIOR = $TRANSFORMBEHAVIOR;
	}
	
	/*
	 * @return string
	*/
	public function get_TRANSFORMBEHAVIOR() {
		return $this->TRANSFORMBEHAVIOR;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_TRANSFORMBEHAVIOR() {
		return (isset($this->TRANSFORMBEHAVIOR) && !empty($this->TRANSFORMBEHAVIOR));
	}
	
	/*
	 * @param string $TRANSFORMKEY
	*/
	public function set_TRANSFORMKEY($TRANSFORMKEY){
		$this->TRANSFORMKEY = $TRANSFORMKEY;
	}
	
	/*
	 * @return string
	*/
	public function get_TRANSFORMKEY() {
		return $this->TRANSFORMKEY;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_TRANSFORMKEY() {
		return (isset($this->TRANSFORMKEY) && !empty($this->TRANSFORMKEY));
	}
	
	/*
	 * @param int $TRANSFORMORDER
	*/
	public function set_TRANSFORMORDER($TRANSFORMORDER){
		$this->TRANSFORMORDER = $TRANSFORMORDER;
	}
	
	/*
	 * @return string
	*/
	public function get_TRANSFORMORDER() {
		return $this->TRANSFORMORDER;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_TRANSFORMORDER() {
		return (isset($this->TRANSFORMORDER) && !empty($this->TRANSFORMORDER));
	}
	
	/*
	 * @param string $TRANSFORMTYPE
	*/
	public function set_TRANSFORMTYPE($TRANSFORMTYPE){
		$this->TRANSFORMTYPE = $TRANSFORMTYPE;
	}
	
	/*
	 * @return string
	*/
	public function get_TRANSFORMTYPE() {
		return $this->TRANSFORMTYPE;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_TRANSFORMTYPE() {
		return (isset($this->TRANSFORMTYPE) && !empty($this->TRANSFORMTYPE));
	}
	
    /*
     * @param string $prefix
     * @return DOMElement;
     */
	public function get_as_DOM($prefix = NULL) {
		$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
	
		if($prefix !== NULL) {
			$transformFile = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
			//$transformFile = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':transformFile');
		}
		else {
			$transformFile = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
		}
	
		// handle attributes
		if($this->isset_ID()) {
			$transformFile->setAttribute('ID', $this->ID);
		}
		
		if($this->isset_TRANSFORMALGORITHM()) {
			$transformFile->setAttribute('TRANSFORMALGORITHM', $this->ID);
		}
		
		if($this->isset_TRANSFORMBEHAVIOR()) {
			$transformFile->setAttribute('TRANSFORMBEHAVIOR', $this->TRANSFORMBEHAVIOR);
		}
		
		if($this->isset_TRANSFORMKEY()) {
			$transformFile->setAttribute('TRANSFORMKEY', $this->TRANSFORMKEY);
		}
		
		if($this->isset_TRANSFORMORDER()) {
			$transformFile->setAttribute('TRANSFORMORDER', $this->TRANSFORMORDER);
		}
		
		if($this->isset_TRANSFORMTYPE()) {
			$transformFile->setAttribute('TRANSFORMTYPE', $this->TRANSFORMTYPE);
		}
	
		return $transformFile;
	
	}
}

?>
