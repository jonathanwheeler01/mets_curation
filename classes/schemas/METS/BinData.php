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
 * A place holder class for bin64 data.
 * Currently just an XML wrapper. 
 *
 * @author Jon Wheeler
 */
class BinData extends aMETSElement{
  
	/**
	 *
	 * @param type $prefix
	 * @return DOMElement;
	 */
	public function get_as_DOM($prefix = NULL) {
		$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
	
		$binData = $dom->createElement('binData');
	
		return $binData;
	}
	
}

?>
