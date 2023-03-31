<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recept</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
    $stmt = $dbcon->prepare("SELECT * FROM `RECEPT`
    JOIN `INGREDIENTEN_RECEPT` ON `INGREDIENTEN_RECEPT`.`recept_id` = `RECEPT`.`id`
    JOIN `INGREDIENT` ON `INGREDIENT`.`id` = `INGREDIENTEN_RECEPT`.`ingedient_id`
    WHERE `RECEPT`.`id` = :id;
    ");
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $ook_interessant = $dbcon->prepare("SELECT * FROM `RECEPT` WHERE id != :id ORDER BY RAND() LIMIT 3; ");
    $ook_interessant->bindParam(":id", $_GET['id']);
    $ook_interessant->execute();
    $oi_str = $ook_interessant->fetchAll(PDO::FETCH_ASSOC);
    ?>

</head>

<body>
    <? require "blades/nav.php"; ?>
    <div class="recept_main">
        <div class="recept_container">
            <div class="recept_col1">

                <h1><? echo $result[0]['naam']; ?></h1>
                <img src="images/<? echo $result[0]['img_url']; ?>" alt="recept afbeelding">
                <p><? echo $result[0]['excerpt']; ?></p>
                <ul>
                    <li><? echo $result[0]['bereidings_duur']; ?></li>
                    <li><? echo $result[0]['menu_gang']; ?></li>
                    <li><? echo $result[0]['moeilijkheid']; ?></li>
                </ul>
            </div>
            <div class="recept_col2">
                <h1>bereidingswijze</h1>

                <? $seperate_lines =  $result[0]['bereiding'];
                $str = explode('. ', $seperate_lines,);

                foreach ($str as $line) : ?>
                    <p> <? echo $line ?> </p>
                <? endforeach; ?>
            </div>
            <div class="recept_col3">
                <h1>ingredienten</h1>
                <table>

                    <? foreach ($result as $ingredient) : ?>
                        <tr>
                            <td><? echo $ingredient['name']; ?></td>
                            <td><? echo $ingredient['hoeveelheid']; ?></td>
                        </tr>

                    <? endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    <div class="ook_interessant">
        <div class="title_oi">
            <h1>ook interessant</h1>
            <a href="recepten.php">terug naar recepten</a>
        </div>
        <div class="ook_interessant_container">
            <? foreach ($oi_str as $oi) : ?>
                <div class="recept_suggestie">
                    <img src="images/<? echo $oi['img_url']; ?>" alt="recept afbeelding">
                    <h2><? echo $oi['naam']; ?></h2>
                    <p><? echo $oi['excerpt']; ?></p>
                    <a href="recept.php?id=<? echo $oi['id']; ?>">bekijk recept</a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
    </div>
    <? require "blades/footer.php"; ?>
</body>

</html>