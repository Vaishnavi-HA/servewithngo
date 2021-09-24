<?php
session_start();
require_once "../pdo.php";
if(isset($_POST['cancel'])){
    header('Location: ../index.php');
    return;
}
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && (strlen($_POST['password'])>=0)){
        $stmt3 = $pdo->query("SELECT `donor_id` FROM `donor_login` WHERE USERNAME = '".$_POST['username']."' AND PASSWORD ='".$_POST['password']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows2)>=1){
           $_SESSION['donor_id']=$rows2[0]['donor_id'];
           $_SESSION['role']= 1;
           header("Location:../donorIndex.php");
           return;
        } else {
            $_SESSION['error']="Wrong Username and Password";
            header("Location: donorLogin.php");
            return;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO - login</title>

<link rel="stylesheet" href="../form.css">
    <?php include("../links/bootstraplink1.php"); ?>
  <link rel="stylesheet" href="../style.css">
</head>
<body class="text-center bg-image">

<?php
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-success" role="alert">';
        echo $_SESSION['success'];
        unset ($_SESSION['success']);
        echo '</div>' ;
    }

    if(isset($_SESSION['error'])){
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        echo '</div>';
    }
?>

<div class="login-form">
    <form class="form-signin"  method="post">
        <h2 class="text-center head">Donor Login</h2>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <input type="submit"  class="btn btn-lg btn-primary btn-bloc" value="Submit">
        <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="cancel">
		<div class="bottom-action clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>

        </div>
    </form>
    <p class="text-center small">Don't have an account? <a href="../signup/donorSignup.php">Sign up here!</a></p>
</div>
</body>
</html>
