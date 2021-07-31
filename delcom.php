<?php
session_start();
include('db_connect_proj.php');

$z = $_GET["idc"];

$_SESSION["guard"] = "on";

$sql = "DELETE FROM coments WHERE id = " . $_GET["idcd"];
$result = $conn->query($sql);

header("Location:mainpage.php?id=" . $_GET["idd"] . "&idc=" . $z);

?>

<!-- empty() -->
