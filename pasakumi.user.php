<!DOCTYPE html>
<html>
<head>
    <title>Pasākumi Cēsīs</title>
    <style>
        td {
            text-align: center;
            border: 3px solid black;
        }
    </style>
</head>
<body>
<a href="pasakumi.user.php"><button>User</button></a>
    <a href="kolektivi.php"><button>CKC kolektīvi</button></a>
    <a href="pasakumi.admin.php"><button>admin pasakumi</button></a>
    <a href="kolektivi.admin.php"><button>admin kolektivi</button></a>
<?php
include "config.php";

try {
    echo "<h1>Pasākumi Cēsīs</h1>";

    $stmt = $pdo->prepare("SELECT * FROM Pasākumi");
    $stmt->execute();

    // Izvada rezultātus
    echo "<table>";
    echo "<tr><th>Datums un Laiks</th><th>Nosaukums</th><th>Norises Vieta</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>".date('d.m.Y H:i', strtotime($row['DatumsUnLaiks']))."</td>";
        echo "<td>".$row['Nosaukums']."</td>";
        echo "<td>".$row['NorisesVieta']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Kļūda: " . $e->getMessage();
}
?>
</body>
</html>
