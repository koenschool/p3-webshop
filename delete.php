<?php
if($_SERVER['REQUEST_METHOD'] == "GET" &&
    isset($_GET['id'])){

        include "connect.php";

$sql= "
        DELETE FROM producten 
        WHERE id = :id";


$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        ':id'=>$_GET['id']
    ]
);

    if($stmt->rowCount() == 1){
        echo "<script>alert('Product is verijderd')</script>";
        echo "<script>location.replace('producten.php'); </script>";
    } else{
        echo '<script>alert("Product is NIET verwijderd")</scriptlocation.replace>';
    }


}

?>