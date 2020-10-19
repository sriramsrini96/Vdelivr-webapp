<?php
session_start();
if(isset($_SESSION['oonaid'])&&($_SESSION['oonaname'])&&($_SESSION['oonauserid'])&&($_SESSION['oonapass'])){  
header( 'Content-Type: text/html; charset=utf-8' ); 
}
else 
header("Location:index.php");
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>User orders</h1>
            <ol class="breadcrumb">
            <li><a href="users.php"><i class="fa fa-arrow-left"></i>  Back To Users</a></li>            
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row">          
          <div class="col-lg-12">
            <?php
    
       include "config.php";  
	   $user_id=$_POST['vouserid'];
       $query=$conn->prepare("SELECT COUNT(*) FROM orders WHERE (status=1 AND user_id=?)");
       $query->execute([$user_id]);
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="vorlist">
                <thead>
                  <tr>
                    <th>ORDER ID</th>
                    <th>PRODUCT ID</th>
                    <th>QUANTITY</th>
					<th>AMOUNT</th>
                    <th>ORDERED_THROUGH</th>
					<th>ORDER STATUS</th>
                    <th>PAYMENT_ID</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$sel=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 WHERE (b.status=1 AND b.user_id=?) GROUP BY b.id ");
$sel->execute([$user_id]);
while($row = $sel->fetch())
{
	if($row['ordered_through']==1)
	{
		$row_ordered_through="web";
	}
	elseif($row['ordered_through']==2)
	{
		$row_ordered_through="iphone";
	}
	elseif($row['ordered_through']==3)
	{
		$row_ordered_through="android";
	}
	elseif($row['ordered_through']==4)
	{
		$row_ordered_through="call";
	}
	
	
	if($row['order_status']==0)
	{
		$row_order_status="cancelled";
	}
	elseif($row['order_status']==1)
	{
		$row_order_status="ordered";
	}
	elseif($row['order_status']==2)
	{
		$row_order_status="in_transit";
	}
	elseif($row['order_status']==3)
	{
		$row_order_status="delivered";
	}
	
	
	
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row_ordered_through . "</td>";
echo "<td>" . $row_order_status . "</td>";
echo "<td>" . $row['razorpay_payment_id'] . "</td>";



echo "</tr>";
}?>
<?php 
      }
	  else 
		  echo "This user not placed any Order";
?>



                                 
                </tbody>
              </table>
            </div>
          
          
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->



    <?php include"footer.php" ?>
   

<script type="text/javascript">
     $(document).ready(function(){ 
    // alert("view")
     $("#liuser").addClass("active");
	 $('#vorlist').DataTable();
    
}); 

</script>
  </body>
</html>