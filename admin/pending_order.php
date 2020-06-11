


<html lang="en">
<head><title>Pending Orders</title>
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
                            <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp; Pending Orders</strong></a>  </marquee>
                        </div>
                  </div>
                  <div class="panel-body" > 
                     <!-- form -->
                    <table class="table">
                      <tr>
                        <th>Customer Name</th>
                        <th>Event Date</th>
                        <th>Event Type</th>
                        <th>Total Bill</th>
                        <th>Status</th>
                      </tr>
                      <?php
                        $qry="select * from place_order where order_status='2'";
                        $exc=mysqli_query($conn,$qry);
                        while ($row=mysqli_fetch_array($exc)) {
                          $status=$row['order_status'];
                          if ($status==0) {
                           $status="<h5 class='text-danger'>Rejected</h5>";
                            }elseif($status==1){
                              $status="<h5 class='text-success'>Approved</h5>";
                            }
                            else{
                              $status="<h5 class='text-primary'>Pending</h5>";
                            }
                                  # code...
                          ?>
                          <tr>
                            <?php $order_id=$row['order_id']; ?>
                            <td><?php echo $user=$row['user']; ?></td>
                            <td><?php echo $event_date=$row['event_date']; ?></td>
                            <td><?php echo $row['event_name']; ?></td>
                            <td><?php echo $row['order_amount']; ?></td>
                            
                            <td><?php echo $status; ?></td>
                            <td><a href="order_detail.php?event_date=<?php echo $event_date ?>&customer=<?php echo $user ?>&order_id=<?php echo $order_id; ?>" class="btn btn-primary">View</a></td>
                          </tr>
                          <?php
                        }
                       ?>
                    </table>

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
