


<html lang="en">
<head><title>update supplier</title>
<?php include("include/head.php"); ?>
    <style>
  label{
    
  }
  </style>
</head>
<body>
<?php
    include("include/header_nav.php");
?>

<!-- Main -->
    
<!-- Main -->
    
<div class="container" >
<div class="row">
    <?php include("include/left_nav.php"); ?>
    <div class="col-md-9" >
 <hr> 
      <div class="row">
                <div class="panel panel-default" >
                  <div class="panel-heading">
                        <div class="panel-title"> 
                            <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp; Update Supplier</strong></a>  </marquee>
                        </div>
                  </div>
                  <div class="panel-body" > 
                     <!-- form -->
                      <?php

                        $name=$_GET['sup_name'];
                        $qry="select * from supplier where sup_name='$name'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc)){

                       ?>
                     <form method="post">
            
                      <div class="row">
                        <div class="col-lg-12 col-sm-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required="" >
                          </div>
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sup_name" class="form-control" value="<?php echo $row['sup_name']; ?>" required="">
                          </div>
                          <div class="form-group">
                            <label>phone</label>
                            <input type="tel" maxlength="10" name="phone" class="form-control" value="<?php echo $row['sup_phone']; ?>" required="">
                          </div>
                          <div class="form-group">
                              <label>Select Category</label>
                              <input type="text" name="cat_name" value="<?php echo $row['sup_category']; ?>" class="form-control">
                            </div>
                          <div class="form-group">
                            <button class="btn btn-success" name="submit">Update</button>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                    </form>

                    </div>
              </div>
         </div> 
 
    </div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->
  <?php 
            if (isset($_POST['submit'])) {
              $email=$_POST['email'];
              $name=$_POST['sup_name'];
              $phone=$_POST['phone'];
              $category=$_POST['cat_name'];

                
                  $qry=" UPDATE `supplier` SET `email`='$email',`sup_phone`='$phone',`sup_category`='$category' WHERE `sup_name`='$name'";
                  $exe=mysqli_query($conn,$qry);
                  if ($exe==true) {
                  echo "<script>alert('Data update');
                 window.location='view_supplier.php';
                  </script>";
                
                }else
                {
                  echo "<script>alert('Error while adding data');
                  window.location='view_supplier.php';
                  </script>";
                }
              }
          
   ?>

<footer class="text-center"><?php include("include/footer.php");?></footer>
 



  
<script type="text/javascript">
$(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){
      // toggle icon
    $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});
</script>
</body>
</html>