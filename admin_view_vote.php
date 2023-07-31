<?php
require "db.php";
session_start();
if(empty($_SESSION['admin_data'])){
    header("location:admin_login.php");
    exit;
}
$i=0;
$party=getPartyAce();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <h3>Still Now <b><?=$party[0]['party_id']?>(<?=$party[0]['party_name']?>)</b> Win This Election</h3>
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-15 col-md-15 col-lg-15 col-xl-15">
        <table border=5px style="width:100%" class="portal-t">
        <tr style="font-size:25px">
            <th>ID</th>          
            <th>Party Logo</th>
            <th>Party Code</th>
            <th>Party Name</th>
            <th>Total Vote</th>
        <tr>
        <?php foreach($party as $p){?>
            <tr style="height:100px; font-size:20px">
                <td><?=++$i?></td>
                <td>
                    <img src="<?php echo "upload/".$p['party_logo'];?>" class="m-2" width="100px" alt="party_logo">
                    </td>
                <td><?=$p['party_id']?></td>
                <td><?=$p['party_name']?></td>
                <td><?=$p['total_vote']?></td>
                <td>
                <form method="post" action="control.php" >
                <input type="hidden" name="vote_id" value="<?=$p['party_id']?>">
                <input type="submit" name="delete_party" value="Delete" class="btn btn-danger btn-lg px-5 delete_btn_ajax">
                </form>
                </td>
            <tr>
        <?php } ?>
    <table>
</div>
</div>
<div class="text-center m-2"> 
        <input type="submit"  class="btn btn-primary" name="admin_logout" value="Logout">
        <input type="submit"  class="btn btn-warning" name="back_admin_dashboard" value="Back">
    <button class="btn btn-success" onclick="window.print(); return false;" >Print</button>
        </div>
 </div>
        </form>
        
</body>
</html>

<?php
if(!empty($_SESSION['status']) && $_SESSION['status']=="delete"){
    $value=$_SESSION['value'];
?>
  <script>
    swal({
  title: "Deleted Successfully Done",
  text: "<?php echo $value." Party Deleted Successfully";?>",
  icon: "success",
  button: "OK",
});
  </script>
  <?php
  unset($_SESSION['status']);
  unset($_SESSION['value']);
}
?>