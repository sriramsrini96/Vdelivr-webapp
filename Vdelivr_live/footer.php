  <div class="cd-cart-container empty">
<a href="#0" class="cd-cart-trigger">

<ul class="count">
<li>0</li>
<li>0</li>
</ul>
</a>
<div class="cd-cart">
<div class="wrapper">
<header>
<h2>Cart</h2>
<span class="undo">Item removed. <a href="#0">Undo</a></span>
</header>
<div class="body">
<ul id="cartlistmodal">

</ul>
</div>
<footer>
<a href="javascript:void(0)" class="checkout btn" id="checkoutpay"><em>Checkout - ₹<span id="payamt">
<?php
	 if((isset($_SESSION['onlytotamt']))>0)
		 echo $_SESSION['onlytotamt'];
	 else
		 echo 0;
	?>
</span></em></a>
</footer>
</div>
</div>
</div>

    <!--Footer Area Start-->
    <footer>
        <div class="footer-container black-bg">
            <!--Footer Top Area Start-->
            <div class="footer-top-area pb-30">
                <div class="container">
                    <div class="row">
                        <!--Single Footer Start-->
                        <div class="col-md-4 col-sm-6">
                            <div class="single-footer">
                                <!--Footer Logo Start-->
                                <div class="footer-logo">
                                    <a href="index.php"><img class="sizing_of_logo" src="img/footer_logo_old.png" alt=""></a>
                                </div>
                                <!--Footer Logo End-->
                                <!--Footer Content Start-->
                                <div class="footer-content">
                                    <p>
                                       Vdelivr, what started <br>as a subscription based home needs delivery <br>in Trichy is now in Chennai.
                                    </p>

                                </div>
                                <!--Footer Content End-->
                            </div>
                        </div>
                        <!--Single Footer End-->
                        <!--Single Footer Start-->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-footer mt-30">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="footer-info">
                                    <li><a href="privacy.php">Privacy Policy</a></li>
									 <li><a href="cancellation.php">Cancellation Policy</a></li>
                                    <!--<li><a href="pricing.html">Pricing Policy</a></li>
                                    <li><a href="refund.html">Refund Policy </a></li>-->
                                    <li><a href="terms.php">Terms & Conditions</a></li>

									<li><a href="contactus.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Single Footer End-->
                        <!--Single Footer Start-->

                        <!--Single Footer End-->
                        <!--Single Footer Start-->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-footer mt-30">
                                <div class="footer-title">
                                    <h3>follow us</h3>
                                </div>
                                <ul class="socil-icon mb-40">
                                    <li class="facebook"><a href="https://www.facebook.com/pg/oonorganics/"   title="Facebook" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                    <li class="instagram"><a href="https://www.instagram.com/oonstoreschennai/"   title="Instagram" target="_blank"><i class="ion-social-instagram"></i></a></li>
                                    <!-- <li><a href="" rel="noopener" data-toggle="tooltip" title="Linked in" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> -->
                                </ul>

                            </div>
                           <!-- <div class="contact">
                                <p>
                                    <label>Opening Hours:</label>
                                    <br> MON - SAT : 08:00 AM - 08:00 PM
                                    <br> SUNDAY : 07:00 AM - 08:00 PM
                                </p>
                            </div>-->
                        </div>
                        <!--Single Footer End-->
                    </div>
                </div>
            </div>
            <!--Footer Top Area End-->
            <!--Footer Middel Area Start-->
            <div class="footer-middel-area">
                <div class="container">

                </div>
            </div>
            <!--Footer Middel Area End-->
            <!--Footer Bottom Area Start-->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <!--Footer Left Content Start-->
                        <div class="col-md-12">
                            <div class="copyright-text center">
                                <p>Copyright © 2020 <a href="#" rel="" target="_blank">Vdelivr</a>, All Rights Reserved.</p>
                            </div>
                        </div>
                        <!--Footer Left Content End-->
                        <!--Footer Right Content Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="powered-by-img text-right hide">
                                <a href="#" rel="noopener" target="_blank">
                                    <img src="img/site.png" alt="" title="">
                                </a>
                            </div>
                        </div>
                        <!--Footer Right Content End-->
                    </div>
                </div>
            </div>
            <!--Footer Bottom Area End-->
        </div>
    </footer>
		<!--Footer Area End-->


	</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

      </div>
      <div class="modal-body ">
        <section class="user">
 <div class="user_options-container">
  <div class="user_options-text">
   <div class="user_options-unregistered">
    <h2 class="user_unregistered-title">Don't have an account?</h2>

    <button class="user_unregistered-signup" id="signup-button">Sign up</button>
   </div>

   <div class="user_options-registered">
    <h2 class="user_registered-title">Have an account?</h2>

    <button class="user_registered-login" id="login-button">Login</button>
   </div>
  </div>

  <div class="user_options-forms" id="user_options-forms">
   <div class="user_forms-login">
    <h2 class="forms_title">Login</h2>
    <form class="forms_form">
     <fieldset class="forms_fieldset">
      <div class="forms_field">
       <input type="text" placeholder="Email/Phone Number" class="forms_field-input" id="username" name="username" required autofocus />
      </div>
      <div class="forms_field">
       <input type="password" placeholder="Password" class="forms_field-input" id="password" name="password" required />
      </div>
     </fieldset>
	 <div id="errl" class="err"></div>
        <button type="button"  class="btn btn-dark ml-0" onclick="login()">Login</button>
	 <div class="forms_buttons">
      <button type="button" class="forms_buttons-forgot">Forgot password?</button>

     </div>
    </form>
   </div>
   <div class="user_forms-signup">
    <h2 class="forms_title">Sign Up</h2>
    <form class="forms_form" id="form" autocomplete="off">
     <fieldset class="forms_fieldset">
      <div class="forms_field">
       <input type="text" placeholder=" Name" style="text-transform: capitalize;" class="forms_field-input" id="name" required />
      </div>
      <div class="forms_field">
       <input type="email" placeholder="Email" class="forms_field-input" id="email" required />
      </div>
	  <div id="errema" class="err"></div>
	  <div class="forms_field">
       <input type="text" placeholder="Phone" name="phone" class="forms_field-input" onkeyup="validatephone(this);"  min="10" maxlength="10" id="phone" required />
      </div>
	  <div id="errmob" class="err"></div>
	   <div class="forms_field" id="sandbox-container">
       <input type="text" placeholder="DOB" class="forms_field-input" id="date" required />
      </div>

      <div class="forms_field">
       <input type="password" placeholder="Password" class="forms_field-input" id="pass" required />
      </div>
	   <div class="forms_field">
	   <div class="input_form">Gender</div>
       <input type='radio' id='male' checked='checked' name='radio' value='male'>
                            <label for='male'>Male</label>
                            <input type='radio' id='female' name='radio' value='female' >
                            <label for='female'>Female</label>
      </div>
      <div class="forms_field">
			<textarea class="forms_field-input" placeholder="Address" rows="3" id="comment"></textarea>
      </div>
	    <div class="forms_field">
			<select name="choosestate" id="state" required="" class="forms_field-input">
			<option value="">Choose State</option>
			
			</select>
      </div>
	  <div class="forms_field">
			<select name="choosecity" id="city" required="" class="forms_field-input">
			<option value="">Choose City</option>
			
			</select>
      </div>
	  <div class="forms_field">
			<select name="choosecity" id="pincode" required="" class="forms_field-input">
			<option value="">Choose Pincode</option>
			
			</select>
      </div>



     </fieldset>
	 <div id="errall" class="err"></div>
     <div class="forms_buttons">
      <input type="submit" value="Sign up" class="forms_buttons-action" id="register">
     </div>
    </form>
   </div>
  </div>
 </div>
