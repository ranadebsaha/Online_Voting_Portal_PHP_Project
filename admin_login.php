<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    <form class="vh-100 backimg" method="post" action="control.php">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark " style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="">

              <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
              <p class="text-dark-50 mb-5">Please enter Admin User Id and password!</p>
              <?php 
              session_start();
            $user_id=""; 
            if(!empty($_SESSION['loginErr'])){
              $loginErr=$_SESSION['loginErr'];
              if(!empty($_SESSION['user_id'])){
              $user_id=$_SESSION['user_id'];
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
              <label class="form-label" for="typeEmailX">User Id</label>
                <input type="text" id="user_id" class="form-control form-control-lg" name="user_id" value="<?php echo  $user_id;?>"/>
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
              </div>

              

              <input class="btn btn-primary btn-lg px-5" type="submit" name="admin_login" value="Login">

            </div>
            <div>
              <p class="mb-0">For Voters Login <a href="login.php" class="text-dark-50 fw-bold">Login</a>
              </p>
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
unset($_SESSION['user_id']);
?>

<?php
if(isset($_SESSION['admin_logout'])){
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
  unset($_SESSION['admin_logout']);
}
?>