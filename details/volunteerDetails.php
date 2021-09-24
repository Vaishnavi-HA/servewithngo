
<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="miniproject";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());

}

// SQL query to select data from database
$sql = "SELECT * FROM volunteer";
$result = $conn->query($sql);
$conn->close();
?>



 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Volunteer Details</title>
<?php include("navbar1.php"); ?>
     <?php include("../links/bootstraplink1.php"); ?>

     <link rel="stylesheet" href="../style.css">


 </head>
 <body class="bg-image">
   <div class="row">
     <div class="col-2"></div>
     <div class="col-lg-8 col-sm-12">
       <table class="table shadow-lg p-3 mb-5 bg-light rounded">
      <h3 class="text-center" style="font-family: 'Merienda One', cursive;margin-top:40px;">Volunteers Details</h3> <br />
      <tr class=" thead-dark" >
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Phone no</th>
      </tr>
                  <?php   // LOOP TILL END OF DATA
                       while($rows=$result->fetch_assoc())
                       {

                    ?>
                   <tr>
                       <!--FETCHING DATA FROM EACH
                           ROW OF EVERY COLUMN-->

                       <td><?php echo $rows['name'];?></td>
                       <td><?php echo $rows['email'];?></td>
                       <td><?php echo $rows['intrests'];?></td>
                       <td><?php echo $rows['phone'];?></td>

                   </tr>
                   <?php
                       }
                    ?>
      </table>

   </div>
  <div class="col-2"></div>




  </div>

</body>
</html>
