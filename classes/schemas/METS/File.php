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
 * The file element provides access to content files for a METS object.  
 * A file element may contain one or more FLocat elements, which provide 
 * pointers to a content file, and/or an FContent element, which wraps an 
 * encoded version of the file. Note that ALL FLocat and FContent elements 
 * underneath a single file element should identify/contain identical copies 
 * of a single file.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */

class File extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
     /*
     * @var string
     */

    protected $ADMID;

    /*
     * @var string
     */
    protected $BEGIN;

    /*
     * @var string
     */
    protected $BETYPE;

    /*
     * @var string
     */
    protected $CHECKSUM;

    /*
     * @var string
     */
    protected $CHECKSUMTYPE;

    /*
     * @var string
     */
    protected $CREATED;

    /*
     * @var string
     */
    protected $DMDID;

    /*
     * @var string
     */
    protected $END;

    /*
     * @var string
     */
    protected $GROUPID;

    /*
     * @var string
     */
    protected $MIMETYPE;

    /*
     * @var string
     */
    protected $OWNERID;

    /*
     * @var string
     */
    protected $SEQ;

    /*
     * @var string
     */
    protected $SIZE;

    /*
     * @var string
     */
    protected $USE;

    /*
     * @var FLocat
     */
    protected $FLocat;

    /*
     * @var FContent
     */
    protected $FContent;

    /*
     * @var Stream
     */
    protected $stream;

    /*
     * @var TransformFile
     */
    protected $transformFile;

    public function __construct() {
        $this->files = array();
    }

    /*
     * @param File $files
     */

    public function addfile(File $file) {
        $this->files[] = $file;
    }

    /**
     *
     * @return array<file>
     */
    public function get_files() {
        return $this->files;
    }

    /**
     *
     */
    public function unset_files() {
        $this->files = array();
    }

    /**
     *
     * @return boolean
     */
    public function isset_file() {
        return (isset($this->files) && !empty($this->files));
    }

    /*
     * @param string $ID
     */

    public function set_ID($ID) {
        if ($this->validate_id($ID)) {
            $this->ID = $ID;
        } else {
            throw new InvalidIDTokenException($ID);
        }
    }

    /*
     * @return string
     */

    public function get_ID() {
        return $this->ID;
    }

    /*
     * @return boolean
     */

    public function isset_ID() {
        return (isset($this->ID) && !empty($this->ID));
    }

    /*
     * @param string $ADMID
     */

    public function set_ADMID($ADMID) {
        if ($this->validate_id($ADMID)) {
            $this->ADMID = $ADMID;
        } else {
            throw new InvalidIDTokenException($ADMID);
        }
    }

    /*
     * @return string
     */

    public function get_ADMID() {
        return $this->ADMID;
    }

    /*
     * @return boolean
     */

    public function isset_ADMID() {
        return (isset($this->ADMID) && !empty($this->ADMID));
    }

    /*
     * @param string $BEGIN
     */

    public function set_BEGIN($BEGIN) {
        $this->BEGIN = $BEGIN;
    }

    /*
     * @return string
     */

    public function get_BEGIN() {
        return $this->BEGIN;
    }

    /*
     * @return boolean
     */

    public function isset_BEGIN() {
        return (isset($this->BEGIN) && !empty($this->BEGIN));
    }

    /*
     * @param string $BETYPE
     */

    public function set_BETYPE($BETYPE) {
        $this->BETYPE = $BETYPE;
    }

    /*
     * @return string
     */

    public function get_BETYPE() {
        return $this->BETYPE;
    }

    /*
     * @return boolean
     */

    public function isset_BETYPE() {
        return (isset($this->BETYPE) && !empty($this->BETYPE));
    }

    /*
     * @param string $CHECKSUM
     */

    public function set_CHECKSUM($CHECKSUM) {
        $this->CHECKSUM = $CHECKSUM;
    }

    /*
     * @return string
     */

    public function get_CHECKSUM() {
        return $this->CHECKSUM;
    }

    /*
     * @return boolean
     */

    public function isset_CHECKSUM() {
        return (isset($this->CHECKSUM) && !empty($this->CHECKSUM));
    }

    /*
     * @param string $CHECKSUMTYPE
     */

    public function set_CHECKSUMTYPE($CHECKSUMTYPE) {
        $this->CHECKSUMTYPE = $CHECKSUMTYPE;
    }

    /*
     * @return string
     */

    public function get_CHECKSUMTYPE() {
        return $this->CHECKSUMTYPE;
    }

    /*
     * @return boolean
     */

    public function isset_CHECKSUMTYPE() {
        return (isset($this->CHECKSUMTYPE) && !empty($this->CHECKSUMTYPE));
    }

    /*
     * @param string $CREATED
     */

    public function set_CREATED($CREATED) {
        $this->CREATED = $CREATED;
    }

    /*
     * @return string
     */

    public function get_CREATED() {
        return $this->CREATED;
    }

    /*
     * @return boolean
     */

    public function isset_CREATED() {
        return (isset($this->CREATED) && !empty($this->CREATED));
    }

    /*
     * @param string $DMDID
     */

    public function set_DMDID($DMDID) {
        $this->DMDID = $DMDID;
    }

    /*
     * @return string
     */

    public function get_DMDID() {
        return $this->DMDID;
    }

    /*
     * @return boolean
     */

    public function isset_DMDID() {
        return (isset($this->DMDID) && !empty($this->DMDID));
    }

    /*
     * @param string $END
     */

    public function set_END($END) {
        $this->END = $END;
    }

    /*
     * @return string
     */

    public function get_END() {
        return $this->END;
    }

    /*
     * @return boolean
     */

    public function isset_END() {
        return (isset($this->END) && !empty($this->END));
    }

    /*
     * @param string $GROUPID
     */

    public function set_GROUPID($GROUPID) {
        $this->GROUPID = $GROUPID;
    }

    /*
     * @return string
     */

    public function get_GROUPID() {
        return $this->GROUPID;
    }

    /*
     * @return boolean
     */

    public function isset_GROUPID() {
        return (isset($this->GROUPID) && !empty($this->GROUPID));
    }

    /*
     * @param string $MIMETYPE
     */

    public function set_MIMETYPE($MIMETYPE) {
        $this->MIMETYPE = $MIMETYPE;
    }

    /*
     * @return string
     */

    public function get_MIMETYPE() {
        return $this->MIMETYPE;
    }

    /*
     * @return boolean
     */

    public function isset_MIMETYPE() {
        return (isset($this->MIMETYPE) && !empty($this->MIMETYPE));
    }

    /*
     * @param string $OWNERID
     */

    public function set_OWNERID($OWNERID) {
        $this->OWNERID = $OWNERID;
    }

    /*
     * @return string
     */

    public function get_OWNERID() {
        return $this->OWNERID;
    }

    /*
     * @return boolean
     */

    public function isset_OWNERID() {
        return (isset($this->OWNERID) && !empty($this->OWNERID));
    }

    /*
     * @param string $SEQ
     */

    public function set_SEQ($SEQ) {
        $this->SEQ = $SEQ;
    }

    /*
     * @return string
     */

    public function get_SEQ() {
        return $this->SEQ;
    }

    /*
     * @return boolean
     */

    public function isset_SEQ() {
        return (isset($this->SEQ) && !empty($this->SEQ));
    }

    /*
     * @param string $SIZE
     */

    public function set_SIZE($SIZE) {
        $this->SIZE = $SIZE;
    }

    /*
     * @return string
     */

    public function get_SIZE() {
        return $this->SIZE;
    }

    /*
     * @return boolean
     */

    public function isset_SIZE() {
        return (isset($this->SIZE) && !empty($this->SIZE));
    }

    /*
     * @param string $USE
     */

    public function set_USE($USE) {
        $this->USE = $USE;
    }

    /*
     * @return string
     */

    public function get_USE() {
        return $this->USE;
    }

    /*
     * @return boolean
     */

    public function isset_USE() {
        return (isset($this->USE) && !empty($this->USE));
    }

    /*
     * @param FLocat $FLocat
     */

    public function set_FLocat(FLocat $FLocat) {
        $this->FLocat = $FLocat;
    }

    /*
     * @return FLocat
     */

    public function get_FLocat() {
        return $this->FLocat;
    }

    /*
     * @return boolean
     */

    public function isset_FLocat() {
        return (isset($this->FLocat) && !empty($this->FLocat));
    }

    /*
     * @param FContent $FContent
     */

    public function set_FContent(FContent $FContent) {
        $this->FContent = $FContent;
    }

    /*
     * @return FContent
     */

    public function get_FContent() {
        return $this->FContent;
    }

    /*
     * @return boolean
     */

    public function isset_FContent() {
        return (isset($this->FContent) && !empty($this->FContent));
    }

    /*
     * @param Stream $stream
     */

    public function set_stream(Stream $stream) {
        $this->stream = $stream;
    }

    /*
     * @return stream
     */

    public function get_stream() {
        return $this->stream;
    }

    /*
     * @return boolean
     */

    public function isset_stream() {
        return (isset($this->stream) && !empty($this->stream));
    }

    /*
     * @param TransformFile $transformFile
     */

    public function set_transformFile(TransformFile $transformFile) {
        $this->transformFile = $transformFile;
    }

    /*
     * @return transformFile
     */

    public function get_transformFile() {
        return $this->transformFile;
    }

    /*
     * @return boolean
     */

    public function isset_transformFile() {
        return (isset($this->transformFile) && !empty($this->transformFile));
    }

    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);

        if ($prefix !== NULL) {
            $file = $dom->createElement($prefix . ':' . $this->first_to_lower(get_class($this)));
            //$file = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':file');
        } else {
            $file = $dom->createElement('mets:' . $this->first_to_lower(get_class($this)));
            //$file = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:file');
        }

        // handle attributes
        if ($this->isset_ID()) {
            $file->setAttribute('ID', $this->ID);
        }

        if ($this->isset_BEGIN()) {
            $file->setAttribute('BEGIN', $this->BEGIN);
        }

        if ($this->isset_BETYPE()) {
            $file->setAttribute('BETYPE', $this->BETYPE);
        }

        if ($this->isset_CHECKSUM()) {
            $file->setAttribute('CHECKSUM', $this->CHECKSUM);
        }

        if ($this->isset_CREATED()) {
            $file->setAttribute('CREATED', $this->CREATED);
        }

        if ($this->isset_CHECKSUMTYPE()) {
            $file->setAttribute('CHECKSUMTYPE', $this->CHECKSUMTYPE);
        }

        if ($this->isset_DMDID()) {
            $file->setAttribute('DMDID', $this->DMDID);
        }

        if ($this->isset_END()) {
            $file->setAttribute('END', $this->END);
        }

        if ($this->isset_GROUPID()) {
            $file->setAttribute('GROUPID', $this->GROUPID);
        }

        if ($this->isset_MIMETYPE()) {
            $file->setAttribute('MIMETYPE', $this->MIMETYPE);
        }

        if ($this->isset_OWNERID()) {
            $file->setAttribute('OWNERID', $this->OWNERID);
        }

        if ($this->isset_SEQ()) {
            $file->setAttribute('SEQ', $this->SEQ);
        }

        if ($this->isset_SIZE()) {
            $file->setAttribute('SIZE', $this->SIZE);
        }

        if ($this->isset_ADMID()) {
            $file->setAttribute('ADMID', $this->ADMID);
        }

        if ($this->isset_USE()) {
            $file->setAttribute('USE', $this->USE);
        }


        // handle child nodes
        if ($this->isset_FLocat()) {
            $file->appendChild($dom->importNode($this->FLocat->get_as_DOM(), TRUE));
        }

        if ($this->isset_FContent()) {
            $file->appendChild($dom->importNode($this->FContent->get_as_DOM(), TRUE));
        }

        if ($this->isset_stream()) {
            $file->appendChild($dom->importNode($this->stream->get_as_DOM(), TRUE));
        }

        if ($this->isset_transformFile()) {
            $file->appendChild($dom->importNode($this->transformFile->get_as_DOM(), TRUE));
        }

        $childFile = new File();
        if ($this->isset_file()) {
            foreach ($this->file as $childFile) {
                $file->appendChild($dom->importNode($childFile->get_as_DOM($prefix)));
            }
        }

        return $file;
    }
}
?>
