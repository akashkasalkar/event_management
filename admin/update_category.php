
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
                     <?php

                        $cat_id=$_GET['cat_id'];
                        $qry="select * from category where cat_id='$cat_id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc)){

                       ?>
                      <form method="post">
                        <div class="form-group">
                          <label class="h5">Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['cat_name']; ?>">
                        </div>
                        <div class="form-group">
                          <button name="submit" class="btn btn-primary ">Update</button>
                        </div>
                      <?php } ?>
                      </form>
                     
                    </div>
              </div>
         </div> 
      </div>
 
    </div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

 <?php 
            if (isset($_POST['submit'])) {
              $category=$_POST['cat_name'];
             

                
                  $qry="UPDATE `category` SET  `cat_name`='$category' WHERE  `cat_id`='$cat_id'";
                  $exe=mysqli_query($conn,$qry);
                  if ($exe==true) {
                  echo "<script>alert('Data update');
                 window.location='view_category.php';
                  </script>";
                
                }else
                {
                  echo "<script>alert('Error while adding data');
                  window.location='view_category.php';
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
