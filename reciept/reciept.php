<?php
session_start();
require_once "./pdo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>print receipt using javascript</title>
    <link rel="stylesheet" type="text/css" href="printReceipt.css" />

</head>
<body>
<hr>
<h1>Donation reciept</h1>
<hr>
<table>
    <tr>
        <td>Receipt number</td>
        <td> : </td>
        <td>124542151</td>
    </tr>
    <tr>
        <td>Payment date</td>
        <td> : </td>
        <td>
<p id="demo"></p>

<script>
const d = new Date();
document.getElementById("demo").innerHTML = d;
</script>
</td>
    </tr>
    <tr>
<td>Name </td>
  <td> : </td>
    <td>
       <?php

         $stmt3 = $pdo->query("SELECT 'name' FROM `donor` WHERE `donor_id` = ".$_SESSION['donor_id']);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $rows2[0]['name'];
      ?>
  </td>
</tr>
<tr>
<td>Address </td>
  <td> : </td>
    <td>    <?php
        $stmt3 = $pdo->query("SELECT `address` FROM `donor` WHERE `donor_id` =".$_SESSION['donor_id']);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $rows2[0]['address'];
      ?>
  </td>
</tr>

<tr>
<td>Amount </td>
<td> : </td>
<td>    <?php
    $stmt3 = $pdo->query("SELECT `donations` FROM `ngo_account` WHERE `donor_id` =".$_SESSION['donor_id']);
    $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    echo $rows2[0]['donations'];
  ?>
</td>
</tr>

</table>
Thank you for donating amount
<div class="print">
  <input type="button" value="Print"
onclick="window.print()" />
</div>
</body>
</html>
