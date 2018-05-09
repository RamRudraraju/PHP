<?php
  // Run this on the browser.
  $file = 'somefile.txt';
  if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file). '"');
    header('Content-Length: ' . filesize($file));

    exit;
  }
?>