</section>
      </div>

    </div>

  </div>
</div>





<div class="modal fade in " id="add_address" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="login_part">
                    <h2 class="login-header ">Address Details</h2>
                    <div class="login-triangle"></div>
                    <div class="address_containers">
                        <form id="add_delivery_address">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Address Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <input type="text" name="name" id="de_name" placeholder="Address Name" required="">
                                                <div class="input-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Address</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <input type="text" name="address" placeholder="Address" id="de_address" required="">
                                                <div class="input-icon"><i class="fa fa-road"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>State</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group ">
                                                <select name="state" id="de_state" style="height: 45px;">
                                                    <option value="">Choose state</option>
											
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>City</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group ">
                                                <select name="city" id="de_city" style="height: 45px;">
                                                    <option value="">Choose city</option>
											
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Pincode</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <select name="choosecity" required="" id="de_pincode">
                                            <option value="">Choose Pincode</option>
											
                                            </select>
                                            </div>
                                        </div>
                                    </div>
									<div id="de_errall" class="err"></div>
                                    <div class="row">
                                        <div class="col-sm-offset-3 col-xs-12 col-sm-6  col-md-6 col-lg-6">
                                            <div class="submit_btn_part">
                                                <div class="input-group">
                                                    <button type="submit" name="submit" class="btn btn-success btn_animation" value="submit" id="de_submit">SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in change_modal_style" id="edit_address" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="login_part">
                    <h2 class="login-header ">Edit Details</h2>
                    <div class="login-triangle"></div>
                    <div class="address_containers">
                        <form id="add_delivery_address">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Address Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <input type="text" name="name" id="edde_name" placeholder="Address Name" required="">
                                                <div class="input-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Address</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <input type="text" name="address" placeholder="Address" id="edde_address" required="">
                                                <div class="input-icon"><i class="fa fa-road"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>State</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group ">
                                                <select name="state" id="edde_state" style="height: 45px;">
                                                    <option value="">Choose state</option>
											
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>City</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group ">
                                                <select name="city" id="edde_city" style="height: 45px;">
                                                    <option value="">Choose city</option>
											
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <label>Pincode</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 clo-xs-12">
                                            <div class="input-group input-group-icon">
                                                <select name="choosecity" required="" id="edde_pincode">
                                            <option value="">Choose Pincode</option>
											
                                            </select>
                                            </div>
                                        </div>
                                    </div>
									<div id="de_errall" class="err"></div>
                                    <div class="row">
                                        <div class="col-sm-offset-3 col-xs-12 col-sm-6  col-md-6 col-lg-6">
                                            <div class="submit_btn_part">
                                                <div class="input-group">
                                                    <button type="submit" name="submit" class="btn btn-success btn_animation" value="submit" id="edde_submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade success-popup" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="lead">Successfully Registered!Login to Continue</p>

      </div>

    </div>
  </div>
