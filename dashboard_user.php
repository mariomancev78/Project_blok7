<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <? require "database.php";
    $sql = "SELECT * FROM GEBRUIKER";
    $conn = $dbcon->prepare($sql);
    $conn->execute();
    $result = $conn->fetchAll();
    ?>
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
    <? //require "blades/nav.php"; ?>
    <div class="dashboard">
        <table>
            <? foreach ($result as $row) : ?>
                <tr>
                    <td>gebruikersnaam</td>
                    <td><? echo $row['gebruikersnaam']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<? echo $row['id']; ?>">edit</a>
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><? echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>rol</td>
                    <td><? echo $row['rol']; ?></td>

                </tr>
            <? endforeach; ?>
        </table>
    </div>
</body>

</html>