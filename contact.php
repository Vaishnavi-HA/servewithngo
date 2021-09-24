
<?php

if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['city'])&&isset($_POST['subject'])){
       if((strlen($_POST['firstname'])>0)&&(strlen($_POST['lastname'])>0)&&(strlen($_POST['city'])>0)&&(strlen($_POST['subject'])>0)){
        $stmt = $pdo->prepare('INSERT INTO feedback (fname,lname,city,fback) VALUES ( :fn, :nm, :ci, :su)');
            $stmt->execute(array(
            ':fn' => $_POST['firstname'],
            ':nm' => $_POST['lastname'],
            ':ci' => $_POST['city'],
            ':su' => $_POST['subject'],
          ));
           $_SESSION['success'] = "Record inserted";

      }
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
 <?php include("links/bootstraplink1.php"); ?>
<style>

* {box-sizing: border-box;}



  .container {
  margin-top: 0px;
  margin-bottom: 70px;
  min-height: 100%;

}



.info1{
  font-size: 2rem;

margin-top: 30px;
  margin-bottom:50px;
  font-family: 'Merienda One', cursive;
  text-align: center;
   color:  #f2f2f2;
}


.icon1{
margin:40px 700px 60px 200px;
padding-left: 20px;
}

  .bottom-font{
  font-size: 1rem;

  margin-left: 50px;

}

.icon-space{
  margin-left: 20px;
}

.feedbtn{
    margin-left: 100px;
  }

  .form-control1 {
    height: 41px;

    background: #f2f2f2;
    box-shadow: none;
    border: none;
  }

  .form-control1:focus {
    border-color: #70c5c0;
  }

  .form-control1, .btn {
    border-radius: 2px;
  }

  .login-form1 {
    width: 350px;
    height: 150px;
    /* margin:25px 10px 30px 200px; */
    margin-left: 200px;

  }

   .login-form1 form {
    border-radius: 2px;

    font-size: 13px;
    background: #ececec;
    background-color: rgba(0, 0, 0, 0.3);
     padding: 30px;

  }

  .login-form1 h2 {
    font-size: 22px;
     margin: 5px 0 10px;
  }

</style>
</head>
<body class="home">
<div class="container">

<!-- <div class="cont-color"> -->
  <!-- <hr> -->
 <div class="row">
 <div class="col-lg-6">
    <p class="info1"> Contact Us</p>
   <div class="row bottom-font">
     <div class="col-lg-4">
       <img src="images/Location.png" class="icon-space" alt=""></br>
       Malathahally Bangalore</br>560056<br /> <br />
     </div>
     <div class="col-lg-4 ">
       <img src="images/phone-call.png" class="icon-space" alt=""></br>
       9999888823</br>
       9999888883
     </div>
     <div class="col-lg-4">
         <img src="images/gmail.png" class="icon-space" alt=""></br>ngohelpline@gmail.com
     </div>

   </div>
  </div>



<div class="col-lg-6 ">
  <div class="login-form1">
      <form class="form-signin"  method="post">
          <h2 class="text-center head">Feed back</h2>
          <div class="form-group">
          	<input type="text" class="form-control1" name="firstname" placeholder="First Name" style="width:290px">
          </div>
  		<div class="form-group">
              <input type="text" class="form-control1" name="lastname" placeholder="Last Name" style="width:290px">
          </div>
          <div class="form-group">
            <select type="text" class="form-control1" name="lastname" placeholder="Last Name" style="width:290px" id="city" name="city">
              <option value="bangalore">Bangalore</option>
              <option value="hyderbad">Hyderbad</option>
              <option value="chennai">Chennai</option>
              <option value="other">Mumbai</option>
            </select>
              </div>
              <div class="form-group">
                      <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px;width:290px;"></textarea>
                  </div>
          <input type="submit"  class="btn btn-md taskbtn btn-bloc feedbtn" value="Submit" />

      </form>
  </div>
</div>
<div class="text-center icon1">
  <a href="https://twitter.com/"><img src="images/twitter(1).png" alt=""></a>
  <a href="https://facebook.com/"><img src="images/facebook.png" alt=""></a>
  <a href="https://instagram.com/"><img src="images/instagram(1).png" alt=""></a>
</div>

</div>

</div>




</body>
</html>
