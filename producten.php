<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strak in pak</title>
    <script src="code.js" defer></script>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "nav.php" ;
include "connect.php" ;
$sql="SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result =$stmt->fetchALL(PDO::FETCH_ASSOC);
echo "<div class='producten'>";
echo '<label for="gebruikers">sorteer op:</label>
<select name="gebruikers" id="geb" onchange="gebupdate()">
  <option value="gebruiker1">Gebruiker 1</option>
  <option value="gebruiker2">Gebruiker 2</option>
  <option value="gebruiker3">Gebruiker 3</option>
  <option value="gebruiker4">Gebruiker 4</option>
  <option value="gebruiker5">Gebruiker 5</option>
  <option value="gebruiker6">Gebruiker 6</option>
</select>';
echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">';
echo "<table border=1px id='myTable'  style='max-width: 100px;'";
    echo "<tr>";
    echo "<th>". "id"."";
    echo "<th class='merk' onclick='sortTable()'>". "merk"."";
    echo "<th>". "naam"."";
    echo "<th>". "wijzigen"."";
    echo "<th>". "verijderen"."";
    echo "</tr>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>". $row['id'] . "";
    echo "<td>". $row['merk'] . "";
    echo "<td>". $row['naam']. "";
    echo "<td><a href='edit.php?id=" . $row['id'] ."'>" . "wijzig</a></td>";
    echo "<td><a href='delete.php?id=" . $row['id'] ."'>" . "verwijder</a></td>";
    echo "</tr>";
    echo "</div>";
}

?>

</body>