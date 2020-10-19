<?php include 'session_start.php';?>
<?php
if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){
?>
<?php include 'header.php';?>
<?php $mobchk_value=(isset($_SESSION['weboonumob']))?$_SESSION['weboonumob']:''; ?>
 <?php $idchk_value=(isset($_SESSION['weboonuid']))?$_SESSION['weboonuid']:''; ?>


		<section class="cart_section">
		<div class="container ">
		<div class="row" >
		<div class="col-md-12">
		<div class="top_title_part"><h3>Choose your delivery options</h3></div>
		
		</div>
        <div class="col-md-12">
		<div class="deliver_main">
			<div class="row">
				<div class="col-md-6">
				<div class="default_address_part ">
				<div class="title_default">
				<div class="row">
				<div class="col-md-12 col-xs-12">
				<p>Shipping from Oon</P></div>
				
				</div>
				
				
				</div>
				<div class="inner_address">
				<ul>
				<!--<li><h4 class="name_detail"><b>Mani</b></h4></li>
				<li><p>B9 vignesh flats</p></li>
				<li><p>Thiruvanmayur</p></li>
				<li><p>Chennai, Tamil nadu 600085</p></li>
				<li><p><b>Phone no: 8883469792</b></p></li>-->
				<?php
				   if(isset($_SESSION["deli_address_id"])){
				   $sel_address_dis=$conn->prepare("SELECT COUNT(*) FROM address_master WHERE (address_master.user_id=? AND address_master.status=1 AND address_master.id=?)");
				   $sel_address_dis->execute([$_SESSION['weboonuid'],$_SESSION['deli_address_id']]);
				   if($sel_address_dis->fetchColumn()>0){
					  $sel_address_dis=$conn->prepare("SELECT address_master.id,address_master.name,address_master.address,pincodemaster.pincode,citymaster.city,statemaster.state,user.name as username,user.mobile_no FROM address_master INNER JOIN pincodemaster ON address_master.pincode=pincodemaster.id INNER JOIN citymaster ON address_master.city=citymaster.id INNER JOIN statemaster ON address_master.state=statemaster.id INNER JOIN user ON address_master.user_id=user.id WHERE (address_master.user_id=? AND address_master.id=? AND address_master.status=1)");
					  $sel_address_dis->execute([$_SESSION['weboonuid'],$_SESSION['deli_address_id']]);
				      $row_dis = $sel_address_dis->fetch();?>
					  <li><h4 class="name_detail"><b><?php echo $row_dis['username'];?></b></h4></li>
				      <li><p><?php echo $row_dis['address'];?></p></li>
				      <li><p><?php echo $row_dis['city'].", ".$row_dis['state'].", ".$row_dis['pincode'];?></p></li>
				      <li><p><b>Phone no: <?php echo $row_dis['mobile_no'];?></b></p></li>
					  
				   <?php }}
				   else 
					   echo "Address not selected";
					    ?>
				</ul>
				
				</div>
				
				
				</div>
				<div class="default_address_part ">
				<div class="title_default">
				<div class="row">
				<div class="col-md-12 col-xs-12">
				<p>EXPECTED DELIVERY </P></div>
				
				</div>
				
				
				</div>
				<div class="inner_address flex_address">
				<div class="row">
				<div class="col-md-12">
					<div class="deliver_time"><h3>Expected date of delivery:
					<?php
					if(date('D') == 'Sat' || date('D') == 'Sun' || date('D') == 'Mon' || date('D') == 'Tue') {
                        echo date('Y-m-d',strtotime('next Wednesday'));						
                        echo " Wednesday";
                     } else
                    if(date('D') == 'Wed' || date('D') == 'Thu' || date('D') == 'Fri'){
					   echo date('Y-m-d',strtotime('next Saturday'));
                       echo " Saturday";
                    }?>
					</h3></div>
				</div>
			
				
				
				</div>
				
				
			
				
				</div>
				
				
				</div>
				</div>
				<div class="col-md-6">
				<div class="default_address_part ">
				<div class="title_default">
				<div class="row">
				<div class="col-md-12 col-xs-12">
				<p>YOUR SHOPPING CART</P></div>
				
				</div>
				
				
				</div>
				<div class="inner_address12 mar_15">
				<!--<div class="cart_pop inner_subcart">
				<div class="row">
				<div class="col-md-3 col-xs-12">
				<div class="image_cart_pop"><img src="http://oonstore.in/oonadmin/upload/proimg/DSC_4084-01.jpeg"></div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="title_cart_pop"><h4>Organic Eggs</h4></div>
				</div>
				<div class="col-md-2 col-xs-6">
				<div class="qty_cart_pop">
				<p>1</p>
				</div>
				</div>
				<div class="col-md-3 col-xs-6">
				<div class="price_cart_pop">	<p> ₹ 1</p></div>
				</div>
				
				</div>
				</div>-->
				
				<?php
                   if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
					   foreach($_SESSION["products"] as $product){
						 ?>
						 <div class="cart_pop inner_subcart">
				<div class="row ">
				<div class="col-md-3 col-xs-12 ">
				<div class="image_cart_pop">
				<?php echo"<img src='http://oonstore.in/oonadmin/upload/proimg/".$product["product_images"]."'>";?>
				</div>
				</div>
				<div class="col-md-4 col-xs-6">
				<div class="title_cart_pop"><h4><?php echo $product["product_name"];?></h4></div>
				</div>
				<div class="col-md-2 col-xs-3">
				<div class="qty_cart_pop">
				<p>Qty : <?php echo $product["apquantity"];?></p>
				</div>
				</div>
				<div class="col-md-3 col-xs-3">
				<div class="price_cart_pop">	<p> ₹ <?php echo ($product["apquantity"]*$product["product_displayprice"]);?></p></div>
				</div>
				
				</div>
				</div>
						 
						 <?php  
					   }
				   }
				   else
					   echo"Your cart empty";?>
				
				
				
				
				<?php
				if(isset($_SESSION["carttotamt"])>0){?>
				<div class="subcart_part">
				<div class="inner_subcart">
				<div class="row">
				<div class="col-md-9 col-xs-6">
				<h4><b>Sub total</b></h4>
				</div>
				<div class="col-md-3 col-xs-6">
			    <div class="price_cart_pop">	<p> ₹ <?php echo $_SESSION['onlytotamt'];?></p></div>
				</div>
				</div>	
				</div>	
				
				<div class="inner_subcart">
				<div class="row">
				<div class="col-md-9 col-xs-6">
				<h4><b>Delivery charges</b></h4>
				</div>
				<div class="col-md-3 col-xs-6">
			    <div class="price_cart_pop">	<p> ₹ <?php echo $_SESSION['deli_c'];?></p></div>
				</div>
				</div>
				</div>
				
				
				<div class="total_cart">
				<div class="row">
				<div class="col-md-9 col-xs-6">
				<h4 class="totl_po"><b>Total</b></h4>
				</div>
				<div class="col-md-3 col-xs-6">
			    <div class="totl_po">	<p> ₹ <?php echo $_SESSION['carttotamt'];?></p></div>
				</div>
				</div>
				</div>
				
				
				</div>
				<?php }?>
				</div>
				
				
				</div>
				<?php
				if(isset($_SESSION["carttotamt"])>0){?>
				<div class="procedd_payment">
				<div class="row">
				<div class="col-md-6"><a href='javascript:void(0)' class='btn btn-success succeed' id="final_pay_now">Pay Now</a></div>
					
				
				</div>
				</div>
				<?php }?>
				</div>
				
			</div>
		</div>
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>	
<script>
   

