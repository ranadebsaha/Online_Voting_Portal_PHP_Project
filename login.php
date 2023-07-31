<?php
include "control.php";
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System Login</title>
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
    <div>
    <section class="vh-100 backimg">
      <form method="post" action="control.php">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark " style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-dark-50 mb-5">Please enter your Voter Id and password!</p>
              <?php 
            $voter_id=""; 
            if(!empty($_SESSION['loginErr'])){
              $loginErr=$_SESSION['loginErr'];
              if(!empty($_SESSION['voter_id'])){
              $voter_id=$_SESSION['voter_id'];
              }
              ?>
              <div class="alert alert-danger" role="alert">
                <?php
              echo $loginErr;
              unset($_SESSION['loginErr']);
            ?>
            </div>
            <?php }?>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="voter_id">Voter Id</label>
                <input type="number" id="voter_id" class="form-control form-control-lg" name="voter_id" value="<?php echo  $voter_id;?>"/>
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
              </div>

              

              <input class="btn btn-primary btn-lg px-5" type="submit" name="login_voter" value="Login">

            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-dark-50 fw-bold">Sign Up</a>
              <p class="mb-0">Go to Admin Panel <a href="admin_login.php" class="text-dark-50 fw-bold">Admin Login</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php include "footer.php";?>
</body>
</html>
<?php
if(isset($_SESSION['status']) && $_SESSION['status']=="success"){
  $value=$_SESSION['value'];
?>
  <script>
    swal({
  title: "Registration Successfully Done",
  text: "<?php echo "Now you can login using your registered Voter Id and Password. Your Registered Voter Id is ".$value;?>",
  icon: "success",
  button: "Go to Login Page",
});
  </script>
  <?php
  session_unset();
}

if(isset($_SESSION['logout'])){
?>
  <script>
    swal({
  title: "You are Sucessfully logged out",
  text: "Thank you to use RDS Voting Portal",
  icon: "success",
  button: "Go to Login Page",
});
  </script>
  <?php
  unset($_SESSION['logout']);
}
?>