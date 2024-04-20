<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "icav";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn->connect_error) {
  if ($_POST["op"] == "insert") {
    if($_POST["table"] == "ministerios"){
      include "./ministerios/Ministerios.php";
      Ministerios::insert($conn);
    }
  }
  elseif ($_POST["op"] == "select") {

  }
  elseif ($_POST["op"] == "update") {

  }
}

/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$conn->close();