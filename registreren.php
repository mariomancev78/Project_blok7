<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
    $succes = null;
    if (isset($_POST['submit'])) :
        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $email = $_POST['email'];
        $rol = "user";

        $stmt = $dbcon->prepare("INSERT INTO GEBRUIKER (rol, gebruikersnaam, wachtwoord, email) VALUES (:rol, :gebruikersnaam, :wachtwoord, :email)");
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            $succes = true;
        } else {
            $succes = false;
        }
    endif;
    ?>
</head>

<body>
    <? require "blades/nav.php"; ?>
    <div class="containter_login_register">
        <form method="post">
            <label for="gebruikersnaam">gebruikersnaam</label>
            <input type="text" name="gebruikersnaam">
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" name="wachtwoord">
            <label for="email">email</label>
            <input type="email" name="email">
            <input type="submit" value="submit" name="submit">
            <a href="login.php">inloggen</a>
            <?
            if (isset($_POST['submit'])) {
                if ($succes == true) {
                    echo "succesvol geregistreerd";
                } else {
                    echo "er is iets fout gegaan";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>