<?php
$dbhost = "localhost";
$dbname = "MySQL_DB";
$dbuser = "root";
$dbpass = "qwe123";
$PDO = new PDO('mysql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);

if(isset($_POST['submit'])){
    if(isset($_FILES['image1'])){
        //Read image
        $image = $_FILES['image1']['tmp_name'];

        $fp = fopen($image, 'r');
        $data = fread($fp, filesize($image));
        $data = addslashes($data);
        fclose($fp);
    
        $caption = $_POST['caption1'];
        $sql = "INSERT INTO ImageEntry(image, caption) VALUES ('$data', '$caption')";
        $insertQuery = $PDO->prepare($sql);
    }
    else{
        print("No image selected!");
    }
}


if($insertQuery->execute()){
    print("Images were inserted");
}
else{
    print("Error while inserting data.");
}

?>