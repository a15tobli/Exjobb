<?php
try{
    $mySQLcon = new PDO('mysql:host=localhost; dbname=MySQL_DB', $user, $pass);
}
catch{
    print "Error connecting to database.";
}
try{
    $select = $mySQLcon->query('SELECT * FROM Test');
    echo $select;
}
catch{
    print "Cannot select.";
}

?>