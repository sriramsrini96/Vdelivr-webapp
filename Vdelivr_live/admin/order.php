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

    <title>Orders- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">


    <style>

.breadcrumb > li + li:before {
    padding: 0 5px;
    color: #ccc;
    content: "\00a0";
}
.addbtn{
      margin-top: -7px;
      float:right;
}
</style>

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Orders</h1>
            <!--<ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-edit"></i> Edit Orders</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addord">Add</button></li>
            </ol>-->
          </div>
        </div><!-- /.row -->




     <div class="row" id="ordl">
          <div class="col-lg-12">
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM orders WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="ordlist">
                <thead>
                  <tr>
                    <th>ORDER ID</th>
                    <!--<th>USER ID</th>-->
                    <th>USER NAME</th>
                    <th>PRODUCTS</th>
                    <th>QUANTITY</th>
					<th>AMOUNT</th>
                    <th>ORDER THROUGH</th>
					<th>ORDER STATUS</th>
                    <!--<th>PAYMENT_ID</th>-->
					<th>CHANGE STATUS</th>
                    <!--<th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>-->
                  </tr>
                </thead>
                <tbody>

                <?php

//$sel=$conn->prepare("SELECT id,user_id,product_id,quantity,amount,ordered_through,razorpay_payment_id FROM orders  WHERE status=1");
//$sel=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 WHERE b.status=1 GROUP BY b.id ");
$sel=$conn->prepare("SELECT u.name as username,b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 INNER JOIN user u ON b.user_id=u.id WHERE b.status=1 GROUP BY b.id");
$sel->execute();
//$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
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

echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['name'] . "</td>";

echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row_ordered_through . "</td>";
echo "<td>" . $row_order_status . "</td>";

//echo "<td>" . $row['razorpay_payment_id'] . "</td>";
//echo "<td><button type='button' class='btn btn-primary change_order_status' id=".$row['id'].">CHANGE</button></td>";
echo "<td><i class='fa fa-pencil-square-o pointer iconcolor change_order_status' aria-hidden='true' id=".$row['id']."></i></td>";

//echo "<td><button type='button' class='btn btn-primary vieword' id=".$row['id']." data-toggle='modal' data-target='#vieword'>view</button></td>";
//echo "<td><button type='button' class='btn btn-primary editord' id=".$row['id']." data-toggle='modal' data-target='#editord'>edit</button></td>";
//echo "<td><button type='button' class='btn btn-danger deleteord' id=".$row['id']." data-toggle='modal' data-target='#deleteord'>delete</button></td>";
echo "</tr>";
}?>
<?php 
      }
?>



                                 
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->




<div class="modal" id="deleteord">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE ORDER</b></h2>
        <h3>Are you sure to remove the ORDER with</h3>
       <div class="form-group">
      <label for="dordid">ORDER ID</label>
      <input type="text" class="form-control" id="dordid" name="dordid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteorder">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
         $("#liorde").addClass("active");
         $('#ordlist').DataTable();
         $(document).on('click', '.change_order_status', function(){  
	        var orderid = $(this).attr("id");  
            $.redirect("order_status.php",{orderid:orderid},"POST","_self");
          });  
 }); 







</script>
  </body>
</html>