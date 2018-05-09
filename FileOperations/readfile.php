<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read file and download it</title>
</head>
<body>

<?php
  $num_bytes = readfile('somefile.txt');

 echo "\n\nThe number of bytes read is: $num_bytes\n";
 
 // echo readfile('somefile.txt');
?>

<?php
 // readfile($_SERVER['PHP_SELF']);
?>

</body>
</html>
