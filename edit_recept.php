<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk recept</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require 'database.php';
    $sql_recept = $dbcon->prepare("SELECT * FROM RECEPT WHERE id = :recept_id");
    $sql_recept->bindParam(':recept_id', $_GET['id']);
    $sql_recept->execute();
    $sql_recept = $sql_recept->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {
        $sql = $dbcon->prepare("UPDATE RECEPT SET naam = :naam, menu_gang = :menu_gang, bereidings_duur = :bereidings_duur, excerpt = :excerpt, moeilijkheid = :moeilijkheid WHERE id = :recept_id");
        $sql->bindParam(':naam', $_POST['naam']);
        $sql->bindParam(':menu_gang', $_POST['menu_gang']);
        $sql->bindParam(':bereidings_duur', $_POST['bereidings_duur']);
        $sql->bindParam(':excerpt', $_POST['excerpt']);
        $sql->bindParam(':moeilijkheid', $_POST['moeilijkheid']);
        $sql->bindParam(':recept_id', $_GET['id']);
        $sql->execute();
        header('Location: dashboard_recepten.php');
    }
    ?>

</head>

<body>
    <? require 'blades/nav.php'; ?>
    <div class="containter_login_register">
        <form method="post">
            <label for="naam">Naam recept</label>
            <input type="text" name="naam" id="naam" value="<? echo $sql_recept['naam']; ?>">
            <label for="menu_gang">Menu gang</label>
            <select name="menu_gang" id="menu_gang">
            <option value="ontbijt">ontbijt</option>
                <option value="lunch">lunch</option>
                <option value="voorgerecht">Voorgerecht</option>
                <option value="hoofdgerecht">Hoofdgerecht</option>
                <option value="nagerecht">Nagerecht</option>
            </select>
            <label for="bereidings_duur">Bereidings duur</label>
            <input type="text" name="bereidings_duur" id="bereidings_duur" value="<? echo $sql_recept['bereidings_duur']; ?>">
            <label for="excerpt">excerpt</label>
            <textarea name="excerpt" id="excerpt" cols="30" rows="10"><? echo $sql_recept['excerpt']; ?></textarea>
            <label for="moeilijkheid">Moeilijkheid</label>
            <select name="moeilijkheid" id="moeilijkheid">
                <option value="easy">Makkelijk</option>
                <option value="medium">Gemiddeld</option>
                <option value="hard">>Moeilijk </option>
            </select>
            <label for="bereiding">bereiding</label>
            <textarea name="bereiding" id="bereiding" cols="30" rows="10"><? echo $sql_recept['bereiding']; ?></textarea>
            <input type="hidden" name="id" value="<? echo $_GET['id']; ?>">
            <input type="submit" value="bewerk recept" name="submit">
        </form>
</body>

</html>