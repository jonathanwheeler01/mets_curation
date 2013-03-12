<?php
/**
 * The file location element <FLocat> provides a pointer to the location of 
 * a content file. It uses the XLink reference syntax to provide linking 
 * information indicating the actual location of the content file, along 
 * with other attributes specifying additional linking information. 
 * NOTE: <FLocat> is an empty element. The location of the resource pointed 
 * to MUST be stored in the xlink:href attribute.
 * 
 * Based on an API by Rob Olendorf (@link https://github.com/olendorf/data_curation).
 * 
 * @author Jon Wheeler
 * 
 */
class FLocat extends aMETSElement{
	/*
	 * @var string
	*/
	protected $actuate;
	
	/*
	 * @var string
	*/
	protected $arcrole;
	
	
	/*
	 * @var string
	*/
	protected $href;
	
	/*
	 * @var string
	*/
	protected $ID;
	
	/*
	 * @var string
	*/
	protected $LOCTYPE;
	
	/*
	 * @var string
	*/
	protected $OTHERLOCTYPE;
	
	/*
	 * @var string
	*/
	protected $role;
	
	/*
	 * @var string
	*/
	protected $show;
	
	/*
	 * @var string
	*/
	protected $title;
	
	/*
	 * @var string
	*/
	protected $type;
	
	/*
	 * @var string
	*/
	protected $USE;
	
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
	 * @param string $actuate
	*/
	public function set_actuate($actuate){
		$this->actuate = $actuate;
	}
	
	/*
	 * @return string
	*/
	public function get_actuate(){
		return $this->actuate;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_actuate(){
		return (isset($this->actuate) && !empty($this->actuate));
	}
	
	/*
	 * @param string $arcrole
	*/
	public function set_arcrole($arcrole){
		$this->arcrole = $arcrole;
	}
	
	/*
	 * @return string
	*/
	public function get_arcrole(){
		return $this->arcrole;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_arcrole(){
		return (isset($this->arcrole) && !empty($this->arcrole));
	}
	
	
	/*
	 * @param string $href
	*/
	public function set_href($href){
		$this->href = $href;
	}
	
	/*
	 * @return string
	*/
	public function get_href(){
		return $this->href;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_href(){
		return (isset($this->href) && !empty($this->href));
	}
	
	/*
	 * @param string $LOCTYPE
	*/
	public function set_LOCTYPE($LOCTYPE){
		$this->LOCTYPE = $LOCTYPE;
	}
	
	/*
	 * @return string
	*/
	public function get_LOCTYPE(){
		return $this->LOCTYPE;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_LOCTYPE(){
		return (isset($this->LOCTYPE) && !empty($this->LOCTYPE));
	}
	
	/*
	 * @param string $OTHERLOCTYPE
	*/
	public function set_OTHERLOCTYPE($OTHERLOCTYPE){
		$this->OTHERLOCTYPE = $OTHERLOCTYPE;
	}
	
	/*
	 * @return string
	*/
	public function get_OTHERLOCTYPE(){
		return $this->OTHERLOCTYPE;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_OTHERLOCTYPE(){
		return (isset($this->OTHERLOCTYPE) && !empty($this->OTHERLOCTYPE));
	}
	
	/*
	 * @param string $role
	*/
	public function set_role($role){
		$this->role = $role;
	}
	
	/*
	 * @return string
	*/
	public function get_role(){
		return $this->role;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_role(){
		return (isset($this->role) && !empty($this->role));
	}
	
	/*
	 * @param string $show
	*/
	public function set_show($show){
		$this->show = $show;
	}
	
	/*
	 * @return string
	*/
	public function get_show(){
		return $this->show;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_show(){
		return (isset($this->show) && !empty($this->show));
	}
	
	/*
	 * @param string $title
	*/
	public function set_title($title){
		$this->title = $title;
	}
	
	/*
	 * @return string
	*/
	public function get_title(){
		return $this->title;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_title(){
		return (isset($this->title) && !empty($this->title));
	}
	
	/*
	 * @param string $type
	*/
	public function set_type($type){
		$this->type = $type;
	}
	
	/*
	 * @return string
	*/
	public function get_type(){
		return $this->type;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_type(){
		return (isset($this->type) && !empty($this->type));
	}
	
	/*
	 * @param string $USE
	*/
	public function set_USE($USE){
		$this->USE = $USE;
	}
	
	/*
	 * @return string
	*/
	public function get_USE(){
		return $this->USE;
	}
	
	/*
	 * @return boolean
	*/
	public function isset_USE(){
		return (isset($this->USE) && !empty($this->USE));
	}
	
	/*
	 * @param string $prefix
	* @return DOMElement
	*/
	
	public function get_as_DOM($prefix = NULL){
		$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
	
		// conditionally add the prefix to the element name and
		// namespace attribute
		if($prefix !== NULL){
			$flocat = $dom->createElement($prefix.':'.get_class($this));
			//$flocat->setAttribute('xmlns:'.$prefix, 'http://www.loc.gov/METS/');
		}
		else {
			$flocat = $dom->createElement('mets'.':'.get_class($this));
		}
		
		// handle attributes
		if($this->isset_ID()) {
			$flocat->setAttribute('ID', $this->ID);
		}
		
		if($this->isset_actuate()) {
			$flocat->setAttribute('xlink:actuate', $this->actuate);
		}
		
		if($this->isset_arcrole()) {
			$flocat->setAttribute('xlink:arcrole', $this->arcrole);
		}
		
		
		if($this->isset_href()) {
			$flocat->setAttribute('xlink:href', $this->href);
		}
		
		if($this->isset_LOCTYPE()) {
			$flocat->setAttribute('LOCTYPE', $this->LOCTYPE);
		}
		
		if($this->isset_OTHERLOCTYPE()) {
			$flocat->setAttribute('OTHERLOCTYPE', $this->OTHERLOCTYPE);
		}
		
		if($this->isset_role()) {
			$flocat->setAttribute('xlink:role', $this->role);
		}
		
		if($this->isset_show()) {
			$flocat->setAttribute('xlink:show', $this->show);
		}
		
		if($this->isset_title()) {
			$flocat->setAttribute('xlink:title', $this->title);
		}
		
		
		if($this->isset_type()) {
			$flocat->setAttribute('type', $this->type);
		}
		
		if($this->isset_USE()) {
			$flocat->setAttribute('USE', $this->USE);
		}
	
		return $flocat;
	
	}
}

?>
