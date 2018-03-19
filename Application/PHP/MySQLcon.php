<?php 
$dbhost = "localhost";
$dbname = "MySQL_DB";
$dbuser = "root";
$dbpass = "qwe123";
try{
    $PDO = new PDO('mysql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
}
catch(PDOException $connectionError){
    echo "Failed to connect to database: ".$connectionError->getMessage();
}
?>