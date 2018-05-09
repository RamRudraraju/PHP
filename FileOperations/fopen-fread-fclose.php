<?php

  $file = fopen("somefile.txt", "r") or die("Unable to open file!");

  echo "Reading the entire file!\n---\n";
  echo fread($file, filesize("somefile.txt"));

  fclose($file);
?>
<?php
  $file = fopen("somefile.txt", "r") or die("Unable to open file!");

  echo "\nReading only 10 bytes of the file\n---\n";
  echo fread($file, 10) . "\n";

  fclose($file);
?>

<?php
  $file = fopen("somefile.txt", "r") or die("Unable to open file!");

  echo "\nReading a file one line at a time\n---\n";

  $line = 1;
  while(!feof($file)) {
    echo $line . " ";

    echo fgets($file) . "\n";

    $line++;
  }

  fclose($file);
?>

<?php
  $file = fopen("somefile.txt", "r") or die("Unable to open file!");

  echo "\nReading a file one character at a time\n---\n";

  $line = 1;
  while(!feof($file)) {
    echo $line . " ";

    echo fgetc($file) . "\n";

    $line++;
  }

  fclose($file);
?>
