<?php

    if(isset($_GET['klantid'])){


        include "connect.php";        
        $sql="SELECT * FROM klant WHERE klantid = :klantid";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':klantid'=>$_GET['klantid']]);
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wijzig Klant</title>
  <link rel="icon" href="img/pak.jpg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>wijzig klant</h2>

<form action="klanten-edit_db.php" method="post">
<input type="number" id="klantid" name="klantid" required value="<?php echo $result['klantid']?>" hidden>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required value="<?php echo $result['email']?>"><br>

  <!-- <label for="id">ID:</label> -->

  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres" required value="<?php echo $result['adres']?>"><br>

  <input type="submit" name value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "er is gepost<br>";
include "connect.php";


$sql= "INSERT INTO klanten (klantid, email, adres)
       VALUES (:klantid, :email, :adres;";


$query = $conn->prepare($sql);

$query->execute(
    [
        'klantid'=>$_POST['klantid'],
        'email'=>$_POST['email'],
        'type'=>$_POST['adres'],
    ]
);

}

if(isset($_POST)){

}

?>

</body>
</html>
