<?php
$time = $_POST['benchmark'];
$activeDB = $_POST['activeConnection'];

if($activeDB == 'mySQL'){
    $file = "../Benchmark/mySQLresults.txt";
}else{
    $file = "../Benchmark/pgSQLresults.txt";
}
$content = file_get_contents($file);
$content .= $time . "\n";
file_put_contents($file, $content);

echo $time;

?>