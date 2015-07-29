<?php include 'header.php'; ?>
<h3>Please register or <a class="link" href="login.php">log in</a>:</h3>
<form action="registersubmit.php" method="post">
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