<?php
include "config.php";


$name = urldecode($_GET['name']);

try {
    $stmt = $pdo->prepare("DELETE FROM Kolektīvi WHERE name = :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    header("Location: kolektivi.admin.php");
} catch(PDOException $e) {
    echo "Kļūda: " . $e->getMessage();
}
?>