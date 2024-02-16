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
echo "<div class='producten'>";
echo "<p><a class='voeg' href='insert.php'>Product toevoegen.</a></p>";
echo '<label for="sort">sorteer op:</label>
<select name="sort" id="kies" onchange="option()">
  <option value="merk">merk</option>
  <option value="naam">naam</option>
</select>';
echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek op" title="Type in a name">';
echo "<table border=1px id='myTable'  style='max-width: 100px;'";
    echo "<tr>";
    echo "<th>". "id"."";
    echo "<th class='merk' onclick='sortTable()'>". "merk"."";
    echo "<th>". "naam"."";
    echo "<th>". "prijs"."";
    echo "<th>". "wijzigen"."";
    echo "<th>". "verijderen"."";
    echo "</tr>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>". $row['id'] . "";
    echo "<td>". $row['merk'] . "";
    echo "<td>". $row['naam']. "";
    echo "<td>". $row['prijs']. "";
    echo "<td><a href='edit.php?id=" . $row['id'] ."'>" . "wijzig</a></td>";
    echo "<td><a href='delete.php?id=" . $row['id'] ."'>" . "verwijder</a></td>";
    echo "</tr>";
    echo "</div>";
}

?>

</body>