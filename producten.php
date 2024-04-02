<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strakke producten</title>
    <link rel="icon" href="img/pak.jpg" type="image/x-icon">
    <script src="code.js" defer></script>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body onload="option()">

<?php
include "nav.php" ;
include "connect.php" ;
$sql="SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result =$stmt->fetchALL(PDO::FETCH_ASSOC);
?>
<h1>Producten tabel.</h1>
    <div class="zoek">
    <label for="sort">sorteer op:</label>
    <select name="sort" id="kies" onchange="option()">
        <option value="merk">merk</option>
        <option value="naam">naam</option>
    </select>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek op" title="Type in a name">
    </div>
    <p class='voeg' ><a href='insert.php'>Product toevoegen.</a></p>
    <div class='producten'>
    <table border="1px" id="myTable" style="max-width: 100px;">
        <tr>
            <th>productid</th>
            <th>merk</th>
            <th>naam</th>
            <th onclick="sortTable()"><a class="prijs" >prijs</a></th>
            <th>wijzigen</th>
            <th>verwijderen</th>
        </tr>
</div>



<?php

foreach ($result as $row) {
    echo "<tr>";
    echo "<td>". $row['productid'] . "";
    echo "<td>". $row['merk'] . "";
    echo "<td>". $row['naam']. "";
    echo "<td  class='prijs' >€". $row['prijs']. "";
    echo "<td class='tdb' ><a class='button add' href='edit.php?productid=" . $row['productid'] ."'>" . "wijzig</a></td>";
    echo "<td class='tdb' ><a class='button delete' href='delete.php?productid=" . $row['productid'] ."'>" . "verwijder</a></td>";
    echo "</tr>";
    echo "</div>";
}

?>

</body>