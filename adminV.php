
<?php

session_start();
require_once "./pdo.php";
?>

<?php include("links/bootstraplink1.php"); ?>
<link rel="stylesheet" href="style.css">
<body class="bg-image">
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
      ?><span class="sr-only">(current)</span></a>
      <li class="nav-item">
        <a class="nav-link" href="details/volunteerDetails.php">Volunteer Lists</a>
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


<div class="container  rounded">
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
    <div class="col-lg-6 col-sm-12">
      <div class="yyy text-center">
          <h2>Running Tasks</h2>
      </div>

      <table class="table shadow-lg p-3 mb-5 bg-light rounded text-center">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Task Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="">
           <?php
             $stmt3 = $pdo->query("SELECT * FROM task ");
             $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
             $count = 1;
              foreach($rows as $row){
                echo "<tr class=''>";
                echo "<th scope='row' class=''>".$count."</th>";
                echo "<td class=''>".htmlentities($row['task'])."</td>";
              echo("<td class='' > <a class='btn btn-secondary btn-sm' href='volunteer/deleteVolunteer.php?volunteer_id=".$row['volunteer_id']."'>Remove</a></td>");
                echo "</tr>";
              $count++;
              }
            ?>
        </tbody>
      </table>
    </div>

    <div class="col-lg-6 col-sm-12">
      <div class="yyy text-center">
          <h2>Volunteers</h2>
      </div>

      <table class="table shadow-lg p-3 mb-5 bg-light rounded text-center">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Task Name</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
           <?php
             $stmt3 = $pdo->query("SELECT * FROM `volunteer`");
             $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
             $count = 1;
              foreach($rows as $row){
                echo "<tr class=''>";
                echo "<th scope='row' class=''>".$count."</th>";
                echo "<td class=''>".htmlentities($row['name'])."</td>";
                echo("<td class='' > <a class='btn btn-secondary btn-sm' href='volunteer/deleteVolunteer.php?volunteer_id=".$row['volunteer_id']."'>Remove</a></td>");
                echo "</tr>";
              $count++;
              }
            ?>
        </tbody>
      </table>
    </div>
</div>
</body>
