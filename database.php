<!-- page for connect with database -->


<?php
$dsn='mysql:host=localhost;
dbname=us';
$user='root';
$pass='';
$option=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
try
{
	$con=new PDO($dsn,$user,$pass,$option);
	

}
catch(PDOExeption $e)
{
	echo"error in connection".$e->getMessage();
}
?>