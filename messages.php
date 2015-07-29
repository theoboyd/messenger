<?php
include 'header.php';

include 'connect.php';

if(!isset($_COOKIE['logged_in_username'])) {
  echo 'Not logged in. Please <a href="login.php">log in</a>.';
  include 'footer.php';
  die();
}

if (empty($_GET['u'])) {
  echo 'No sender specified. Please <a class="link" href="index.php">go back</a>.';
  die();
}

$this_username = mysqli_real_escape_string($con, $_COOKIE['logged_in_username']);
$other_username = mysqli_real_escape_string($con, $_GET['u']);

echo '<h3><a href="index.php">&lt; Back</a> | ' . $other_username . '</h3>';

$messages_result = mysqli_query($con, "SELECT subject, content, datestamp, from_username FROM messages WHERE (from_username='" . $other_username . "' AND to_username='" . $this_username . "') OR (from_username='" . $this_username . "' AND to_username='" . $other_username . "') ORDER BY datestamp ASC");
if (!$messages_result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

while($messages=mysqli_fetch_assoc($messages_result)){
    
    $message_class = 'me';
    if ($messages["from_username"] == $other_username) {
        $message_class = 'them';
    }
    
    echo '<p class="p ' . $message_class . '">' . nl2br($messages["content"]) . '<br><sub>' . $messages["datestamp"] . '</sub></p>';
    //<b>' . $messages["subject"] . '</b><br>
}

echo '<p class="p blank"></p><form class="p me" action="send.php" method="post">';
echo '<input type="hidden" name="this_username" value="' . $this_username . '">';
echo '<input type="hidden" name="other_username" value="' . $other_username . '">';
echo '<textarea style="color:#ffffff; background-color:#1289fe;" name="content" rows="3" cols="25"></textarea><br>';
echo '<input type="submit" style="float:right;" value="Send">';
echo '</form>';

mysqli_close($con);

include 'footer.php';
?>