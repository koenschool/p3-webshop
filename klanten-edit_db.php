<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

include "connect.php";


$sql= "UPDATE klant SET 
        email = :email,
        adres = :adres
    WHERE klantid = :klantid
    ";

$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        'klantid'=>$_POST['klantid'],
        'email'=>$_POST['email'],
        'adres'=>$_POST['adres'],
    ]
);
    if($stmt->rowCount() <= 1){
        echo "<script>alert('klant is gewijzigd')</script>";
        echo "<script>location.replace('klanten.php'); </script>";
    } else{
        echo '<script>alert("klant is NIET gewijzigd")</scriptlocation.replace>';
    }
    echo "<script>location.replace('klanten.php'); </script>";

}

?>