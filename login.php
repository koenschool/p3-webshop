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
    session_start();
try{
    $db = new PDO("mysql:host=localhost;dbname=strak_in_pak","root", "");
    if(isset($_POST['inloggen'])){
        $username = filter_input(INPUT_POST, "gebruikersnaam",FILTER_SANITIZE_STRING);
        $password = $_POST['wachtwoord'];
        $query = $db->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = :user");
        $query->bindParam("user", $username);
        $query->execute();
        if($query->rowCount() == 1){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $result["wachtwoord"])){
                $_SESSION['gebruikersnaam'] = $username;
                
            }
            else{
                echo "Onjuiste gegevens!";
            }
        }
        else{
            echo "Gebruiker bestaat niet.";
        }
        echo "<br>";
    }
} catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="gebruikersnaam"require><br>
        <label>Wachtwoord:</label><br>
        <input type="password" name="wachtwoord"require><br>
        <input type="submit" name="inloggen" value="Inloggen">
    </form>
    <?php
    if(isset($_SESSION['gebruikersnaam'])){
        echo "U bent momenteel ingelogt als: " . $_SESSION['gebruikersnaam'];
     }
     else {
         echo "U bent niet ingelogt.";
     }
     ?>
     <br>
    <a href="register.php">Geen account?</a><br>
    <a href="logout.php">uitloggen</a>
</html>