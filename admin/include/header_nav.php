<?php
    session_start();
    if (!isset($_SESSION['admin_email'])) {
        header("location:../index.php");
    }
 ?>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top" style="height:70px; ">
  <div class="container" style="margin-top:10px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#"><span style="font-size:35px;">Royal Wedding</span></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <!--li><a>My Profile</a></li-->
            <li><a style="color:red"><?php echo $_SESSION['admin_email']; ?></a></li>
          </ul>
        </li>
        <li><a href="sign_out.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->