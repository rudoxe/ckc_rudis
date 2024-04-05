<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nosaukums = urldecode($_POST["nosaukums"]);
    $nosaukumsJauns = $_POST["nosaukumsJauns"];
    $norisesVieta = $_POST["norisesVieta"];
    $datumsUnLaiks = $_POST['datumsUnLaiks'];

    try {
        $stmt = $pdo->prepare("UPDATE Pasākumi SET DatumsUnLaiks = :datumsUnLaiks, Nosaukums = :nosaukumsJauns, NorisesVieta = :norisesVieta WHERE Nosaukums = :nosaukums");
        $stmt->bindParam(':datumsUnLaiks', $datumsUnLaiks);
        $stmt->bindParam(':nosaukumsJauns', $nosaukumsJauns);
        $stmt->bindParam(':norisesVieta', $norisesVieta);
        $stmt->bindParam(':nosaukums', $nosaukums);
        $stmt->execute();

        echo "Pasākums ir veiksmīgi rediģēts!";
    } catch(PDOException $e) {
        echo "Kļūda: " . $e->getMessage();
    }
}
?>
