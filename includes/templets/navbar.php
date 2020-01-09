<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <?php
      if(isset($_SESSION['user_id'])){
        ?>
     
       <!-- <li><a href="add_medicen.php">Add Medicine</a></li>     -->
      <?php  }?>
    
    </ul>
    
     
    <ul class="nav navbar-nav navbar-right">
       <?php
     if(!isset($_SESSION['user_id'])){
        ?>
      <li><a href="rejester.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

       <li><a href="Rejestercustomer.php"><span class="glyphicon glyphicon-user"></span>       Sign Up Customer    </a></li>
      <li><a href="logincustomer.php"><span class="glyphicon glyphicon-log-in"></span> Login Customer</a></li>


          <?php  

        }
else { ?>
   <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  <?php  }?>


    </ul>
 
  </div>
</nav>