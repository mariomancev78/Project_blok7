<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn recepten</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require 'database.php';
    $sql = "SELECT * FROM RECEPT WHERE gebruiker_id = :gebruiker_id";
    $stmt = $dbcon->prepare($sql);
    $stmt->bindParam(':gebruiker_id', $_SESSION['gebruiker_id']);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
</head>

<body>
    <? require "blades/nav.php"; ?>
    <div class="dashboard">
        <table>
            <thead>
                <tr>
                    <td>
                        Naam recept
                    </td>
                    <td>
                        samenvatting
                    </td>
                    <td>
                        duur bereiding
                    </td>
                    <td>
                        menu_gang
                    </td>
                    <td>
                        url naar afbeelding
                    </td>
                    <td>
                        moeilijkheidsgraad
                    </td>
                </tr>
            </thead>
            <tbody>
                <? foreach ($stmt as $result) : ?>
                    <tr>
                        <td><? echo $result['naam']; ?></td>
                        <td><? echo $result['excerpt']; ?></td>
                        <td><? echo $result['bereidings_duur'] ?> </td>
                        <td><? echo $result['menu_gang']; ?></td>
                        <td><? echo $result['img_url']; ?></td>
                        <td><? echo $result['moeilijkheid']; ?></td>
                        <td class="button"> bewerk gerecht</td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
    <? require "blades/footer.php"; ?>
</body>

</html>