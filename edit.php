<?php

    if(isset($_GET['id'])){


        include "connect.php";        
        $sql="SELECT * FROM producten WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$_GET['id']]);
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wijzig Product</title>
  <link rel="icon" href="img/pak.jpg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>wijzig product</h2>

<form action="edit_db.php" method="post">
<input type="number" id="id" name="id" required value="<?php echo $result['id']?>" hidden>

  <label for="merk">Merk:</label>
  <input type="text" id="merk" name="merk" required value="<?php echo $result['merk']?>"><br>

  <!-- <label for="id">ID:</label> -->

  <label for="naam">Naam:</label>
  <input type="text" id="naam" name="naam" required value="<?php echo $result['naam']?>"><br>

  <label for="prijs">Prijs:</label>
  <input type="number" id="prijs" name="prijs" required value="<?php echo $result['prijs']?>"><br>

  <input type="submit" name value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "er is gepost<br>";
include "connect.php";


$sql= "INSERT INTO producten (id, merk, naam, prijs)
       VALUES (:id, :merk, :naam, :prijs);";


$query = $conn->prepare($sql);

$query->execute(
    [
        'id'=>$_POST['id'],
        'merk'=>$_POST['merk'],
        'type'=>$_POST['naam'],
        'prijs'=>$_POST['prijs']
    ]
);

}


if(isset($_POST)){

}

?>


</body>
</html>
