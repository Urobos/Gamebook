<?php
session_start();
include('db_connect_proj.php');
$w1 = $_GET["id"];
if(empty($_SESSION["off&on"])) echo "Zaloguj się by ocenić.<br>";
else {
  $sql="SELECT note FROM gamesnotes WHERE gameid = $w1 AND user = '" . $_SESSION["user"] . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Twoja ocena:" . $row["note"] . "<br>";
    }
  } else {
    $sql="SELECT idcategory FROM game WHERE id = $w1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
         $cid = $row["idcategory"];
       }
       //echo "Brak komentarzy<br>";
        echo "<form action='addnote.php' method='post'><select name='number'><option value=0>0</option><option value=0,5>0,5</option><option value=1>1</option>
        <option value=1,5>1,5</option><option value=2>2</option><option value=2,5>2,5</option><option value=3>3</option><option value=3,5>3,5</option>
        <option value=4>4</option><option value=4,5>4,5</option><option value=5>5</option><option value=5,5>5,5</option><option value=6>6</option>
        <option value=6,5>6,5</option><option value=7>7</option><option value=7,5>7,5</option><option value=8>8</option><option value=8,5>8,5</option>
        <option value=9>9</option><option value=9,5>9,5</option><option value=10>10</option></select>
        <input type='hidden' name = 'back' value = '" . $_GET["id"] . "'><input type='hidden' name = 'cid' value = '" .
        $cid . "'><button type='submit' id='notebutton'>Oceń</button></form>";
  }
  }
}
$sum = 0;
$sql="SELECT note FROM gamesnotes WHERE gameid = $w1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     $sum = $sum + $row["note"];
   }
   echo "Średnia ocena:" . $sum/($result -> num_rows);
}
$conn->close();
?>
