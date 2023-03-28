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
    <? require "blades/nav.php";
    ?>
    <div class="dashboard">
        <table>
            <thead>
                <tr>
                    <td>gebruikersnaam</td>
                    <td>email</td>
                    <td>rol</td>
                    <td>Pas gebruiker aan</td>
                </tr>
            </thead>
            <tbody>

                <? foreach ($result as $row) : ?>
                    <tr>
                        <td><? echo $row['gebruikersnaam']; ?></td>
                        <td><? echo $row['email']; ?></td>
                        <td><? echo $row['rol']; ?></td>
                        <td class="button" ><a href="edit_user.php?id=<? echo $row['id']; ?>">edit</a></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>