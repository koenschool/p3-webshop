<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>klant toevoegen</title>
  <link rel="icon" href="img/pak.jpg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>klant toevoegen</h2>

<form method="post">

<!-- <label for="id">id:</label>
  <input type="text" id="id" name="id" required><br> -->

  <label for="email">email:</label>
  <input type="text" id="email" name="email" required><br>

  <label for="adres">adres:</label>
  <input type="text" id="adres" name="adres" required><br>

  <input type="submit" name value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "er is gepost<br>";
include "connect.php";


$sql= "INSERT INTO klant (email, adres)
       VALUES (:email, :adres);";


$query = $conn->prepare($sql);

$query->execute(
  [
      // 'id'=>$_POST['id'],
      'email'=>$_POST['email'],
      'adres'=>$_POST['adres'],
  ]
);
echo "<script>
alert('klant is toegevoegd');
location.replace('klanten.php'); </script>";

}


if(isset($_POST)){

}

?>


</body>
</html>
