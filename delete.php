<?php
if($_SERVER['REQUEST_METHOD'] == "GET" &&
    isset($_GET['productid'])){

        include "connect.php";

$sql= "
        DELETE FROM producten 
        WHERE productid = :productid";


$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        ':productid'=>$_GET['productid']
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