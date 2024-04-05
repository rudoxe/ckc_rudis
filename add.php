<?php
include "config.php";

$datumsUnLaiks = $_POST['datumsUnLaiks'];
$nosaukums = $_POST['nosaukums'];
$norisesVieta = $_POST['norisesVieta'];

$stmt = $pdo->prepare("INSERT INTO Pasākumi (DatumsUnLaiks, Nosaukums, NorisesVieta) VALUES (?, ?, ?)");
$stmt->execute([$datumsUnLaiks, $nosaukums, $norisesVieta]);
?>
