<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superglobals</title>
</head>
<body>

<?php
  echo '<h2> Server information </h2>';

  function server_info() {
    echo 'File name of current script: ' . $_SERVER['PHP_SELF'] . '<br>';
    echo 'The name of the host on which this is running: ' . $_SERVER['SERVER_NAME'] . '<br>';
    echo 'The name of the server software used: ' . $_SERVER['SERVER_SOFTWARE'] . '<br>';
    echo 'The request method used to access the page: ' . $_SERVER['REQUEST_METHOD'] . '<br>';
    echo 'The port on which this server is running: ' . $_SERVER['SERVER_PORT'] . '<br>';
  }

  server_info();
?>

<?php
  echo '<h2> Collecting form data </h2>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['firstname'];
    if (empty($name)) {
        echo "No name specified!";
    } else {
        echo "Name is: $name";
    }
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="firstname">
  <input type="submit">
</form>

</body>
</html>
