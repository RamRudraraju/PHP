<?php
  session_start();

  // Unset all of the session variables.
  session_unset();

  // Destroy the session.
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Secret Club Logout</title>
</head>
<body>
<?php
  echo '<h3>You are now logged out, see you later!</h3>';
?>
</body>
</html>
