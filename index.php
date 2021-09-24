
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

<body class="home ">

<?php include("navbar.php"); ?>

<?php include("carousel.php"); ?>

<div class="ooo">
  <h2 class="info1" style="margin-top:50px;">What we Serve</h2>
  <?php include("cards.php"); ?>
</div>


<div class=" mm">
  <h2 class="graph-text">Be the change you want to see in the world..</h2>
  <div class="row text-center">
    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
      <?php include("graph.php"); ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
        <?php include("graphitem.php"); ?>
    </div>
  </div>
</div>



   <?php include("contact.php"); ?>







</body>
</html>
