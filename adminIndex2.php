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
  <link rel="stylesheet" href="style.css">
    <?php include("links/bootstraplink.php"); ?>
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
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">volunteer<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="logout.php">
        <?php
          $stmt3 = $pdo->query("SELECT `name` FROM `admin` WHERE `admin_id` =".$_SESSION['admin_id']);
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          echo $rows2[0]['name'];
        ?>
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="update/adminUpdate.php">Edit Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="sixth">
<div class="container bg-light ">

    <div class="row">
        <div class="col-6">
            <img src="images/donors.png" style ="width : 40%"alt="">
       </div>
       <div class="col-6">
            <img src="images/volunteer.png" style ="width : 40%"alt="">
       </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a class="display-1 " href="admin.php">Donors</a>
       </div>
       <div class="col-6">
           <a class="display-1 " href="adminVolunteer.php">Volunteers</a>
       </div>
    </div>
</div>
</div>
</body>
</html>
