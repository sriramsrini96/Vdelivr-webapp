<?php include 'session_start.php';?>
<?php
if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){
?>
<?php include 'header.php';?>



		<section class="cart_section back_back">
		<div class="container ">
		<div class="row" >
		
        <div class="col-md-6 col-md-offset-3">
        <div class="success_ful_payment page">
		<div class="content_starting  text-center">
	   <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="success_payment_title ">Payment successfull</p>
	  </div>
        
          <div class="success_payement_part">
          <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Payment type</b></p>
		  </div>
		  <div class="col-md-6">
		  <div class="right_part_payment">
		  Net Banking
		  </div>
		  </div>
		  </div>
		  </div>
		  
		   <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Bank</b></p>
		  </div>
		  <div class="col-md-6"> <div class="right_part_payment">ICICI</div></div>
		  </div>
		  </div> 
		  <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Mobile</b></p>
		  </div>
		  <div class="col-md-6"><div class="right_part_payment">8883469792</div></div>
		  </div>
		  </div> 
		  <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Email</b></p>
		  </div>
		  <div class="col-md-6"><div class="right_part_payment">manimp2496@gmail.com</div></div>
		  </div>
		  </div>

		  <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Amound Paid</b></p>
		  </div>
		  <div class="col-md-6"><div class="right_part_payment">500</div></div>
		  </div>
		  </div>
		  <div class="inner_success">
		  <div class="row">
		  <div class="col-md-6">
		  <p><b>Transaction id</b></p>
		  </div>
		  <div class="col-md-6"><div class="right_part_payment">12345678910</div></div>
		  </div>
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
	
<script>
   

document.getElementById('paynow').onclick = function(e){
	var v=parseInt($("#ctotalamount").text());
	//alert(v);
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
                data:{ordersaving:"ordersaving",user_id:idchk,order_status:1,ordered_through:1,razorpay_payment_id:razorpay_payment_id},
                success:function(data){
					if(data==1){
						alert("Successfully Ordered!");
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