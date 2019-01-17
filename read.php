<?php
include 'log.php';
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">

      <style>

          h1 {
              text-align: center;
              color: darkblue;
              padding-bottom: 5%;
              padding-top: 2%;
          }

          #gen1 {
              display: flex;
              flex-direction: row;
              justify-content: center;
          }

          table{
              font-size: 22px;
          }

          td, th {
              background: slategrey;
              color: whitesmoke;
              border:solid black 2px;
              border-radius: 5px;
              margin-right: 10%;
              margin-left: 10%;
              padding-top: 30px;
              padding-bottom: 30px;
              padding-right: 60px;
              padding-left: 60px;
          }

          th {
              background: black;
              color: white;
          }

      </style>
  </head>
  <body>
    <h1>Liste des randonnées</h1>

    <?php
    function affichage() { ?>

        <div id="gen1">
    <table>
    <?php

            GLOBAL $conn;

            $sql = "SELECT * FROM hiking";

            $result = $conn->query($sql);
            ?>

            <th> Suppression</th>
            <th> Nom</th>
            <th> Difficulté</th>
            <th> Distance</th>
            <th> Durée</th>
            <th> Dénivelé</th>
            <th> Available</th>

            <?php
            while ($row = $result->fetch_assoc()) {
                $val0 = $row['id'];
                $val1 = $row['name'];
                $val2 = $row['difficulty'];
                $val3 = $row['distance'];
                $val4 = $row['duration'];
                $val5 = $row['height_difference'];
                $val6 = $row['available']
                ?>
                <tr>
                    <td> <a href="delete.php?id=<?=$val0 ?>">supprimer </a> </td>
                    <td> <a href="update.php?id=<?= $val0 ?>&amp;nom=<?= $val1 ?>&amp;difficulte=<?= $val2 ?>&amp;distance=<?= $val3 ?>&amp;duree=<?= $val4 ?>&amp;denivele=<?= $val5?>&amp;disponibilite=<?= $val6?> "> <?= $row['name'] ?> </a> </td>
                    <td> <?= $row['difficulty'] ?></td>
                    <td> <?= $row['distance'] ?></td>
                    <td> <?= $row['duration'] ?></td>
                    <td> <?= $row['height_difference'] ?> </td>
                    <td> <?= $row['available'] ?> </td>

                </tr>

                <?php
            }
        ?>


    </table>
    </div>
        <?php
}

    affichage(); ?>

    <div class="dsc">
        <div class="deco">
            <a href="create.php"> Ajouter </a>
        </div>
        <div class="deco">
            <a href="logout.php"> Deconnexion </a>
        </div>
    </div>

</body>
</html>
