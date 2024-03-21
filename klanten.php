<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>klanten</title>
    <link rel="icon" href="img/pak.jpg" type="image/x-icon">
    <script defer src="code.js"></script>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>
<?php 
    include "nav.php";
    include "connect.php" ;
    $sql="SELECT * FROM klant";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result =$stmt->fetchALL(PDO::FETCH_ASSOC);
    echo "<div class='producten'>";
    echo "<p><a class='voeg' href='klanten-insert.php'>Klant toevoegen.</a></p>";
    echo "<table border=1px id='myTable'  style='max-width: 100px;'";
    echo "<tr>";
    echo "<th>". "klant"."";
    echo "<th>". "email"."";
    echo "<th>". "adres"."";
    echo "<th>". "wijzigen"."";
    echo "<th>". "verwijderen"."";
    echo "</tr>";
    foreach ($result as $row) { 
    echo "<tr>";
    echo "<td>". $row['klantid'] . "";
    echo "<td>". $row['email'] . "";
    echo "<td>". $row['adres']. "";
    echo "<td><a href='klanten-edit.php?klantid=" . $row['klantid'] ."'>" . "wijzig</a></td>";
    echo "<td><a href='klanten-delete.php?klantid=" . $row['klantid'] ."'>" . "verwijder</a></td>";
    echo "</tr>";
    echo "</div>";
}


?>
</body>