</div>


<div class="modal fade success-popup" id="coming_soon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://cdn3.iconfinder.com/data/icons/coming-soon-1/512/Coming_Soon_Set12-01-512.png" width=200>
          <p class="lead">Coming soon </p>

      </div>

    </div>
  </div>
</div>


<div class="modal fade success-popup" id="updated_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="lead">Successfully Updated</p>

      </div>

    </div>
  </div>
</div>


<div class="modal fade success-popup" id="saved_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="lead">Successfully Saved</p>

      </div>

    </div>
  </div>
</div>

<div class="modal fade success-popup" id="login_warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://camu.in/assets/img/avatar1.svg" width=200>
          <p class="lead">Before Checkout Please Login </p>
		  <!--<p class="mar_15 login_signup" >

		                                     <b class="icon-color  btn fifth " data-toggle="modal" data-target="#myModal" style="cursor: pointer; margin-top: 5px; display: block">
		                                       Login
		                                     </b>
		                                   </p>-->

      </div>

    </div>
  </div>
</div>



<div class="modal fade success-popup" id="successful_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body text-center">
         <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="lead">Order Placed Successfully</p>
		  <button type="button" class="btn btn-success" id="navigate_to_index">OK</button>

      </div>

    </div>
  </div>
</div>






  <!--All Js Here-->

    <script src="js/jquery.min.js"></script>
    <!--Imagesloaded-->
    <!-- <script src="js/imagesloaded.pkgd.min.js"></script> -->
    <!--Isotope-->


    <!--Ui js-->
    <script src="js/jquery-ui.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <!-- <script type="text/javascript" src="js/underscore-min.js"></script> -->
    <script src="js/pushbar.js"></script>
    <!--Slick-->
    <script src="js/slick.min.js"></script>
    <!--Wow-->
    <script src="js/wow.min.js"></script>
    <!--Bootstrap-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyBW9U5EtLg3PyyRpl6NDdfGPixf_hvtZbg'></script>


    <script type="text/javascript" src="js/cartnew/cart_new.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script type="text/javascript">
    // $(window).on('load',function(){
	// if ($(this).width() < 1024) {

    // $('#show_modal_window').modal('hide');
    // $('#show_modal_mobile').modal('show');

  // } else {

    // $('#show_modal_window').modal('show');
    // $('#show_modal_mobile').modal('hide');

    // }


    // });
</script>-->


	<!-- End Facebook Pixel Code -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	


</body>
</html>
<script type="text/javascript">
  function login(){
   
      var username     = $('#username').val();
      var password = $('#password').val();
      console.log(username)
      console.log(password)
  
      $.ajax({
           type: 'POST',
   
           url: "http://localhost:3000/myadmin/createusr",
   
   
   
           data: {username:username,pass:password},
   
   
           success: function (data) {
            
             console.log(data) 
   
                if(data.message=='success'){
                 
                       window.location.href='index.php';
                 
                     }
                     
                 else{
   
                  alert('Failed');
                 }
   
           }
       });
    
    
    
   }
</script>