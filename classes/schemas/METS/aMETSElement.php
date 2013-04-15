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
 * A "wrapper" Class to collect methods and attributes (probably only methods)
 * specific to all METS classes.
 *
 * @author Rob Olendorf
 * 
 * File modified by Jon Wheeler. Class name and property revised
 * to reflect METS based derivative of Rob Olendorf's 
 * XFDU 'data_curation' tool.
 * 
 */
abstract class aMETSElement extends aXMLElement {
  protected $classNamePrefix = 'METS';
}

?>
