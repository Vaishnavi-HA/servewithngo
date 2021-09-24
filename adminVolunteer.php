
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO MANAGEMENT SYSTEM</title>

    <?php include("links/bootstraplink1.php"); ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php


 if(isset($_SESSION['admin_id'])){
    require_once "./adminV.php";
}
else {
    header('Location: index.php');
}
 ?>

</body>
</html>
