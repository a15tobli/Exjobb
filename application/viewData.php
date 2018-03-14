<?php
$dbhost = "localhost";
$dbname = "MySQL_DB";
$dbuser = "root";
$dbpass = "qwe123";
$PDO = new PDO('mysql:host=$dbhost; dbname=$dbname', '$dbuser', '$dbpass');

$query = $PDO->prepare('SELECT * FROM Test');

if($query->execute()){
    foreach ($query->fetchAll() as $row){
        print "ID: ";
        print $row['ID'];
        print "<br/>Caption: ";
        print $row['caption'];
        echo "<br/>";
    }
}
else{
    print "Could not execute";
}

?>