<!-- First page  -->

<?php
session_start();
// includes pages(navbar,header,slaider)
  $templets='includes/templets/';
  include $templets."header.php";
  include $templets."navbar.php";
  include $templets."slaider.php";

?>
 <!-- inclue page footer -->
<?php
  include $templets."footer.php"; 
?>



