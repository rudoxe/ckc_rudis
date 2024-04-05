<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = urldecode($_POST["name"]);
    $description = $_POST["description"];
 

    try {
        $stmt = $pdo->prepare("UPDATE Kolektīvi SET name = :name, description = :description WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        $stmt->execute();

        echo "Pasākums ir veiksmīgi rediģēts!";
    } catch(PDOException $e) {
        echo "Kļūda: " . $e->getMessage();
    }

}

?>

