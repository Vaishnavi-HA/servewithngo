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
          <a class="nav-link" href="#">volunteer<span class="sr-only">(current)</span></a>
      </li>

       <li class="nav-item ">
        <a class="nav-link" href="profile/volunteerProfile.php">
          <?php
          $stmt3 = $pdo->query("SELECT `name` FROM `volunteer` WHERE `volunteer_id` =".$_SESSION['volunteer_id']);
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          echo $rows2[0]['name'];
        ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="update/volunteerUpdate.php">Edit Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
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
  <br/>
  <br/>
  <div class = "row ">
    <div class="col-lg-6 col-sm-12">
      <h3 class="yyy text-center">Running Tasks</h3>
      <table class="table shadow-lg p-3 mb-5 bg-light rounded ">
       <thead class="thead-dark">
         <tr class="">
           <th class="" scope="col">Sno </th>
           <th class="" scope="col">Task Name</th>
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
               echo "</tr>";
             $count++;
             }
           ?>
       </tbody>
     </table>
    </div>

    <div class="col-lg-6 col-sm-12">
      <h3 class="yyy text-center">Tasks you are Conducting</h3>
      <table class="table shadow-lg p-3 mb-5 bg-light rounded ">
        <thead class="thead-dark">
          <tr class="">
            <th class="" scope="col">Sno </th>
            <th class="" scope="col">Task Name</th>
            <th  scope="col"></th>

          </tr>
        </thead>
        <tbody class="">
           <?php
             $stmt3 = $pdo->query("SELECT * FROM `task` WHERE `volunteer_id`=".$_SESSION['volunteer_id']);
             $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
             $count = 1;
              foreach($rows as $row){
                echo "<tr class=''>";
                echo "<th scope='row' class=''>".$count."</th>";
                echo "<td class=''>".htmlentities($row['task'])."</td>";
                echo "</tr>";
              $count++;
              }
            ?>
        </tbody>
      </table>
      <div class="text-center">
          <a class="btn btn-bloc btn-lg taskbtn" style="color:black;" href="volunteer/tasks.php" role="button"> Add Tasks</a>
      </div>
    </div>
  </div>
 </div>


</body>
</html>
