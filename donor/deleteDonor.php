

<?php
session_start();
require_once "../pdo.php";
if(!isset($_SESSION['admin_id'])){
    die("Login first");
}
if(!isset($_GET['donor_id'])){
    die("No param");
}
if(isset($_POST['cancel'])){
    header('Location: ../adminIndex.php');
    return;
}
else if(isset($_POST['submit'])){
$stmt3 = $pdo->query( "DELETE FROM `ngo_account` WHERE `ngo_account`.`donor_id` =".$_GET['donor_id']);

$stmt4 = $pdo->query( "DELETE FROM `donor_login` WHERE `donor_login`.`donor_id` =".$_GET['donor_id']);

$stmt5 = $pdo->query( "DELETE FROM `items` WHERE `items`.`donor_id` =".$_GET['donor_id']);
$stmt6 = $pdo->query( "DELETE FROM `donor` WHERE `donor`.`donor_id` =".$_GET['donor_id']);


header('Location: ../adminIndex.php');
return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="../style.css">

</head>
<body  class="text-center home">

  <div class="login-form">
      <form class="form-signin"  method="post" action="">
          <h2 class="text-center head">Are you sure you want to DELETE</h2>

          <input type="submit"  class="btn btn-lg taskbtn btn-bloc" name="submit" value="Yes">
          <input type="submit"  class="btn btn-lg taskbtn btn-bloc" name="cancel" value="No">

      </form>
    </div>
</body>
</html>
