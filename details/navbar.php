<?php

session_start();
require_once "../pdo.php";
?>
<body class="bg-image text-center">

<?php include("../links/bootstraplink1.php") ?>
<link rel="stylesheet" href="../style.css">
<nav class="navbar navbar-expand-lg navbar-light">
  <img class="icon" src="../images/heart (2).png" alt="pic"><a class="navbar-brand" href="#">NGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../profile/adminProfile.php">

          <?php
          $stmt3 = $pdo->query("SELECT `name` FROM `admin` WHERE `admin_id` =".$_SESSION['admin_id']);
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          echo $rows2[0]['name'];
        ?><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../adminIndex.php">Back</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

</body>
