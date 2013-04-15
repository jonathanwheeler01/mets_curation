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
 * A class to construct the METS package and write final
 * file to output, with helper functions to insert
 * child nodes wherever nesting is required.
 * 
 * @author Robert Olendorf
 * @author Jon Wheeler
 * 
 * NOTICE
 * This file has been modified from the original. The class and
 * methods have been revised to include METS specific
 * element and attribute names.
 * 
 * This class is identical to METSPackage and is used for
 * development purposes.
 * 
 * @todo Implement MetadataObject from XFDU version. Merge classes
 * DirectoryProcessor and SingleProcessor (at which point this class
 * becomes unnecessary).
 * 
 * All modifications by Jon Wheeler
 */

class METSPackageSingle {
    
  /**
   *
   * @var DomElement 
   */
  protected $mets;
  
  /**
   *
   * @var METSBuilder 
   */
  protected $builder;
  
  /**
   *
   * @param METSSetup $settings 
   */
  public function __construct(METSSetup $settings) {
    $this->builder = new METSBuilder();
    $this->mets = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $this->mets->appendChild($this->mets->importNode($this->builder->build_mets($settings)->get_as_DOM(), TRUE));
  }
  
  public function write($filename) {
    $this->mets->save($filename);
  }
  
  public function read($filename) {
    $dom = new DOMDocument('1.0', 'UTF-8');
    $this->mets = $dom->load($filename);
  }
  
  /**
   * @param Div $div
   * @param string $parent
   * @return mixed Div on success, FALSE on failure
   */  
  private function Div(Div $div, $parent) {
        if ($parent == NULL) {
            $structMapDOM = $this->mets->getElementsByTagName('mets:structMap')->item(0);
            return $structMapDOM->appendChild($this->mets->importNode($div->get_as_DOM(), TRUE));
        } 
        else {
            $xpath = new DOMXPath($this->mets);
            $xpath->registerNamespace('mets', 'http://www.loc.gov/METS/');
            $query = '//mets:div[@ID="' . $parent . '"]';
            $parentNode = $xpath->query($query)->item(0);
            if ($parentNode == NULL) {
                return FALSE;
            }
            return $parentNode->appendChild($this->mets->importNode($div->get_as_DOM(), TRUE));
        }
    }
    
  /**
   * @param FileGrp $fileGrp
   * @param string $parent
   * @return mixed fileGrp on success, FALSE on failure
   */
      private function FileGrp(FileGrp $fileGrp, $parent) {
        if ($parent == NULL) {
            $fileSecDOM = $this->mets->getElementsByTagName('mets:fileSec')->item(0);
            return $fileSecDOM->appendChild($this->mets->importNode($fileGrp->get_as_DOM(), TRUE));
        } else {
            $xpath = new DOMXPath($this->mets);
            $query = '//mets:fileSec[@ID="' . $parent . '"]';
            $xpath->registerNamespace('mets', 'http://www.loc.gov/METS/');
            $parentNode = $xpath->query($query)->item(0);
            if ($parentNode == NULL) {
                return FALSE;
                }
            return $parentNode->appendChild($this->mets->importNode($fileGrp->get_as_DOM(), TRUE));
            }
        }
        
  /**
   * @param File $file
   * @param string $parent
   * @return mixed File on success, FALSE on failure
   */
        private function File(File $file, $parent) {
        if ($parent == NULL) {
            $fileGrpDOM = $this->mets->getElementsByTagName('mets:fileGrp')->item(0);
            return $fileGrpDOM->appendChild($this->mets->importNode($file->get_as_DOM(), TRUE));
        } else {
            $xpath = new DOMXPath($this->mets);
            $query = '//mets:fileGrp[@ID="' . $parent . '"]';
            $xpath->registerNamespace('mets', 'http://www.loc.gov/METS/');
            $parentNode = $xpath->query($query)->item(0);
            if ($parentNode == NULL) {
                return FALSE;
                }
            return $parentNode->appendChild($this->mets->importNode($file->get_as_DOM(), TRUE));
            }
        }
    
    
  
  /**
   * Adds the object to the METS document.
   * @param aMETSElement $METSElement The element to be added
   * @param Mixed $parent Specify the parent element. If null, the highest allowable element is used.
   * @return mixed The object added. The object added is returned on success, false otherwise.
   * @throws InvalidArgumentException Thrown if adding the element is not supported, or the parent does not exist.
   */
  public function add(aMETSElement $METSElement, $parent = NULL) {
  	if(method_exists($this, $methodName = get_class($METSElement))) {
  		return $this->$methodName($METSElement, $parent);
  	}
  	else {
  		$message = 'No add functionality has been implemented for the '.get_class($METSElement);
  		$code = 0;
  		$previous = NULL;
  		throw new InvalidArgumentException($message, $code, $previous);
  	}
  }
  
}
?>

