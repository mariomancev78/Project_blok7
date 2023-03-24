<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Home</title>
    <? require "database.php";
    $stmt = $dbcon->prepare("SELECT * FROM RECEPT");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['gebruikersnaam']);
        header("Location: index.php");
    }
    ?>
</head>

<body>
    <? require "blades/nav.php"; ?>

    <div class="hero">
        <div class="hero_text">
            <h1>welcome to kibbee</h1>
           <h2>your online recipe book</h2>
        </div>
        <div class="buttons">
            <a href="recepten.php">sign up and get started</a>
            <p>Or alternatively<a href="recepten.php">log in</a>
        </div>
    </div>















    <div class="content_home">
        <h1>Home</h1>
        <h2> Alles in het leven draait om lekker eten</h2>
        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto consequatur mollitia, minus labore molestias similique natus deleniti blanditiis reprehenderit. Dolorem porro, nobis sed pariatur ipsa alias ratione sequi magnam non?</p>
        <h2>Bekijk onze recepten:</h2>
        <div class="recept_container">
            <?
            foreach ($result as $recept) {
                echo "<div class='recept'>";
                echo "<h2>" . $recept['naam'] . "</h2>";
                echo "<img src='images/" . $recept['img_url'] . "' alt=''>";
                echo "<p>" . $recept['excerpt'] . "</p>";
                echo "<a href='recept.php?id=" . $recept['id'] . "'>Bekijk recept</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>