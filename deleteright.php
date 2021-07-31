<?php

session_start();

include('db_connect.php');

$z1 = $_POST["username"];

$sql = "DELETE FROM uzytkownicy WHERE nick = '$z1'";
$result = $conn->query($sql);

header("Location:index.php");

?>

<!-- empty() -->
