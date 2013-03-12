<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * The METS standard represents a document structurally as a series of nested 
 * div elements, that is, as a hierarchy (e.g., a book, which is composed of 
 * chapters, which are composed of subchapters, which are composed of text).  
 * Every div node in the structural map hierarchy may be connected (via 
 * subsidiary mptr or fptr elements) to content files which represent that 
 * div's portion of the whole document.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class Div extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $ORDER;
    
    /*
     * @var string
     */
    protected $ORDERLABEL;
    
    /*
     * @var string
     */
    protected $LABEL;
    
    /*
     * @var string
     */
    protected $DMDID;
    
    /*
     * @var string
     */
    protected $ADMID;
    
    /*
     * @var string
     */
    protected $TYPE;
    
    /*
     * @var string
     */
    protected $CONTENTIDS;
    
    /*
     * @var string
     */
    protected $xlink_label;
    
    /*
     * @var mptr
     */
    protected $mptr;
    
    /*
     * @var fptr
     */
    protected $fptr;
    
    /*
     * @var array
     */
    protected $divs;
    
    
    public function __construct() {
        $this->divs = array();
    }
    
    
    /*
     * @param string $ID
     */
    public function set_ID($ID){
        if($this->validate_id($ID)){
            $this->ID = $ID;
        }
        else {
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
     * @param string ORDER
     */
    public function set_ORDER($ORDER){
        $this->ORDER = $ORDER;
    }
    
    /*
     * @return ORDER
     */
    public function get_ORDER(){
        return $this->ORDER;
    }
    
    /*
     * @return boolean
     */
    public function isset_ORDER(){
        return (isset($this->ORDER) && !empty($this->ORDER));
    }
    
    /*
     * @param string LABEL
     */
    public function set_LABEL($LABEL){
        $this->LABEL = $LABEL;
    }
    
    /*
     * @return LABEL
     */
    public function get_LABEL(){
        return $this->LABEL;
    }
    
    /*
     * @return boolean
     */
    public function isset_LABEL(){
        return (isset($this->LABEL) && !empty($this->LABEL));
    }
    
    /*
     * @param string ORDERLABEL
     */
    public function set_ORDERLABEL($ORDERLABEL){
        $this->ORDER = $ORDERLABEL;
    }
    
    /*
     * @return ORDERLABEL
     */
    public function get_ORDERLABEL(){
        return $this->ORDERLABEL;
    }
    
    /*
     * @return boolean
     */
    public function isset_ORDERLABEL(){
        return (isset($this->ORDERLABEL) && !empty($this->ORDERLABEL));
    }
    
    /*
     * @param string DMDID
     */
    public function set_DMDID($DMDID){
        $this->DMDID = $DMDID;
    }
    
    /*
     * @return DMDID
     */
    public function get_DMDID(){
        return $this->DMDID;
    }
    
    /*
     * @return boolean
     */
    public function isset_DMDID(){
        return (isset($this->DMDID) && !empty($this->DMDID));
    }
    
    /*
     * @param string ADMID
     */
    public function set_ADMID($ADMID){
        $this->ADMID = $ADMID;
    }
    
    /*
     * @return ADMID
     */
    public function get_ADMID(){
        return $this->ADMID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ADMID(){
        return (isset($this->ADMID) && !empty($this->ADMID));
    }
    
    /*
     * @param string TYPE
     */
    public function set_TYPE($TYPE){
        $this->TYPE = $TYPE;
    }
    
    /*
     * @return TYPE
     */
    public function get_TYPE(){
        return $this->TYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_TYPE(){
        return (isset($this->TYPE) && !empty($this->TYPE));
    }
    
    /*
     * @param string CONTENTIDS
     */
    public function set_CONTENTIDS($CONTENTIDS){
        $this->CONTENTIDS = $CONTENTIDS;
    }
    
    /*
     * @return CONTENTIDS
     */
    public function get_CONTENTIDS(){
        return $this->CONTENTIDS;
    }
    
    /*
     * @return boolean
     */
    public function isset_CONTENTIDS(){
        return (isset($this->CONTENTIDS) && !empty($this->CONTENTIDS));
    }
    
    /*
     * @param Mptr $mptr
     */
    public function set_mptr(Mptr $mptr){
        $this->mptr = $mptr;
    }
    
    /*
     * @return mptr
     */
    public function get_mptr(){
        return $this->mptr;
    }
    
    /*
     * @return boolean
     */
    public function isset_mptr(){
        return (isset($this->mptr) && !empty($this->mptr));
    }
    
    /*
     * @param Fptr $fptr
     */
    public function set_fptr(Fptr $fptr){
        $this->fptr = $fptr;
    }
    
    /*
     * @return mptr
     */
    public function get_fptr(){
        return $this->fptr;
    }
    
    /*
     * @return boolean
     */
    public function isset_fptr(){
        return (isset($this->fptr) && !empty($this->fptr));
    }
    
  /**
   *
   * @param Div $div
   */
  public function add_div(Div $div) {
    $this->divs[] = $div;
  }
  /**
   *
   * @return array<Div>
   */
  public function get_divs() {
    return $this->divs;
  }
  
  public function unset_divs() {
    $this->divs = array();
  }

  /**
   *
   * @return boolean
   */
  public function isset_divs() {
    return (isset($this->divs) && !empty($this->divs));
  }
    
    /*
     * @param string $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $div = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $div = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':div');
        }
        else {
            //$div = $dom->createElement('mets:'.$this->first_to_lower(get_class($this)));
            $div = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:div');
        }
        
        // handle attributes
        if($this->isset_ID()) {$div->setAttribute('ID', $this->ID);}
        if($this->isset_ORDER()) {$div->setAttribute('ORDER', $this->ORDER);}
        if($this->isset_ORDERLABEL()) {$div->setAttribute('ORDERLABEL', $this->ORDERLABEL);}
        if($this->isset_LABEL()) {$div->setAttribute('LABEL', $this->LABEL);}
        if($this->isset_DMDID()) {$div->setAttribute('DMDID', $this->DMDID);}
        if($this->isset_ADMID()) {$div->setAttribute('ADMID', $this->ADMID);}
        if($this->isset_TYPE()) {$div->setAttribute('TYPE', $this->TYPE);}
        if($this->isset_CONTENTIDS()) {$div->setAttribute('CONTENTIDS', $this->CONTENTIDS);}
        
        if($this->isset_mptr()){
            $div->appendChild($dom->importNode($this->mptr->get_as_DOM()));
        }
        if($this->isset_fptr()){
            $div->appendChild($dom->importNode($this->fptr->get_as_DOM()));
        }
        
        $childDiv = new Div();
        if ($this->isset_divs()) {
            foreach ($this->divs as $childDiv) {
                $div->appendChild($dom->importNode($childDiv->get_as_DOM($prefix)));
            }
        }
        
        return $div;
    }
}
?>
