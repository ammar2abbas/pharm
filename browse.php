<!-- includes pages -->
<script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
<?php
session_start();
$templets='includes/templets/';
//include $templets."header.php";
include $templets."navbar.php";
include 'database.php';
?>

<html>
 <link rel="stylesheet" type="text/css" href ="layout/css/bootstrap.min.css" >
 <!-- design  for id h -->
<style>
#h{
background:white;
background-position: center;
color:black;
font-size: 100px;
border-top: double;
border-radius:10px;
border-left-width: 20px;
box-shadow: none;
vertical-align: bottom;
	}
    /*disgn for table */
table{

border-collapse:collapse;
width:100%;

}
/*disgn for class td*/
td{

height:35px;
text-align:left;
vertical-align:top;
background-color:#4CAF70;
color:#fff;
}
/*disgn for class th*/
th{

height:35px;
text-align:left;
vertical-align:top;
background-color:#4CAF70;
color:#fff;
}
/*disgn for class td and th*/
th,td{

    padding:10px;
    border :1px solid #ddd
}
/*disgn for tr*/
tr:nth-child(even){
    background-color:#f2f2f2;
}
tr:hover{
    background-color:#c2cbfd;
}
table tr:not(:first-child){
cursor:pointer;transition:all.25s ease-in-out;

}




/*disgn for body page*/
</style>
<body style="background:white">
    <!-- connect with database -->
<?php
$host="localhost";
$user="root";
$pass='';
$db="us";

try
{
$conn = new mysqli($host,$user,$pass,$db);
// Browse product

}
// error in connect with database
catch(PDOExeption $e)
{
    echo"error in connection".$e->getMessage();
}
    $r1="select* from product ";
    $r=mysqli_query($conn,$r1);

$num="";
$name="";
$price="";

//get input from user
if(isset($_POST['num']))
{
    $num = $_POST['num'];
}
if(isset($_POST['name']))
{
    $name=$_POST['name'];
   
}
if(isset($_POST['price']))
{
    $price=$_POST['price'];
}
$sqls="";

if(isset($_POST['searche']))
    {
     $search=$_POST['search'];   
//select from product
     $sql = "SELECT num,name,price FROM product where name='$search' ";
     $result = $conn->query($sql);
     $result2=$result->num_rows;
//check in database 
//if found
if ($result2 > 0) {
   
 while($row = mysqli_fetch_assoc($result)) {
        echo"<div class='alert alert-success container text-center'> num: " . $row["num"]. " - Name: " . $row["name"]. "-Price : " . $row["price"]. "<br></div>";
    }
}
//if not found
else if ($result->num_rows == 0){
 echo"<div class='alert alert-success container text-center'><h3>Medicene is not found</h3> </div>";
          }}
?>
<table id ="produc">
<tr>
<th style="background:black"> product num</th>
<th style="background:black"> product name</th>
<th style="background:black"> product price</th>
</tr>


    <form method="post">

<form  background-color=#ffcd> 

    <input type="text" id="search" name="search"  placeholder="Search">
    <div class="input-group-btn" >
      <button name="searche" id="search" class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
  
  </div>
</form>
  <br>
  <br>
  <br>

<!-- fetch product from database -->
<?php

while( $row= mysqli_fetch_array($r) ){
echo"<tr>";
echo "<td>". $row['num'] . "</td>";
echo"<td>" . $row['name'] . "</td>";
echo "<td>". $row['price'] . "</td>";
echo "</tr>";
}


?>

</table>

</form>


<script>
$(document).ready(function(){
    $("#search").on("keyup",function(){
        var value=$(this).val().toLowerCase();
        $("#produc tr").filter(function(){
           $ (this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
        });
    });
});
</script>
<script>
var tbl=document.getElementById("produc")
for(var x=1;x<tbl.rows.lengh;x++){
tbl.rows[x].onclick=function(){
document.getElementById("num").value=this.cells[0].innerHTML;
document.getElementById("name").value=this.cells[1].innerHTML;
document.getElementById("price").value=this.cells[2].innerHTML;
}
}</script>

<?php
 include $templets."footer.php";
 ?>
</body>
</html>