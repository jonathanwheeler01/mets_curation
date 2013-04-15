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
 * A basic data structure for an XML element. 
 *
 * @author Rob Olendorf
 * 
 */
class XMLElement extends aXMLElement{
  protected $elementID;
  
  /**
   *
   * @var string 
   */
  protected $name;
  
  /**
   *
   * @var string 
   */
  protected $value;
  
  /**
   *
   * @var array<XMLElement>
   */
  protected $children;
  
  public function __construct($name = NULL) {
    $this->elementID = sha1(time().rand(0, 100000));
    if($name !== NULL) {
      $this->set_name($name);
    }
    $this->children = array();
    parent::__construct();
  }
  
  public function get_elementID() {
    return $this->elementID;
  }
  
  /**
   * Sets the element name. Throws an InvalidArgumentException exceptoin if an invalid
   * XML element name is specifeid.
   * @param string $name 
   */
  public function set_name($name) {
    $this->elementID = sha1(time().rand(0, 100000));
    
    if($this->validate_element_name($name)) {
      $this->name = $name;
    }
    else {
      $message = 'Invalid XML Element name "'.$name.'" specified ';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_name() {
    return $this->name;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_name() {
    return (isset($this->name) && !empty($this->name));
  }
  
  /**
   *
   * @param string $value 
   */
  public function set_value($value) {
    $this->value = $value;
  }
  
  /**
   *
   * @return string 
   */
  public function get_value() {
    return $this->value;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }
  
  /**
   * A new element must be created for each child. Otherwise the append will just
   * overwrite the existing child.
   * @param XMLElement $child 
   */
  public function append_child(XMLElement $child) {
    $this->children[$child->get_elementID()] = $child;
  }
  
  /**
   *
   * @return array<XMLElement> 
   */
  public function get_children() {
    return $this->children;
  }
  
  /**
   *
   * @param XMLElement $child 
   */
  public function remove_child(XMLElement $child) {
    $this->children = array_diff_key($this->children, array($child->get_elementID() => $child));
  }
  
  /**
   * 
   */
  public function unset_children() {
    $this->children = array();
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_children() {
    return (isset($this->children) && !empty($this->children));
  }
  
  
  /**
   * @todo Implement get_as_DOM in XMLElement. Low priorit for now.
   * @param type $prefix 
   */
  public function get_as_DOM($prefix = NULL) {
    throw new UnimplementedMethodException(get_class($this), __METHOD__);
  }
}

?>