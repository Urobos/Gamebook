<?php

session_start();

include('db_connect_proj.php');

$ss = $_POST["back"];
$b = $_SESSION["user"];
$c = $_POST["number"];
$e = $_POST["cid"];

$_SESSION["guard"] = "on";

$sql = "INSERT INTO gamesnotes VALUES (NULL,'$ss','$b','$c')";
$result = $conn->query($sql);

header("Location:mainpage.php?id=" . $ss . "&idc=" . $e);

?>
