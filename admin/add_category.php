
<html lang="en">
<head>
<?php include("include/head.php"); ?>
    <style>
  label{
    
  }
  </style>
</head>
<body >
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
                            <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp; Add Category</strong></a>  </marquee>
                        </div>
                  </div>
                  <div class="panel-body" > 
                     <!-- form -->
                      <form method="post">
                        <div class="form-group">
                          <label class="h5">Category Name</label>
                          <input type="text" name="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <button name="add" class="btn btn-primary ">ADD</button>
                        </div>
                      </form>
                      <?php 
                        if (isset($_POST['add'])) {
                          $cat_name=$_POST['cat_name'];
                          $x=Rand(1,100);
                          $cat_id=$cat_name.$x;

                          $qry="INSERT INTO `category`(`cat_id`,`cat_name`) VALUES('$cat_id','$cat_name')";
                          $exe=mysqli_query($conn,$qry);
                          if ($exe==true) {
                            echo "<script>alert('Data Added');
                            window.location='view_category.php';
                            </script>";
                          }else
                          {
                            echo "<script>alert('Error')</script>";
                          }
                        }
                      ?>
                    </div>
              </div>
         </div> 
      </div>
 
    </div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->


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
