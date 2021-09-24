<?php
require_once "../pdo.php";
session_start();

 if(isset($_POST['cancel'])){
    header('Location: ../login/adminLogin.php');
    return;
  }

if ( isset($_POST['username'])  ) {
    if((strlen($_POST['username'])>0)&&(strlen($_POST['password'])>0)){

        $stmt5 = $pdo->query("SELECT `username` FROM `admin_login` WHERE `username`= '".$_POST['username']."';");
        $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows5)>0){
            $_SESSION['error'] = "Username Already Exist Choose a different username";
            header('Location: adminSignup.php');
            return;
        }

    if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['city'])&&isset($_POST['phone']) &&isset($_POST["address"]) && isset($_POST["dob"])){
        if((strlen($_POST['name'])>0)&&(strlen($_POST['email'])>0)&&(strlen($_POST['city'])>0)&&(strlen($_POST['phone'])>0) &&(strlen($_POST['dob'])>0) &&(strlen($_POST['address'])>0)){
            $stmt5 = $pdo->query("SELECT `email` FROM `admin` WHERE `email`= '".$_POST['email']."';");
            $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows5)>0){
                $_SESSION['error'] = "Email already exist choose a different email";
                header('Location: adminSignup.php');
                return;
            }
            $stmt5 = $pdo->query("SELECT `phone` FROM `admin` WHERE `phone`= ".$_POST['phone'].";");
            $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows5)>0){
                $_SESSION['error'] = "Phone number already exist choose a different phone number";
                header('Location: adminSignup.php');
                return;
            }

        $stmt = $pdo->prepare('INSERT INTO admin
        (name,email,city_id,phone,dob,address) VALUES ( :nm, :em, :ci, :ph, :db, :ad)');
            $stmt->execute(array(
            ':nm' => $_POST['name'],
            ':em' => $_POST['email'],
            ':ci' => $_POST['city'],
            ':ph' => $_POST['phone'],
            ':db' => $_POST['dob'],
            ':ad' => $_POST['address'])
            );


            $stmt3 = $pdo->query("SELECT * FROM `admin` WHERE `admin_id`= (SELECT MAX(`admin_id`) FROM `admin`)");
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            if(($_POST['email']!=$rows2[0]['email'])||($_POST['phone']!=$rows2[0]['phone'])){
                $_SESSION['error']="Something went wrong please try again";
                header('Location: adminSignup.php');
                return;
            }


            $stmt1 = $pdo->prepare('INSERT INTO admin_login(username,password,admin_id) VALUES ( :ur, :pw, :dn)');
            $stmt1->execute(array(
                ':ur' => $_POST['username'],
                ':pw' => $_POST['password'],
                ':dn' => $rows2[0]['admin_id'],)
                );$_fal="Record inserted";

                $_SESSION['success'] = "Signin is successfull";
                header('Location: ../login/adminLogin.php');

            }
            else{
                $_SESSION['error'] = "Everything is required";
                header("Location: adminSignup.php");
                return;
            }
        }
    }
}

$stmt3 = $pdo->query("SELECT * FROM city");
$rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../form.css">
    <?php include("../links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="../style.css">
    <title>ADMIN SIGNUP</title>

</head>
<body class="bg-image">
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
    <h2>Sign Up</h2>
    <p>Please fill in this form to create an account!</p>
    <hr>
        <div class="form-group">
      <div class="row">
        <div class="col-12">
            <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="User Name" >
        </div>
      </div>
    <div class="col">
        <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
    </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" >
          </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="date" class="form-control" name="dob" placeholder="dob" >
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" >
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
          <input type="address" class="form-control" name="address" placeholder="Address" >
        </div>
        </div>
       <div class="col-12">
          <div class="form-group">
           <input type="text" class="form-control" name="phone" placeholder="Phone" >
         </div>
       </div>
  <div class="col-12">
    <div class="form-group">
    <p> City :
        <select id="city" name="city">
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
</body>
</html>
