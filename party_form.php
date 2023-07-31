<?php
session_start();
if(empty($_SESSION['admin_data'])){
  header("location:admin_login.php");
  exit;
}
$party_idErr = $party_nameErr = $party_logoErr ="";
$party_id = $party_name = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Party Register Form</title>
    <style>

.error {color: #FF0000;}
.output{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
}
.input{
  border: 5px solid #FF0000;
}
    </style>
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
<form class="row g-3 needs-validation backimg" method="POST" action= "control.php" enctype="multipart/form-data">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark " style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

      <h2 class="fw-bold mb-2 text-uppercase ">New Party Registration Form</h2>
      <span class="error">* required field</span>
      <div class="">
  <div class="col-md-15">
    <label for="party_id" class="form-label ">Party Id: </label>
    <input type="text" class="form-control" id="party_id" name="party_id" value="<?php if(!empty($_SESSION['party_id'])){echo  $_SESSION['party_id'];}else {echo  $party_id;} ?>">
    <span class="error">*<?php if(!empty($_SESSION['party_idErr'])){echo  $_SESSION['party_idErr'];}else {echo  $party_idErr;}?></span>
  </div>
  <div class="col-md-15">
    <label for="party_name" class="form-label">Party Name: </label>
    <input type="text" class="form-control" id="party_name" name="party_name" value="<?php if(!empty($_SESSION['party_name'])){echo  $_SESSION['party_name'];}else {echo  $party_name;} ?>">
    <span class="error">*<?php if(!empty($_SESSION['party_nameErr'])){echo  $_SESSION['party_nameErr'];}else {echo  $party_nameErr;}?></span>
  </div>
  <div class="col-md-15">
    <label for="party_logo" class="form-label">Party Logo: </label>
    <input type="file" class="form-control" id="party_logo" name="party_logo">
    <span class="error">*<?php if(!empty($_SESSION['party_logoErr'])){echo  $_SESSION['party_logoErr'];}else {echo  $party_logoErr;}?></span>
  </div>
  
  <div class="col-20 text-center">
    <input class="btn btn-success m-5" name="party_register" type="submit" value="Submit">
    <input class="btn btn-primary m-5" name="back_admin_dashboard" type="submit" value="Back">
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
      </form>
      <?php include "footer.php";?>
</body>
</html>

<?php
?>