<!-- page for login web site -->
<?php
session_start();
// includes pages
$templets='includes/templets/';
include $templets."header.php";
include $templets."navbar.php";
include 'database.php';
//if user exisit
  if(!isset($_SESSION['user-id'])){
if($_SERVER['REQUEST_METHOD']=='POST'){
    //get information from database

$email=$_POST['email'];
$password=$_POST['password'];
//prepare command
$stmt2=$con->prepare("SELECT *from `customer` where email_customer=? AND password_customer=?"
);
//execute command
$stmt2->execute (array($email,$password));
$count=$stmt2->rowCount();
$user=$stmt2->fetch();
//if command true and has result
if($count>0){
  $_SESSION['user_id']=$user['id'];
   header('Location:browse.php');
}
else
echo"not exist";
}
?>
<!-- form  information   to user-->
 <form action="logincustomer.php" method="POST">

 

  <div class="container login_area">
    <h1 class="text-center" style="color: red">Login Admin</h1>
    <div class="form-group"></div>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
     
    </label>
  </div>

 
</form> 
<?php
}
else
{
  //if user not exist
header('Location:logincustomer.php'); 
}
    //include footer
 include $templets."footer.php"; 
?>
