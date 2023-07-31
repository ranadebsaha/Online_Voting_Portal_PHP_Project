<?php
session_start();
if(empty($_SESSION['data'])){
header("location:login.php");
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Dashboard</title>
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
     <form class="vh-100 db_back" method="post" action="control.php">
    <div class="container py-5 h-100">
        <div class="d-flex justify-content-end m-2"> 
        <input type="submit"  class="btn btn-danger" name="logout" value="Logout">
        </div>
        <div class="d-flex justify-content-end m-2"> 
        <input type="submit"  class="btn btn-danger" name="details" value="View Profile">
        </div>
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-10 col-md-15 col-lg-15 col-xl-15">
        <div class="card bg-light text-dark mb-5" style="border-radius: 1rem;">
        <div class="p-2">
                <b>What is Election/Vote in India? </b>
</div>
                <div class="card-body p-2 text-center">
                Voting is a method by which a group, such as a meeting or an electorate, convenes together for the purpose of making a collective decision or expressing an opinion usually following discussions, debates or election campaigns. Democracies elect holders of high office by voting. Residents of a jurisdiction represented by an elected official are called "constituents," and the constituents who choose to cast a ballot for their chosen candidate are called "voters." There are different systems for collecting votes, but while many of the systems used in decision-making can also be used as electoral systems, any which cater to proportional representation can only be used in elections.
In smaller organizations, voting can occur in many different ways: formally via ballot to elect others for example within a workplace, to elect members of political associations, or to choose roles for others; or informally with a spoken agreement or a gesture like a raised hand, or electronically.
                </div>
                <div class="p-2">
                <b>What is Online Voting System? </b>
</div>
                <div class="card-body p-2 text-center"> 
                An online voting system is a platform that allows organizational members to cast their votes electronically, which can be through a website, mobile app, or any internet-connected device.
You can conduct various types of elections through an online voting system. For example, you can use it for a simple majority vote, where the option or the candidate with the most votes wins. You can also use it for a more complex voting system like proportional representation, where each vote holds weight according to the voter's preference.
Everyday use cases for an online voting system include:
Board of directors elections
Shareholder meetings
Homeowners Association (HOA) board elections
Union leadership votes
Student government elections
A typical online voting session goes like this:
First, the voter logs in to the voting system using their unique username and password.
Next, they select the candidates or options they want to elect.
Finally, they submit their vote, and the system tallies the results.
                </div>
                <div class="p-2">
                <b>Advantage of Online Voting System?</b>
</div>
                <div class="card-body p-2 text-center">
                The advantages of online voting systems include increased efficiency, improved accuracy, and greater voter engagement compared to paper ballots. 

Increased Efficiency
One of the most significant advantages of online voting systems is incredible efficiency. With traditional paper-based voting, there are a lot of steps involved, from printing ballots to counting votes by hand. You can avoid all of that with online voting.

With an online system, you can send out electronic ballots to all of your voters in just a few clicks. And once the voting period is over, the system will automatically tally the results, so you don't have to do it yourself, saving your organization a lot of time and money.

Improved Accuracy
Another advantage of online voting systems is that they tend to be more accurate than traditional paper-based systems. On the other hand, there's always the potential for human error with paper ballots, whether it's miscounting votes or mixing up ballots.

But with an online voting system, the votes are tallied automatically, so there's no chance for human error, giving you peace of mind knowing that your results are accurate.

Greater Turnout And Voter Engagement
Another advantage of online voting is that it can increase voter turnout because it's more convenient for voters to cast their ballots online than to have to go to a physical polling place.

In addition, online elections can also improve voter engagement. It can be easy for voters to feel disconnected from the process of traditional voting. But with online voting, they can see the results in real-time, making them feel more engaged in the process.
                </div>
        
        <div class="card-body p-2 text-center" >
                    <input type="submit" name="voter_login" class="btn btn-primary px-5" value="Click to Vote">
                </div>
                
</div>
</div>
</div>
</div>
</div>
</form>
</body>
</html>

<?php
if(isset($_SESSION['vote_done'])) {
?>
<script>
    swal({
        title: "Your vote has been Done Sucessfully",
        text: "Thank You to use RDS Voting Portal.",
        icon: "success",
        buttons: "OK",
    });
</script>
<?php unset($_SESSION['vote_done']);} ?>

<?php
if(isset($_SESSION['vote_already_done'])) {
?>
<script>
    swal({
        title: "Your Vote Already Done Sucessfully",
        text: "Thank You to use RDS Voting Portal.",
        icon: "success",
        buttons: "OK",
    });
</script>
<?php unset($_SESSION['vote_already_done']);} ?>
