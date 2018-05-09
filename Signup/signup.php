<?php
  session_start();

  // Needed to guard again CSRF attacks
  $form_token = md5(uniqid('auth', true));
  $_SESSION['form_token'] = $form_token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signing up for the Top Secret Club</title>
</head>
<body style="font-family: sans-serif;">
<?php
  require 'Example24-getDBConnection.php';
  require 'Example25-validateInputs.php';

  $error_message = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_message = validate_inputs($_POST['user_email'], $_POST['user_password'], $form_token);
    // If no errors then add the user to the database.
    if (empty($error_message)) {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_STRING);
      $user_password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);

      try {
        $conn = getDatabaseConnection();

        $stmt = $conn->prepare(
          "INSERT INTO `Users` (user_email, user_password) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $user_email, sha1($user_password));
        $stmt->execute();

        $stmt->close();
        $conn->close();
      } catch (Exception $e) {
        // Duplicate entry for key is error 1062
        if($e->getCode() == 1062) {
          $error_message =
            'Username already exists, please sign in or choose a different user name';
        }
        else {
          $error_message =
            'We are unable to process your request. Please try again later';
        }
      }
    }
  }
?>

<h3> Sign up to our new Top Secret Club! </h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <span style="color: red"><?php echo $error_message;?></span>
  <br>
  <br>
  Email address:
  <br>
  <input type="text" name="user_email" maxlength="100">
  <br>
  <br>
  Password:
  <br>
  <input type="text" name="user_password" maxlength="20">
  <br>
  <br>
  <input type="submit" value="Sign up">

  <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
</form>
<br>
<a href="Example26-login.php"> Already a member? Login </a>

<?php
  $error_message = "";
?>
</body>
</html>
