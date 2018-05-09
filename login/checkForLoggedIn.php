<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Secret Club Members</title>
</head>
<body>
<?php
  // Check whether a valid user is logged in.
  if (!isset($_SESSION['logged_in_user'])) {

    $_SESSION['continue_url'] = htmlspecialchars($_SERVER["PHP_SELF"]);

    echo "<script>window.location = 'Example26-login.php'</script>";
  }

  echo '<br><br><br>Welcome to the Top Secret page of the Top Secret club!<br><br><br>';
  echo "<a href='/course/Example28-logout.php'> Logout </a>";
?>
</body>
</html>
