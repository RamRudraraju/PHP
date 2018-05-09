<?php
  // http://www.tutorialspoint.com/php/php_sessions.htm
  // http://www.w3schools.com/php/php_sessions.asp
  // http://stackoverflow.com/questions/3740845/php-session-without-cookies
  // http://www.herongyang.com/PHP/Session-Manage-Session-ID-without-Cookie.html

  // Start the session, this should be before the <html> tag.
  ini_set("session.use_cookies", 0);
  ini_set("session.use_only_cookies", 0);
  ini_set("session.use_trans_sid", 1);
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions without cookies - Page 2</title>
</head>
<body>

<?php
  echo '<h3>Page 2</h3>';

  if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
  } else {
    $_SESSION['visits']++;
  }

  echo 'You have visited this site: ' . $_SESSION['visits'] . ' times <br>';
  echo 'Session name: ' . session_name() . '<br>';
  echo 'Session id: ' . session_id() . '<br><br>';
  echo 'SID: ' . SID . '<br><br>';
  echo "<a href=\"/course/sessionsWithoutCookies-page3.php\"> Next page </a><br>";
  echo "<a href=\"/course/sessionsWithoutCookies-page1.php\"> Previous page </a><br>";
?>

</body>
</html>
