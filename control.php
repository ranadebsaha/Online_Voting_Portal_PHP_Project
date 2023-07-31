<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require "db.php";
$voter_id = $password = $name = $address = $country = $state = $zip_code = $email = $sex = $language = $contact_no ="";
$languagearr= array();
session_start();

function test_input($data) {

  $data = trim($data);
  
  $data = stripslashes($data);
  
  $data = htmlspecialchars($data);
  
  return $data;
  }

//Register new voters
if (isset($_POST['register'])) {
    $_SESSION['voter_id']=$_POST['voter_id'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['name']=$_POST['name'];
    $_SESSION['address']=$_POST['address'];
    $_SESSION['country']=$_POST['country'];
    $_SESSION['state']=$_POST['state'];
    $_SESSION['zip_code']=$_POST['zip_code'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['sex']=$_POST['sex'];
    // $_SESSION['l']=$_POST['language'];
    // $language=implode(", ",$l);
    $_SESSION['contact_no']=$_POST['contact_no'];

if (empty($_POST["voter_id"])) {
  $_SESSION['voter_idErr'] = "Voter Id is required";
    }
elseif (strlen($_POST["voter_id"])<10){
    $_SESSION['voter_idErr']= "Voter Id length can not less then 10 digits";
}
else { 
  $err=checkVoter_id($_POST["voter_id"]);
  if($err===true){
  $voter_id = $_POST["voter_id"];
  } else{
    $_SESSION['voter_idErr']="This Voter id is already Registered";
  }
}

if (empty($_POST["password"])) {
    $_SESSION['passwordErr'] = "Password is required";
} elseif (strlen($_POST["password"])<7){
    $_SESSION['passwordErr']= "Password length Must be Greater then 7";
  
} elseif (strlen($_POST["password"])>12){
    $_SESSION['passwordErr'] = "Password length Must be less then 12";
  } 
else {
  $password = test_input($_POST["password"]);
}

if (empty($_POST["name"])) {

    $_SESSION['nameErr'] = "Name is required";
} elseif(!preg_match("/^[a-zA-Z\ ]*$/",$_POST['name'])) {
    $_SESSION['nameErr'] = "Only Alphabets and white space allowed"; }
else{
  $name = test_input($_POST["name"]);
  }

if (empty($_POST["address"])) {

  $_SESSION['addressErr'] = "Address is required";
} elseif(!preg_match("/^[a-zA-Z0-9\ ]*$/",$_POST['address'])) {
    $_SESSION['addressErr'] = "Only Alphanumeric characters and white space and "/" are allowed";
}
    else{
  $address = test_input($_POST["address"]);
}

if(isset($_POST['country']) && $_POST['country'] == 'null') { 
  $_SESSION['countryErr'] = "Must select a country.";
} else {
  $country = test_input($_POST["country"]);
}
if (empty($_POST["state"])) {
  $_SESSION['stateErr'] = "State is required";
} elseif(!preg_match("/^[a-zA-Z0-9\ ]*$/",$_POST['state'])) {
    $_SESSION['stateErr'] = "Only Alphanumeric characters and white space and "/" are allowed";
}
    else{
  $state = test_input($_POST["state"]);
}
if (empty($_POST["zip_code"])) {
  $_SESSION['zip_codeErr'] = "Zip Code is required";
} elseif(!preg_match("/^[0-9]*$/",$_POST['zip_code'])) {
  $_SESSION['zip_codeErr'] = "Only numeric Character are allowed"; }
else {
  $zip_code = test_input($_POST["zip_code"]);
}
if (empty($_POST["email"])) {
  $_SESSION['emailErr'] = "Email is required";
}
else {
$email = test_input($_POST["email"]);
}
if (empty($_POST["contact_no"])) {
  $_SESSION['contactErr'] = "Contact Number is required";
}
elseif(strlen($_POST["contact_no"])!=10){
  $_SESSION['contactErr'] = "Contact Number length must be 10";
}else{
  $contact_no=test_input($_POST["contact_no"]);
}
if (empty($_POST["sex"])) {

  $_SESSION['sexErr']= "Sex is required";

} else {
  $sex = test_input($_POST["sex"]);
}

if(empty($_POST["language"])){
}else{
  // $_SESSION['languageErr']=$_POST["language"];
// $language= implode(", ",$_POST["language"]); 
$languagearr = $_POST["language"];
}

if(empty($voter_id) || empty($password) || empty($name) || empty($address) || empty($country) || empty($state)|| empty($zip_code) || empty($email) || empty($sex) || empty($contact_no)){
  header("location:register.php");
}
else{
    session_destroy();
    $language=implode(", ",$languagearr);
$user= array(   
    'voter_id'=>$voter_id,
    'password'=>$password,
    'name'=>$name,
    'address'=>$address,
    'country'=>$country,
    'state'=>$state,
    'zip_code'=>$zip_code,
    'email'=>$email,
    'sex'=>$sex,
    'language'=>$language,
    'contact_no'=>$contact_no
);
addVoters($user);
}
}

//login a voter from login page
if(isset($_POST['login_voter'])){
  if($_POST['voter_id']!=null && $_POST['password']!=null){
      $err=checkVoter_id($_POST['voter_id']);
      if($err===true){
          session_start();
          $_SESSION['loginErr']="Please Enter Valid Voter Id and Password";
          header("location:login.php");
      }else{
  $voter_id=$_POST['voter_id'];
  $password=$_POST['password'];
  loginVoter($voter_id,$password);
  }}
  else{
      session_start();
      $_SESSION['loginErr']="Please Enter Voter Id and Password";
      header("location:login.php");
  }
}

//login button in voter_login page
if(isset($_POST['vote_portal'])){
  $v_id=$_POST['v_id'];
  $password=$_POST['password'];
  $data=$_SESSION['data'];
  $voter_id=$data['voter_id'];
  if(checkVoters($voter_id,$password)===false){
      if(checkVote($voter_id)===true){
        if(addV_id($voter_id,$v_id)===true){
        $_SESSION['vote_approved']=true;
        header("location:vote.php");
        }
      }else{
        $_SESSION['vote_already_done']=true;
        header("location:voter_dashboard.php");
      }
  }else{
    $_SESSION['wrong_password']=true;
    header("location:voter_login.php");
  }
}

//click on vote button in vote page
if(isset($_POST['vote'])){
  if(isset($_SESSION['data'])){
    $data=$_SESSION['data'];
    $voter_id=$data['voter_id'];
    $party_id=$_POST['vote_id'];
    if(vote($voter_id,$party_id)==true){
      $_SESSION['vote_done']=true;
      header("location:voter_dashboard.php");
    }
  }
}

//logout from voter pages
if(isset($_POST['logout'])){
  unset($_SESSION['data']);
  $_SESSION['logout']=true;
  header("location:login.php");
}

//click to vote button in voter_dashboard
if(isset($_POST['voter_login'])){
  header("location:voter_login.php");
}

//login button from register page
if(isset($_POST['signin'])){
  header("location:login.php");
}

//Admin Login
if(isset($_POST['admin_login'])){
  if($_POST['user_id']!=null && $_POST['password']!=null){
  $user_id=$_POST['user_id'];
  $password=$_POST['password'];
  if(checkAdmin($user_id)===true){
    $_SESSION['loginErr']="Please Enter Valid User Id and Password";
    header("location:admin_login.php");
  }else{
    adminLogin($user_id,$password);
  }}else{
    $_SESSION['loginErr']="Please Enter User Id and Password";
    header("location:admin_login.php");
  }
}

//Admin logout in admin pages
if(isset($_POST['admin_logout'])){
  unset($_SESSION['admin_login']);
  $_SESSION['admin_logout']=true;
  header("location:admin_login.php");
}

//View Party Button in admin Dashboard
if(isset($_POST['view_vote'])){
  header("location:admin_view_vote.php");
}

//Back Button in admin pages
if(isset($_POST['back_admin_dashboard'])){
  unset($_SESSION['party_id']);
  unset($_SESSION['party_name']);
  unset($_SESSION['party_idErr']);
  unset($_SESSION['party_nameErr']);
  unset($_SESSION['party_logoErr']);
  header("location:admin_dashboard.php");
}

//View Voter List Button in admin Dashboard
if(isset($_POST['view_voter'])){
  header("location:admin_view_voter.php");
}

//Add party Button in admin Dashboard
if(isset($_POST['add_party'])){
  header("location:party_form.php");
}

//Register new party
if (isset($_POST['party_register'])) {
  $_SESSION['party_id']=$_POST['party_id'];
  $_SESSION['party_name']=$_POST['party_name'];

if (empty($_POST["party_id"])) {
$_SESSION['party_idErr'] = "Party Id is required";
  }
elseif (strlen($_POST["party_id"])<3 || strlen($_POST["party_id"])>8){
  $_SESSION['party_idErr']= "Party Id length must be between 3 to 8";
}
else { 
$err=checkParty_id($_POST["party_id"]);
if($err===true){
$party_id = $_POST["party_id"];
unset($_SESSION['party_idErr']);
} else{
  $_SESSION['party_idErr']="This Party Id is already Registered";
}
}

if (empty($_POST["party_name"])) {

  $_SESSION['party_nameErr'] = "Party Name is required";
} elseif(!preg_match("/^[a-zA-Z\ ]*$/",$_POST['party_name'])) {
  $_SESSION['party_nameErr'] = "Only Alphabets and white space allowed"; }
else{
$party_name = test_input($_POST["party_name"]);
unset($_SESSION['party_nameErr']);
}

$logo=$_FILES["party_logo"];
if (empty($logo['name'])) {
  $_SESSION['party_logoErr'] = "Party logo is required";
}
else{
$name=$logo['name'];
$error=$logo['error'];
$size=$logo['size'];
$p_id=strtolower($_POST['party_id']);
$type=strtolower(pathinfo($name,PATHINFO_EXTENSION));
$source=$logo['tmp_name'];
if($error===0){
  if($type==="jpg"||$type==="jpeg"||$type==="png"){
    if($size<5000000){
      $new_name="IMG-".$p_id.".".$type;
      $path="upload/".$new_name;
      unset($_SESSION['party_logoErr']); 
    }else{
      $_SESSION['party_logoErr'] = "File size must be less then 5 MB";
    }
  }else{
    $_SESSION['party_logoErr'] = "Only jpg/jpeg/png images are allowed";
  }
}else{
  $_SESSION['party_logoErr'] = "This File have an error";
}
}
if(empty($party_id) || empty($party_name) || empty($path)) {
header("location:party_form.php");
}
else{
  unset($_SESSION['party_id']);
  unset($_SESSION['party_name']);
$user= array(
  'party_id'=>$party_id,
  'party_name'=>$party_name,
  'party_logo' => $new_name
);
move_uploaded_file($source,$path);
addParty($user);
}
}

//Delete a party
if(isset($_POST['delete_party'])){
    $party_id=$_POST['vote_id'];
    if(!deleteParty($party_id)){
      echo "Error";
    }
}

//view details of voters
if(isset($_POST['details'])){
  header("location:voter_info.php");
}

//back button in profile
if(isset($_POST['back_dashboard'])){
  header("location:voter_dashboard.php");
}

//certificate button on profile
if(isset($_POST['certificate'])){
  header("location:certificate.php");
}
//back button in certificate
if(isset($_POST['back_voter_info'])){
  header("location:voter_info.php");
}

//error page Admin Login Button
if(isset($_POST["404_admin_login"])){
  header("location:admin_login.php");
}
?>