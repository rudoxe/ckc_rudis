<?php
include "config.php";

$nosaukums = urldecode($_GET['nosaukums']);

try {
    $stmt = $pdo->prepare("DELETE FROM Pasākumi WHERE Nosaukums = :nosaukums");
    $stmt->bindParam(':nosaukums', $nosaukums);
    $stmt->execute();

    header("Location: pasakumi.admin.php");
} catch(PDOException $e) {
    echo "Kļūda: " . $e->getMessage();
}

?>
