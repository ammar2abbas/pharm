<!-- page for login web site -->
<?php
session_start();
// includes pages
$templets='includes/templets/';
include $templets."header.php";
include $templets."navbar.php";
include 'database.php';
//if user exisit
 if(!isset($_SESSION['user_id'])){
if($_SERVER['REQUEST_METHOD']=='POST'){
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$con->prepare("SELECT *from `user` where email=? AND password=?"
);

$stmt->execute (array($email,$password));
$count=$stmt->rowCount();
$user=$stmt->fetch();
if($count>0){
	$_SESSION['user_id']=$user['id'];
	 header('Location:project.php');

}
else
echo"not exist";
}
?>
<!-- form  information   to user-->
 <form action="login.php" method="POST">

 

  <div class="container login_area">
    <h1 class="text-center" style="color: red">Login Admin</h1>
    <div class="form-group"></div>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</a></button>

    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 
<?php
}
else
{
	//if user not exist
header('Location:login.php');	
}
    //include footer
 include $templets."footer.php"; 
?>
