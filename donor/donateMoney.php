<?php
session_start();

if(!isset($_SESSION['donor_id'])){
    die("Login first");
}
if(isset($_POST['cancel'])){
    header('Location: ../donorIndex.php');
    return;
}

require_once "../pdo.php";
if ((isset($_POST['donation']))){
    if(($_POST['donation']>0)){

        $stmt = $pdo->query("UPDATE `ngo_account`
        SET `donations` = `donations` + ".$_POST['donation']." WHERE `donor_id` = '".$_SESSION['donor_id']."'");
          $_SESSION['success']="Donated Rs :".$_POST['donation'];
            header('Location: ../donorIndex.php');
            return;

    }
    else {
        $_SESSION['error']="All fields requred";
        header("Location: donateMoney.php");
        return;
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor DetailForm</title>
    <?php include("../links/bootstraplink1.php"); ?>
  <link rel="stylesheet" href="../style.css">
</head>
<body  class="bg-image">
  <nav class="navbar navbar-expand-lg navbar-light">
    <img class="icon" src="../images/heart (2).png" alt="pic"><a class="navbar-brand" href="#">NGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Donor<span class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item ">
          <a class="nav-link" href="../profile/donorProfile.php">

            <?php
            $stmt3 = $pdo->query("SELECT `name` FROM `donor` WHERE `donor_id` =".$_SESSION['donor_id']);
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            echo $rows2[0]['name'];
          ?><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../donorIndex.php">Back<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../logout.php">Logout<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="text-center">

<?php
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset ($_SESSION['success']);
    }

    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

    <div class="row">
      <div class="col-lg-6 text-center ">
        <img src="../images/donate7.jpg" alt="pic" style="width:540px;height:360px;margin-top:90px;">
      </div>

      <div class="col-lg-5 text-center amt-img">
          <h3>If the money we donate helps one child or can ease the pain of one parent, those funds are well spent.</h3>
      <div class="signup-form">
      <form method="post" class="form-signin">
        <h4 class="amt-img">Enter Amount To Donate</h4>
    <hr>
         <div class="form-group">
          <input type="number" class="form-control" name="donation" value=0 size="10" />
        </div>
        <input type="submit"  class="btn btn-lg btn-primary btn-bloc" value="Submit">
        <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel">
          </form>
          
      </div>
    </div>
  </div>

</body>
</html>
