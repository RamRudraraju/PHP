<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scope of variables</title>
</head>
<body>

<?php
  echo '<h2>Variables in a function cannot be accessed outside the function </h2>';

  function add_y($num) {
    $y = 10;

    echo "Can access y inside the function: $y <br>";

    return $num + $y;
  }

  add_y(20);
  echo "Cannot access y outside the function: $y <br>";
?>

<?php
  echo '<h2>Variables in functions hide variables outside functions </h2>';

  $x = 5;

  echo "Value of x outside the function: $x <br>";
  function add_x($num) {
    $x = 10;

    echo "Value of x inside the function: $x <br>";

    return $num + $x;
  }

  echo add_x(5) . ' <br> ';

  echo "Value of x outside the function once again: $x <br>";
?>

<?php
  echo '<h2>Function parameters</h2>';

  function add($num1, $num2) {
    echo "Can access num1: $num1 and num2: $num2 inside the function <br>";

    return $num1 + $num2;
  }

  add(20, 30);
  echo "CANNOT access num1: $num1 and num2: $num2 OUTSIDE the function <br>";
?>

<?php
  echo '<h2>Global variables</h2>';

  $global_variable = 10;

  function some_function() {
    echo "Try accessing the global variable: $global_variable FAIL:-( <br>";

    GLOBAL $global_variable;
    echo "Try accessing the global variable once again: $global_variable SUCCEED :-)";
  }

  some_function();
?>

<?php
  echo '<h2>Static variables</h2>';

  function count_function() {
    STATIC $count = 0;
    $count++;

    echo "This function has been called $count times. <br>";
  }

  count_function();
  count_function();
  count_function();
  count_function();
  count_function();
?>
</body>
</html>
