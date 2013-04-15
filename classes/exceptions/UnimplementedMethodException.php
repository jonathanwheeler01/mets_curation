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
 * Description of UnimplementedMethodException
 *
 * @author Rob
 */
class UnimplementedMethodException extends Exception{
  public function __construct($className, $methodName) {
    $message = $methodName.' has not been implemented in '.
               $className.' (file: '.$this->file.'; line: '.$this->line.').';
    $code = 0;
    $previous = NULL;
    parent::__construct($message, $code, $previous);
  }
}

?>
