<?php
  // http://php.net/manual/en/function.fopen.php
  $file = fopen("somefile.txt", "w") or die("Unable to open file!");

  $line = "This completely obliterates what was originally in the file.\n";
  fwrite($file, $line);

  $line = "' This portion of the Text was added in Extra: Rama Krishna Raju.'\n";
  fwrite($file, $line);

  fclose($file);
?>

<?php
  echo "Note the original file contents have been lost\n---\n";
  readfile('somefile.txt');
?>

<?php
  $file = fopen("somefile.txt", "a") or die("Unable to open file!");

  $line = "This does not erase existing stuff, instead appends to it.\n";
  fwrite($file, $line);

  fclose($file);
?>

<?php
  echo "Note the original file contents have been preserved\n---\n";
  readfile('somefile.txt');
?>
