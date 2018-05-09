<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File upload</title>
</head>
<body style="font-family: sans-serif;">
<?php
  $error_msg = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_errors = $_FILES['fileToUpload']['error'];

    // Check for errors in the upload.
    if (!isset($file_errors) || is_array($file_errors)) {
      $error_msg = 'The parameters specified were invalid';
    }

    switch ($file_errors) {
      case UPLOAD_ERR_OK:
          break;
      case UPLOAD_ERR_NO_FILE:
          $error_msg = 'No file was specified for upload';
          break;
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
          $error_msg = 'The file was too large';
          break;
      default:
          $error_msg = 'Unknown errors';
    }

    // Check the mime-type to ensure that it is a valid image file.
    $file_name = $_FILES['fileToUpload']['tmp_name'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $ext = array_search(
      $finfo->file($file_name),
      array(
          'jpeg' => 'image/jpeg',
          'jpg' => 'image/jpg',
          'png' => 'image/png',
          'gif' => 'image/gif',
      ),
      true
    );
    if ($ext === false) {
      $error_msg = 'Only files with extensions jpg, jpeg, png and gif allowed';
    }

    if (empty($error_msg)) {
      $upload_success = move_uploaded_file($file_name,
        sprintf('./uploads/%s.%s', sha1_file($file_name), $ext));
      if (!$upload_success) {
        $error_msg = 'Unknown error while copying file';
      } else {
        echo '<span style="color: green">Your upload was successful!</span>';
      }
    }
  }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST"
      enctype="multipart/form-data">
    <br>
    Select an image to upload: <br><br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br><br>
    <input type="submit" value="Upload Image" name="submit">
    <br><br>
    <span style="color: red"><?php echo $error_msg;?></span>
</form>

</body>
</html>
