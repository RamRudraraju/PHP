<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loops</title>
</head>
<body>
<?php
  echo '<h2> For loops </h2>';

  echo '<h4> Print 0 to 9 </h4>';
  for ($i = 0; $i < 10; $i++) {
    echo 'Printing number: ' . $i . '<br>';
  }

  echo '<h4> Print 15 to 1 in intervals of 3 </h4>';
  for ($i = 15; $i > 1; $i = $i - 3) {
    echo 'Printing number: ' . $i . '<br>';
  }

  echo '<h2> While loops </h2>';

  $test = 30;
  while ($test > 0) {
    $test = $test - 4;
    echo 'Test: ' . $test . ' <br> ';
  }

  echo '<h2> Do While loops </h2>';

  $test = -3;
  do {
    echo 'Test: ' . $test . ' <br> ';
  } while ($test > 0);

  echo '<h2> The foreach loop </h2>';

  $numbers = array(10, 20, 30, 40, 50);
  foreach ($numbers as $num) {
    echo $num . '<br>';
  }
?>

<?php
  echo '<h2> The break statement </h2>';

  $random_num = rand(0, 100);
  while (TRUE) {
    echo 'Random number: ' . $random_num . '<br>';
    $random_num = rand(0, 100);
    if ($random_num % 5 == 0) {
      break;
    }
  }

  echo 'Final random number: ' . $random_num . '<br>';

  echo '<h2> The continue statement </h2>';
  for ($i = 0; $i < 6; $i++) {
    if ($i == 4) {
      continue;
    }
    echo 'Print number: ' . $i . '<br>';
  }
?>
</body>
</html>
