<?php
session_start();
$templets='includes/templets/';
include $templets."header.php";
include $templets."navbar.php";
include 'database.php';
 if(isset($_SESSION['user_id'])){
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$stmt=$con->prepare("INSERT INTO `medicines` (name,price,details) values(:name ,:price ,:details)"
);

$stmt->execute (array('name' =>$name,
	'price' =>$price,
	'details' =>$details));
echo "<div class='alert alert-success container text-center'><h2>Medicine Added Succesfull</h2> </div>";
}
?>

<div class="container">
     <h1 class="text-center" style="color: red,width:20px; ">Add Medicine</h1>
     <form action="add_medicen.php" method="POST">
   <div class=form-group>
    <label  for="name"><b> Name Medicine</b></label>
    <input type="text" placeholder="Enter Name Medicine" name="name" required>


    <label for="price"><b>Price Medicine</b></label>
    <input type="number" placeholder="Enter Price Medicine " name="price" required>


    <label for="details"><b>Details Medicine </b></label>
    <input type="text" placeholder="Enter Details Medicine" name="details" required>


    <button style="width: 150px" type="submit">Submit</button>
     
</div>

</form> 
<?php
}
else
{
    header('Location:index.php');
}
 include $templets."footer.php"; 
?>