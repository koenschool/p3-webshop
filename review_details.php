<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>ingevulde gegevens</h2>
    <p><strong>Naam:</strong> <?php echo $_POST['naam']; ?></p>
    <p><strong>Email:</strong> <?php echo $_POST['email']; ?></p>
    <p><strong>Telefoonnummer:</strong> <?php echo $_POST['telefoonnummer']; ?></p>
    <p><strong>Geselecteerd product:</strong> <?php echo $_POST['productid']; ?></p>
    <p><strong>Bericht:</strong><br><?php echo $_POST['bericht']; ?></p>
    <a href="webshophome.php">Naar home</a>
</body>
</html>