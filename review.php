<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenreview</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
</head>
<body>
<?php include "nav.php" ?>
    <h2>Voer uw klantenreview in</h2>
    <form  method="POST">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="telefoonnummer">Telefoonnummer:</label><br>
        <input type="tel" id="telefoonnummer" name="telefoonnummer" required><br><br>
        
        <label for="productid">Selecteer een product:</label><br>
        <select id="productid" name="productid" required>
            <option value="" disabled selected>Kies een product</option>
            <?php
                include "connect.php";

                $sql = "SELECT productid, naam FROM producten";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($result) {
                    foreach ($result as $row) {
                        echo "<option value='" . $row["productid"] . "'>" . $row["naam"] . "</option>";
                    }
                }
                ?>
        </select><br><br>
        
        <label for="bericht">Bericht:</label><br>
        <textarea id="bericht" name="bericht" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Verzenden">
    </form>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $naam = $_POST['naam'];
    $productid = $_POST['productid'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $bericht = $_POST['bericht'];

    // SQL-query om gegevens in te voegen
    $sql = "INSERT INTO klanteklacht (naam, productid, email, telefoonnummer, bericht) VALUES (:naam, :productid, :email, :telefoonnummer, :bericht)";
    $query = $conn->prepare($sql);

    // Uitvoeren van de query
    $query->execute([
        'naam' => $naam,
        'productid' => $productid,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'bericht' => $bericht
    ]);

    // Doorsturen naar review_details.php met de ingevulde gegevens
    header("Location: review_details.php?naam=$naam&productid=$productid&email=$email&telefoonnummer=$telefoonnummer&bericht=$bericht");
    exit();
}
    ?>

</body>
</html>