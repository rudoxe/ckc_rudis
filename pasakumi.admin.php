<a href="pasakumi.user.php"><button>User</button></a>
    <a href="kolektivi.php"><button>CKC kolektīvi</button></a>
    <a href="pasakumi.admin.php"><button>admin pasakumi</button></a>
    <a href="kolektivi.admin.php"><button>admin kolektivi</button></a>
<?php
include "config.php";

try {
    echo "<h1>Pasākumi Cēsīs</h1>";
    echo "<button class='pievienot'>ADD</button>";
    $stmt = $pdo->prepare("SELECT * FROM Pasākumi");
    $stmt->execute();

    // Izvada rezultātus
    while ($row = $stmt->fetch()) {
        echo "<div class='pasakums'>";
        echo date('d.m.Y H:i', strtotime($row['DatumsUnLaiks']));
        echo "<input type ='datetime-local' class='datums' value= '".date('d.m.Y H:i', strtotime($row['DatumsUnLaiks']))."'>";
        echo "<input type='text' class='nosaukums' value='".$row['Nosaukums']."'>";
        echo "<input type='text' class='norises-vieta' value='".$row['NorisesVieta']."'>";
        echo " <button class='rediģēt' data-nosaukums='".urlencode($row['Nosaukums'])."'>Rediģēt</button>";
        echo " <a href='delete.php?nosaukums=".urlencode($row['Nosaukums'])."'>Dzēst</a><br>";
        echo "</div>";
    }
} catch(PDOException $e) {
    echo "Kļūda: " . $e->getMessage();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".rediģēt").click(function(){
    var datumsUnLaiks = $(this).siblings(".datums").val(); // Modify this line
    var nosaukums = $(this).data("nosaukums");
    var nosaukumsJauns = $(this).siblings(".nosaukums").val();
    var norisesVieta = $(this).siblings(".norises-vieta").val();

    $.ajax({
      url: 'edit.php',
      type: 'post',
      data: {nosaukums: nosaukums,datumsUnLaiks: datumsUnLaiks,  nosaukumsJauns: nosaukumsJauns, norisesVieta: norisesVieta},

    });
  });
});

$(document).ready(function(){
  $(".pievienot").click(function(){

    // Izveido jaunu pasākuma elementu
    var pasakums = $("<div class='pasakums'></div>");
    pasakums.append("<input type='datetime-local' class='datums'>"); // Add this line
    pasakums.append("<input type='text' class='nosaukums' value=''>");
    pasakums.append("<input type='text' class='norises-vieta' value=''>");
    pasakums.append("<button class='saglabāt'>Save</button>");

    // Pievieno jauno pasākumu lapai
    $("body").append(pasakums);

    // Uzstāda saglabāšanas funkciju
    $(".saglabāt").click(function(){
      var datumsUnLaiks = $(this).siblings(".datums").val(); // Modify this line
      var nosaukums = $(this).siblings(".nosaukums").val();
      var norisesVieta = $(this).siblings(".norises-vieta").val();

      $.ajax({
        url: 'add.php',
        type: 'post',
        data: {datumsUnLaiks: datumsUnLaiks, nosaukums: nosaukums, norisesVieta: norisesVieta},
        success: function(data) {
          location.reload();
        }
      });
    });
  });
});

</script>
