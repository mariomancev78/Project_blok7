<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recepten</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <? require 'database.php';
        $stmt = $dbcon->prepare("SELECT * FROM RECEPT");
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?> 
    </head>
<body>
    <? require 'blades/nav.php'; ?>
    <div class="content_home">
        <h1>Recepten</h1>
        <div class="recepten">
            <? foreach ($stmt as $result) { ?>
                <div class="recept">
                    <h2><? echo $result['naam']; ?></h2>
                    <img src="images/<? echo $result['img_url']; ?>" alt="afbeelding">
                    <p><? echo $result['excerpt']; ?></p>
                    <a href="recept.php?id=<? echo $result['id']; ?>">Lees meer</a>
                </div>
            <? } ?>
        </div>
</body>
</html>