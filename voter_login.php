<?php
session_start();
if(empty($_SESSION['data'])){
header("location:login.php");
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Dashboard</title>
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


<form class="vh-100 db_back" method="post" action="control.php">
<div class="container py-5 h-100">
    <div class="d-flex justify-content-end" >
        <input type="submit" class="btn btn-danger" name="logout" value="Logout">
    </div>
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark mb-5" style="border-radius: 1rem;">
        <div class="p-2">
        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center">Voter Details</h2>
              <p class="text-dark-50 mb-5 d-flex justify-content-center">Please enter Your Aadhar No/ Pan No and password!</p>
              <p class="text-dark-50 mb-5 d-flex justify-content-center">If You haven't Aadhar No or Pan No then don't fill this Field</p>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Aadhar No/ Pan No: </label>
                <input type="text" id="v_id" class="form-control form-control-lg" name="v_id"/>
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
              </div>
              <div class="card-body p-2 text-center">
              <input class="btn btn-primary btn-lg px-5" type="submit" value="Next" name="vote_portal">
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
if(isset($_SESSION['wrong_password'])) {
?>
<script>
    swal({
        title: "Wrong Password",
        text: "Please enter Valid Password",
        icon: "warning",
        buttons: "OK",
    });
</script>
<?php unset($_SESSION['wrong_password']);} ?>