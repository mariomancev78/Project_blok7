<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ingredienten</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require 'database.php'; ?>
</head>

<body>
    <? require 'blades/nav.php';
    $stmt = $dbcon->prepare("SELECT * FROM INGREDIENT");
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<div class="dashboard">
    <table>
        <thead>
            <tr>
                <td>Naam ingredient</td>
                <td>Type ingredient</td>
                <td>Pas ingredient aan</td>
            </tr>
        </thead>
        <tbody>
            <? foreach ($stmt as $result) : ?>
                <tr>
                    <td><? echo $result['name']; ?></td>
                    <td><? echo $result['type']; ?></td>
                    <td class="button" ><a href="edit_ingredienten.php?id=<? echo $result['id']; ?>">edit</a></td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
    <? require 'blades/footer.php'; ?>
</body>
</html>