<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recept</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
    $stmt = $dbcon->prepare("SELECT * FROM RECEPT WHERE id = :id");
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

</head>

<body>
    <? require "blades/nav.php"; ?>
    <div class="recept_main">
        <div class="recept_container">
            <div class="recept_col1">
            
                <h1><? echo $result['naam']; ?></h1>
                <img src="images/<? echo $result['img_url']; ?>" alt="recept afbeelding">
                <p><? echo $result['excerpt']; ?></p>
                <ul>
                    <li><? echo $result['bereidings_duur']; ?></li>
                    <li><? echo $result['menu_gang']; ?></li>
                    <li><? echo $result['moeilijkheid']; ?></li>
                </ul>
            </div>
            <div class="recept_col2">
                <h1>bereidingswijze</h1>
                <p><? echo $result['bereiding']; ?></p>
            </div>
            <div class="recept_col3">
            </div>

        </div>
    </div>
    <? require "blades/footer.php"; ?>
</body>

</html>