<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylewp.css">
  </head>
  <body>
    <div class="loc"> <!-- loc=list of categories -->
      <ul>
        <?php
          include('db_connect_proj.php');
          $sql = "SELECT name,idc FROM category";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
               echo "<li><a href='mainpage.php?idc=" . $row["idc"] . "'>" . $row["name"] . "</a>" . "</li>";
             }
          } else {
             echo "0 results";
          }
          $conn->close();
        ?>
      </ul>
    </div>
    <!-- <div class="rp">  md=menudown  -->
      <div class="lp"> <!-- lp=leftpanel  -->
        GAMEBOOK<br><img src="ic2.png" alt="">
      </div>
      <div class="rp"> <!-- rp=rightpanel -->
        <h1>Witaj!</h1>Za pomocą tej strony postaram się przedstawić parę typów gier. Czym się cechują, komu mogą się spodobać, czy patrzeba paru godzin by oddać się
        elektronicznej przyjemności? A może jednak istnieją gry które są idealnie na krótkie oderwania od pracy, chwilę relaksu, odświerzenie umysłu? Smoki,
        magia, tajemnice, historia od których nie można się oderwać, ciekawa mechanika. Ile ludzi, tyle pomysłów. Oczywiście nie przedstawie wszystkich typów gier,
        ale wybiorę parę kategorii.
      </div>
    <!-- </div> -->
  </body>
</html>
