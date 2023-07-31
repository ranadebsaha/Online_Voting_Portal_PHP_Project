<?php
session_start();
if(empty($_SESSION['data'])){
header("location:login.php");
exit;
}
$data=$_SESSION['data'];
?>
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
    <section class="vh-50" style="background-color: #ffffff;">
    <div class="container py-5 h-50" >
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col col-xl-10" >
        <div class="card mb-5" style="border-radius: 15px;">
          <div class="card-body p-4" style="background-color: #ffff95;">
            <h2 class="mb-3">Profile</h2>
            <?php if($data['status']==0){echo "<strong>Please Give Vote First then you can Download your Certificate</strong>";}?>
            <hr class="my-4">
            <div class="row d-flex">
              <h5>Voter Id: <?php echo $data['voter_id'];?></h5> 
              <h5>Name: <?php echo $data['Name'];?></h5> 
              <h5>Address: <?php echo $data['Address'];?></h5> 
              <h5>Country: <?php echo $data['country'];?></h5> 
              <h5>State: <?php echo $data['state'];?></h5> 
              <h5>Zip Code: <?php echo $data['zip_code'];?></h5> 
              <h5>Email: <?php echo $data['email'];?></h5> 
              <h5>Gender: <?php echo $data['sex'];?></h5> 
              <h5>Aadhar No/ Pan No: <?php echo $data['v_id'];?></h5> 
              <h5>Language: <?php echo $data['language'];?></h5> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<form action="control.php" method="post">
  <div class="text-center mb-4"> 
        <input type="submit"  class="btn btn-primary" name="logout" value="Logout">
        <input type="submit"  class="btn btn-info" name="back_dashboard" value="Back">
        <button class="btn btn-info" onclick="window.print(); return false;" >Print</button>
        <input type="submit"  class="btn btn-success" name="certificate" value="Certificate" <?php if($data['status']==0){echo "disabled";}?>>
    </div>
</form>
<?php include "footer.php";?>
</body>
</html>
