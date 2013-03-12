<?php
/**
 * 
 * A class to generate Dublin Core descriptive metadata, either
 * as a standalone XML file or to be incorporated into packacges
 * created using Rob Olendorf's 'data_curation' application
 * (@link https://github.com/olendorf/data_curation) and based
 * on his API. Dublin Core ontology currently restricted to simple DC.
 * 
 * @author Jon Wheeler
 * 
 * @todo Extend to qualified Dublin Core and include controlled
 * 'type' vocabulary.
 */

class DublinCore {
    /*
     * @var string
     */
    protected $contributor;
    
    /*
     * @var string
     */
    protected $coverage;
    
    /*
     * @var string
     */
    protected $creator;
    
    /*
     * @var string
     */
    protected $date;
    
    /*
     * @var string
     */
    protected $description;
    
    /*
     * @var string
     */
    protected $abstract;

    /*
     * @var string
     */
    protected $format;
    
    /*
     * @var string
     */
    protected $identifier;
    
    /*
     * @var string
     */
    protected $language;
    
    /*
     * @var string
     */
    protected $publisher;
    
    /*
     * @var string
     */
    protected $relation;
    
    /*
     * @var string
     */
    protected $rights;
    
    /*
     * @var string
     */
    protected $source;
    
    /*
     * @var string
     */
    protected $subject;
    
    /*
     * @var string
     */
    protected $title;
    
    /*
     * @var string
     */
    protected $type;
    
    
    /*
     * @param string $contributor
     */
    public function set_contributor($contributor){
        $this->contributor = $contributor;
    }
    
    /*
     * @return string
     */
    public function get_contributor(){
        return $this->contributor;
    }
    
    /*
     * @return boolean
     */
    public function isset_contributor(){
        return (isset($this->contributor) && !empty($this->contributor));
    }
    
    
    /*
     * @param string $coverage
     */
    public function set_coverage($coverage){
        $this->coverage = $coverage;
    }
    
    /*
     * @return string
     */
    public function get_coverage(){
        return $this->coverage;
    }
    
    /*
     * @return boolean
     */
    public function isset_coverage(){
        return (isset($this->coverage) && !empty($this->coverage));
    }
    
    
    /*
     * @param string $creator
     */
    public function set_creator($creator){
        $this->creator = $creator;
    }
    
    /*
     * @return string
     */
    public function get_creator(){
        return $this->creator;
    }
    
    /*
     * @return boolean
     */
    public function isset_creator(){
        return (isset($this->creator) && !empty($this->creator));
    }
    
    
    /*
     * @param string $date
     */
    public function set_date($date){
        $this->date = $date;
    }
    
    /*
     * @return string
     */
    public function get_date(){
        return $this->date;
    }
    
    /*
     * @return boolean
     */
    public function isset_date(){
        return (isset($this->date) && !empty($this->date));
    }
    
    
    /*
     * @param string $description
     */
    public function set_description($description){
        $this->description = $description;
    }
    
    /*
     * @return string
     */
    public function get_description(){
        return $this->description;
    }
    
    /*
     * @return boolean
     */
    public function isset_description(){
        return (isset($this->description) && !empty($this->description));
    }
    
    /*
     * @param string $description
     */
    public function set_abstract($abstract){
        $this->abstract = $abstract;
    }
    
    /*
     * @return string
     */
    public function get_abstract(){
        return $this->abstract;
    }
    
    /*
     * @return boolean
     */
    public function isset_abstract(){
        return (isset($this->abstract) && !empty($this->abstract));
    }
    
    
    /*
     * @param string $format
     */
    public function set_format($format){
        $this->format = $format;
    }
    
    /*
     * @return string
     */
    public function get_format(){
        return $this->format;
    }
    
    /*
     * @return boolean
     */
    public function isset_format(){
        return (isset($this->format) && !empty($this->format));
    }
    
    
    /*
     * @param string $identifier
     */
    public function set_identifier($identifier){
        $this->identifier = $identifier;
    }
    
    /*
     * @return string
     */
    public function get_identifier(){
        return $this->identifier;
    }
    
    /*
     * @return boolean
     */
    public function isset_identifier(){
        return (isset($this->identifier) && !empty($this->identifier));
    }
    
    
    /*
     * @param string $language
     */
    public function set_language($language){
        $this->language = $language;
    }
    
    /*
     * @return string
     */
    public function get_language(){
        return $this->language;
    }
    
    /*
     * @return boolean
     */
    public function isset_language(){
        return (isset($this->language) && !empty($this->language));
    }
    
    
    /*
     * @param string $publisher
     */
    public function set_publisher($publisher){
        $this->publisher = $publisher;
    }
    
    /*
     * @return string
     */
    public function get_publisher(){
        return $this->publisher;
    }
    
