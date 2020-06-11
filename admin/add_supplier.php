


<html lang="en">
<head><title>add supplier</title>
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
                            <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp; Add Supplier</strong></a>  </marquee>
                        </div>
                  </div>
                  <div class="panel-body" > 
                     <!-- form -->
                     <form method="post">
            
                      <div class="row">
                        <div class="col-lg-12 col-sm-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required="" >
                          </div>
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="">
                          </div>
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" maxlength="10" name="phone" class="form-control" required="">
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" maxlength="10" name="password" class="form-control" required="">
                          </div>
                          <div class="form-group">
                              <label>Select Category</label>
                              <select class="form-control" name="cat_name">
                                  <?php
                                    $qry="select * from category";
                                    $exc=mysqli_query($conn,$qry);
                                    while ($row=mysqli_fetch_array($exc)) {
                                      ?>
                                      <option><?php echo $row['cat_name']; ?></option>
                                      <?php
                                    }

                                   ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <button class="btn btn-success" name="submit">Add</button>
                          </div>
                        </div>
                      </div>

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
              $name=$_POST['name'];
              $phone=$_POST['phone'];
              $category=$_POST['cat_name'];
              $password=$_POST['password'];
                
                  $qry1=" INSERT INTO `supplier`(`email`, `sup_name`, `sup_phone`,`sup_password`, `sup_category`) VALUES ('$email','$name','$phone','$password','$category')";
                  $exe1=mysqli_query($conn,$qry1);
                  if ($exe1==true) {
                  echo "<script>alert('Data Added');
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
