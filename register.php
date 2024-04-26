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
<?php
include "nav.php" ;
try{

$db = new PDO("mysql:host=localhost;dbname=strak_in_pak", "root", "");
if(isset($_POST['regis'])){
    $password = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES('" . $_POST['gebruikersnaam'] . "', '" . $password . "')");
    if($query->execute()){
        echo "De nieuwe gebruiker is toegevoegd. <h3><a href='login.php'>Login</a></h3>";
    }
    else{
     echo "Er is iets fout gegaan.";
    }
}
}
catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>register</title>
</head>
<body>
    <h1>Registreren</h1>
    <form method="post" action="">
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="gebruikersnaam"require><br>
        <label>Wachtwoord:</label><br>
        <input type="password" name="wachtwoord"require><br>
        <input type="submit" name="regis" value="Register">
    </form>
    <a href="login.php">inloggen</a>
</body>
</html>