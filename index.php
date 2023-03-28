<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Home</title>
    <? require "database.php";
    $stmt = $dbcon->prepare("SELECT * FROM RECEPT LIMIT 2");
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
        <div class="container_hero1">
            <div class="hero_text">
                <h1>welcome to <span> kibbee</span> </h1>
                <h2>your online recipe book</h2>
            </div>
            <div class="buttons">
                <a href="registreren.php">sign up and get started</a>
                <h2>Or alternatively</h2><a href="login.php">log in</a>
            </div>
        </div>
        <div class="hero_img">
            <img src="design/logo.svg" alt="logo">
        </div>
    </div>

    <div class="main">
        <div class="containter_main1">
            <h1> <span>kibbe </span> makes managing your recipes</h1>
            <ul>
                <li>Easy and fun</li>
                <li>Accesible for everyone</li>
                <li>Managable by showing you recipes based on skill level</li>
            </ul>
            <h3>This is what our customers say about us</h3>
            <div class="testimonials">
               
            </div>

        </div>
        <div class="container_main2">
            <h3>Check out our recipes</h3>
            <div class="recipe_container">
                <?
                foreach ($result as $recept) {
                    echo "<div class='recept'>";
                    echo "<a href='recept.php?id=" . $recept['id'] . "'><h2>" . $recept['naam'] . "</h2></a>";
                    echo "<a href='recept.php?id=" . $recept['id'] . "'><img src='images/" . $recept['img_url'] . "' alt=''></a>";
                    echo "<p>" . $recept['excerpt'] . "</p>";
                    echo "</div>";
                }
                ?>
                <div class="see_all">
                    <a href="recipes.php">
                        <ul>
                            <li><a href="recepten.php">see all recipes</a></li>
                            <li><a href="recepten.php">
                                    <div class="arrow">
                                </a>
                            </li>
                        </ul>
                </div>
                </a>
            </div>
        </div>

    </div>

    </div>
    <? require "blades/footer.php"; ?>
</body>

</html>