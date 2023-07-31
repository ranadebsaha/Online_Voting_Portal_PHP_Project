<?php
//Connection to Database..
$servername= "localhost:3308";
$username="root";
$password="";
$dbname="online_voting_system";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connect error: " . $conn->connect_error);
}

//register new voter
function addVoters($user){
    $voter_id=$user['voter_id'];
    $password=$user['password'];
    $name=$user['name'];
    $address=$user['address'];
    $country=$user['country'];
    $state=$user['state'];
    $zip_code=$user['zip_code'];
    $email=$user['email'];
    $sex=$user['sex'];
    $language=$user['language'];
    $contact_no=$user['contact_no'];
    
    $conn=$GLOBALS['conn'];
    $sql="insert into voters (voter_id,password,name,address,country,state,zip_code,email,sex,language,contact_no) values(?,?,?,?,?,?,?,?,?,?,?)";
    $st=$conn->prepare($sql);
    $st->bind_param("ssssssissss",$voter_id,$password,$name,$address,$country,$state,$zip_code,$email,$sex,$language,$contact_no);
    $req=$st->execute();
    if(!$req){
        echo $req;
        $st->close();
    } else{
        session_start();
        $_SESSION['status']='success';
        $_SESSION['value']=$voter_id;
        header("location:login.php");
    }
}

//check a Voter Id is already registerd or not
function checkVoter_id($voter_id){
    
    $voter_id=$voter_id;
    $conn=$GLOBALS['conn'];
    $sql="select * from voters where voter_id= ?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$voter_id);
    $st->execute();
    $res=$st->get_result();
    $num=mysqli_num_rows($res);
    if($num==0){
        return true;
    } else{
        return false;
}
}

//login a voter
function loginVoter($v,$p){
    $voter_id=$v;
    $password=$p; 
    $conn=$GLOBALS['conn'];
    $sql="select * from voters where voter_id= ? AND password = ? ";
    $st=$conn->prepare($sql);
    $st->bind_param("ss",$voter_id,$password);
    $st->execute();
    $res=$st->get_result();
    if(!$res){
        echo "Error";
    } else{
        $num=mysqli_num_rows($res);
            if($num==1){
                $data= $res->fetch_assoc();
                session_start();
                $_SESSION['data']=$data; 
                header("location:voter_dashboard.php");
                
                } else {
                    session_start();
                    $_SESSION['loginErr']="Please Enter Valid Password";
                    $_SESSION['voter_id']= $voter_id;
                    header("location:login.php");
                }
}
}

function checkVote($v){
    $voter_id=$v;
    $conn=$GLOBALS['conn'];
    $sql="select * from voters where voter_id= ?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$voter_id);
    $st->execute();
    $res=$st->get_result();
    $data=$res->fetch_assoc();
    if($data['status']==0){
        return true;
    } else{
        return false;
}
}

//Fetch Party List from database
function getParty(){
    $conn=$GLOBALS['conn'];
    $sql="select * from vote";
    $result=$conn->query($sql);
    $party=array();
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){  
           $party[]=$row;
        }
    }
    return $party;
}

//Vote button function on vote page
function vote($v,$pi){
    $voter_id=$v;
    $party_id=$pi;
    $num=1;
    $conn=$GLOBALS['conn'];
    $sql="update vote set total_vote=(total_vote+1) where party_id=?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$party_id);
    $res1=$st->execute();
    $sql="update voters set status=? where voter_id=?";
    $st=$conn->prepare($sql);
    $st->bind_param("is",$num,$voter_id);
    $res2=$st->execute();
    if(!$res1 && !$res2){
        echo $con->error;
    }
    else{
        return true;
}
}

function checkVoters($v,$p){
    $voter_id=$v;
    $password=$p;
    $conn=$GLOBALS['conn'];
    $sql="select * from voters where voter_id= ? and password=?";
    $st=$conn->prepare($sql);
    $st->bind_param("ss",$voter_id,$password);
    $st->execute();
    $res=$st->get_result();
    $num=mysqli_num_rows($res);
    if($num==0){
        return true;
    } else{
        return false;
}
}

