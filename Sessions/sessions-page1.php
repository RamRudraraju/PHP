<?php
  // http://www.tutorialspoint.com/php/php_sessions.htm
  // http://www.w3schools.com/php/php_sessions.asp
  // http://php.net/manual/en/intro.session.php

  // Start the session, this should be before the <html> tag.
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions Page 1</title>
</head>
<body>

   
<?php
    // Countes The Number of Times a Person Visited a "Particular" Web Page.
  echo '<h3>Counting visits to this PAGE</h3>';
    // "page1_visits" it is the Super Global variable that stores Number of Times Session Visites. 
  if (!isset($_SESSION['page1_visits'])) {
    $_SESSION['page1_visits'] = 1;
  } else {
    $_SESSION['page1_visits']++;
  }

  echo 'You have visited this page: ' . $_SESSION['page1_visits'] . ' times <br>';
?>

<?php
  echo '<h3>Counting visits to this SITE</h3>';
     // We have to keep this code accross all the Pages to keep track of all Visites. 
  if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
  } else {
    $_SESSION['visits']++;
  }

  echo 'You have visited this site: ' . $_SESSION['visits'] . ' times <br>';
?>

<?php
    // Maual Distruction od Sessions. 
  if ($_SESSION['visits'] > 8) {
    echo '<h3>Destroying the session</h3>';
    session_destroy();
    echo 'Session has been destroyed after 8 visits <br>';
  }
?>

</body>
</html>
