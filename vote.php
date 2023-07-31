<?php
require "db.php";
session_start();
if(empty($_SESSION['data']) && empty($_SESSION['vote_approved'])){
header("location:login.php");
exit;
}
$party=getParty();
$data=$_SESSION['data'];
$voter_id=$data['voter_id'];
$i=0;
unset($_SESSION['vote_approved']);
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
    <div class="container py-5 h-100"> 
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-15 col-md-15 col-lg-15 col-xl-15">
        <strong>Make Sure you click on the same button which you choose because you have not able to change your opinion after click the "Vote" button</strong>
        <table border=5px style="width:100%" class="portal-t">
        <tr style="font-size:25px">
            <th>ID</th>
            
            <th>Party Code</th>
            <th>Party Logo</th>
            
            <th>Party Name</th>
        <tr>
        <?php foreach($party as $p){?>
            <tr style="height:100px; font-size:20px">
                <td><?=++$i?></td>
                
                <td><?=$p['party_id']?></td>
                <td>
                    <img src="<?php echo "upload/".$p['party_logo'];?>" class="m-2" width="100px" alt="party_logo">
                    </td>
                <td><?=$p['party_name']?></td> <br>
                <td>
                <form method="post" action="control.php" >
                <input type="hidden" name="vote_id" value="<?=$p['party_id']?>">
                <input type="submit" name="vote" value="Vote" class="btn btn-warning btn-lg px-5 delete_btn_ajax">
                </form>
                </td>
                
            <tr>
        <?php } ?>
    <table>
</div>
</div>
        </div>
        <?php include "footer.php";?>
</body>
</html>
