<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT queries using PHP and MySQL</title>
</head>
<body style="font-family: sans-serif; font-size: 12px">
<h2> Property listings search: </h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Location:
    <input type="text" name="location" value="<?php echo $location;?>">
    Minimum number of bedrooms:
    <input type="text" name="bedrooms" value="<?php echo $bedrooms;?>">
    Maximum price:
    <input type="text" name="price" value="<?php echo $price;?>">
    <input type="submit" value="Search">
</form>
<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $location = "";
  $bedrooms = "";
  $price = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['location'])) {
      $location = clean($_POST['location']);
    }

    $bedrooms = clean($_POST['bedrooms']);
    if (!filter_var($bedrooms, FILTER_VALIDATE_INT)) {
      $bedrooms = "0";
    }

    $price = clean($_POST['price']);
    if (!filter_var($price, FILTER_VALIDATE_INT)) {
      $price = "";
    }

    $select_query = "SELECT * FROM `PropertyListings` WHERE bedrooms >= " . $bedrooms;

    if (!empty($price)) {
      $select_query .= " AND price <= " . $price;
    }

    if (!empty($location)) {
      $select_query = $select_query . " AND location = '$location'";
    }

    retrieve_and_display_results($select_query);
  }

  function retrieve_and_display_results($query) {
    $servername = "localhost";
    $username = "Rama";
    $password = "Rama";
    $dbName = "booDB";

    $conn = mysqli_connect($servername, $username, $password, $dbName) or
        die("Connection failed: " . mysqli_connect_error());

    $result = mysqli_query($conn, $query);
    if($result === FALSE) {
        die(mysql_error());
    }

    if (mysqli_num_rows($result) > 0) {
        echo '<br><br><table>';
        echo '<td style="width: 100px; height: 22px">' . "<b>Property Type</b>" . '</td>';
        echo '<td style="width: 150px; height: 22px">' . "<b>Location</b>" . '</td>';
        echo '<td style="width: 100px; height: 22px">' . "<b>Bedrooms</b>" . '</td>';
        echo '<td style="width: 100px; height: 22px">' . "<b>Bathrooms</b>" . '</td>';
        echo '<td style="width: 100px; height: 22px">' . "<b>Price</b>" . '</td>';
        while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td style="width: 100px; height: 18px">' . $row['type'] . '</td>';
          echo '<td style="width: 150px; height: 18px">' . $row['location'] . '</td>';
          echo '<td style="width: 100px; height: 18px">' . $row['bedrooms'] . '</td>';
          echo '<td style="width: 100px; height: 18px">' . $row['bathrooms'] . '</td>';
          echo '<td style="width: 100px; height: 18px">' . $row['price'] . '</td>';
          echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<br><br>No results match your search:-(";
    }

    mysqli_close($conn);
  }

  function clean($input) {
    // Trims whitespace from input
    $input = trim($input);
    // Removes slashes from input data
    $input = stripslashes($input);

    // Typically you would use either strip_tags or htmlspecialchars
    // depending on whether you want to remove the HTML characters
    // or just neutralize it.

    // Removes all the html tags from input data
    $input = strip_tags($input);
    // Escapes html characters from input data
    $input = htmlspecialchars($input);

    return $input;
  }
?>

</body>
</html>
