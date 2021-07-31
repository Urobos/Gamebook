<?php

session_start();

include('db_connect_proj.php');

$z1 = $_POST["username"];
$z2 = $_POST["pas"];

$sql = "INSERT INTO ludzie VALUES (NULL,'$z1','$z2')";
$result = $conn->query($sql);

header("Location:log&del.php");

?>

<!-- empty() -->
