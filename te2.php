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
  nowe rzezniki!!!!!!!!<br>
  <?php
  if (@$_SESSION["f"] == 1) echo "loging" .
  "<form method='post' action='outlog.php'>" .
  "<button type='submit'>Spadam</button>" . "</form>";
  else echo "wyloging" . "<br>" . "<a href='proj1.php'>Logowanko</a>" . "<br>";
?>
<a href="index.php">linki</a>
</body>
</html>
