<?php
require("classes/database.php");
require("score.php");

$db = new DataBase("localhost","root","","memory");
$db_connect = $db->connect();
$date= date("Y-m-d H:i:s");
var_dump($date);

$score= new score(1, '3 paires',  $date , 10, $db_connect);
//$test = $score->insertScore();
$score->fetchScore();

?>