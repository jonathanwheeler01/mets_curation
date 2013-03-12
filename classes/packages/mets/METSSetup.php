<?php
/**
 *    This file is part of data_curation.

 *    data_curation is free software: you can redistribute it and/or modify
 *    it under the terms of the Apache License, Version 2.0 (See License at the
 *    top of the directory).

 *    data_curation is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

 *    You should have received a copy of the Apache License, Version 2.0
 *    along with data_curation.  If not, see @link http://www.apache.org/licenses/LICENSE-2.0.html.
 * 
 * A class for setting XML and version attributes of the METS document,
 * including pointers to the repository and data set to be documented.
 *
 * @author Rob Olendorf
 * @author Jon Wheeler
 * 
 * NOTICE
 * This document has been modified from the original. Mutiple classes have yet
 * to be implemented, see TODO list below. The class and some properited have
 * been revised to reflect the METS ontology.
 * 
 * @todo Implement xmlData and extension properties from the original:
 * $extension, $extensionNamespace, $extensionPrefix, and
 * $extensionNamespaceLocation. Map and implement XFDU sequencing to METS.
 * 
 * Modifications by Jon Wheeler
 * 
 */

class METSSetup {
    
    /*
     * @var float
     */

    public $xmlVersion = '1.0';

    /*
     * @var string
     */
    public $xmlEncoding = 'UTF-8';

    /*
     * The version of METS being used
     * @var float
     */
    public $version = '1.9.1';

    /**
     * The absolute path the repository the data will reside in.
     * @var string 
     */
    public $repository;

    /**
     *
     * the path to the top most directory in the data set to be worked on, relative to
     * the repository root. 
     * @var string
     */
    public $root;

    /*
     * ID for the METS meta-metadata. Not currently implemented.
     * 
     * @var string
     */
    public $metsHdrID = 'metsHdr';

    /**
     * Descriptive metadata to be included with every file in the data
     * set. The data, should be high level and applicable to all files and 
     * directories. Not currently implemented.
     * @var mixed  
     */
    public $descriptiveMetadata;
  
}
?>
