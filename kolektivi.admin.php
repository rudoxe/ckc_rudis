<a href="pasakumi.user.php"><button>User</button></a>
    <a href="kolektivi.php"><button>CKC kolektīvi</button></a>
    <a href="pasakumi.admin.php"><button>admin pasakumi</button></a>
    <a href="kolektivi.admin.php"><button>admin kolektivi</button></a>


    <?php
include "config.php";

try {
    echo "<h1>CKC kolektīvi</h1>";

    // If form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $pdo->prepare("INSERT INTO Kolektīvi (name, description) VALUES (?, ?)");
            $stmt->execute([$name, $description]);
        } elseif (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $pdo->prepare("UPDATE Kolektīvi SET name    = ?  description = ? WHERE name = ?");
            $stmt->execute([$description, $name]);
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM Kolektīvi");
    $stmt->execute();

    echo "<form method='post'>";
    echo "<input type='text' name='name' placeholder='Name'>";
    echo "<input type='text' name='description' placeholder='Description'>";
    echo "<input type='submit' name='add' value='Add'>";
    echo "</form>";

    // Output results
    echo "<table>";
    echo "<tr><th>Kolektīvs</th><th>Apraksts</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr><td>";
        echo "<form method='post'>";
        echo "<input type='text' name='name' value='". $row['name'] ."' >";
        echo "</td><td>";
        echo "<input type='text' name='description' value='". $row['description'] ."' >";
        echo "<input type='submit' name='edit' value='Edit'>";
        echo "</form>";
        echo " <a href='delete.php?name=".urlencode($row['name'])."'>Delete</a><br>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>