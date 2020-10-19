<?php include 'config.php';?>

	<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Vdelivr</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="Oon Store Organic Fed Free Range Eggs">
    <meta name="description" content="Oon Store provides Organic Fed Free Range Eggs, which are rich and tasty. Our scheduled delivery, helps you to choose the exact date and time for delivery">

    <!-- End of Meta -->

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Ionicons Font CSS-->
    <link rel="stylesheet" href="css/ionicons.min.css">

    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- UI CSS-->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <!-- Chosen CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/pushbar.css">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/slick.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datepicker3.css">
    <!-- Default CSS -->
    <link rel="stylesheet" href="css/default.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/mobile.css">
    <!-- home code CSS -->
    <link rel="stylesheet" href="css/home-code.css">
    <link rel="stylesheet" href="css/cartnew.css">

	<!--add address modal css-->
	<link rel="stylesheet" href="css/addaddress.css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Modernizr Js -->
    <!-- <script src="js/modernizr-2.8.3.min.js"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
	<script src="https://wchat.freshchat.com/js/widget.js"></script>


	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138502648-1"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


<!-- Facebook Pixel Code -->



</head>
<body >
	<div class="wrapper home-4">
<header>
		   <div class="header-container header-color">
		       <!--Header Top Area Start-->

		           <!--Header Top Area End-->
		           <!--Header Middel Area Start-->
		           <div class="header-middel-area">
		               <div class="container">
		                   <div class="row">
		                      <!-- Nav Icon -->
		                      <div class="col-md-2 col-sm-2 col-xs-2 show_on_mobile nav_icon">
		                        <a id="open_side_menu" class="open_side_menu_c" href="#">
		                          <img src="img/nav_icon.png" alt="">
		                        </a>
		                      </div>
		                      <!-- End of Nav Icon -->
		                       <!--Logo Start-->
		                       <div class="col-md-3 col-sm-3 col-xs-6">
		                           <div class="logo logo-size">
		                               <a href="index.php">
		                                 <img class="sizing_of_logo" src="img/footer_logo.png" alt="">
		                               </a>
		                           </div>
		                       </div>
							    <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="header-bottom-area header-sticky menu-sticky bg-sticky-black">

                                        <div class="styickydiv">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <!--Logo Sticky Start-->
                                                <div class="logo-sticky logo-size">
                                                    <a href="index.php">
                                                        <img class="sizing_of_logo" src="img/homelogo.png" alt="">
                                                    </a>
                                                </div>
                                                <!--Logo Sticky End-->
                                                <!--Main Menu Area Start-->
                                                <div class="main-menu-area search-bar border-radius main-menu-box ">
                                                    <nav>
                                                        <ul class="main-menu">
                                                            <li class=""><a href="index.php">Home</a></li>
                                                            <!-- <li><a href="#">TODAY DEALS</a></li> -->
                                                            <li>
                                                                <a href="#">Shop by Category</a>
                                                                <ul class="dropdown" id=1>
																	<script type="text/javascript">
																		$.ajax({url: "http://localhost:3000/categorydetails/findcategory", success: function(result){
																			Array.from(result).forEach(el => {
																				console.log(el.category_name)

    
            $("#1").append("<li><a href='javascript:void(0)' class='catprozz'>"+el.category_name+"</a></li>");
          
        });
  }});
																	</script>

                                                                </ul>
                                                            </li>
                                                            <li><a href="index.php#oon-difference"> About Us</a></li>


                                                            <li><a href="contactus.php">Contact US</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                                <!--Main Menu Area End-->
                                            </div>
											  <div class="col-md-3 col-sm-3 col-xs-6">
		                           <div class="mini-cart-area main-menu-area search-bar border-radius main-menu-box ">
		                               <ul class="main-menu">



										   <?php
										   if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){  ?>
											<li class="hide_on_mobile login_signup text_change"><a href="#" class="mini_headername"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $_SESSION['weboonuname'];?></a>
											<ul class="dropdown">
											     <li><a href="profile.php">My Account</a></li>
												 <li><a href="myorder.php">My Orders</a></li>
												 <li><a href="logout.php">Logout</a></li>
                                              </ul>

											</li>

										    <li class="hide_on_mobile cart_icon_port">
		                                     <a href="cart.php" class="icon-color" title="View your cart">
		                                       <i class="ion-android-cart"></i>
											   <span class="count_part" id="cart_count_part"><?php
											   if(isset($_SESSION["products"]))
												   echo count($_SESSION["products"]);
											   else
												   echo 0;
											   ?></span>
		                                     </a>

		                                   </li>

										   <?php
										   }
										   else{
											 ?>

		                                   <li class="hide_on_mobile login_signup" >

		                                     <b class="icon-color  btn fifth " data-toggle="modal" data-target="#myModal" style="cursor: pointer; margin-top: 5px; display: block">
		                                       Login / Signup
		                                     </b>
		                                   </li>

										    <?php
										   }
											 ?>
		                               </ul>
		                           </div>
		                           </div>
		                       </div>
                                        </div>

                                </div>
                            </div>
		                       <!--Mini Cart Start-->

		                       <!--Mini Cart End-->
		                   </div>
		               </div>
		           </div>
		           <!--Header Middel Area End-->
		           <!--Header bottom Area Start-->

		           <!--Header bottom Area End-->
		           <!--Mobile Search Area Start-->

		           <!--Mobile Search Area End-->
		         </div>
		</header>

		     <div id="side_menu" class="pushbar from_left">
            Menu
            <button  class="close " id="open_side_menu_cc" aria-label="Close Menu">
                <i class="ion-ios-close"></i>
            </button>

            <ul class="menu">

               <li class=""><a href="index.php">Home</a></li>
                                                            <!-- <li><a href="#">TODAY DEALS</a></li> -->
                                                            <li id="open2">
                                                                <a href="#">Shop by Category</a>
                                                                <ul class="drop2">
																	
													<li><a href='javascript:void(0)' class='catprozz' id=1>summa</a></li>

                                                                </ul>
                                                            </li>
                                                            <li><a href="index.php#oon-difference"> About Us</a></li>


                                                            <li><a href="contactus.php">Contact US</a></li>

										   <?php
										   if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){  ?>
											<li class=" login_signup text_change" id="open"><a class="mini_headername" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $_SESSION['weboonuname'];?></a>
											<ul class="drop">
											     <li><a href="profile.php">My Account</a></li>
												 <li><a href="myorder.php">My Orders</a></li>
												 <li><a href="logout.php">Logout</a></li>
                                              </ul>

											</li>

										    <li class=" cart_icon_port">
		                                     <a href="cart.php" class="icon-color" title="View your cart">
		                                       <i class="ion-android-cart"></i>
											   <span class="count_part" id="cart_count_part"><?php
											   if(isset($_SESSION["products"]))
												   echo count($_SESSION["products"]);
											   else
												   echo 0;
											   ?></span>
		                                     </a>

		                                   </li>

										   <?php
										   }
										   else{
											 ?>

		                                   <li class=" login_signup" >

		                                     <b class="icon-color  btn fifth " data-toggle="modal" data-target="#myModal" style="cursor: pointer; margin-top: 5px; display: block">
		                                       Login / Signup
		                                     </b>
		                                   </li>

										    <?php
										   }
											 ?>


            </ul>

        </div>
