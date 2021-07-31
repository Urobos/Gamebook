<?php
session_start();
include('db_connect_proj.php');
$sql="SELECT image, descripction FROM game WHERE id = " . $_GET["id"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     echo "<img src='" . $row["image"] . "' alt='brak'><br><br>" . $row["descripction"];
   }
} else {
   echo "0 results";
}
$conn->close();
?>
