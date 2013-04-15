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
 * Defines an XML namespace
 *
 * @author Robert Olendorf
 * 
 */
class XMLNameSpace {
  
  /**
   * The namespace identifier
   * @var string
   */
  protected $uri;
  
  /**
   *
   * @var The location of the namespace. Typically a URL
   */
  protected $location;
  
  /**
   * An optional prefix for the namespace
   * @var string
   */
  protected $prefix;
  
  /**
   * Creates a namespace bean, with optional namespace identifier, location
   * and prefix. 
   * 
   * @param type $uri
   * @param type $location
   * @param type $prefix 
   */
  public function __construct($uri = NULL, $location = NULL, $prefix = NULL) {
    $this->location = $location;
    $this->uri = $uri;
    $this->prefix = $prefix;
  }
  
  /**
   *
   * @param string $uri 
   */
  public function set_uri($uri) {
    $this->uri = $uri;
  }
  
  /**
   *
   * @return string 
   */
  public function get_uri() {
    return $this->uri;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_uri() {
    return (isset($this->uri) && !empty($this->uri));
  }
  
  /**
   *
   * @param string $location 
   */
  public function set_location($location) {
    $this->location = $location;
  }
  
  /**
   *
   * @return string 
   */
  public function get_location() {
    return $this->location;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_location() {
    return (isset($this->location) && !empty($this->location));
  }
  
  /**
   *
   * @param string $prefix 
   */
  public function set_prefix($prefix) {
    $this->prefix = $prefix;
  }
  
  /**
   *
   * @return type 
   */
  public function get_prefix() {
    return $this->prefix;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_prefix() {
    return (isset($this->prefix) && !empty($this->prefix));
  }
}
?>
