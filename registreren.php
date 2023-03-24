<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
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
            echo "succesvol geregistreerd";
        } else {
            echo "er is iets fout gegaan";
        }
    endif;
    ?>
</head>

<body>
    <? require "blades/nav.php"; ?>
    <div class="content_home">
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="gebruikersnaam">gebruikersnaam</label>
                        <input type="text" name="gebruikersnaam">
                    </td>
                </tr>
                <tr>
                    <td><label for="wachtwoord">wachtwoord</label>
                        <input type="password" name="wachtwoord">
                    </td>
                </tr>
                <tr>
                    <td><label for="email">email</label>
                        <input type="text" name="email">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="login.php">inloggen</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>