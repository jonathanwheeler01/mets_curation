<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
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
