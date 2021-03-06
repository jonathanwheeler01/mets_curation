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
 * A wrapper to contain arbitrary XML content.
 *
 * @author Rob Olendorf
 */
class XMLData extends aMETSElement{
  /**
   * Freeform or structured XML. May be stored an any format, String DOM etc.
   * @var mixed
   */
  protected $any;
  
  /**
   *
   * @param string $any XML as DOMElement or DOMNodeList
   */
  public function set_any($any) {
    if(get_class($any) != 'DOMElement' && get_class($any) != 'DOMNodeList') {
      $message = 'The METS Exception element must be an instance of a DOMNode, '.
                 'instance of '.  get_class($any).' given.';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
    $this->any = $any;
  }
  
  /**
   *
   * @return Mixed
   */
  public function get_any() {
    return $this->any;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_any() {
    return (isset($this->any) && !empty($this->any));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);

    $xmlData = $dom->createElement('xmlData');

    if(get_class($this->any) == 'DOMNode' || get_class($this->any) == 'DOMElement' ) {
      $xmlData->appendChild($dom->importNode($this->any, TRUE));
    }
    else if(get_class($this->any) == 'DOMNodeList'){
      for($i = 0; $i < $this->any->length; $i++) {
        $xmlData->appendChild($dom->importNode($this->any->item($i), TRUE));
      }
    }
    
    return $xmlData;
  }
}

?>
