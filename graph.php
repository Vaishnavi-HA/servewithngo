
<?php


require_once "./pdo.php";
?>
<?php
  $stmt3 = $pdo->query("SELECT sum(donations) as donations FROM ngo_account WHERE city_id = 11");
  $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $donation1 = htmlentities($rows3[0]['donations']);
  ?>

  <?php
    $stmt3 = $pdo->query("SELECT sum(donations) as donations FROM ngo_account WHERE city_id = 12");
    $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
      $donation2 = htmlentities($rows3[0]['donations']);
    ?>
    <?php
      $stmt3 = $pdo->query("SELECT sum(donations) as donations FROM ngo_account WHERE city_id = 13");
      $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $donation3 = htmlentities($rows3[0]['donations']);
      ?>
      <?php
        $stmt3 = $pdo->query("SELECT sum(donations) as donations FROM ngo_account WHERE city_id = 14");
        $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          $donationn = htmlentities($rows3[0]['donations']);
        ?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<body class="graph">

    <canvas id="myChart" style="width:90%;max-width:470px" ></canvas>
    <script>
    var xValues = ["Banglore", "Hyderbad", "Chennai", "Mumbai"];
    var yValues = [<?= $donation1 ?>,<?= $donation2 ?>,<?= $donation3 ?>,<?= $donationn ?>];
    var barColors = ["#BB5A5A", "#E79E85","#EACEB4","#F5CDAA"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,

        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]

      },
      options: {
        legend: {display: false},

        title: {
          display: true,
          text: "Total donation based on city"

        }

      }
    });
    </script>



</body>
</html>
