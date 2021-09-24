<?php

session_start();
require_once "./pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>NGO MANAGEMENT SYSTEM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include("links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-image">
<nav class="navbar navbar-expand-lg navbar-light">
  <img class="icon" src="images/heart (2).png" alt="pic"><a class="navbar-brand" href="#">NGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
          <a class="nav-link" href="#">Donor<span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item ">
        <a class="nav-link" href="profile/donorProfile.php">

          <?php
          $stmt3 = $pdo->query("SELECT `name` FROM `donor` WHERE `donor_id` =".$_SESSION['donor_id']);
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          echo $rows2[0]['name'];
        ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="update/donorUpdate.php">Edit Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
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
    <div class="row text-center">
       <div class="col-2">
        </div>

         <div class="col-2">
        </div>
     </div>
    <br>

    <div class="row" style="margin-left:90px">


        <?php
        $stmt3 = $pdo->query("SELECT donations FROM `ngo_account` WHERE `donor_id`=".$_SESSION['donor_id']);
        $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)>0){
            echo " <div class='col-lg-6 col-sm-12'>";

            echo "<h3 class='shadow-lg p-3 mb-5 bg-light rounded donoritempage' >Your Overall Donations Are ₹ ".$rows[0]['donations']." </h3>";
            echo "</div>";
            echo " <div class='col-lg-6 col-sm-12'>";

            echo "<a class='btn taskbtn btn-lg shadow-lg p-3 mb-5 rounded donoritempage' style='width: 120px;' href='donor/donateMoney.php' role='button'>Donate</a>";
            echo "<pre style = 'display : inline'> </pre>";
            echo "<a class='btn taskbtn btn-lg shadow-lg p-3 mb-5 rounded donoritempage' style='width: 170px;' href='donor/reciept.php' role='button'>Print Reciept</a>";

            echo "</div>";

        }
            else {
              echo " <div class='col-lg-8 col-sm-12 text-center'>";

              echo "<h3 class='shadow-lg p-3 mb-5 bg-light rounded donoritempage'>Fill Your Details To Donate Money </h3>";
              echo "</div>";
              echo " <div class='col-lg-4 col-sm-12'>";

              echo "<a class='btn taskbtn btn-lg shadow-lg p-3 mb-5 rounded donoritempage' style='width: 200px;' href='donor/details.php' role='button'>Fill Details</a>";
              echo "</div>";
        }

        ?>
        </div>
    <div class="row" style="margin-left:90px">
       <div class='col-lg-6 col-sm-12 text-center'>
          <h3 class="shadow-lg p-3 mb-5 bg-light rounded" style="margin-top:30px;font-family: 'Merienda One', cursive;">Donate Items Here </h3>
        </div>
        <div class='col-lg-6 col-sm-12'>
          <a class='btn taskbtn btn-lg shadow-lg p-3 mb-5 rounded ' style="width:120px;margin-top:30px;font-family: 'Merienda One', cursive;" href='donor/donateItems.php' role='button'>Donate</a>
        </div>
    </div>

    <div class="row" >
      <div class="col-3"></div>
    <div class="col-lg-6 col-sm-12">
      <table class="table shadow-lg p-3 mb-5 bg-light rounded">
        <h3 class="text-center" style="font-family: 'Merienda One', cursive;">ITEMS YOU DONATED</h3>
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">S.no </th>
            <th class="" scope="col">Item Name</th>
          </tr>
        </thead>
        <tbody class="">
           <?php
             $stmt3 = $pdo->query("SELECT * FROM `items` WHERE `donor_id`=".$_SESSION['donor_id']);
             $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
             $count = 1;
              foreach($rows as $row){
                echo "<tr class=''>";
                echo "<th scope='row' class=''>".$count."</th>";
                echo "<td class=''>".htmlentities($row['item'])."</td>";
                echo "</tr>";
              $count++;
              }
            ?>
        </tbody>
      </table>
   </div>
   <div class="col-3"></div>
  </div>
</div>
</body>
</html>
