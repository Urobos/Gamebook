<?php

include('db_connect_proj.php');

$z = $_GET["idc"];

$sql = "DELETE FROM game WHERE id = " . $_GET["idd"];
$result = $conn->query($sql);

header("Location:mainpage.php?idc=" . $z);

?>

<!-- empty() -->
