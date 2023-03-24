<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Login</title>
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
        $rol = $result[0]['rol'];


        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['rol'] = $rol;
            if ($rol = "admin") {
                header("Location: index.php");
            } else {
                header("Location: login.php");
            }
        } else {
            echo "gebruikersnaam of wachtwoord is onjuist";
        }
    endif;
    ?>

<body>
    <? require "blades/nav.php"; ?>
    <div class="content_home">
        <form action="" method=post>
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
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="registreren.php">registreren</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>