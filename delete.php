<?php
header("Location: http://localhost:63342/php-training-mysql/read.php?_ijt=f2hvfl42llp14fsei1skreds0j");
include'log.php';

$id = $_GET['id'];

function suppr ($id)
{
    GLOBAL $conn;
    $sql = "DELETE from `hiking` where id= $id";
    $conn->query($sql);
}

suppr($id);
