<?php
session_start();
include('db_connect_proj.php');
$w1 = $_GET["id"];
// $sql="SELECT value, user FROM coments WHERE gameid = $w1";
$sql="SELECT w1.value, w1.user, w1.id, w2.idcategory FROM coments as w1, game as w2 WHERE w1.gameid = $w1 AND w2.id = $w1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   echo "Komentarze<br>";
   while($row = $result->fetch_assoc()) {
     echo "<div class='com'>" . $row["user"] . ":" . $row["value"];
     if(empty($_SESSION["off&on"]));
     else if ($_SESSION["off&on"] == "2")
     echo "<a href='delcom.php?idd=" . $w1 . "&idc=" . $row["idcategory"] . "&idcd=" . $row["id"] . "'><img src='delico.png' alt=''></a>";
     echo "</div>";
   }
} else {
   echo "Brak komentarzy<br>";
}
$sql="SELECT idcategory FROM game WHERE id = $w1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     $cid = $row["idcategory"];
   }
} else {
   //echo "Brak komentarzy<br>";
}
if (empty($_SESSION["off&on"])) echo "Zaloguj się, by dodać komentarz.";
else
echo "<form action='addcom.php' method='post'><textarea name = 'data' rows='4' cols='40'></textarea>
 <input type='hidden' name = 'back' value = '" . $_GET["id"] . "'><input type='hidden' name = 'cid' value = '" .
 $cid . "'><button type='submit'>Dodaj komentarz</button></form>";
$conn->close();
?>
