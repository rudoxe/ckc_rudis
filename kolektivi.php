<a href="pasakumi.user.php"><button>User</button></a>
    <a href="kolektivi.php"><button>CKC kolektīvi</button></a>
    <a href="pasakumi.admin.php"><button>admin pasakumi</button></a>
    <a href="kolektivi.admin.php"><button>admin kolektivi</button></a>


<?php
include "config.php";

try {
    echo "<h1>CKC kolektīvi</h1>";

    $stmt = $pdo->prepare("SELECT * FROM Kolektīvi");
    $stmt->execute();

    // Izvada rezultātus
    echo "<table>";
    echo "<tr><th>Kolektīvs</th><th>Apraksts</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td></tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Kļūda: " . $e->getMessage();
}
?>
