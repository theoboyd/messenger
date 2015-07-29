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
$userpass = password_hash(mysqli_real_escape_string($con, $_POST['userpass']), PASSWORD_BCRYPT);

$sql="INSERT INTO users (username, userpass) VALUES ('" . $username . "', '" . $userpass . "')";
if (!mysqli_query($con,$sql)) {
  echo 'Error: ' . mysqli_error($con) . '. Please <a class="link" href="login.php">try again</a>.';
  die();
}
echo '<h3>Registered successfully</h3>';
echo '<form action="login.php" method="post">';
echo '<input type="hidden" name="username" value="' . $username . '">';
echo '<input type="submit" value="Continue">';
echo '</form>';
mysqli_close($con);
include 'footer.php'; ?>