<?php
class Insert{


    //Read image and return correct data to store into DB
    function readImage($tmpimage){
        $fp = fopen($tmpimage, 'r');
        $data = fread($fp, filesize($tmpimage));
        $data = addslashes($data);
        fclose($fp);

        return $data;
    }

    //Create a new test
    function insertTest($testName){
        include "MySQLcon.php";
        $sql = "INSERT INTO SplitTest(testName) VALUES ('$testName')";
        $insertQuery = $PDO->prepare($sql);

        if(!$insertQuery->execute()){
            print("Error while adding test!");
        }
    }

    //Insert image into database
    function insertImage($tmpimg, $tmpcaption, $tmpID){
        include "MySQLcon.php";

        $sql = "INSERT INTO ImageEntry(image, caption, testID) VALUES ('$tmpimg', '$tmpcaption', '$tmpID')";
        $insertQuery = $PDO->prepare($sql);

        if(!$insertQuery->execute()){
            print("Error while inserting data! <br/>");
        }
    }

    //Send form data
    function submitForm(){
        if(isset($_POST['submit-test'])){
            
            if(isset($_POST['testName'])){
                include "viewData.php";
                //Create a split-test
                $testName = $_POST['testName'];
                self::insertTest($testName);
                $testID = Retrieve::getTestID($testName);

                //Add images to test
                if(isset($_FILES['image1']) && isset($_FILES['image2'])){
                    //First image
                    $imgData = self::readImage($_FILES['image1']['tmp_name']);
                    $caption = $_POST['caption1'];
                    self::insertImage($imgData, $caption, $testID);

                    //Second image
                    $imgData = self::readImage($_FILES['image2']['tmp_name']);
                    $caption = $_POST['caption2'];
                    self::insertImage($imgData, $caption, $testID);
                }
                else{
                    print("Both images must be selected!");
                }

            }
            else{
                print("No name of test is set");
            }
        }
    }
}
?>