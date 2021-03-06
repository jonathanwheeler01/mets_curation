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
 * A component byte stream element <stream> may be composed of one or 
 * more subsidiary streams. An MPEG4 file, for example, might contain separate 
 * audio and video streams, each of which is associated with technical 
 * metadata. The repeatable <stream> element provides a mechanism to 
 * record the existence of separate data streams within a particular file, and 
 * the opportunity to associate <dmdSec> and <amdSec> with those 
 * subsidiary data streams if desired.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Stream extends aMETSElement{
	/*
	 * @var string
	 * */
	protected $ADMID;
	
	/*
	 * @var string
	* */
	protected $BEGIN;
	
	/*
	 * @var string
	* */
	protected $BETYPE;
	
	/*
	 * @var string
	* */
	protected $DMDID;
	
	/*
	 * @var string
	* */
	protected $END;
	
	/*
	 * @var string
	* */
	protected $ID;
	
	/*
	 * @var string
	* */
	protected $OWNERID;
	
	/*
	 * @var string
	* */
	protected $streamType;
	
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
	 * @param string $BEGIN
	*/
	public function set_BEGIN($BEGIN){
		$this->BEGIN = $BEGIN;
	}
	
	/*
	 * @return string
	*/
	public function get_BEGIN() {
		return $this->BEGIN;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_BEGIN() {
		return (isset($this->BEGIN) && !empty($this->BEGIN));
	}
	
	/*
	 * @param string $BETYPE
	*/
	public function set_BETYPE($BETYPE){
		$this->BETYPE = $BETYPE;
	}
	
	/*
	 * @return string
	*/
	public function get_BETYPE() {
		return $this->BETYPE;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_BETYPE() {
		return (isset($this->BETYPE) && !empty($this->BETYPE));
	}
	
	/*
	 * @param string $DMDID
	*/
	public function set_DMDID($DMDID){
		$this->DMDID = $DMDID;
	}
	
	/*
	 * @return string
	*/
	public function get_DMDID() {
		return $this->DMDID;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_DMDID() {
		return (isset($this->DMDID) && !empty($this->DMDID));
	}
	
	/*
	 * @param string $END
	*/
	public function set_END($END){
		$this->END = $END;
	}
	
	/*
	 * @return string
	*/
	public function get_END() {
		return $this->END;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_END() {
		return (isset($this->END) && !empty($this->END));
	}
	
	/*
	 * @param string $OWNERID
	*/
	public function set_OWNERID($OWNERID){
		$this->OWNERID = $OWNERID;
	}
	
	/*
	 * @return string
	*/
	public function get_OWNERID() {
		return $this->OWNERID;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_OWNERID() {
		return (isset($this->OWNERID) && !empty($this->OWNERID));
	}
	
	/*
	 * @param string $stresmType
	*/
	public function set_stresmType($stresmType){
		$this->stresmType = $stresmType;
	}
	
	/*
	 * @return string
	*/
	public function get_stresmType() {
		return $this->stresmType;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_stresmType() {
		return (isset($this->stresmType) && !empty($this->stresmType));
	}
	
    /*
     * @param string $prefix
     * @return DOMElement;
     */
	public function get_as_DOM($prefix = NULL) {
		$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
	
		if($prefix !== NULL) {
			$stream = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
			//$stream = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':stream');
		}
		else {
			$stream = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
		}
	
		// handle attributes
		if($this->isset_ID()) {
			$stream->setAttribute('ID', $this->ID);
		}
	
		if($this->isset_BEGIN()) {
			$stream->setAttribute('BEGIN', $this->BEGIN);
		}
	
		if($this->isset_BETYPE()) {
			$stream->setAttribute('BETYPE', $this->BETYPE);
		}
	
		if($this->isset_DMDID()) {
			$stream->setAttribute('DMDID', $this->DMDID);
		}
	
		if($this->isset_END()) {
			$stream->setAttribute('END', $this->END);
		}
	
		if($this->isset_OWNERID()) {
			$stream->setAttribute('OWNERID', $this->OWNERID);
		}
		
		if($this->isset_ADMID()) {
			$stream->setAttribute('ADMID', $this->ADMID);
		}
		
		if($this->isset_streamType()) {
			$stream->setAttribute('streamType', $this->streamType);
		}
	
		return $stream;
	
		}
	
}

?>
