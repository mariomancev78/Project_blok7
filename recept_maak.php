<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak een recept</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require 'database.php'; ?>
</head>

<body>
    <? require 'blades/nav.php'; ?>
    <div class="recepten_hero">
        <div class="recepten_hero_text">
            <h1>Maak een recept</h1>
        </div>
    </div>
    <div class="recepten_main">
        <div class="recepten_main_content">
            <div class="recepten_main_content_form">
                <form method="post">
                    <div class="recepten_main_content_form_section1">
                        <h3>Recept informatie</h3>
                        <label for="naam">Naam</label>
                        <input type="text" name="naam" id="naam" required>
                        <label for="menu_gang">Menu gang</label>
                        <select name="menu_gang" id="menu_gang" required>
                            <option value="ontbijt">ontbijt</option>
                            <option value="lunch">lunch</option>
                            <option value="voorgerecht">voorgerecht</option>
                            <option value="hoofdgerecht">hoofdgerecht</option>
                            <option value="nagerecht">nagerecht</option>
                            <option value="bijgerecht">bijgerecht</option>
                        </select>
                        <label for="bereidings_duur">Bereidings duur</label>
                        <input type="number" name="bereidings_duur" id="bereidings_duur" required>
                        <label for="moeilijkheid">Moeilijkheid</label>
                        <select name="moeilijkheid" id="moeilijkheid" required>
                            <option value="makkelijk">makkelijk</option>
                            <option value="gemiddeld">gemiddeld</option>
                            <option value="moeilijk">moeilijk</option>
                        </select>
                        <label for="aantal_personen">Aantal personen</label>
                        <input type="number" name="aantal_personen" id="aantal_personen" required>
                        <label for="ingredienten">Ingredienten</label>
                        <textarea name="ingredienten" id="ingredienten" cols="30" rows="10" required></textarea>
                        <label for="bereidingswijze">Bereidingswijze</label>
                        <textarea name="bereidingswijze" id="bereidingswijze" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="recepten_main_content_form_section2">
                        <h3>Recept foto</h3>
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" required>
                    </div>
                </form>    
            </div>    
        </div>    
    </div>                
</body>

</html>