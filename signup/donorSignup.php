<?php
require_once "../pdo.php";
session_start();

if(isset($_POST['cancel'])){
  header('Location: ../login/donorLogin.php');
  return;
}

if ( isset($_POST['username'])  ) {
  if((strlen($_POST['username'])>0)){
      $stmt5 = $pdo->query("SELECT `username` FROM `donor_login` WHERE `username`= '".$_POST['username']."';");
      $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
      if(count($rows5)>0){
          $_SESSION['error'] = "Username already exist choose a different username";
          header('Location: donorSignup.php');
          return;
      }
  if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['dob'])&&isset($_POST['address'])&&isset($_POST['city'])&&isset($_POST['phone'])){
      if((strlen($_POST['name'])>0)&&(strlen($_POST['dob'])>0)&&(strlen($_POST['email'])>0)&&(strlen($_POST['address'])>0)&&(strlen($_POST['city'])>0)&&(strlen($_POST['phone'])>0)){
          $stmt5 = $pdo->query("SELECT `email` FROM `donor` WHERE `email`= '".$_POST['email']."';");
          $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
          if(count($rows5)>0){
              $_SESSION['error'] = "Email already exist choose a different email";
              header('Location: donorSignup.php');
              return;
          }
          $stmt6 = $pdo->query("SELECT `phone` FROM `donor` WHERE `phone`= ".$_POST['phone'].";");
          $rows6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
          if(count($rows5)>0){
              $_SESSION['error'] = "phone number Already Exist Chose a different phone";
              header('Location: donorSignup.php');
              return;
          }
    
          $stmt = $pdo->prepare('INSERT INTO donor
          (name,email,city_id,phone,dob,address) VALUES ( :nm, :em, :ci, :ph, :db, :ad)');
              $stmt->execute(array(
              ':nm' => $_POST['name'],
              ':em' => $_POST['email'],
              ':ci' => $_POST['city'],
              ':ph' => $_POST['phone'],
              ':db' => $_POST['dob'],
              ':ad' => $_POST['address'])
              );

          $stmt3 = $pdo->query("SELECT * FROM `donor` WHERE `donor_id`= (SELECT MAX(`donor_id`) FROM `donor`)");
          $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          if(($_POST['email']!=$rows2[0]['email'])||($_POST['phone']!=$rows2[0]['phone'])){
              $_SESSION['error']="Something went wrong please try again";
              header('Location: donorSignup.php');
              return;
          }



          $stmt1 = $pdo->prepare('INSERT INTO donor_login(username,password,donor_id) VALUES ( :ur, :pw, :dn)');
          $stmt1->execute(array(
              ':ur' => $_POST['username'],
              ':pw' => $_POST['password'],
              ':dn' => $rows2[0]['donor_id'],)
              );

              $_SESSION['success'] = "Signin is successfull";
              header('Location: ../login/donorLogin.php');
      }
      else{
          $_SESSION['error'] = "everything Is Required";
          header("Location: donorSignup.php");
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
  <title>DONOR SIGNUP</title>
  <link rel="stylesheet" href="../form.css">
  <?php include("../links/bootstraplink1.php"); ?>
  <link rel="stylesheet" href="../style.css">

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
            <input type="text" class="form-control" name="username" placeholder="User Name">
          </div>
        </div>
      <div class="col-12">
          <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" />
          </div>
      </div>
          <div class="col-12">
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" >
            </div>
          </div>
          <div class="col-12">
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" >
          </div>
          </div>
          <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address">
          </div>
          </div>
          <div class="col-12">
          <div class="form-group">
            <input type="date" class="form-control" name="dob" placeholder="yyyy/mm/dd" >
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
