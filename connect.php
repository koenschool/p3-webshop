<?php
// gemaakt door koen polfliet
//functie connectie maken met data base fietsen maken

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "strak_in_pak";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully<br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>