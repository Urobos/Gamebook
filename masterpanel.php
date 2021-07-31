<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form action='addinfo.php' method='post' enctype="multipart/form-data">Kategoria:<select name = 'id'>
        <?php

        include('db_connect_proj.php');

        $sql = "SELECT name, idc FROM category";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
             {
               echo "<option value='" . $row["idc"] . "'>" . $row["name"] . "</option>";
             }
           }
        } else {
           echo "0 results";
        }
        $conn->close();
        ?>
      </select>
      Nazwa:<input type="text" name="na">
      Nazwa obrazka:<input type="text" name="imn">
      Obrazek:<input type="file" name="im"><br>
      Opis:<textarea name = 'in' rows='4' cols='20'></textarea><br>
      <button type="submit" name="ok">Dodaj</button>
      </form>
  </body>
</html>
