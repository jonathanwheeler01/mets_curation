<?php
require_once 'curation_tool.inc';

// Set collection level metadata (Dublin Core) for the data set
$repoHome = $_POST['repository'] . '/' . $_POST['root'];
$repoMetaHome = $repoHome . '/' . 'meta';

//Create a new Dublin Core object for collection level metadata
$myDC = new DublinCore();
$myDC->set_creator($_POST['creator']);
$myDC->set_contributor($_POST['contributor']);
$myDC->set_title($_POST['title']);
$myDC->set_subject($_POST['subject']);
$myDC->set_description($_POST['description']);
$myDC->set_abstract($_POST['abstract']);
//$myDC->set_date($_POST['date']);
$myDC->set_rights($_POST['rights']);
$myDC->set_publisher('University of New Mexico');


// Create a new METS object and point to data set
$METSsettings = new METSSetup();
$METSsettings->root = $_POST['root'];
$METSsettings->repository = $_POST['repository'];

// Traverse data set directories and
// write METS metadata to file
// Include option for single or multiple METS XML output
// @todo Move 'single' functions to one DirectoryProcessor class

if ($_POST['multiXML'] == 'yes') {
    $processDir = new DirectoryProcessor($METSsettings);
}
else {
    $processDir = new SingleProcessor($METSsettings);
}

$processDir->process_dataset();

// If all else succeeds,
// write DC metadata to file
$myDC->get_as_DOM($repoMetaHome);

?>
