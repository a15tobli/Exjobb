<?php
require "insertData.php";

$activeDB = $_POST['activeConnection'];
$testID = $_POST['testID'];
$answer = $_POST['answer'];

Insert::insertAnswers($testID, $answer, $activeDB);

?>
