<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * The sequence of files element <seq> aggregates pointers to files,  
 * parts of files and/or parallel sets of files or parts of files  that must be 
 * played or displayed sequentially to manifest a block of digital content. 
 * This might be the case, for example, if the parent <div> element 
 * represented a logical division, such as a diary entry, that spanned multiple 
 * pages of a diary and, hence, multiple page image files. In this case, a 
 * <seq> element would aggregate multiple, sequentially arranged 
 * <area> elements, each of which pointed to one of the image files that 
 * must be presented sequentially to manifest the entire diary entry. If the 
 * diary entry started in the middle of a page, then the first <area> 
 * element (representing the page on which the diary entry starts) might be 
 * further qualified, via its SHAPE and COORDS attributes, to specify the 
 * specific, pertinent area of the associated image file.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Seq extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var area
     */
    protected $area;
    
    /*
     * @var par
     */
    protected $par;
    
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
     * @param Area $area
     */
    public function set_area(Area $area){
        $this->area = $area;
    }
    
    /*
     * @return area
     */
    public function get_area(){
        return $this->area;
    }
    
    /*
     * @return boolean
     */
    public function isset_area(){
        return (isset($this->area) && !empty($this->area));
    }
    
    /*
     * @param Par $par
     */
    public function set_par(Par $par){
        $this->par = $par;
    }
    
    /*
     * @return par
     */
    public function get_par(){
        return $this->par;
    }
    
    /*
     * @return boolean
     */
    public function isset_par(){
        return (isset($this->par) && !empty($this->par));
    }
    
    /*
     * @return boolean
     */
    public function isset_seq(){
        return (isset($this->seq) && !empty($this->seq));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $seq = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $seq = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':seq');
        }
        else {
            $seq = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$seq->setAttribute('ID', $this->ID);}
        
        if($this->isset_area()){
            $seq->appendChild($dom->importNode($this->area->get_as_DOM()));
        }
        
        if($this->isset_par()){
            $seq->appendChild($dom->importNode($this->par->get_as_DOM()));
        }
        
        return $seq;
    }
}
?>
