<?php
include 'header.php';

include 'connect.php';

if(!isset($_COOKIE['logged_in_username'])) {
  echo 'Not logged in. Please <a href="login.php">log in</a>.';
  include 'footer.php';
  die();
}
$username = mysqli_real_escape_string($con, $_COOKIE['logged_in_username']);

echo '<h3><a href="logout.php">&lt; Log out ' . $username . '</a> | Inbox</h3>';

$messages_senders_result = mysqli_query($con, "SELECT DISTINCT from_username FROM messages WHERE to_username='" . $username . "'");
if (!$messages_senders_result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

echo '<b>Messages with</b><br>';
while($messages = mysqli_fetch_assoc($messages_senders_result)){
    echo '<form action="messages.php" method="get">';
    echo '<input type="hidden" name="u" value="' . $messages["from_username"] . '">';
    echo '<input type="submit" value="' . $messages["from_username"] . '">';
    echo '</form>';
}

$recipients_result = mysqli_query($con, "SELECT username FROM users WHERE username<>'" . $username . "'");
if (!$recipients_result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

echo '<form action="messages.php" method="get">';
echo '<input type="submit" value="New message to ">';
echo '<select name="u">';
while($recipients = mysqli_fetch_assoc($recipients_result)){
    echo '<option value="' . $recipients["username"] . '">' . $recipients["username"] . '</option>';
}
echo '</select>';
echo '</form>';

mysqli_close($con);

include 'footer.php';
?>