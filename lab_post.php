<?php
  $name = $_POST["name"];

  echo "submited name is $name<br/>";

  // TODO: create database
  // TODO: create table people(id, name)

  // TODO: connect to MySQL
  $server = "localhost";
  $username = "username";
  $password = "password";

  // Create connection
  $conn = new mysqli($server, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully<br/>";

  // TODO: insert data to database
  $sql = "INSERT INTO people (name) VALUES ('$name')";
  echo "sql: $sql<br/>";
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // TODO: select data from database
  $sql = "SELECT * FROM people WHERE id=$last_id";
  echo "sql: $sql<br/>";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: $row[id] - Name: $row[name]<br>";
    }
  } else {
      echo "0 results";
  }

  $conn->close();
?>