    /*
     * @return boolean
     */
    public function isset_publisher(){
        return (isset($this->publisher) && !empty($this->publisher));
    }
    
    
    /*
     * @param string $relation
     */
    public function set_relation($relation){
        $this->relation = $relation;
    }
    
    /*
     * @return string
     */
    public function get_relation(){
        return $this->relation;
    }
    
    /*
     * @return boolean
     */
    public function isset_relation(){
        return (isset($this->relation) && !empty($this->relation));
    }
    
    
    /*
     * @param string $rights
     */
    public function set_rights($rights){
        $this->rights = $rights;
    }
    
    /*
     * @return string
     */
    public function get_rights(){
        return $this->rights;
    }
    
    /*
     * @return boolean
     */
    public function isset_rights(){
        return (isset($this->rights) && !empty($this->rights));
    }
    
    
    /*
     * @param string $source
     */
    public function set_source($source){
        $this->source = $source;
    }
    
    /*
     * @return string
     */
    public function get_source(){
        return $this->source;
    }
    
    /*
     * @return boolean
     */
    public function isset_source(){
        return (isset($this->source) && !empty($this->source));
    }
    
    
    /*
     * @param string $subject
     */
    public function set_subject($subject){
        $this->subject = $subject;
    }
    
    /*
     * @return string
     */
    public function get_subject(){
        return $this->subject;
    }
    
    /*
     * @return boolean
     */
    public function isset_subject(){
        return (isset($this->subject) && !empty($this->subject));
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
    
    public function get_as_DOM($repoHome){
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $dc = $dom->createElement('dc:dc');
        $dom->appendChild($dc);
        $dc->setAttribute('xmlns:dc', 'http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd');
        if($this->isset_contributor()){
            $dc->appendChild($dcContributor = $dom->createElement('dc:contributor'));
            $dcContributor->appendChild($dom->createTextNode($this->contributor));
        }
        if($this->isset_coverage()){
            $dc->appendChild($dcCoverage = $dom->createElement('dc:coverage'));
            $dcCoverage->appendChild($dom->createTextNode($this->coverage));
        }
        if($this->isset_creator()){
            $dc->appendChild($dcCreator = $dom->createElement('dc:creator'));
            $dcCreator->appendChild($dom->createTextNode($this->creator));
        }
        if($this->isset_date()){
            $dc->appendChild($dcDate = $dom->createElement('dc:date'));
            $dcDate->appendChild($dom->createTextNode($this->date));
        }
        if($this->isset_description()){
            $dc->appendChild($dcDescription = $dom->createElement('dc:description'));
            $dcDescription->appendChild($dom->createTextNode($this->description));
        }
        if($this->isset_abstract()){
            $dc->appendChild($dcAbstract = $dom->createElement('dc:abstract'));
            $dcAbstract->appendChild($dom->createTextNode($this->abstract));
        }
        if($this->isset_format()){
            $dc->appendChild($dcFormat = $dom->createElement('dc:format'));
            $dcFormat->appendChild($dom->createTextNode($this->format));
        }
        if($this->isset_identifier()){
            $dc->appendChild($dcIdentifier = $dom->createElement('dc:identifier'));
            $dcIdentifier->appendChild($dom->createTextNode($this->identifier));
        }
        if($this->isset_language()){
            $dc->appendChild($dcLanguage = $dom->createElement('dc:language'));
            $dcLanguage->appendChild($dom->createTextNode($this->language));
        }
        if($this->isset_publisher()){
            $dc->appendChild($dcPublisher = $dom->createElement('dc:publisher'));
            $dcPublisher->appendChild($dom->createTextNode($this->publisher));
        }
        if($this->isset_relation()){
            $dc->appendChild($dcRelation = $dom->createElement('dc:relation'));
            $dcRelation->appendChild($dom->createTextNode($this->relation));
        }
        if($this->isset_rights()){
            $dc->appendChild($dcRights = $dom->createElement('dc:rights'));
            $dcRights->appendChild($dom->createTextNode($this->rights));
        }
        if($this->isset_source()){
            $dc->appendChild($dcSource = $dom->createElement('dc:source'));
            $dcSource->appendChild($dom->createTextNode($this->source));
        }
        if($this->isset_subject()){
            $dc->appendChild($dcSubject = $dom->createElement('dc:subject'));
            $dcSubject->appendChild($dom->createTextNode($this->subject));
        }
        if($this->isset_title()){
            $dc->appendChild($dcTitle = $dom->createElement('dc:title'));
            $dcTitle->appendChild($dom->createTextNode($this->title));
        }
        if($this->isset_type()){
            $dc->appendChild($dcType = $dom->createElement('dc:type'));
            $dcType->appendChild($dom->createTextNode($this->type));
        }
        
        $dom->save($repoHome. '/'.'dc.xml');
        
    }
    
}
?>
