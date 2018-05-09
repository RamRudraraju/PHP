<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connecting from PHP to MySQL</title>
</head>
<body>
<?php
  $servername = "localhost";
  $username = "Rama";
  $password = "Rama";

  // Steps on a MAC to set up a connection to MySQL
  // http://jason.pureconcepts.net/2012/10/install-apache-php-mysql-mac-os-x/
?>

<?php
  echo '<h3>Connecting to MySQL - Procedural </h3>';

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  echo 'Connected to MySQL successfully <br>';

  mysqli_close($conn);
?>

<?php
  echo '<h3>Connecting to MySQL - Object Oriented </h3>';

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Compatible with PHP versions before 5.2.9 and 5.3.0
  if (mysqli_connect_error()) {
      die("Database connection failed: " . mysqli_connect_error());
  }

  // Compatible with later PHP versions
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo 'Connected to MySQL successfully <br>';

  $conn->close();
?>

<?php
  echo '<h3>Create a database</h3>';
  $conn = mysqli_connect($servername, $username, $password);

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  echo 'Connected to MySQL successfully <br>';

  echo 'Creating database <br>';
  $sql = "CREATE DATABASE booDB";
  if (mysqli_query($conn, $sql) === TRUE) {
      echo 'Database created successfully <br>';
  } else {
      echo 'Error creating database: ' . mysqli_error($conn);
  }

  mysqli_close($conn);
?>

</body>
</html>
