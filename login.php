<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Login</title>
</head>
    <?
    require 'database.php';

    if (isset($_POST['submit'])) :

        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];

        $stmt = $dbcon->prepare("SELECT * FROM GEBRUIKER WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");

        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['rol'] = $result[0]['rol'];
            $_SESSION['gebruiker_id'] = $result[0]['id'];

            if ($rol = "admin") {
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
        } else {
            echo "gebruikersnaam of wachtwoord is onjuist";
        }
    endif;
    ?>

<body>
    <? require "blades/nav.php"; ?>
    <div class="containter_login_register">
        <form action="" method=post>
            <label for="gebruikersnaam">gebruikersnaam</label>
            <input type="text" name="gebruikersnaam">
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" name="wachtwoord">
            <input type="submit" value="submit" name="submit"></td>
            <a href="registreren.php">registreren</a></td>
        </form>
    </div>
</body>

</html>