<?php
// Delete cookie by setting the expiration date to 100 hours ago
setcookie('logged_in_username', '', time() - 360000, '/', $_SERVER['MAIL_SERVER_NAME']);
header("Location: index.php");
?>