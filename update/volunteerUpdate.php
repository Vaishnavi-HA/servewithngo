<?php
require_once "../pdo.php";
session_start();
if(!isset($_SESSION['volunteer_id'])){
    die("Login first");
}
  if(isset($_POST['Cancel'])){
    header('Location: ../index.php');
    return;
  }


  if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['intrests'])&&isset($_POST['dob'])&&isset($_POST['city'])&&isset($_POST['phone'])){
      if((strlen($_POST['name'])>0)&&(strlen($_POST['email'])>0)&&(strlen($_POST['intrests'])>0)&&(strlen($_POST['dob'])>0)&&(strlen($_POST['city'])>0)&&(strlen($_POST['phone'])>0)){
      $stmt = $pdo->prepare( "UPDATE `volunteer` SET `name`= :nm,`email`= :em,`intrests`=:inn,`dob`=:db,`city_id`= :ci,`phone`=:ph WHERE `volunteer_id` =". $_SESSION['volunteer_id']);
          $stmt->execute(array(
          ':nm' => $_POST['name'],
          ':em' => $_POST['email'],
          ':inn' => $_POST['intrests'],
          ':db' => $_POST['dob'],
          ':ci' => $_POST['city'],
          ':ph' => $_POST['phone'])
          );
            $_SESSION['success'] = "Record inserted";
            header('Location: ../VolunteerIndex.php');
        }
        else{
            $_SESSION['error'] = "everything Is Required";
            header("Location: volunteerUpdate.php");
            return;
        }
     }


     $stmt4 = $pdo->query("SELECT * FROM `volunteer` WHERE `volunteer_id`=". $_SESSION['volunteer_id']);
     $rows3 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

     $name = htmlentities($rows3[0]['name']);
     $email = htmlentities($rows3[0]['email']);
     $intrests = htmlentities($rows3[0]['intrests']);
     $date = htmlentities($rows3[0]['dob']);
     $city = htmlentities($rows3[0]['city_id']);
     $phone = htmlentities($rows3[0]['phone']);


$stmt3 = $pdo->query("SELECT * FROM city");
$rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOLUNTEER UPDATE</title>

    <?php include("../links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="../style.css">


</head>
<body class="bg-image">
  <nav class="navbar navbar-expand-lg navbar-light">
    <img class="icon" src="../images/heart (2).png" alt="pic"><a class="navbar-brand" href="#">NGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">volunteer<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../profile/volunteerProfile.php">

            <?php
            $stmt3 = $pdo->query("SELECT `name` FROM `volunteer` WHERE `volunteer_id` =".$_SESSION['volunteer_id']);
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            echo $rows2[0]['name'];
          ?><span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../volunteerIndex.php">Back</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="text-center">
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
    <h2>Edit Profile</h2>

    <hr>
        <div class="form-group">
      <div class="row">


        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $name ?>" required="required">
          </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $email ?>" required="required">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="text" class="form-control" name="intrests" placeholder="Address" value="<?= $intrests ?>" required="required">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="date" class="form-control" name="dob" placeholder="Date of birth" value="<?= $date ?>" required="required">
        </div>
        </div>

        <div class="col-12">
        <div class="form-group">
        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= $phone ?>" required="required">
        </div>
        </div>
        <div class="col-12">
          <div class="form-group">
        <select id="city" value="<?= $city ?>"  name="city">

              <?php
              foreach($rows as $row){
                  echo "<option value = ".$row['city_id'].">";
                  echo htmlentities($row['cname']);
                  echo "</option>";
              }
              ?>
        </div>
      </div>
            </select>
            <br />
            <br />
            <input type="submit"  class="btn btn-lg btn-primary btn-bloc" value="Submit">
            <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel">

</div>
</div>
    </form>
  </div>
</div>
</body>
</html>
