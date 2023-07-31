<?php
$voter_idErr = $passwordErr = $nameErr = $addressErr = $countryErr =$stateErr= $zip_codeErr = $emailErr= $sexErr = $contactErr="";
session_start();
$voter_id = $password = $name = $address = $country = $state = $zip_code = $email = $sex = $language = $contact_no ="";
$languagearr= array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register Form</title>
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
<form class="row g-3 needs-validation backimg p-5" method="POST" action= "control.php">
      <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center ">New Voter Registration Form</h2>
      <span class="error">* required field</span>
  <div class="col-md-4">
    <label for="voter_id" class="form-label">Voter Id: </label>
    <input type="number" class="form-control" id="voter_id" name="voter_id" value="<?php if(!empty($_SESSION['voter_id'])){echo  $_SESSION['voter_id'];}else {echo  $voter_id;} ?>">
    <span class="error">*<?php if(!empty($_SESSION['voter_idErr'])){echo  $_SESSION['voter_idErr'];}else {echo  $voter_idErr;}?></span>
  </div>
  <div class="col-md-4">
    <label for="password" class="form-label">Password : </label>
    <input type="password" class="form-control" id="password" value="<?php if(!empty($_SESSION['password'])){echo  $_SESSION['password'];}else {echo  $password;}?>" name="password">
    <span class="error">*<?php if(!empty($_SESSION['passwordErr'])){echo  $_SESSION['passwordErr'];}else {echo  $passwordErr;}?></span>
  </div>
<div class="col-md-4">
    <label for="name" class="form-label">Name : </label>
    <input type="text" class="form-control" id="name" value="<?php if(!empty($_SESSION['name'])){echo  $_SESSION['name'];}else {echo  $name;}?>" name="name">
  <span class="error">*<?php if(!empty($_SESSION['nameErr'])){echo  $_SESSION['nameErr'];}else {echo  $nameErr;}?></span>
</div>
      <div class="col-md-4">
    <label for="address" class="form-label">Address : </label>
    <input type="text" class="form-control" id="address" value="<?php if(!empty($_SESSION['address'])){echo  $_SESSION['address'];}else {echo  $address;}?>" name="address">
        <span class="error">*<?php  if(!empty($_SESSION['addressErr'])){echo  $_SESSION['addressErr'];}else {echo  $addressErr;}?></span>
      </div>
    
      <div class="col-md-3">
    <label for="country" class="form-label">Country : </label>
    <select class="form-select" name="country" id="country">
      <option value="null">Select a country</option>
      <option value="Australia" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="Australia") {echo "selected";} ?>>Australia</option>
      <option value="Australia" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="Afghanistan") {echo "selected";} ?>>Afghanistan</option>
      <option value="Bangladesh" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="Bangladesh") {echo "selected";} ?>>Bangladesh</option>
      <option value="India" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="India") {echo "selected";}?>>India</option>
      <option value="Pakistan" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="Pakistan") {echo "selected";} ?>>Pakistan</option>
    <option value="UAE" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="UAE") {echo "selected";} ?>>UAE</option>
      <option value="UK" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="UK") {echo "selected";} ?>>UK</option>
      <option value="Zimbabwe" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="Zimbabwe") {echo "selected";} ?>>Zimbabwe</option>
    </select>
        <span class="error">*<?php if(!empty($_SESSION['countryErr'])){echo  $_SESSION['countryErr'];}else {echo  $countryErr;}?></span>
      </div>
      <div class="col-md-4">
    <label for="state" class="form-label">State : </label>
    <input type="text" class="form-control" id="state" value="<?php if(!empty($_SESSION['state'])){echo  $_SESSION['state'];}else {echo  $state;};?>" name="state">
        <span class="error">*<?php if(!empty($_SESSION['stateErr'])){echo  $_SESSION['stateErr'];}else {echo  $stateErr;}?></span>
      </div>
      <div class="col-md-3">
    <label for="zip_code" class="form-label">ZIP Code : </label>
    <input type="number" class="form-control" id="zip_code" name="zip_code" value="<?php if(!empty($_SESSION['zip_code'])){echo  $_SESSION['zip_code'];}else {echo  $zip_code;}?>">
        <span class="error">*<?php if(!empty($_SESSION['zip_codeErr'])){echo  $_SESSION['zip_codeErr'];}else {echo  $zip_codeErr;}?></span>
      </div>
      <div class="col-md-4">
    <label for="email" class="form-label">Email : </label>
    <input type="email" class="form-control" id="email" value="<?php if(!empty($_SESSION['email'])){echo  $_SESSION['email'];}else {echo  $email;};?>" name="email">
        <span class="error">*<?php if(!empty($_SESSION['emailErr'])){echo  $_SESSION['emailErr'];}else {echo  $emailErr;}?></span>
      </div>
      <div class="col-md-3">
        <label for="sex" class="form-label">Sex : </label>
        <span class="error">*<?php if(!empty($_SESSION['sexErr'])){echo  $_SESSION['sexErr'];}else {echo  $sexErr;}?></span>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" value="Male" <?php if(isset($_SESSION['sex']) && $_SESSION['sex']=="Male") echo "checked";?>>
  <label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" value="Female" <?php if(isset($_SESSION['sex']) && $_SESSION['sex']=="Female") echo "checked";?>>
  <label class="form-check-label" for="female">Female</label>
      </div>
      </div>
      
      <div class="col-md-3">
        <label for="contact_no" class="form-label">Contact No : </label>
  <input type="number" class="form-control" aria-label="about" name="contact_no" value="<?php echo $contact_no;?>">
  <span class="error">*<?php if(!empty($_SESSION['contactErr'])){echo  $_SESSION['contactErr'];}else {echo  $contactErr;}?></span>
      </div>
      <div class="col-md-3">
        <label for="language" class="form-label">Language : </label>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="language" value="English" name="language[]" <?php foreach($languagearr as $v){
  if($v=="English"){
    echo "checked";}
}
?>>
  <label class="form-check-label" for="english">English</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="language" value="Non English" name="language[]" <?php foreach($languagearr as $v){
  if($v=="Non English"){
    echo "checked";}
}
?>>
  <label class="form-check-label" for="non_english">Non English</label>
  </div>
      </div>
  <div class="col-20 text-center">
    <input class="btn btn-success m-5" name="register" type="submit" value="Submit">
    <input class="btn btn-primary m-5" name="signin" type="submit" value="Login">
  </div>
      </form>
      <?php include "footer.php";?>
</body>
</html>