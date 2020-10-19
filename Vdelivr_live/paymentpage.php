<?php include 'session_start.php';?>
<?php include 'header.php';?>
 <?php include 'config.php';?>
    <form>
    <!-- Note that the amount is in paise = 50 INR -->
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_live_uz2DiufuJrcwyu"
        data-amount="<?php echo ($_POST["payamt"]*100); ?>"
        data-buttontext="Pay with Razorpay"
        data-name="Oonstore.in"
        data-image="http://oonstore.in/img/footer_logo.png"
        data-prefill.name="<?php echo $_SESSION["weboonuname"]; ?>"
		data-prefill.email="<?php echo $_SESSION["weboonumail"]; ?>"
        data-prefill.contact="<?php echo $_SESSION["weboonumob"]; ?>"
        data-theme.color="#F37254"
    ></script>
    </form>
	<script>
	/*$(document).ready(function(){
		
	});*/
	</script>
  <?php include 'footer.php';?>