<?php
header("Location: http://localhost:63342/php-training-mysql/read.php?_ijt=f2hvfl42llp14fsei1skreds0j");
include'log.php';

$id = (isset($_GET['id']) ? $_GET['id'] : null);
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

function suppr ($id)
{
    GLOBAL $conn;
    $sql = "DELETE from `hiking` where id= $id";
    $conn->query($sql);
}

suppr($id);
