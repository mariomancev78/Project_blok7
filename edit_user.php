<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
    $sql = "SELECT * FROM GEBRUIKER WHERE id = :id";
    $conn = $dbcon->prepare($sql);
    $conn->bindParam(":id", $_GET['id']);
    $conn->execute();
    $result = $conn->fetchAll();

    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM GEBRUIKER WHERE id = :id";
        $conn = $dbcon->prepare($sql);
        $conn->bindParam(":id", $_GET['id']);
        $conn->execute();
        header("Location: dashboard.php");
    }
    ?>
</head>
<body>
    <? require "blades/nav.php"; ?>
    <? foreach ($result as $row) : ?>
        <div class="content_home">
            <form action="update_user.php" method="post">
                <input type="hidden" name="id" value="<? echo $row['id']; ?>">
                <label for="gebruikersnaam">gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" value="<? echo $row['gebruikersnaam']; ?>">
                <label for="email">email</label>
                <input type="text" name="email" value="<? echo $row['email']; ?>">
                <input type="text" name="wachtwoord" value="<? echo $row['wachtwoord']; ?>">
                <input type="submit" value="update">
                <input type="button" value="delete" name="delete">
            </form>
        <? endforeach ?>
        </div>
</body>
</html>