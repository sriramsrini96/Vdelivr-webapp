	<?php include 'header.php';?>
		<!--Header Area End-->
		<section class="my-account-area mt-20">
		    <div class="container">
		        <div class="row">
                    <!--Regisster Form Start-->
		            <div class="col-md-6 col-sm-6">
		                <div class="customer-login-register">
		                    <div class="form-login-title">
		                        <h2>Register your Fipola Account</h2>
		                    </div>
												<div class="alert alert-danger mt-30">
												  <strong>No Account found. Please Sign-Up for an account</strong>
												</div>
		                    <div class="login-form">
		                        <form action="/auth/local/signup" method="post">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-fild">
                                        <p><label>First Name<span class="required">*</span></label></p>
                                        <input type="text" name="first_name" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-fild">
                                        <p><label>Last Name</label></p>
                                        <input type="text" name="last_name" value="">
                                    </div>
                                  </div>
                                </div>
		                            <div class="form-fild">
		                                <p><label>Email<span class="required">*</span></label></p>
		                                <input type="email" name="email" value="" required>
		                            </div>
                                <div class="form-fild">
		                                <p><label>Mobile No<span class="required">*</span></label></p>
		                                <input type="number" name="phone_no" value="" required>
		                            </div>
		                            <div class="form-fild">
		                                <p>
                                      <label>Password <span class="required">*</span></label>
                                    </p>
		                                <input type="password" name="password" value="" required>
		                            </div>
		                            <div class="login-submit">
		                                <button type="submit" class="form-button">Register</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <!--Regisster Form End-->
		        </div>
		    </div>
		</section>
	<?php include 'footer.php';?>

