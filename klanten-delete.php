<?php
if($_SERVER['REQUEST_METHOD'] == "GET" &&
    isset($_GET['klantid'])){

    include "connect.php";

$sql= "
       DELETE FROM klant 
       WHERE klantid = :klantid";


$stmt = $conn->prepare($sql);

$stmt->execute(
   [
       ':klantid'=>$_GET['klantid']
   ]
);

   if($stmt->rowCount() == 1){
       echo "<script>alert('klant is verijderd')</script>";
       echo "<script>location.replace('klanten.php'); </script>";
   } else{
       echo '<script>alert("klant is NIET verwijderd")</scriptlocation.replace>';
   }


}
?>