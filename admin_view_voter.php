<?php
require "db.php";
session_start();
if(empty($_SESSION['admin_data'])){
    header("location:admin_login.php");
    exit;
}
$i=0;
$voter=getVoter();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="head">
        <div>
                <img src="./img/indian_logo.png" alt="This image is missing" height="100px" width="100px" class="image"> 
        </div>
        <div class="div2"> 
            <h1 class="h1">
            Online Voting System
            </h1>
            <h2>
                Now you can give vote anywhere anytime
            </h2>
        </div>
    </div>
<form class="portal" method="post" action="control.php">
    <div class="container py-5 h-100"> 
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-15 col-md-15 col-lg-15 col-xl-15">
        <strong></strong>
        <table border=5px style="width:100%" class="portal-t">
        <tr style="font-size:25px">
            <th>No</th>          
            <th>Voter Id</th>          
            <th>Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Gender</th>
        <tr>
        <?php foreach($voter as $p){?>
            <tr style="height:100px; font-size:20px">
                <td><?=++$i?></td>
                <td><?=$p['voter_id']?></td>
                <td><?=$p['Name']?></td>
                <td><?=$p['Address']?></td>
                <td><?=$p['country']?></td>
                <td><?=$p['state']?></td>
                <td><?=$p['zip_code']?></td>
                <td><?=$p['email']?></td>
                <td><?=$p['contact_no']?></td>
                <td><?=$p['sex']?></td>
            <tr>
        <?php } ?>
    <table>
</div>
</div>
<div class="text-center m-2"> 
        <input type="submit"  class="btn btn-danger" name="admin_logout" value="Logout">
        <input type="submit"  class="btn btn-warning" name="back_admin_dashboard" value="Back">
        <button class="btn btn-success" onclick="window.print(); return false;" >Print</button>
    </div>
 </div>
</form>
</body>
</html>