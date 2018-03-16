<?php

//Read image and return correct data to store into DB
function readImage($tmpimage){
    $fp = fopen($tmpimage, 'r');
    $data = fread($fp, filesize($tmpimage));
    $data = addslashes($data);
    fclose($fp);

    return $data;
}
//Insert image into database
function insertImage($tmpimg, $tmpcaption){
    include "MySQLcon.php";

    $sql = "INSERT INTO ImageEntry(image, caption) VALUES ('$tmpimg', '$tmpcaption')";
    $insertQuery = $PDO->prepare($sql);

    if($insertQuery->execute()){
        print("Image was inserted! <br/>");
    }
    else{
        print("Error while inserting data! <br/>");
    }
}

function submitForm(){
    if(isset($_POST['submit'])){
        if(isset($_FILES['image1']) && isset($_FILES['image2'])){

            //First image
            $imgData = readImage($_FILES['image1']['tmp_name']);
            $caption = $_POST['caption1'];
            insertImage($imgData, $caption);

            //Second image
            $imgData = readImage($_FILES['image2']['tmp_name']);
            $caption = $_POST['caption2'];
            insertImage($imgData, $caption);
        }
        else{
            print("Both images must be selected!");
        }
    }
    //Add functionality for SplitTest table
    //$testName = $_POST['testName'];
    //$sql = "INSERT INTO SplitTest(TestName, imgID1, imgID2)"
}

submitForm();

?>