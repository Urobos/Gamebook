<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="UTF-8">
</head>
<body>
  <table id="st">
    <tr>
      <td id="le">Gamebook</td>
      <td id="pr">Witamy</td>
    </tr>
  </table>
  <form action="loging.php" method="post">
    <table>
      <tr>
        <td>Login:</td>
        <td>Hasło:</td>
      </tr>
      <tr>
        <td><input type="text" name="username"></td>
        <td><input type="password" name="pas"></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="Log">Loguj</button></td>
      </tr>
    </table>
  </form>
  <form action="delete.php" method="post">
    <table>
      <tr>
        <td>Login:</td>
        <td>Hasło:</td>
      </tr>
      <tr>
        <td><input type="text" name="username"></td>
        <td><input type="password" name="pas"></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="Log">Rejestruj</button></td>
      </tr>
    </table>
  </form>
</body>
</html>
