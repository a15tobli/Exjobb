<?php
require "insertData.php";
require "viewData.php";

//Form data retrieved from Ajax
$testName = $_POST['testName'];
$img1blob = $_FILES['image1']['tmp_name'];
$img2blob = $_FILES['image2']['tmp_name'];
$caption1 = $_POST['caption1'];
$caption2 = $_POST['caption2'];
//Connection type
$activeDB = $_POST['DBcon'];

//Boolean for checking valid database submit
$insertSuccess = false;

//Handle form data from test inserts
if(isset($testName) && ($testName !== "")){

    //Check if both images are set
    if (isset($img1blob) && ($img1blob !== "") && isset($img2blob) && ($img2blob !== "")){

        //Check if testname is unique
        if(Insert::insertTest($testName, $activeDB)){
            $testID = Retrieve::getTestID($testName, $activeDB);

            //Convert images to correct format
            $img1 = Insert::convertImage($img1blob, $activeDB);
            $img2 = Insert::convertImage($img2blob, $activeDB);

            //Submit data
            Insert::submitForm($testID, $img1, $caption1, $img2, $caption2, $activeDB);
            $returnString = "Test was added! \n Name: ".$testName."\n ID: ".$testID;

            $insertSuccess = true;
        }
        else{
            $returnString = "A test with that name already exists!";
        }

    }
    else{
        $returnString = "Both images must be attached!";
    }

}
else{
    $returnString =  "No test name is selected!";
}

//Return data to Ajax
$returnList = array(
    "output" => $returnString,
    "success" => $insertSuccess
);
echo json_encode($returnList);

?>