<?php
require_once "../pdo.php";
session_start();
if(!isset($_SESSION['admin_id'])){
    die("Login first");
}
  if(isset($_POST['Cancel'])){
    header('Location: ../adminIndex.php');
    return;
  }


  $stmt4 = $pdo->query("SELECT * FROM `admin` WHERE `admin_id`=". $_SESSION['admin_id']);
  $rows3 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
  $stmt5 = $pdo->query("SELECT * FROM `admin_login` WHERE `admin_id`=". $_SESSION['admin_id']);
  $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
  $username = htmlentities($rows5[0]['username']);
  $name = htmlentities($rows3[0]['name']);
  $dob=htmlentities($rows3[0]['dob']);
  $email = htmlentities($rows3[0]['email']);
  $address = htmlentities($rows3[0]['address']);
  $city = htmlentities($rows3[0]['city_id']);
  $phone = htmlentities($rows3[0]['phone']);

  $stmt3 = $pdo->query("SELECT cname FROM city c,admin a where c.city_id=a.city_id and `admin_id`=". $_SESSION['admin_id'] );
  $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
  $city = htmlentities($rows[0]['cname']);
?>

<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>DONOR UPDATE</title>

 <?php include("../links/bootstraplink1.php"); ?>
 <link rel="stylesheet" href="../style.css">


</head>
<body class="bg-image">
<div class="text-center">
  <nav class="navbar navbar-expand-lg navbar-light">
  <img class="icon" src="../images/heart (2).png" alt="pic"><a class="navbar-brand" href="#">NGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="profile/adminProfile.php">

          <?php
          $stmt3 = $pdo->query("SELECT `name` FROM `admin` WHERE `admin_id` =".$_SESSION['admin_id']);
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          echo $rows2[0]['name'];
        ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../update/adminUpdate.php">Edit Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adminIndex1.php">Back</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>


<?php
 if(isset($_SESSION['error'])){
     echo '<div class="alert alert-danger" role="alert">';
     echo $_SESSION['error'];
     unset($_SESSION['error']);
     echo '</div>';
 }
?>
<div class="signup-form">
 <form method="post" class="form-signin">
   <img  src="../images/user.png" alt="pic">
   <br />
   <br>
 <h2>Profile</h2>

 <hr class="line">
 <div class="profile">
     <div class="form-group">
   <div class="row">

     <div class="col-12">
       <div class="form-group">
      User_name:<?= $username ?>
       </div>
     </div>
     <div class="col-12">
       <div class="form-group">
        Name:<?= $name ?>
       </div>
     </div>
     <div class="col-12">
     <div class="form-group">
       Dob:<?= $dob ?>
     </div>
     </div>
     <div class="col-12">
     <div class="form-group">
       Email:<?= $email ?>
     </div>
     </div>
     <div class="col-12">
     <div class="form-group">
    Phone_no:<?= $phone ?>
     </div>
     </div>
     <div class="col-12">
     <div class="form-group">
       Address:<?= $address ?>
     </div>
     </div>


      <div class="col-12">
        <div class="form-group">
     City:<?= $city ?>


      </div>
    </div>
         </select>

         </div>
       </div>
             </form>
           </div>
         </div>
          </div>
         </body>
         </html>
