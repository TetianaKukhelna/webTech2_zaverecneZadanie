<?php
require_once "_base.php";
require_once "MyPDO.php";

$username = "xkukhelna";
$password = "";
$port=3306;
$host='localhost';
$conn = new PDO( "mysql:host=$host;dbname=glosar;port={$port}", $username, $password);
