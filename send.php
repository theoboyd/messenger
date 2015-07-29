<?php
include 'connect.php';
if (!isset($_POST['this_username']) || !isset($_POST['other_username']) || !isset($_POST['content'])) {
  echo 'Sender, recipient and message are all required. Please <a class="link" href="index.php">try again</a>.';
  die();
}

$this_username = mysqli_real_escape_string($con, $_POST['this_username']);
$other_username = mysqli_real_escape_string($con, $_POST['other_username']);
$content = mysqli_real_escape_string($con, $_POST['content']);

$sql = "INSERT INTO messages (from_username, to_username, content) VALUES ('" . $this_username . "', '" . $other_username . "', '" . $content . "')";
$succeeded = mysqli_query($con,$sql);
if (!$succeeded) {
  echo 'Error: ' . mysqli_error($con) . '. Please <a class="link" href="index.php">try again</a>.';
  die();
}
else{
  header('Location: messages.php?u=' . $other_username);
}
?>