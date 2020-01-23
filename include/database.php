<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uhr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  




/*
fullname
email
address
tel
nationality
state
voterid
nimcid
gender
postalcode
nextofkin
*/