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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Certificate</title>
</head>
<body>
<div class="outer-border">
<div class="inner-dotted-border">
      <div class="certificate">
       <span class="certification">Certificate of Vote</span>
       <br><br>
       <span class="certify"><i>This is to certify that</i></span>
       <br><br>
       <span class="name"><b><?php echo $data['Name'];?></b></span><br/><br/>
       <span class="certify"><i>has successfully voted on </i></span> <br/><br/>
       <span class="fs-30">RDS Online Voting Portal</span> <br/><br/>
       <span class="fs-20">His/Her Voter Id is <b><?php echo $data['voter_id'];?></b></span> <br/><br/><br/><br/>
       <span class="certify"><i>dated</i></span><br>
      <span class="fs-30"><?php echo date('d-m-y');?></span><br>
<span class="certify"><i>The Right To Vote is guaranteed by the Constitution of India under Article 326 of the Indian Constitution.</i></span>
<div class="d-flex justify-content-end px-5">
      <img src="./img/sign.jpeg" width="100px" alt="sign">
      <hr class="my-3">
</div>
      <div class="d-flex justify-content-end px-4">
      <span class="certify"><i>Ranadeb Saha</i></span>
</div>
<div class="d-flex justify-content-end">
<span class="fs-18">(Developer of RDS Online Voting Portal)  </span>
</div>
</div>
</div>
</div>
<form action="control.php" method="post">
  <div class="container py-5 h-50 text-center" >
    <div class=" m-2"> 
        <input type="submit"  class="btn btn-info" name="back_voter_info" value="Back">
        <button class="btn btn-info" onclick="window.print(); return false;" >Print</button>
        </div>
</div>
</form>
</body>
</html>