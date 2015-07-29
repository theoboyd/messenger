<?php include 'header.php'; ?>
<h3>Please log in or <a class="link" href="register.php">register</a>:</h3>
<form action="loginsubmit.php" method="post">
  <table>
    <tr>
      <td>Username:</td>
      <td><input type="text" name="username"></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="userpass"></td>
    </tr>
    <tr>
      <td colspan=2><input class="rightline" type="submit"></td>
    </tr>
  </table>
</form>
<?php include 'footer.php'; ?>