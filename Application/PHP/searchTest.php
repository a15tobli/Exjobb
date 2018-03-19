<?php
include_once "viewData.php";

//Get testID by searched name on page
$testID = Retrieve::getTestID($_POST['value']);
//Return data based on testID
return Retrieve::getImage($testID);
?>