<?php

function getImage(){
    require "MySQLcon.php";

    $query = $PDO->prepare('SELECT image FROM ImageEntry');

    if($query->execute()){
        foreach ($query->fetchAll() as $row){
            $img = $row['image'];    
            
            header('Content-type: image/png');
            echo $img;     
        }
    }
    else{
        echo "Could not retrieve image";
    }
}
getImage();

?>