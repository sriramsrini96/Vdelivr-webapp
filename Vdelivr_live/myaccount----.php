	<?php include 'header.php';?>
		<!--Header Area End-->
		<section class="tilte_part "  style="background: url('img/contactus.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
                    <h2>My Account</h2>
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <li>My account</li>
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
                        <!--<div class="col-lg-3 col-xs-6">
                            <div class="single-about" id="egg_alt">
                                <div class="">
                                    <a href="category.php" class="about-content" data-id="5bb521d307ea68a8da803306" data-url-slug="egg">
                                        <div class="img-containter">
                                            <img src="img/food/egg.png" style="max-height: 55px" alt="Eggs" />
                                        </div>
                                        <h6>Eggs</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="single-about" id="chicken_alt">
                                <div class="">
                                    <a href="category.php" class="about-content" data-id="5b9aaa69abe374368a87d751" data-url-slug="chicken">
                                        <div class="img-containter">
                                            <img src="img/food/chicken.png" style="max-height: 55px" alt="Chicken" />
                                        </div>
                                        <h6>Chicken</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="single-about" id="lamb_alt">
                                <div class="">
                                    <a href="category.php" class="about-content" data-id="5b9a71ceabe374368a87d748" data-url-slug="lamb-goat">
                                        <div class="img-containter">
                                            <img src="img/food/lamb_goat.png" style="max-height: 55px" alt="Lamb &amp; Goat" />
                                        </div>
                                        <h6>Lamb &amp; Goat</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="single-about" id="sea_alt">
                                <div class="">
                                    <a href="category.php" class="about-content" data-id="5b9a7204abe374368a87d749" data-url-slug="sea-food">
                                        <div class="img-containter">
                                            <img src="img/food/sea_food.png" style="max-height: 55px" alt="Sea Food" />
                                        </div>
                                        <h6>Sea Food</h6>
                                    </a>
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
        </section>
		<section class="my-account-area mt-20">
		    <div class="container">
		        <div class="row">
                    <!--Login Form Start-->
		            <div class="col-md-6 col-sm-6">
		                <div class="customer-login-register">
		                    <div class="form-login-title">
		                        <h2>Login to your oon store Account</h2>
		                    </div>
		                    <div class="login-form">
		                        <form action="/auth/local" method="post">
		                            <div class="form-fild">
		                                <p><label>Email / Mobile No <span class="required">*</span></label></p>
		                                <input type="text" name="email" value="">
		                            </div>
		                            <div class="form-fild">
		                                <p>
                                      <label>Password <span class="required">*</span></label>
                                          <a class="lost-password pull-right" href="#">Forgot your password?</a>
                                    </p>
		                                <input type="password" name="password" value="">
		                            </div>
		                            <div class="login-submit">
		                                <button type="submit" class="form-button">Login</button>
		                            </div>
		                        </form>
                            <div class="social-share mt-30">
                                <h4 class="text-black">OR SIGN IN USING</h4>
                                <div class="row">
                                  <div class="col-md-5 col-xs-6">
                                    <a href="#">
                                      <img src="img/login_with_facebook.png" alt="">
                                    </a>
                                  </div>
                                  <div class="col-md-5 col-xs-6">
                                    <a href="#">
                                      <img src="img/login_with_google.png" alt="">
                                    </a>
                                  </div>
                                </div>
                            </div>
		                    </div>
		                </div>
		            </div>
		            <!--Login Form End-->
		            <!--Register Form Start-->
		            <div class="col-md-6 col-sm-6 hide">
		                <div class="customer-login-register register-pt-0">
		                    <div class="form-register-title">
		                        <h2>Register</h2>
		                    </div>
		                    <div class="register-form">
		                        <form action="#">
		                            <div class="form-fild">
		                                <p><label>Username or email address <span class="required">*</span></label></p>
		                                <input type="text" name="username" value="">
		                            </div>
		                            <div class="form-fild">
		                                <p><label>Password <span class="required">*</span></label></p>
		                                <input type="password" name="password" value="">
		                            </div>
		                            <div class="register-submit">
		                                <button type="submit" class="form-button">Register</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <!--Register Form End-->
		        </div>
		    </div>
		</section>

			<?php include 'footer.php';?>