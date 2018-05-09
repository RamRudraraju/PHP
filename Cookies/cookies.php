<?php
  // http://www.w3schools.com/php/php_cookies.asp
  // http://www.tutorialspoint.com/php/php_cookies.htm
  // https://www.sitepoint.com/community/t/http-cookie-vars-vs--cookie/3444


  // Set a cookie named user. Cookies should be set before the
  // <html> tags on the page.
  setCookie('user', 'Rama Krishna', time() + 86400 * 30, "/");
  setCookie('query', 'some query', time() + 86400, "/");
  setCookie('last_visited_page', '/somepage.html', time() + 86400, "/");
  setRawCookie('last_visited_page_raw', '/somepage.html', time() + 86400, "/");

  // Delete a cookie
 setCookie('query', 'some query', time() - 60, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>

<?php
   echo '<h3>Cookies set on the current page</h3>';
   foreach ($_COOKIE as $c) {
     echo $c . '<br>';
   }

   echo 'The user is: ' . $_COOKIE['user'] . '<br>';

   # This is no longer used, existed before PHP 4 and has to be explicitly
   # enabled now. This statement should print nothing.
  // echo 'The user is: ' . $HTTP_COOKIE_VARS['user'] . '<br>';
?>

<?php
   echo '<h3>Check if a cookie is set</h3>';
   if (isset($_COOKIE['query'])) {
     echo 'The query is: ' . $_COOKIE['query'];
   } else {
     echo 'The query cookie has not been set!';
   }
?>

</body>
</html>
