<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>product toevoegen</title>
  <link rel="icon" href="img/pak.jpg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>product toevoegen</h2>

<form method="post">

<!-- <label for="id">id:</label>
  <input type="text" id="id" name="id" required><br> -->

  <label for="merk">merk:</label>
  <input type="text" id="merk" name="merk" required><br>

  <label for="naam">naam:</label>
  <input type="text" id="naam" name="naam" required><br>

  <label for="prijs">prijs:</label>
  <input type="number" id="prijs" name="prijs" required><br>

  <input type="submit" name value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "er is gepost<br>";
include "connect.php";


$sql= "INSERT INTO producten (merk, naam, prijs)
       VALUES (:merk, :naam, :prijs);";


$query = $conn->prepare($sql);

$query->execute(
  [
      // 'id'=>$_POST['id'],
      'merk'=>$_POST['merk'],
      'naam'=>$_POST['naam'],
      'prijs'=>$_POST['prijs']
  ]
);
echo "<script>
alert('Product is toegevoegd');
location.replace('producten.php'); </script>";

}


if(isset($_POST)){

}

?>


</body>
</html>
