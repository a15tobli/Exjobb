<?php 
$dbhost = "localhost";
$dbname = "psql_database";
$dbuser = "postgres";
$dbpass = "qwe123";
try{
    $PDO = new PDO('pgsql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
    echo "Works";
}
catch(PDOException $connectionError){
    echo "Failed to connect to database: ".$connectionError->getMessage();
}
?>