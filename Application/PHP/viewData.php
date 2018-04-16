<?php
class Retrieve{
    function getImage($testID, $activeDB){
        if($activeDB == 'mySQL'){
            require "MySQLcon.php";
        }else{
            require "PostgreSQLcon.php";
        }

        $outputArray = array();

        //Select correct images based in testID
        $fetchQuery = $PDO->prepare('SELECT image FROM ImageEntry, SplitTest WHERE ImageEntry.testID = SplitTest.testID AND ImageEntry.testID = '.$testID);
        $fetchQuery->execute();

        //Fetches results from database
        while($row = $fetchQuery->fetch()){
            $img = $row['image'];

            //Get content of image blob and encode it to png
            ob_start();

            //Different file management for DB's
            if($activeDB == 'mySQL'){
                $image = imagecreatefromstring($img);
                imagepng($image);
            }else if($activeDB == 'pgSQL'){
                fpassthru($img);
            }

            $data = ob_get_contents();
            ob_end_clean();
            $newData = "data:image/png;base64, " . base64_encode($data);           

            array_push($outputArray, $newData);
        }
        echo json_encode($outputArray);
    }

    //Returns ID of inserted test
    function getTestID($testName, $activeDB){
        if($activeDB == 'mySQL'){
            require "MySQLcon.php";
        }else{
            require "PostgreSQLcon.php";
        }

        $fetchQuery = $PDO->prepare("SELECT testID FROM SplitTest WHERE testName='$testName'");
        $fetchQuery->execute();
        $row = $fetchQuery->fetch();

        //Postgres requires small chars
        if($activeDB == 'mySQL'){
            $ID =$row['testID'];
        }else if($activeDB == 'pgSQL'){
            $ID = $row['testid'];            
        }

        return $ID;
    }
}

?>