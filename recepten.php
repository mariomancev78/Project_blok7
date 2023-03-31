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

    if(isset($_GET['submit'])){
         $type = $_GET['type'];
         $duur = $_GET['duur'];
         $skill = $_GET['skill'];
         $search = $_GET['search'];
        $sql = "SELECT * FROM RECEPT WHERE 1";
         $parameters =[];
         if(!empty($_GET['type'])){
             $sql .=" AND menu_gang = ?";
             $parameters[] =$type;
         };
         if(!empty($_GET['duur'])){
             $sql .=" AND bereidings_duur <= ?";
             $parameters[] =$duur;
         };
         if(!empty($_GET['skill'])){
             $sql .=" AND moeilijkheid = ?";
             $parameters[] =$skill;
         };
         if(!empty($_GET['search'])){
             $sql .=" AND naam LIKE ?";
             $parameters[] ="%".$search."%";
         };
        
        $stmt = $dbcon->prepare($sql);
        $stmt->execute($parameters);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

    }
?>



</head>

<body>
    <? require 'blades/nav.php'; ?>

    <div class="recepten_hero">
        <div class="recepten_hero_text">
            <h1>our recipes</h1>
        </div>
    </div>
    <form method="get">
    <div class="recepten_main">
        <div class="recept_fiterbar">
                <div class="filterbar_section1">
                    <h3>type gerecht</h3>
                    <select name="type" id="type">
                        <option value="" selected>alle gerechten</option>
                        <option value="ontbijt">ontbijt</option>
                        <option value="lunch">lunch</option>
                        <option value="voorgerecht">voorgerecht</option>
                        <option value="hoofdgerecht">hoofdgerecht</option>
                        <option value="nagerecht">nagerecht</option>
                        <option value="bijgerecht">bijgerecht</option>
                    </select>
                </div>
                <div class="filterbar_section2">
                    <h3>duur bereiding</h3>
                    <select name="duur" id="duur">
                        <option value="" selected>alle mogelijkheden</option>
                        <option value="15">15 minuten of minder</option>
                        <option value="30">maximaal 30 minuten</option>
                        <option value="45">maximaal 45 minuten</option>
                        <option value="60">maximaal 60 minuten</option>
                        <option value="60+">60+ minuten</option>
                    </select>
                </div>

                <div class="filterbar_section3">
                    <h3>skill level</h3>
                    <select name="skill" id="skill">
                        <option value="" selected>alle</option>
                        <option value="easy">easy</option>
                        <option value="medium">medium</option>
                        <option value="hard">hard</option>
                    </select>
                </div>

                <div class="filterbar_section4">
                    <h3>Zoeken:</h3>
                    <input type="text" name="search" id="search">
                </div>
                <div class="filterbar_section5">
                    <button type="submit" name="submit">Zoeken</button>
                </div>
            </form>
        </div>
        <div class="recepten_container">
            <?
            foreach ($stmt as $recept) {
                echo "<div class='recepten_card'>";
                echo "<div class='recepten_card_section1'>";
                echo "<a href='recept.php?id=" . $recept['id'] . "'><img src='images/" . $recept['img_url'] . "' alt=''></a>";
                echo "</div>";
                echo "<div class='recepten_card_section2'>";
                echo "<h3>" . $recept['naam'] . "</h3>";
                echo "<p>" . $recept['excerpt'] . "</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <? require 'blades/footer.php'; ?>
</body>

</html>