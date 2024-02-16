<?php

    if(isset($_GET['id'])){


        include "connect.php";        
        echo "mijn is is: ". $_GET['id']. "<br>";
        $sql="SELECT * FROM fietsen WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$_GET['id']]);
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>weizig fiets</title>
  <link rel="stylesheet" href="allcss.css">
</head>
<body>

<h2>wijzig fiets</h2>

<form action="edit_db.php" method="post">
  <label for="merk">Merk:</label>
  <input type="text" id="merk" name="merk" required value="<?php echo $result['merk']?>"><br>

  <!-- <label for="id">ID:</label> -->
  <input type="number" id="id" name="id" required value="<?php echo $result['id']?>" hidden>

  <label for="type">Type:</label>
  <input type="text" id="type" name="type" required value="<?php echo $result['type']?>"><br>

  <label for="prijs">Prijs:</label>
  <input type="number" id="prijs" name="prijs" required value="<?php echo $result['prijs']?>"><br>

  <label for="foto">Foto:</label>
  <input type="text" id="foto" name="foto" required value="<?php echo $result['foto']?>"><br>

  <input type="submit" name value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "er is gepost<br>";
include "connect.php";


$sql= "INSERT INTO feitsen (merk, type, prijs, foto)
       VALUES (:merk, :type, :prijs, :foto);";


$query = $conn->prepare($sql);

$query->execute(
    [
        'merk'=>$_POST['merk'],
        'type'=>$_POST['type'],
        'prijs'=>$_POST['prijs'],
        'foto'=>$_POST['foto'],
        'id'=>$_POST['id']
    ]
);


}


if(isset($_POST)){

}

?>


</body>
</html>