//Add aadhar or pan or voter id
function addV_id($vi,$v){
    $voter_id=$vi;
    $v_id=$v;
    $conn=$GLOBALS['conn'];
    $sql="update voters set v_id=? where voter_id=?";
    $st=$conn->prepare($sql);
    $st->bind_param("ss",$v_id,$voter_id);
    $res=$st->execute();
    if(!$res){
        echo $con->error;
    }
    else{
        return true;
}
}

//Admin login
function adminLogin($id,$p){
    $user_id=$id;
  $password=$p;
  $conn=$GLOBALS['conn'];
  $sql="select * from admin where user_id= ? AND password = ? ";
  $st=$conn->prepare($sql);
  $st->bind_param("ss",$user_id,$password);
  $st->execute();
  $res=$st->get_result();
  if(!$res){
      echo "Error";
  } else{
      $num=mysqli_num_rows($res);
          if($num==1){
              $data= $res->fetch_assoc();
              session_start();
              $_SESSION['admin_data']=$data; 
              $_SESSION['admin_login']=true; 
              header("location:admin_dashboard.php");
              } else {
                  session_start();
                  $_SESSION['loginErr']="Please Enter Valid Password";
                  $_SESSION['user_id']= $user_id;
                  header("location:admin_login.php");
              }
}
}

//Check this admin is valid or not
function checkAdmin($id){
    $user_id=$id;
    $conn=$GLOBALS['conn'];
    $sql="select * from admin where user_id= ?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$user_id);
    $st->execute();
    $res=$st->get_result();
    $num=mysqli_num_rows($res);
    if($num==0){
        return true;
    } else{
        return false;
}
}

//Fetch all voters
function getVoter(){
    $conn=$GLOBALS['conn'];
    $sql="select * from voters";
    $result=$conn->query($sql);
    $voter=array();
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){  
           $voter[]=$row;
        }
    }
    return $voter;
}

//check Party Id is exist or not
function checkParty_id($id){
    $party_id=$id;
    $conn=$GLOBALS['conn'];
    $sql="select * from vote where party_id= ?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$party_id);
    $st->execute();
    $res=$st->get_result();
    $num=mysqli_num_rows($res);
    if($num==0){
        return true;
    } else{
        return false;
}
}

//Add new Party
function addParty($user){
    $party_id=$user['party_id'];
    $party_name=$user['party_name'];
    $party_logo=$user['party_logo'];
    
    $conn=$GLOBALS['conn'];
    $sql="insert into vote (party_id,party_name,party_logo) values(?,?,?)";
    $st=$conn->prepare($sql);
    $st->bind_param("sss",$party_id,$party_name,$party_logo);
    $req=$st->execute();
    if(!$req){
        echo $req;
        $st->close();
    } else{
        session_start();
        $_SESSION['status']='success';
        $_SESSION['value']=$party_name;
        header("location:admin_dashboard.php");
    }
}

//Delete Party
function deleteParty($id){
    $party_id=$id;
    $conn=$GLOBALS['conn'];
    $sql="delete from vote where party_id=?";
    $st=$conn->prepare($sql);
    $st->bind_param("s",$party_id);
    $req=$st->execute();
    if(!$req){
        echo $req;
        $st->close();
    } else{
        session_start();
        $_SESSION['status']='delete';
        $_SESSION['value']=$party_id;
        header("location:admin_view_vote.php");
    }
}

//fetch party from database for admin view 
function getPartyAce(){
    $conn=$GLOBALS['conn'];
    $sql="select * from vote ORDER by total_vote DESC";
    $result=$conn->query($sql);
    $party=array();
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){  
           $party[]=$row;
        }
    }
    return $party;
}
?>