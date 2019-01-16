<?php
include 'log.php';
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<h1>Ajouter</h1>

    <div id="gen">
        <form action="" method="post">
            <div>
                <label for="name">Name</label>
                    <input type="text" name="name" value="">
            </div>

            <div>
                <label for="difficulty">Difficulté</label>
                    <select name="difficulty">
                        <option value="très facile">Très facile</option>
                        <option value="facile">Facile</option>
                        <option value="moyen">Moyen</option>
                        <option value="difficile">Difficile</option>
                        <option value="très difficile">Très difficile</option>
                    </select>
            </div>

            <div>
                <label for="distance">Distance</label>
                    <input type="text" name="distance" value="">
            </div>

            <div>
                <label for="duration">Durée</label>
                    <input type="text" name="duration" value="">
            </div>

            <div>
                <label for="height_difference">Dénivelé</label>
                    <input type="text" name="height_difference" value="">
            </div>

            <div class="div">
            <button type="submit" name="button">Envoyer</button>

            </div>
        </form>

        <div class="lien">
            <a href="read.php">Liste des données</a>
        </div>

    </div>
</body>
</html>

<?php
$name = (isset($_POST['name']) ? $_POST['name'] : null);
$name = filter_var($name,FILTER_SANITIZE_STRING);

$difficulte = (isset($_POST['difficulty']) ? $_POST['difficulty'] : null);
$difficulte = filter_var($difficulte,FILTER_SANITIZE_STRING);

$distance = (isset($_POST['distance']) ? $_POST['distance'] : null);
$distance = filter_var($distance,FILTER_SANITIZE_NUMBER_FLOAT);

$duree = (isset($_POST['duration']) ? $_POST['duration'] : null);
$duree = filter_var($duree,FILTER_SANITIZE_STRING);

$denivele = (isset($_POST['height_difference']) ? $_POST['height_difference'] : null);
$denivele = filter_var($denivele,FILTER_SANITIZE_NUMBER_FLOAT);


function ajout ($name,$difficulte,$distance,$duree,$denivele) {

    GLOBAL $conn;

    $stmt = $conn -> prepare("INSERT INTO `hiking` (`name`,`difficulty`,`distance`,`duration`,`height_difference`) VALUE (?,?,?,?,?)");

    $stmt -> bind_param("ssisi",$name,$difficulte,$distance,$duree,$denivele);

    $stmt -> execute();

    $stmt -> close();

}

ajout($name,$difficulte,$distance,$duree,$denivele);