<?php
class Insert{

    //Create a new test
    function insertTest($testName, $activeDB){
        if($activeDB == 'mySQL'){
            require "MySQLcon.php";
        }else if($activeDB == 'pgSQL'){
            require "PostgreSQLcon.php";
        }

        $sql = "INSERT INTO SplitTest(testName) VALUES ('$testName')";
        $insertQuery = $PDO->prepare($sql);

        //If test name already exist in database
        if(!$insertQuery->execute()){
            return false;
        }
        return true;
    }

    //Read image and return correct data to store into DB
    function convertImage($tmpimage, $activeDB){

        $fp = fopen($tmpimage, 'r');
        $data = fread($fp, filesize($tmpimage));

        //Different file handling for db's
        if($activeDB == 'mySQL'){
            $file = addslashes($data);
        }else if ($activeDB == 'pgSQL'){
            $file  = pg_escape_bytea($data);
        }

        fclose($fp);

        return $file;
    }

    //Query for inserting images into database
    function insertImage($tmpimg, $tmpcaption, $tmpID, $activeDB){
        if($activeDB == 'mySQL'){
            require "MySQLcon.php";
        }else if($activeDB == 'pgSQL'){
            require "PostgreSQLcon.php";
        }

        $query = "INSERT INTO ImageEntry(image, caption, testID) VALUES ('$tmpimg', '$tmpcaption', '$tmpID')";
        $insertQuery = $PDO->prepare($query);

        if(!$insertQuery->execute()){
            echo ("Error while inserting images!");
        }
    }

    //Adds images and captions linked to a split-test to the database
    function submitForm($testID, $img1, $caption1, $img2, $caption2, $activeDB){
        self::insertImage($img1, $caption1, $testID, $activeDB);
        self::insertImage($img2, $caption2, $testID, $activeDB);
    }
}
?>