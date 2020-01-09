
<!-- page for rejester in web site -->
<?php
session_start();
$templets='includes/templets/';
include $templets."header.php";
include $templets."navbar.php";
include 'database.php';
//cheack user found
  if(!isset($_SESSION['user-id'])){
if($_SERVER['REQUEST_METHOD']=='POST'){
    //get information from database
$full_name=$_POST['full_name'];
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

echo "<div class='alert alert-success container text-center'><h2>User Already exist</h2> </div>";	
header('Location:Rejestercustomer.php');

}
//if result command assign zero
else
{
    //prepare command insert 
 
$stmt=$con->prepare("INSERT INTO `customer` (name_customer,email_customer,password_customer) values(:full_name ,:email ,:password)"
);
//execute command
$stmt->execute (array('full_name' =>$full_name,
	'email' =>$email,
	'password' =>$password));
echo "<div class='alert alert-success container text-center'><h2>User Added Succesfull</h2> </div>";
 header('Location:browse.php');

}}
?>

<br>
<br>
<br>
<!-- title page  -->
    
     <h1 class="text-center" style="color: red,width:20px; ">Rejester Customer</h1>
      <!-- form to fill information  user -->
     <form action="Rejestercustomer.php" method="POST">
   <div class=form-group>
    <label for="full_name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Username" name="full_name" required>
</div>
<div class=form-group>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
</div>
<div class=form-group>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="password" required>
</div>

    <button style="width: 150px" type="submit">Submit</button>
     



</form> 
<?php
}

 include $templets."footer.php"; 
?>