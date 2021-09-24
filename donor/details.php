<?php
session_start();

if(!isset($_SESSION['donor_id'])){
    die("Login first");
}
if(isset($_POST['cancel'])){
    header('Location: ../donorIndex.php');
    return;
}

require( "../pdo.php");
if ((isset($_POST['bank'])) && (isset($_POST['ifsc_code']))&& (isset($_POST['account']))&& (isset($_POST['donation'])) ){
    if((strlen($_POST['bank'])>0) && (strlen($_POST['ifsc_code'])>=0)&& (strlen($_POST['account'])>=0)){

        $stmt3 = $pdo->query("SELECT * FROM `donor` WHERE `donor_id` = '".$_SESSION['donor_id']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->prepare('INSERT INTO ngo_account
        (bank,ifsc_code,account,	donor_id,city_id,donations) VALUES ( :bn, :ifs, :ac, :don, :ci, :d)');
            $stmt->execute(array(
            ':bn' => $_POST['bank'],
            ':ifs' => $_POST['ifsc_code'],
            ':ac' => $_POST['account'],
            ':don' => $_SESSION['donor_id'],
            ':ci' => $rows2[0]['city_id'],
            ':d' =>  $_POST['donation']
            ));

            header('Location: ../DonorIndex.php');
            return;

    }
    else {
        $_SESSION['error']="All fields requred";
        header("Location: details.php");
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
 <div class="signup-form">
<form method="post" class="form-signin">

 <h2>Enter the Details</h2>

<hr>
    <div class="form-group">
  <div class="row">
    <div class="col-lg-12">
     <div class="form-group">
      <input type="text" class="form-control" name="bank" placeholder="Bank_Name" >
      <br>
    </div>
   </div>
<div class="col-lg-12">
  <div class="form-group">
          <input type="password" class="form-control" name="ifsc_code" placeholder="IFSC_Code" >
          <br>
  </div>
</div>
     <div class="col-lg-12">
      <div class="form-group">
        <input type="text" class="form-control" name="account" placeholder="Acc_Number" >
        <br>
      </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
      <input type="text" class="form-control" name="donation" placeholder="Initial_donation" >
      <br>
     </div>
  </div>
 <div class="col-lg-12">
     <div class="form-group">
    <input type="submit"  class="btn btn-lg btn-primary btn-bloc" value="Submit">
    <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel">
 </div>
</div>
</div>
</div>
 </div>
</form>
</div>
</body>
</html>
