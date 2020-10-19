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

    <title>Deliveries- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">
	<link rel="stylesheet" href="cssindex/datatablecss.css">
    
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

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
            <h1>Deliveries</h1>
          </div>
        </div><!-- /.row -->
		
		<div class="row">
          <div class="col-lg-12">
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#pending" data-toggle="tab">Pending Orders</a></li>
                <li><a href="#completed" data-toggle="tab">Completed Orders</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="pending">
				    <?php
					include "config.php";  
					$query=$conn->prepare("SELECT COUNT(*) FROM orders WHERE status=1 AND order_status=1");
					$query->execute();
					$count = $query->fetchColumn();
					if ($count !=0)
						{
					?>
					<div class="table-responsive">
 					   <table class="tabdis"  border="1" id="penlist">
                         <thead>
                            <tr>
                               <th>ORDER ID</th>
                               <th>USER NAME</th>
							   
							   <th>MOBILE</th>
							   
                               <th>PRODUCTS</th>
                               <th>QUANTITY</th>
					           <th>AMOUNT</th>
                               <th>ADDRESS</th>
					          <th>DELIVERY STATUS</th>
                            </tr>
                         </thead>
                         <tbody>
						 <?php
						 $sel=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name,c.name as username,c.mobile_no,d.address FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 INNER JOIN user c ON b.user_id=c.id INNER JOIN address_master d ON b.delivery_address_id=d.id WHERE (b.status=1 AND b.order_status=1) GROUP BY b.id ");
						 $sel->execute();					 
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
							
							echo "<td>" . $row['mobile_no'] . "</td>";
							
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['quantity'] . "</td>";
							echo "<td>" . $row['amount'] . "</td>";
							echo "<td>" . $row['address'] . "</td>";
							echo "<td>" .$row_order_status. "</td>";
							echo "</tr>";
							}
							?>
							<?php 
							}
							?>                               
                     </tbody>
                   </table>
                 </div>                  
               </div>
               <div class="tab-pane fade" id="completed">
			      <?php
					include "config.php";  
					$query=$conn->prepare("SELECT COUNT(*) FROM orders WHERE status=1 AND order_status=3");
					$query->execute();
					$count = $query->fetchColumn();
					if ($count !=0)
						{
					?>
					<div class="table-responsive">
 					   <table class="tabdis"  border="1" id="comlist">
                         <thead>
                            <tr>
                               <th>ORDER ID</th>
                               <th>USER NAME</th>
							   
							   <th>MOBILE</th>
							   
                               <th>PRODUCTS</th>
                               <th>QUANTITY</th>
					           <th>AMOUNT</th>
                               <th>ADDRESS</th>
					          <th>DELIVERY STATUS</th>
                            </tr>
                         </thead>
                         <tbody>
						 <?php
						 $sel=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name,c.name as username,c.mobile_no,d.address FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 INNER JOIN user c ON b.user_id=c.id INNER JOIN address_master d ON b.delivery_address_id=d.id WHERE (b.status=1 AND b.order_status=3) GROUP BY b.id ");
						 $sel->execute();					 
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
							echo "<td>" . $row['user_id'] . "</td>";
							
							echo "<td>" . $row['mobile_no'] . "</td>";
							
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['quantity'] . "</td>";
							echo "<td>" . $row['amount'] . "</td>";
							echo "<td>" . $row['address'] . "</td>";
							echo "<td>" .$row_order_status. "</td>";
							echo "</tr>";
							}
							?>
							<?php 
							}
							?>                               
                     </tbody>
                   </table>
                 </div>                  
                  
               </div>
              </div>
            </div>
          </div>
		</div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
         $("#lideli").addClass("active");
         $('#penlist').DataTable({
			 dom: 'lBf',
			 buttons: [
             'excel'
    		 ]
		 });
         $('#comlist').DataTable({
			 dom: 'lBfp',
			 buttons: [
             'excel'
    		 ]
		 });
 }); 







</script>
  </body>
</html>