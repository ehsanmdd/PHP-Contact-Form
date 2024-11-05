<?php

$servername = "localhost";
$userName = "root";
$password = "";
$databaseName = "contact_us";

$conn = new PDO("mysql:host=".$servername.";dbname=".$databaseName, $userName, $password);
try {
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected Successfully";
} catch (PDOException $error) {
    echo "Connected Failed :".$error -> getMessage();
}
