<?php
$servername = "studmysql01.fhict.local";
$username = "dbi431251";
$password = "password";
$dbname="dbi431251";

$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