document.getElementById('final_pay_now').onclick = function(e){
	//var v=parseInt($("#ctotalamount").text());
	var v='<?php echo $_SESSION["carttotamt"]; ?>';
	//alert(v);
	var modal = document.getElementById('successful_payment');
	v=Math.round(v);
     if(v>0){
		 var mobchk='<?php echo $mobchk_value;?>';
		 //alert(mobchk);
		 if(((mobchk)!="")&&((mobchk)!="undefined")){
		 var options = {

    "key":"rzp_live_uz2DiufuJrcwyu",

    "amount": (v*100), 

    "name": "Oonstore.in",

    "image": "http://oonstore.in/img/footer_logo.png",

    "handler": function (response){
			var razorpay_payment_id=response.razorpay_payment_id;
			var idchk='<?php echo $idchk_value;?>';
			$.ajax({
                type:'POST',
                url:'regaction.php',
                data:{ordersaving:"ordersaving",user_id:idchk,order_status:1,ordered_through:1,razorpay_payment_id:razorpay_payment_id,amount:v},
                success:function(data){
					if(data==1){
						//alert("Successfully Ordered!");
						//window.location.href = "index.php";
						 modal.style.display = "block";
						  $('#successful_payment').modal('show');
						// $('#successful_payment').show();
					}
                    else{
						alert("Not Ordered!");
					}
                }
            });
		
		
		

    },

    "prefill": {

        "name": "<?php echo $_SESSION["weboonuname"]; ?>",

        "email": "<?php echo $_SESSION["weboonumail"]; ?>",
		
		"contact": "<?php echo $_SESSION["weboonumob"]; ?>"

    },

    "theme": {

        "color": "#F37254"

    }

	

};

var rzp1 = new Razorpay(options);
	 rzp1.open();
	 }
	 else
		 alert("Login To Continue");
	 }
else
 alert("Amount should be rs.1 or more");
    e.preventDefault();

}
</script>