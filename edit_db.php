<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

include "connect.php";


$sql= "UPDATE producten SET 
        merk = :merk,
        naam = :naam,
        prijs = :prijs
    WHERE id = :id
    ";

$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        'id'=>$_POST['id'],
        'merk'=>$_POST['merk'],
        'naam'=>$_POST['naam'],
        'prijs'=>$_POST['prijs']
    ]
);
    if($stmt->rowCount() == 1){
        echo "<script>alert('Product is gewijzigd')</script>";
        echo "<script>location.replace('producten.php'); </script>";
    } else{
        echo '<script>alert("Product is NIET gewijzigd")</scriptlocation.replace>';
    }
    echo "<script>location.replace('producten.php'); </script>";

}

?>