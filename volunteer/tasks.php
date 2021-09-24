<?php
session_start();
require_once "../pdo.php";

if(!isset($_SESSION['volunteer_id'])){
    die("Login first");
}
if(isset($_POST['cancel'])){
    header('Location: ../volunteerIndex.php');
    return;
}

require_once "../pdo.php";
if (isset($_POST['task'])){
    if((strlen($_POST['task'])>0)){
        $stmt = $pdo->prepare('INSERT INTO `task`
        (`task`, `volunteer_id`) VALUES ( :it, :vid)');
            $stmt->execute(array(
            ':it' => $_POST['task'],
            ':vid' => $_SESSION['volunteer_id']
            ));
            header('Location: ../volunteerIndex.php');
            return;

    }
    else {
        $_SESSION['error']="All fields requred";
        header("Location: tasks.php");
        return;
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>volunteer  tasks</title>
      <?php include("../links/bootstraplink1.php"); ?>
        <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-image">
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


  <div class="col-lg-6 text-center amt-img">
      <h3>Volunteers like you are a ray of hope....<br />
        for those whose lives are plunged in the darkness of despair</h3>
  <div class="signup-form">
  <form method="post" class="form-signin">
    <h4 class="amt-img">Enter the Task</h4>
<hr>
     <div class="form-group">
      <input type="text" class="form-control" name="task"  size="50" />
    </div>
    <input type="submit"  class="btn btn-lg btn-primary btn-bloc" value="Submit">
    <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel">
      </form>
  </div>
</div>
<div class="col-lg-6 text-center ">
  <img src="../images/volunteer-1.jpg" alt="pic" style="width:540px;height:360px;margin-top:90px;">
</div>
</div>
  </div>
</body>
</html>
