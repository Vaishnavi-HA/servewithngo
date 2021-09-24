<?php
session_start();
require_once "../pdo.php";



 if(!isset($_GET['donor_id'])){
     die("No param");
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
   <body class="bg-image">
   <div class="row" >
     <div class="col-3"></div>
   <div class="col-lg-6 col-sm-12">
     <table class="table shadow-lg p-3 mb-5 bg-light rounded"></br>
       <h3 class="text-center" style="font-family: 'Merienda One', cursive;">ITEMS DONATED</h3>
       <thead class="thead-dark">
         <tr class="">
           <th class="" scope="col">S.no </th>
           <th class="" scope="col">Item Name</th>
         </tr>
       </thead>
       <?php
           if(isset($_SESSION['success'])){
             echo '<div class="row alert alert-success" role="alert">';
             echo $_SESSION['success'];
             unset ($_SESSION['success']);
             echo '</div>' ;
         }

         if(isset($_SESSION['error'])){
             echo '<div class="row alert alert-danger" role="alert">';
             echo $_SESSION['error'];
             unset($_SESSION['error']);
             echo '</div>';
         }
       ?>
       <tbody class=" ">
          <?php
            $stmt3 = $pdo->query("SELECT distinct item FROM items  WHERE `donor_id` =".$_GET['donor_id'] );
            $rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
             foreach($rows as $row){
               echo "<tr class=''>";
               echo "<th scope='row' class=''>".$count."</th>";
               echo "<td class=''>".htmlentities($row['item'])."</td>";
               echo "</tr>";
             $count++;
             }
           ?>
       </tbody>
     </table>
     <a class='btn taskbtn btn-sm'style="color:black;" href='../donorAdmin.php'>Go back</a>
  </div>
  <div class="col-3"></div>
  </div>
  </div>

  </body>
  </html>
