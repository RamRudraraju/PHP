<?php
  $servername = "localhost";
  $username = "Rama";
  $password = "Rama";
  $dbName = "booDB";

  echo "Creating a table\n";

  $conn = mysqli_connect($servername, $username, $password, $dbName) or
      die("Connection failed: " . mysqli_connect_error());

  echo "Connected to MySQL successfully\n";

  echo "Creating the PropertyListings table\n";
  $create_query = <<<_CREATE_
      CREATE TABLE PropertyListings(
        listingId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(30) NOT NULL,
        bedrooms INT(3) UNSIGNED NOT NULL,
        bathrooms FLOAT(3, 1) NOT NULL,
        location VARCHAR(50) NOT NULL,
        price INT(20) NOT NULL
      )
_CREATE_;

  if (mysqli_query($conn, $create_query)) {
      echo "Property listings table created successfully\n";
  } else {
      echo "Error creating table: " . mysqli_error($conn) . "\n";
  }
  mysqli_close($conn);
?>


<?php
  echo "Inserting a whole bunch of data into the table\n";

  $conn = mysqli_connect($servername, $username, $password, $dbName) or
      die("Connection failed: " . mysqli_connect_error());

  echo "Connected to MySQL successfully\n";

  echo "Pre-fill the table with some data\n";

  $insert_queries = array();
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('condo', 4, 5, 'Bellandur', 100000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('townhome', 3, 3, 'Koramangala', 200000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('house', 5, 5, 'Sarjapur', 250000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('condo', 2, 2, 'Bellandur', 50000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('condo', 3, 2, 'Bellandur', 75000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('house', 4, 3, 'Koramangala', 300000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('condo', 2, 2, 'Marathalli', 45000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('townhome', 3, 3, 'Koramangala', 260000)
_INSERT_;
  $insert_queries[] = <<<_INSERT_
      INSERT INTO PropertyListings
        (type, bedrooms, bathrooms, location, price)
      VALUES
        ('townhome', 3, 2.5, 'Koramangala', 290000)
_INSERT_;

  foreach ($insert_queries as $query) {
    if (mysqli_query($conn, $query)) {
        echo "Inserted row: $query\n";
    } else {
        echo "Error inserting row: " . mysqli_error($conn) . "\n";
    }
  }

  mysqli_close($conn);
?>
