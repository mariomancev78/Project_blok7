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
    <div class="content_home">
        <div class="content_home">
            <h1><? echo $result['naam']; ?></h1>
            <img src="images/<? echo $result['img_url']; ?>" alt="">
            <p><? echo $result['excerpt']; ?></p>
            <p><? echo $result['bereiding']; ?></p>
        </div>
        <a href="index.php">terug naar de home pagina</a>
    </div>
</body>

</html>