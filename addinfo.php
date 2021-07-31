<?php

session_start();

include('db_connect_proj.php');

$target_dir = "C:/xampp/htdocs/work3/";
$target_file = $target_dir . basename($_FILES["im"]["name"]);
move_uploaded_file($_FILES["im"]["tmp_name"], $target_file);
$z1 = $_POST["id"];
$z2 = $_POST["in"];
$z3 = $_POST["imn"];
$z4 = $_POST["na"];
$sql = "INSERT INTO game VALUES ('$z4',NULL,'$z1','$z2','$z3')";
$result = $conn->query($sql);

header("Location:mainpage.php?idc=" . $z1);

?>

<!-- empty() -->
