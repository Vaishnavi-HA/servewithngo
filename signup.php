<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="form.css">

</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="username" placeholder="User Name" required="required"></div>
			</div>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required="required">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="phone" placeholder="Phone" required="required">
        </div>
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
            </select>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
        	<div class="form-group">
        <input type="submit"  class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel">
        </div>

    </form>
</div>
</body>
</html>
