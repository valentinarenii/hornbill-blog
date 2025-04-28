<?php
$host = 'localhost';
$dbname = 'hornbill-blog';
$dbuser = 'root';
$dbpass = "";

$db = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// new PDO("mysql:host=localhost;$dbname=hornbill-blog=","root","");
if(!$db):
    echo "Database Connect Fail";
else:
endif;
?>