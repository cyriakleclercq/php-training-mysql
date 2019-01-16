<?php

include'log.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics1.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">

		<div>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <label for="name">Name</label>
			<input type="text" name="name" value="<?= $_GET['nom'] ?>">
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
			<input type="text" name="distance" value="<?= $_GET['distance'] ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="text" name="duration" value="<?= $_GET['duree'] ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $_GET['denivele'] ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php

$id = (isset($_POST['id']) ? $_POST['id'] : null);
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);


$nom = (isset($_POST['name']) ? $_POST['name'] : null);
$nom = filter_var($nom,FILTER_SANITIZE_STRING);

$difficulte = (isset($_POST['difficulty']) ? $_POST['difficulty'] : null);
$difficulte = filter_var($difficulte,FILTER_SANITIZE_STRING);

$distance = (isset($_POST['distance']) ? $_POST['distance'] : null);
$distance = filter_var($distance,FILTER_SANITIZE_NUMBER_FLOAT);

$duree = (isset($_POST['duration']) ? $_POST['duration'] : null);
$duree = filter_var($duree,FILTER_SANITIZE_STRING);

$denivele = (isset($_POST['height_difference']) ? $_POST['height_difference'] : null);
$denivele = filter_var($denivele,FILTER_SANITIZE_NUMBER_FLOAT);

ECHO $id, $nom, $difficulte, $distance, $duree,$denivele;


function update ($id,$nom,$difficulte,$distance,$duree,$denivele) {

    GLOBAL $conn;

    $sql = "UPDATE `hiking` set `name`= '$nom', `difficulty`= '$difficulte', `distance`= '$distance', `duration` = '$duree', `height_difference` ='$denivele' where `id`= $id";

    $conn->query($sql);

}
if(isset($_POST['name']) && isset($_POST['id']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])) {

    update($id, $nom, $difficulte, $distance, $duree, $denivele);

}



