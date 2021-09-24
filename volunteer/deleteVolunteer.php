
<?php
session_start();
require_once "../pdo.php";
if(!isset($_SESSION['admin_id'])){
    die("Login first");
}

if(isset($_POST['cancel'])){
    header('Location: ../adminV.php');
    return;
}
else if(isset($_POST['submit'])){
$stmt3 = $pdo->query( "DELETE FROM `volunteer` WHERE `volunteer`.`volunteer_id` =".$_GET['volunteer_id']);
header('Location: ../adminV.php');
return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Volunteer</title>
    <?php include("../links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="../style.css">

</head>
<body  class="text-center bg-image">
    <div class="login-form">
        <form class="form-signin"  method="post" action="">
            <h2 class="text-center head">Are you sure you want to DELETE</h2>

            <input type="submit"  class="btn btn-lg taskbtn btn-bloc" name="submit" value="Yes">
            <input type="submit"  class="btn btn-lg taskbtn btn-bloc" name="cancel" value="No">

        </form>
      </div>
</body>
</html>
