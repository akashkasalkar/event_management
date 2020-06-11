



<html lang="en">
<head>
	<title>Category view</title>
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
                      	    <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp; View Category</strong></a>  </marquee>
                      	</div>
                	</div>
                	<div class="panel-body" > 
                     	<!-- table here -->
					         
              <div class="row" style="margin-top: 15px">
                <div class="col-lg-4 col-sm-4">
                  
                </div>
                <div class="col-lg-12 col-sm-12 bg-light ">
                  <div class="card col-lg-11 col-sm-9 border border-dark" >
                    <div class="card-body" >
                      
                      <table class="table table-bordered bg-light">
                        <tr>
                          <th align="text-center">Email</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Category</th>
                        </tr>
                        <?php
                               $qry="select * from supplier";
                                $exc=mysqli_query($conn,$qry);
                                while ($row=mysqli_fetch_array($exc)) {                    
                         ?>
                        <tr>
                          <td><?php echo $email=$row['email']; ?></td>
                          <td><?php echo $name=$row['sup_name']; ?></td>
                          <td><?php echo $phone=$row['sup_phone']; ?></td>
                          <td><?php echo $category=$row['sup_category']; ?></td>
                          <td><a href="update_supplier.php?sup_name=<?php echo $name ?>">View</a></td>
                          <td><a href="delete_supplier.php?sup_name=<?php echo $name; ?>" class="" data-toggle="tooltip" title="Delete" onclick="return confirm('do you want to delete...?');"><i class='fas fa-trash' style='font-size:24px;color:red'></i></a></td>

                        </tr>
                       <?php } ?>
                      </table>
                    </div>
                  </div>
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
