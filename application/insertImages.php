<?php
$dbhost = "localhost";
$dbname = "MySQL_DB";
$dbuser = "root";
$dbpass = "qwe123";
$PDO = new PDO('mysql:host=$dbhost; dbname=$dbname', '$dbuser', '$dbpass');

if(isset($_POST['submit'])){
    $image = $_POST['image1'];
    $caption =$_POST['caption1'];
}

$insertQuery = $PDO->prepare('INSERT INTO ImageEntry(image, caption) VALUES (:image, :caption)';
$insertQuery->bind_param(:image, $image);
$insertQuery->bind_param(:caption, $caption);
                             
$insertQuery->execute();

print("Images were inserted");

?>