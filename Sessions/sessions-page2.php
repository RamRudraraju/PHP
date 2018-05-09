<?php
  // http://www.tutorialspoint.com/php/php_sessions.htm
  // http://www.w3schools.com/php/php_sessions.asp
  // https://www.sitepoint.com/community/t/http-cookie-vars-vs--cookie/3444


  // Start the session, this should be before the <html> tag.
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Page 2</title>
</head>
<body>


<?php
  echo '<h3>Counting visits to this PAGE</h3>';

  if (!isset($_SESSION['page2_visits'])) {
    $_SESSION['page2_visits'] = 1;
  } else {
    $_SESSION['page2_visits']++;
  }

  echo 'You have visited this page: ' . $_SESSION['page2_visits'] . ' times <br>';
?>

<?php
  echo '<h3>Counting visits to this SITE</h3>';

  if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
  } else {
    $_SESSION['visits']++;
  }

  echo 'You have visited this site: ' . $_SESSION['visits'] . ' times <br>';
?>

</body>
</html>
