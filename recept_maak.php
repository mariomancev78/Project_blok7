<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak een recept</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <? require 'database.php';
    
    if(isset($_POST['submit'])){

        $naam = $_POST['naam'];
        $menu_gang = $_POST['menu_gang'];
        $bereidings_duur = $_POST['bereidings_duur'];
        $moeilijkheid = $_POST['moeilijkheid'];
        $bereidingswijze = $_POST['bereidingswijze'];
        $excerpt = $_POST['samenvatting'];
        $img_url = "injera.png";
        $gebruiker_id = $_SESSION['gebruiker_id'];

        $ingredient_naam = $_POST['input-1'];
        $ingredient_type = $_POST['select-1'];

       
        
        $stmt_recept = $dbcon->prepare("INSERT INTO RECEPT (gebruiker_id,naam, excerpt, menu_gang, bereidings_duur, moeilijkheid, img_url, bereiding) VALUES (:gebruiker_id, :naam,:excerpt, :menu_gang, :bereidings_duur, :moeilijkheid, :img_url, :bereiding)");
        $stmt_recept -> bindParam(':gebruiker_id', $gebruiker_id);
        $stmt_recept -> bindParam(':naam', $naam);
        $stmt_recept -> bindParam(':excerpt', $excerpt);
        $stmt_recept -> bindParam(':menu_gang', $menu_gang);
        $stmt_recept -> bindParam(':bereidings_duur', $bereidings_duur);
        $stmt_recept -> bindParam(':moeilijkheid', $moeilijkheid);
        $stmt_recept -> bindParam(':img_url', $img_url);
        $stmt_recept -> bindParam(':bereiding', $bereidingswijze);

        $stmt_recept->execute();

        $stmt_ingredienten = $dbcon->prepare("INSERT INTO INGREDIENT (name,type) VALUES (:naam,:type)");
        $stmt_ingredienten -> bindParam(':naam', $ingredient_naam);
        $stmt_ingredienten -> bindParam(':type', $ingredient_type);

        $stmt_ingredienten->execute();

        for($i = 2; $i <= 10; $i++){
            if(isset($_POST['input-'.$i])){
                $naam = $_POST['input-'.$i];
                $type = $_POST['select-'.$i];
                $stmt_ingredienten -> bindParam(':naam', $naam);
                $stmt_ingredienten -> bindParam(':type', $type);
                $stmt_ingredienten->execute();
            }
        }

     
        header('Location: recepten.php');
    }
  


    ?>
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
                        <input type="text" name="naam" id="naam">
                        <label for="menu_gang">Menu gang</label>
                        <select name="menu_gang" id="menu_gang">
                            <option value="ontbijt">ontbijt</option>
                            <option value="lunch">lunch</option>
                            <option value="voorgerecht">voorgerecht</option>
                            <option value="hoofdgerecht">hoofdgerecht</option>
                            <option value="nagerecht">nagerecht</option>
                            <option value="bijgerecht">bijgerecht</option>
                        </select>
                        <button id="add-input-btn" value="voeg_toe" type="button">Add Input</button>
                        <div id="input-container"></div>

                        <script>
                            const addInputBtn = document.getElementById('add-input-btn');
                            const inputContainer = document.getElementById('input-container');

                            let inputCount = 1;

                            addInputBtn.addEventListener('click', function() {

                                const label_naam = document.createElement('label');
                                const input_naam = document.createElement('input');


                                const label_select = document.createElement('label');
                                const select = document.createElement('select');
                                const option_groente = document.createElement('option');
                                const option2_fruit = document.createElement('option');
                                const option3_graan = document.createElement('option');
                                const option4_vlees = document.createElement('option');
                                const option5_vis = document.createElement('option');
                                const option6_kruiden = document.createElement('option');
                                const option7_water = document.createElement('option');
                                const option8_olie = document.createElement('option');

                                const input_hoeveelheid = document.createElement('input');
                                const label_hoeveelheid = document.createElement('label');


                                label_naam.setAttribute('for', `input-${inputCount}`);
                                label_naam.setAttribute('name', `label-${inputCount}`);
                                label_naam.innerHTML = `ingredient${inputCount}`;

                                input_naam.setAttribute('type', 'text');
                                input_naam.setAttribute('name', `input-${inputCount}`);

                                label_select.setAttribute('for', `select-${inputCount}`);
                                label_select.setAttribute('name', `label-${inputCount}`);
                                label_select.innerHTML = `type:`;

                                select.setAttribute('name', `select-${inputCount}`);
                                select.setAttribute('id', `select-${inputCount}`);


                                option_groente.setAttribute('value', 'groente');
                                option_groente.innerHTML = 'groente';

                                option2_fruit.setAttribute('value', 'fruit');
                                option2_fruit.innerHTML = 'fruit';

                                option3_graan.setAttribute('value', 'graan');
                                option3_graan.innerHTML = 'graan';

                                option4_vlees.setAttribute('value', 'vlees');
                                option4_vlees.innerHTML = 'vlees';

                                option5_vis.setAttribute('value', 'vis');
                                option5_vis.innerHTML = 'vis';

                                option6_kruiden.setAttribute('value', 'kruiden');
                                option6_kruiden.innerHTML = 'kruiden';

                                option7_water.setAttribute('value', 'water');
                                option7_water.innerHTML = 'water';

                                option8_olie.setAttribute('value', 'olie');
                                option8_olie.innerHTML = 'olie';

                                label_hoeveelheid.setAttribute('for', `hoeveelheid-${inputCount}`);
                                label_hoeveelheid.setAttribute('name', `label-${inputCount}`);
                                label_hoeveelheid.innerHTML = `hoeveelheid:`;

                                input_hoeveelheid.setAttribute('type', 'text');
                                input_hoeveelheid.setAttribute('name', `hoeveelheid-${inputCount}`);



                                inputContainer.appendChild(label_naam);
                                inputContainer.appendChild(input_naam);
                                inputContainer.appendChild(label_select);
                                inputContainer.appendChild(select);
                                inputContainer.appendChild(label_hoeveelheid);
                                inputContainer.appendChild(input_hoeveelheid);

                                select.appendChild(option_groente);
                                select.appendChild(option2_fruit);
                                select.appendChild(option3_graan);
                                select.appendChild(option4_vlees);
                                select.appendChild(option5_vis);
                                select.appendChild(option6_kruiden);
                                select.appendChild(option7_water);
                                select.appendChild(option8_olie);


                                inputCount++;
                            });
                        </script>

                        <label for="bereidings_duur">Bereidings duur</label>
                        <input type="number" name="bereidings_duur" id="bereidings_duur">
                        <label for = samenvatting">Samenvatting</label>
                        <textarea name="samenvatting" id="samenvatting" cols="30" rows="10"></textarea>
                        <label for="moeilijkheid">Moeilijkheid</label>
                        <select name="moeilijkheid" id="moeilijkheid">
                            <option value="easy">easy</option>
                            <option value="medium">medium</option>
                            <option value="hard">hard</option>
                        </select>
                        <label for="ingredienten">Ingredienten</label>
                        <label for="bereidingswijze">Bereidingswijze</label>
                        <textarea name="bereidingswijze" id="bereidingswijze" cols="30" rows="10"></textarea>
                        <input type="submit" value="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>