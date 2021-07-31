<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylemp.css">
    <script>
    function showinfo(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getinfo.php?id="+str,true);
            xmlhttp.send();
      }
  }
  function showcom(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("coments_section").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getcom.php?id="+str,true);
            xmlhttp.send();
      }
    }
    function shownote(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("points").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET","getnote.php?id="+str,true);
              xmlhttp.send();
        }
    }
    </script>
  </head>
  <body
  <?php
  session_start();
  if(empty($_SESSION["guard"]));
      else if($_SESSION["guard"] == "on") {echo "onload='showinfo(" . $_GET["id"] . ");showcom(" . $_GET["id"] . ");shownote(" . $_GET["id"] . ")'";
        $_SESSION["guard"] = "off";
      }
        ?>
  >
    GAMEBOOK
    <br>
    <!-- ad=administraction page -->
    <?php
    // session_start();
    if (empty($_SESSION["off&on"])) echo "<a href='log&del.php' class = 'adpa'>Rejestruj&Loguj</a>";
    else {
      echo "<a href='outlog.php' class = 'adpa'>Wyloguj</a>";
      if ($_SESSION["off&on"] == "2") echo "<br><a href='masterpanel.php'>Panel mistrza</a>";
    }
    ?>
    <div class="loc">  <!-- loc=list of categories -->
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
    <div class="md"> <!-- md=menudown  -->
      <div class="lp"> <!-- lp=leftpanel  -->
        <ul>
          <?php
            include('db_connect_proj.php');
            $sql = "SELECT name, id FROM game WHERE idcategory = " . $_GET["idc"];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                 echo "<li><button onclick='showinfo(" . $row["id"] . ");showcom(" . $row["id"] . ");shownote(" . $row["id"] . ")'>" . $row["name"] . "</button>";
                 if(empty($_SESSION["off&on"]));
                 else if($_SESSION["off&on"] == "2") echo "<a href='delcat.php?idd=" . $row["id"] . "&idc=" . $_GET["idc"] . "'><img src='delico.png' alt=''></a>";
                 echo "</li>";
               }
            } else {
               echo "0 results";
            }
            $conn->close();
          ?>
        </ul>
        <span id="points">
        </span>
      </div>
      <div class="rp" id="txtHint"> <!-- rp=rightpanel -->
        <?php
          include('db_connect_proj.php');
          $sql = "SELECT image, descripction FROM category WHERE idc = " . $_GET["idc"];
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
               echo "<img src='" . $row["image"] . "' alt='Brak obrazka'><br><br>" . $row["descripction"];
             }
          } else {
             echo "0 results";
          }
          $conn->close();
        ?>
      </div>
    </div>
    <div id="coments_section">
    </div>
  </body>
</html>
