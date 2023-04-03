<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit ingredient</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require "database.php";
    $sql = "SELECT * FROM INGREDIENT WHERE id = :id";
    $id = $_GET['id'];
    $conn = $dbcon->prepare($sql);
    $conn->bindParam(":id", $id);
    $conn->execute();
    $result = $conn->fetchAll();

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM INGREDIENT WHERE id = :id";
        $conn = $dbcon->prepare($sql);
        $conn->bindParam(":id", $id);
        $conn->execute();
        header("Location: dashboard_ingredient.php");
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $sql = "UPDATE INGREDIENT SET name = :name, type = :type WHERE id = :id";
        $conn = $dbcon->prepare($sql);
        $conn->bindParam(":id", $id);
        $conn->bindParam(":name", $_POST['name']);
        $conn->bindParam(":type", $_POST['type']);
        $conn->execute();
        header("Location: dashboard_ingredienten.php");
    }
    ?>
</head>

<body>
    <? require "blades/nav.php"; ?>
    <? foreach ($result as $row) : ?>
        <div class="containter_login_register">
            <form action="" method="post">
                <input type="hidden" name="id" value="<? echo $row['id']; ?>">
                <label for="name">Naam ingredient</label>
                <input type="text" name="name" value="<? echo $row['name']; ?>">
                <label for="type">Type ingredient</label>
                <select name="type" id="type">
                    <option value="fruit">fruit</option>
                    <option value="groente">groente</option>
                    <option value="vlees">vlees</option>
                    <option value="vis">vis</option>
                    <option value="zuivel">zuivel</option>
                    <option value="kruiden">kruiden</option>
                    <option value="specerijen">specerijen</option>
                    <option value="brood">brood</option>
                    <option value="aardappel">aardappel</option>
                    <option value="pasta">pasta</option>
                    <option value="rijst">rijst</option>
                    <option value="noot">noot</option>
                    <option value="sauzen">sauzen</option>
                    <option value="olie">olie</option>
                    <option value="vet">vet</option>
                    <option value="water">water</option>
                    <option value="alcohol">alcohol</option>
                    <option value="andere">andere</option>
                </select>
                <input type="submit" name="update" value="update">
                <input type="submit" name="delete" value="delete">
            </form>
        <? endforeach ?>
        </div>
</body>

</html>