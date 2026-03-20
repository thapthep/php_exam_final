<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_a_hospital_appointment";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed:" . $e->getMessage();
}
