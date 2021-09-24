<body class="bg-image">

<title>Item</title>
<?php

session_start();
require_once "./pdo.php";
?>

<?php include("links/bootstraplink1.php") ?>
<link rel="stylesheet" href="style.css">
<nav class="navbar navbar-expand-lg navbar-light">
  <img class="icon" src="images/heart (2).png" alt="pic"><a class="navbar-brand" href="index.php">NGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
      <a class="nav-link" href="profile/adminProfile.php">
      <?php
        $stmt3 = $pdo->query("SELECT `name` FROM `admin` WHERE `admin_id` =".$_SESSION['admin_id']);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $rows2[0]['name'];
      ?></a>
      <li class="nav-item">
        <a class="nav-link" href="details/donorDetails.php">Donor Lists</a></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminIndex1.php">Back</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container  rounded ">
  <?php
      if(isset($_SESSION['success'])){
        echo '<div class="row alert alert-success" role="alert">';
        echo $_SESSION['success'];
        unset ($_SESSION['success']);
        echo '</div>' ;
    }

    if(isset($_SESSION['error'])){
        echo '<div class="row alert alert-danger" role="alert">';
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        echo '</div>';
    }
  ?>
  <div class = "row ">
    <div class="col-lg-6 col-sm-12 text-center">
      <div class="yyy text-center">
            <h3>Bengaluru Donors</h3>
      </div>

      <table class="table shadow-lg p-3 mb-5 bg-light rounded ">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Donor Name</th>
            <th class="" scope="col"></th>
              <th class="" scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
           <?php
             $stmt3 = $pdo->query("SELECT distinct items.donor_id,donor.name FROM donor JOIN items  WHERE donor.donor_id = items.donor_id AND donor.city_id = 11");
             $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
             $count = 1;
              foreach($rows as $row){
                echo "<tr class=''>";
                echo "<th scope='row' class=''>".$count."</th>";
                echo "<td class=''>".htmlentities($row['name'])."</td>";
                echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/donorItem.php?donor_id=".$row['donor_id']."'>Items</a></td>");
                echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/deleteDonor.php?donor_id=".$row['donor_id']."'>Remove</a></td>");

                echo "</tr>";
              $count++;
              }
            ?>
        </tbody>
      </table>
    </div>

    <div class="col-lg-6 col-sm-12  text-center">
        <div class="yyy text-center">
      <h3>Hyderabad Donors</h3>
    </div>
      <table class="table shadow-lg p-3 mb-5 bg-light rounded ">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Donor Name</th>
            <th class="" scope="col"></th>
              <th class="" scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
          <?php
            $stmt3 = $pdo->query("SELECT distinct items.donor_id,donor.name FROM donor JOIN items  WHERE donor.donor_id = items.donor_id AND donor.city_id = 12");
            $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
             foreach($rows as $row){
               echo "<tr class=''>";
               echo "<th scope='row' class=''>".$count."</th>";
               echo "<td class=''>".htmlentities($row['name'])."</td>";
                echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/donorItem.php?donor_id=".$row['donor_id']."'>Items</a></td>");
                echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/deleteDonor.php?donor_id=".$row['donor_id']."'>Remove</a></td>");

               echo "</tr>";
             $count++;
             }
           ?>
        </tbody>
      </table>
    </div>
  </div>


   <div class = "row">
    <div class="col-lg-6 col-sm-12  text-center">
        <div class="yyy text-center">
      <h3>Chennai Donors</h3>
    </div>
      <table class="table shadow-lg p-3 mb-5 bg-light rounded ">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Donor Name</th>
            <th class="" scope="col"></th>
              <th class="" scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
          <?php
            $stmt3 = $pdo->query("SELECT distinct items.donor_id,donor.name FROM donor JOIN items  WHERE donor.donor_id = items.donor_id AND donor.city_id = 13");
            $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
             foreach($rows as $row){
               echo "<tr class=''>";
               echo "<th scope='row' class=''>".$count."</th>";
               echo "<td class=''>".htmlentities($row['name'])."</td>";
                 echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/donorItem.php?donor_id=".$row['donor_id']."'>Items</a></td>");
                   echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/deleteDonor.php?donor_id=".$row['donor_id']."'>Remove</a></td>");

               echo "</tr>";
             $count++;
           }
           ?>
        </tbody>
      </table>
    </div>

    <div class="col-lg-6 col-sm-12  text-center">
        <div class="yyy text-center">
      <h3>Mumbai Donors</h3>
    </div>
      <table class="table shadow-lg p-1 mb-2 bg-light rounded ">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Donor Name</th>
            <th class="" scope="col"></th>
              <th class="" scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
          <?php
            $stmt3 = $pdo->query("SELECT distinct items.donor_id,donor.name FROM donor JOIN items  WHERE donor.donor_id = items.donor_id AND donor.city_id = 14");
            $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
             foreach($rows as $row){
               echo "<tr class=''>";
               echo "<th scope='row' class=''>".$count."</th>";
               echo "<td class=''>".htmlentities($row['name'])."</td>";
               echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/donorItem.php?donor_id=".$row['donor_id']."'>Items</a></td>");
               echo("<td class='' > <a class='btn btn-secondary btn-sm' href='donor/deleteDonor.php?donor_id=".$row['donor_id']."'>Remove</a></td>");
               echo "</tr>";
             $count++;
             }
           ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
