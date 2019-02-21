<h1>Hello world</h1>

<?php

$ip = $_SERVER['REMOTE_ADDR']; //get the visitor's IP
$date = date(DATE_RFC822);
$data = "$date $ip\n"; //format a log entry

file_put_contents('./log.txt', $data, FILE_APPEND | LOCK_EX); //write to the log file
if ($_GET["clean"] == "1") {
 unlink("./log.txt") 
}
?>
