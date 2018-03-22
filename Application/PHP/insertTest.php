<?php
require "insertData.php";
require "viewData.php";

//Form data retrieved from AJAX
    $testName = $_POST['testName'];
    $img1blob = $_FILES['image1']['tmp_name'];
    $img2blob = $_FILES['image2']['tmp_name'];
    $caption1 = $_POST['caption1'];
    $caption2 = $_POST['caption2'];

//Handle form data from test inserts
if(isset($testName) && ($testName !== "")){
    //Check if both images are set
    if (isset($img1blob) && ($img1blob !== "") && isset($img2blob) && ($img2blob !== "")){
        
        //Check if testname is unique
        if(Insert::insertTest($testName)){
            $testID = Retrieve::getTestID($testName);

            //Convert images to correct format
            $img1 = Insert::convertImage($img1blob);
            $img2 = Insert::convertImage($img2blob);

            //Submit data
            Insert::submitForm($testID, $img1, $caption1, $img2, $caption2);
            echo "Test was added! \n Name: ".$testName."\n ID: ".$testID;
        }
        else{
            echo "A test with that name already exists!";
        }
        
    }
    else{
        echo "Both images must be attached!";
    }
}
else{
    echo "No test name is selected!";
}

?>