<?php

session_start();
require_once "../pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reciept</title>

    <?php include("../links/bootstraplink1.php"); ?>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="yyy text-center">
  <h2><img src="../images/heart (2).png" alt="pic" class="img">Donation reciept</h2>
</div>

<hr style="border-width: 8px " >
  <div class="row ">

  <div class="col-lg-12 col-sm-12 reciept">

<table class="center">
    <tr>
        <td>Receipt number</td>
        <td> : </td>
        <td> <?php
            $stmt3 = $pdo->query("SELECT `account_id` FROM `ngo_account` WHERE `donor_id` =".$_SESSION['donor_id']);
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            echo $rows2[0]['account_id'];
          ?></td>
    </tr>
    <tr>
        <td>Payment date & time</td>
        <td> : </td>
        <td>


<script>
var today = new Date();

var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

var dateTime = date+' '+time;

document.write(dateTime);

</script>

</td>
    </tr>
    <tr>
<td>Name </td>
  <td> : </td>
    <td>    <?php
        $stmt3 = $pdo->query("SELECT `name` FROM `donor` WHERE `donor_id` =".$_SESSION['donor_id']);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $rows2[0]['name'];
      ?><span class="sr-only"></span></a>
  </td>
</tr>
<tr>
<td>Address </td>
  <td> : </td>
    <td>    <?php
        $stmt3 = $pdo->query("SELECT `address` FROM `donor` WHERE `donor_id` =".$_SESSION['donor_id']);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $rows2[0]['address'];
      ?><span class="sr-only"></span></a>
  </td>
</tr>

<tr>
<td>Amount </td>
<td> : </td>
<td>    <?php
    $stmt3 = $pdo->query("SELECT `donations` FROM `ngo_account` WHERE `donor_id` =".$_SESSION['donor_id']);
    $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    echo $rows2[0]['donations'];
  ?><span class="sr-only"></span></a>
</td>
</tr>

</table>

</div>
</div>
<div class="row">
  <div class="col-lg-12 col-sm-12 reciept text-center">

       <h3>Thank you for donating the amount</h3>
       <br>

        <input type="button" value="Print"
      onclick="window.print()" />
    </div>

  </div>






</body>
</html>
