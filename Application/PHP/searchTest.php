<?php
include_once "viewData.php";
$activeDB = $_POST['activeConnection'];

//Get testID by searched name on page
$testID = Retrieve::getTestID($_POST['value'], $activeDB);

//Return data based on testID
Retrieve::getImage($testID, $activeDB); 

?>