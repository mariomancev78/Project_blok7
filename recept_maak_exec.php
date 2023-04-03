<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak recept</title>
    <? require 'database.php';
    
$sql_recept = $dbcon -> prepare("SELECT id FROM RECEPT WHERE naam = :recept_naam");
$sql_recept -> bindParam(':recept_naam', $_POST['naam']);

$sql_ingredient = $dbcon -> prepare("SELECT id FROM INGREDIENT WHERE naam = :ingredient_naam");
$sql_ingredient -> bindParam(':ingredient_naam', $_POST['input-1']);
$sql_ingredient -> execute();

for($i=1; $i< 10; $i++){
    if(isset($_POST['input-'.$i])){
       $sql_ingredient.= "OR naam = :ingredient_naam".$i;
        $sql_ingredient -> bindParam(':ingredient_naam'.$i, $_POST['input-'.$i]);
    }
}



$sql_recept -> execute();

?>
    </head>
    <body>


    <? var_dump($_POST); ?>

    <? echo $_POST['naam']; ?>
    <? echo $_POST['menu_gang']; ?>
    <? echo $_POST['input-1']; ?>
    <? echo $_POST['select-1']; ?>
    <? echo $_POST['hoeveelheid-1']; ?>
    <? echo $_POST['bereidings_duur']; ?>
    <? echo $_POST['samenvatting']; ?>
    <? echo $_POST['moeilijkheid']; ?>
    <? echo $_POST['bereidingswijze']; ?>
</body>
</html>