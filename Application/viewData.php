<?php
class Retrieve{
    function getImage($testID){
        require "MySQLcon.php";
        $fetchQuery = $PDO->prepare('SELECT image FROM ImageEntry, SplitTest WHERE ImageEntry.testID = SplitTest.testID');
        $fetchQuery->execute();
        $row = $fetchQuery->fetch();
        $img = $row['image'];
        header('Content-type: image/png');
        echo $img;     

    }

    //Returns ID of inserted test
    function getTestID($testName){
        include "MySQLcon.php";
        $fetchQuery = $PDO->prepare("SELECT testID FROM SplitTest WHERE testName='$testName'");
        $fetchQuery->execute();
        $row = $fetchQuery->fetch();
        $ID = $row['testID'];
        return $ID;
    }

}
//Testing code
$retrieve = new Retrieve;
$retrieve->getImage(1);
?>