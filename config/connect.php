<?php
include __DIR__ . "/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '/../env.dsmg.sec');
$dotenv->load();
//$connect = mysqli_connect("localhost", "dsgroupm", "Banaer.17", "dsgroupm_inven");

$servername = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASS"];
$dbname = $_ENV["DB_NAME"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	
	/*

	$mysqli = new mysqli("localhost", "root", "root", "login");

	/* check connection 
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}*/
