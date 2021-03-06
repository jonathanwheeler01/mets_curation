<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';
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
 * Description of aXMLElement
 *
 * @author Rob Olendorf
 */
abstract class aXMLElement implements iXMLElement{
  
  /**
   *
   * @var float 
   */
  protected $XMLVersion = '1.0';
  
  /**
   *
   * @var string
   */
  protected $XMLEncoding = 'UTF-8';
  
  
  /**
   * An associative array of attributes.
   * @var array<string> 
   */
  protected $attributes;
  
  /**
   * an associative array of namespaces
   * @var array<NameSpace> 
   */
  protected $namepaces;
  
  /**
   * By convention all subclasses 
   * @var string 
   */
  protected $classNamePrefix = '';
  
  /**
   *  @param string $id
   */
  public function validate_id($id) {
    return (preg_match('/^[_a-zA-Z][_a-zA-Z0-9]*/', $id) > 0);
  }
  
  /**
   * 
   *  @param string name
   */
  public function validate_element_name($name) {
    return (preg_match('/^(?!((x|X)(m|M)(l|L)))[-_a-zA-Z:\.][^<>]*/', $name) > 0);
  }
  
  /**
   *
   * @param XMLNameSpace $namespace 
   */
  public function __construct() {    
    $this->attributes = array();
  }
  
  /**
   *
   * @param float $XMLVersion 
   */
  public function set_XMLVersion($XMLVersion) {
    $this->XMLVersion = $XMLVersion;
  }
  
  /**
   *
   * @return float 
   */
  public function get_XMLVersion() {
    return $this->XMLVersion;
  }
  
  /**
   *
   * @param string $XMLEncoding 
   */
  public function set_XMLEncoding($XMLEncoding) {
    $this->XMLEncoding = $XMLEncoding;
  }
  
  /**
   *
   * @return string 
   */
  public function get_XMLEncoding() {
    return $this->XMLEncoding;
  }
  
  /**
   * Sets an attribute with the $name to the $value
   * @param string $name
   * @param string $value 
   */
  public function add_attribute($name, $value) {
    $this->attributes[$name] = $value;
  }
  
  /**
   * Returns an associative array of attributes.
   * 
   * @return array<string> 
   */
  public function get_attributes() {
    return $this->attributes;
  }
  
  /**
   * Returns the value of the given attribute if it exists. Returns false otherwise.
   * @param string $name
   * @return string 
   */
  public function get_attribute($name) {
    if(array_key_exists($name, $this->attributes)) {
      return $this->attributes[$name];
    }
    else {
      return FALSE;
    }
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_attributes() {
    return (isset($this->attributes) && !empty($this->attributes));
  }
  
  /**
   * 
   */
  public function unset_attributes() {
    $this->attributes = array();
  }
  
  /**
   * Adds an XMLNamepace to the element.
   * @param XMLNameSpace $namespace 
   */
  public function add_namespace(XMLNameSpace $namespace) {
    $this->namepaces[$namespace->get_uri()] = $namespace;
  }
  
  /**
   *
   * @return array<XMLNamespace> 
   */
  public function get_namespaces() {
    return $this->namepaces;
  }
  
  /**
   * Returns the XMLNamspace with the given uri if it exists. Returns FALSE 
   * otherwise.
   * 
   * @param string $uri
   * @return XMLNamespace 
   */
  public function get_namespace($uri) {
    if(array_key_exists($uri, $this->namepaces)) {
      return $this->namepaces[$uri];
    }
    else {
      return FALSE;
    }
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_namespaces() {
    return (isset($this->namepaces) && !empty($this->namepaces));
  }
  
  /**
   * 
   */
  public function unset_namespaces() {
    $this->namepaces = array();
  }
  
  protected function first_to_lower($string){
    return strtolower(substr($string, 0, 1)).  substr($string, 1);
  }
  
  protected function get_element_name($prefix) {
    return substr(get_class($this), strlen($this->classNamePrefix));
  }
}

?>