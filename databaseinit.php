<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Create database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

$tb = mysqli_select_db($conn,$database);

$sql = "CREATE TABLE reviews (
    id int AUTO_INCREMENT primary key NOT NULL,
    first_name varchar(255),
    last_name varchar(255),
    age int(11),
    email varchar(255),
    rating int(1),
    description varchar(1000)
);";

if(mysqli_query($conn, $sql)) {
    echo "Table reviews created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }
$conn->close();

?>