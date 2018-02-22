<?php

$db_name = "vulnerableDB";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";

// Create connection
$conn = new mysqli($server_name, $mysql_username, $mysql_password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE " . $db_name;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "USE " . $db_name;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE vulnerabilities(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	exploit VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table vulnerabilities created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE user(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO vulnerabilities (name,exploit) VALUES ('SQL injection','Using SQL in input boxes')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO user (name,lastname,password) VALUES ('Mr','root','passw0rd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
