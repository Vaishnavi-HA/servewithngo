
<?php


require_once "./pdo.php";
?>
<?php
  $stmt3 = $pdo->query("SELECT count(item) as item FROM items i,donor d WHERE d.donor_id=i.donor_id AND city_id = 11");
  $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $item1 = htmlentities($rows3[0]['item']);
  ?>

  <?php
    $stmt3 = $pdo->query("SELECT count(item) as item FROM items i,donor d WHERE d.donor_id=i.donor_id AND city_id = 12");
    $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
      $item2 = htmlentities($rows3[0]['item']);
      ?>
      <?php
        $stmt3 = $pdo->query("SELECT count(item) as item FROM items i,donor d WHERE d.donor_id=i.donor_id AND city_id = 13");
        $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          $item3 = htmlentities($rows3[0]['item']);
        ?>
        <?php
          $stmt3 = $pdo->query("SELECT count(item) as item FROM items i,donor d WHERE d.donor_id=i.donor_id AND city_id = 14");
          $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $item4 = htmlentities($rows3[0]['item']);
          ?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<body class=graph>

    <canvas id="myChart1" style="width:90%;max-width:470px" ></canvas>

    <script>
    var xValues = ["Banglore", "Hyderbad", "Chennai", "Mumbai"];
    var yValues = [<?= $item1 ?>,<?= $item2 ?>,<?= $item3 ?>,<?= $item4 ?>];
    var barColors = ["#BB5A5A", "#E79E85","#EACEB4","#F5CDAA"];

    new Chart("myChart1", {
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
          text: "Number of items based on city"

        }

      }
    });
    </script>

</body>
</html>
