<?php include 'session_start.php';?>
<?php
if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){
?>
<?php include 'header.php';?>

	<section class="tilte_part "  style="background: url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/05/06/0659644af23f91e.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
                    <h2>My Orders</h2>
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <li>My Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <section class="corporate-about white-bg" ng-controller="CategoryController">
            <div class="category_container">
                <div class="row-2">
                    <div class="all-about">
					    <?php include "categoryimg.php";?>
                    </div>
                </div>
            </div>
        </section>
		<section>
		<div class="container page">
		<div class="row" id="ordl">
          <div class="col-md-12">
            <?php
       $o_query=$conn->prepare("SELECT COUNT(*) FROM orders WHERE status=1 AND user_id=?");
       $o_query->execute([$_SESSION['weboonuid']]);
       $o_count = $o_query->fetchColumn();
      if ($o_count !=0)
      {$i=1;
        
         ?>
            <!--<div class="table-responsive">-->
              <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>SI.NO</th>
                    <th>PRODUCT ID</th>
                    <th>QUANTITY</th>
					<th>ORDER STATUS</th>
					<th>ORDERED DATE</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$o_sel=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.created_at,b.razorpay_payment_id,GROUP_CONCAT(a.name) name FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 WHERE (b.status=1 AND b.user_id=?) GROUP BY b.id ");
$o_sel->execute([$_SESSION['weboonuid']]);
while($o_row = $o_sel->fetch())
{
	
	
	
	if($o_row['order_status']==0)
	{
		$o_row_order_status="cancelled";
	}
	elseif($o_row['order_status']==1)
	{
		$o_row_order_status="ordered";
	}
	elseif($o_row['order_status']==2)
	{
		$o_row_order_status="in_transit";
	}
	elseif($o_row['order_status']==3)
	{
		$o_row_order_status="delivered";
	}
	
	
	
echo "<tr>";
echo "<td>" . $i . "</td>";
echo "<td>" . $o_row['name'] . "</td>";
echo "<td>" . $o_row['quantity'] . "</td>";
echo "<td>" . $o_row_order_status . "</td>";
$dt_only = new DateTime($o_row['created_at']);
echo "<td>" . $dt_only->format('Y-m-d') . "</td>";
echo "</tr>";
$i++;
}?>
<?php 
      }
	  else{
		  echo "<div> No Orders</div>";
	  }
?>



                                 
                </tbody>
              </table>
            <!--</div>-->
          </div>
		  </div>
        </div><!-- /.row -->
		</section>






<?php include 'footer.php';?>
<?php 
}
else 
header("Location:index.php");
?>	
	