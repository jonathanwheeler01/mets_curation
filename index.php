<?php
require_once 'curation_tool.inc';

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
