<?php
require "db.php";
session_start();
if(empty($_SESSION['admin_data'])){
    header("location:admin_login.php");
    exit;
}
// $i=0;
// $party=getParty();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <section class="vh-100 backimg">
    <div class="container py-5 h-100"> 
   
    <form action="control.php" method="post">
    <div class="d-flex justify-content-end m-2"> 
        <input type="submit"  class="btn btn-danger" name="admin_logout" value="Logout">
        </div>
      <div class="col-15 col-md-15 col-lg-15 col-xl-15">
        <div class="row d-flex justify-content-center align-items-center h-50" >
    <div class="d-flex justify-content-center"> 
        <input type="submit"  class="btn btn-success" name="view_vote" value="View Vote">
        </div>
    <div class="d-flex justify-content-center"> 
        <input type="submit"  class="btn btn-success" name="view_voter" value="View Existing Voter">
        </div>
    <div class="d-flex justify-content-center"> 
        <input type="submit"  class="btn btn-success" name="add_party" value="Add a Party">
        </div>
</div>
</form>
</div>
</section>
<?php include "footer.php";?>
</body>
</html>

<?php
if(!empty($_SESSION['admin_login'])){
?>
  <script>
    swal({
  title: "Welcome Back Admin",
  text: "Thank you to use RDS Voting Portal",
  icon: "success",
  button: "OK",
});
  </script>
  <?php
  unset($_SESSION['admin_login']);
}

if(isset($_SESSION['status']) && $_SESSION['status']=="success"){
    $value=$_SESSION['value'];
  ?>
    <script>
      swal({
    title: "Party Registration Successfully Done",
    text: "<?php echo $value." Party Registered Successfully";?>",
    icon: "success",
    button: "OK",
  });
    </script>
    <?php
    unset($_SESSION['status']);
    unset($_SESSION['value']);
  }
?>