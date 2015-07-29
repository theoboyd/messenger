<?php include 'header.php';
include 'connect.php';
if (!isset($_POST['username']) || !isset($_POST['userpass'])) {
  echo 'Username and password are both required. Please <a class="link" href="login.php">try again</a>.';
  die();
}
$username = mysqli_real_escape_string($con, $_POST['username']);
if (!ctype_alnum($username)) {
  echo 'Username needs to be alphanumeric. Please <a class="link" href="login.php">try again</a>.';
  die();
}

$sql = "SELECT userpass FROM users WHERE username='" . $username . "'";
$registered_userpass = mysqli_query($con,$sql);
if (!$registered_userpass) {
  echo 'Error: ' . mysqli_error($con) . '. Please <a class="link" href="login.php">try again</a>.';
  die();
}
$row = mysqli_fetch_assoc($registered_userpass);

if (password_verify($_POST['userpass'], $row['userpass'])) {
  setcookie('logged_in_username', $username, time() + (86400 * 30), '/', $_SERVER['MAIL_SERVER_NAME']);
  mysqli_close($con);
  header("Location: index.php");
  
/*   echo '<h3>Logged in successfully</h3>';
  echo '<form action="index.php" method="post">';
  echo '<input type="hidden" name="username" value="' . $username . '">';
  echo '<input type="submit" value="Continue">';
  echo '</form>'; */
}
else {
  echo 'Incorrect password. Please <a class="link" href="login.php">try again</a>.';
  die();
}
mysqli_close($con);
include 'footer.php'; ?>