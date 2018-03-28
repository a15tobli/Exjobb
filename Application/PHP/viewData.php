<?php
class Retrieve{
    function getImage($testID){
        //require "MySQLcon.php";
        require "PostgreSQLcon.php";

        $outputArray = array();

        //Select correct images based in testID
        $fetchQuery = $PDO->prepare('SELECT image FROM ImageEntry, SplitTest WHERE ImageEntry.testID = SplitTest.testID AND ImageEntry.testID = '.$testID);
        $fetchQuery->execute();

        //Fetches results from database
        while($row = $fetchQuery->fetch()){
            $img = $row['image'];
            $image = imagecreatefromstring($img);

            //Get content of image blob and encode it to png
            ob_start();
            imagepng($image);
            $data = ob_get_contents();
            ob_end_clean();
            $newData = base64_encode($data);
            
            array_push($outputArray, $newData);
        }
        echo json_encode($outputArray);
    }

    //Returns ID of inserted test
    function getTestID($testName){
        require "MySQLcon.php";
        $fetchQuery = $PDO->prepare("SELECT testID FROM SplitTest WHERE testName='$testName'");
        $fetchQuery->execute();
        $row = $fetchQuery->fetch();
        $ID = $row['testID'];
        return $ID;
    }

}
?>