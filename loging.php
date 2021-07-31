<?php

session_start();

include('db_connect_proj.php');

$sql = "SELECT nick,haslo FROM ludzie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     if(($row["nick"] == $_POST["username"]) && ($row["haslo"] == $_POST["pas"]))
     {
       if($row["nick"] == "Fil") $_SESSION["off&on"] = "2";
       else $_SESSION["off&on"] = "1";
       $_SESSION["user"] = $_POST["username"];
     }
   }
} else {
   echo "0 results";
}
$conn->close();
if (empty($_SESSION["off&on"])) header("Location:log-in-fail.php");
else header("Location:welcomepage.php");
?>
