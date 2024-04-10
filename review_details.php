<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenreview Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "nav.php" ?>
    <h2>Klantenreview Details</h2>
    <div>
        <h3>Ingevulde gegevens:</h3>
        <?php
            // Gegevens ophalen uit de querystring
            $naam = $_GET['naam'];
            $productid = $_GET['productid'];
            $email = $_GET['email'];
            $telefoonnummer = $_GET['telefoonnummer'];
            $bericht = $_GET['bericht'];

            // Gegevens weergeven
            echo "<p><strong>Naam:</strong> $naam</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Telefoonnummer:</strong> $telefoonnummer</p>";

            // Productnaam ophalen uit de database
            include "connect.php";
            $sql = "SELECT naam FROM producten WHERE productid = :productid";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['productid' => $productid]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($product) {
                echo "<p><strong>Geselecteerd product:</strong> " . $product['naam'] . "</p>";
            }

            echo "<p><strong>Bericht:</strong> $bericht</p>";
        ?>
    </div>
</body>
</html>
