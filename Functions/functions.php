<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions</title>
</head>
<body>
<?php
  echo '<h2>Simple function</h2>';

  function printWelcomeMessage() {
    echo '<i>Welcome to the world of PHP!</i><br>';
  }

  printWelcomeMessage();
?>

<?php
  echo '<h2>Function with arguments and return value</h2>';

  function multiply($num1, $num2) {
    echo "Multiplying $num1 and $num2: ";

    $result = $num1 * $num2;
    echo $result . '<br>';

    return $result;
  }

  $result = multiply(2, 6.4);
  multiply(4.223, 10.309);
?>

<?php
  echo '<h2>Arguments and return values can be anything!</h2>';

  function getNameArray($name1, $name2, $name3, $name4) {
    return array($name1, $name2, $name3, $name4);
  }

  $names = getNameArray('Navdeep', 'Vitthal', 'Swetha', 'Janani');

  printNameArray($names);

  function printNameArray($names) {
    foreach($names as $name) {
      echo $name . '<br>';
    }
  }
?>

<?php
  echo '<h2>Pass by value</h2>';

  function increment_pass_by_value($num) {
    echo "Pre-increment value in function: $num <br>";

    $num++;

    echo "Post-increment value in function: $num <br>";
  }

  $some_number = 10;
  echo "Original value outside the function: $some_number <br>";
  increment_pass_by_value($some_number);
  echo "Value after function called: $some_number <br>";
?>

<?php
  echo '<h2>Pass by reference</h2>';

  function increment_pass_by_reference(&$num) {
    echo "Pre-increment value in function: $num <br>";

    $num++;

    echo "Post-increment value in function: $num <br>";
  }

  $some_number = 10;
  echo "Original value outside the function: $some_number <br>";
  increment_pass_by_reference($some_number);
  echo "Value after function called: $some_number <br>";
?>


<?php
  echo '<h2>Default values for arguments</h2>';

  function print_message_with_default_arguments($message = 'Hello world!') {
    echo $message . '<br>';
  }

  print_message_with_default_arguments();
  print_message_with_default_arguments('This is a new message!');
?>

<?php
?>
</body>
</html>
