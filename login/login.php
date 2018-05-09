<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging in to the Top Secret Club</title>
</head>
<body style="font-family: sans-serif;">
<?php
  require 'Example24-getDBConnection.php';
  require 'Example25-validateInputs.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_message = validate_inputs($_POST['user_email'], $_POST['user_password'],
      'placeholder', TRUE /* no_token */);

    // If no errors then add the user to the database.
    if (empty($error_message)) {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_STRING);
      $user_password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);

      try {
        $conn = getDatabaseConnection();

        $stmt = $conn->prepare(
          "SELECT user_id, user_email, user_password FROM Users WHERE user_email = ?"
        );
        $stmt->bind_param("s", $user_email);
        $stmt->execute();

        $stmt->bind_result($user_id_db, $user_email_db, $user_password_db);

        $user_valid = false;
        while ($stmt->fetch()) {
          if ($user_id_db) {
            // Check if the password hashes are the same.
            if (sha1($user_password) == $user_password_db) {
              $_SESSION['logged_in_user'] = $user_id_db;
              $continue_url = $_SESSION['continue_url'];

              // clear out the output buffer
              while (ob_get_status()) {
                ob_end_clean();
              }

              if (isset($continue_url)) {
                header("Location: $continue_url");
              } else {
                header("Location: /course/Example26-loginSuccess.php");
              }
            } else {
              $error_message = 'Wrong user name or password provided!';
            }
          } else {
            $error_message = 'Wrong user name or password provided';
          }
        }

        $stmt->close();
        $conn->close();
      } catch (Exception $e) {
        // Duplicate entry for key is error 1062
        if($e->getCode() == 1062) {
          $error_message = 'Username already exists, please sign in or choose a different user name';
        }
        else {
          $error_message = 'We are unable to process your request. Please try again later';
        }
      }
    }
  }
?>

<h3> Login Top Secret Club member </h3>
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
  <input type="submit" value="Login">
</form>
<br>

<?php
  $error_message = "";
?>
</body>
</html>
