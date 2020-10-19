<?php include 'session_start.php';?>
<?php include 'header.php';?>
<?php include 'config.php';?>
	
		<section class="tilte_part "  style="background: url('img/poultry.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
				
                    <!--<h2>Eggs</h2>-->
					<h2>Category</h2>
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <!--<li>Eggs</li>-->
							<li>Category</li>
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
<!--Heading Banner Area Start-->
<div class="heading-banner-area pt-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <div class="row">
                          <div class="col-md-5 col-xs-12">
                            <!--<h1>Egg</h1>-->
                            <h1 style="text-transform: capitalize;">Good</h1>
                          </div>
                          <div class="col-md-7 col-xs-12 hide_on_mobile feature_icons">
                            <div class="row">
                              <div class="col-md-3">
							  <div class="center_img">
                                <img src="img/smallicon_oon/farmfresh.png" alt="FARM FRESH">
                                <p>FARM FRESH</p>
								  </div>
								</div>
                            
                              <div class="col-md-3">
							   <div class="center_img">
                                <img src="img/smallicon_oon/freerange.png" alt="FREE RANGE">
                                <p>FREE RANGE</p>
								  </div>
                              </div>
                              <div class="col-md-3">
							   <div class="center_img">
                                <img src="img/smallicon_oon/nopresevatives.png" alt="NO PRESERVATIVES">
                                <p>NO PRESERVATIVES</p>
								  </div>
                              </div> 
							  <div class="col-md-3">
							   <div class="center_img">
                                <img src="img/smallicon_oon/noantibiotics.png " alt="NO ANTIBIOTICS">
                                <p>NO ANTIBIOTICS</p>
								  </div>
                              </div>
							    </div>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Heading Banner Area End-->

<!--Product List Grid View Area Start-->
<div class="product-list-grid-view-area mt-20">
    <div class="container">
        <div class="row">
            <!--Shop Product Area Start-->
            <div class="col-lg-12 col-md-12">
                <div class="shop-desc-container">
                    <div class="row">
                            <!--Shop Product Image Start-->

                        <!--Shop Product Image Start-->
                    </div>
                  </div>
                      <!--Shop Product Area Start-->
                      <div class="shop-product-area">
                          <div class="tab-content">
                              <!--Grid View Start-->
                              <div id="grid-view" class="tab-pane fade in active" ng-controller="CartController">
                                  <div class="row">
                                     
									     <!-----single product----->
										  <div class="product-container">
										<h2>name</h2>
										
                                          <div class="col-md-4 col-sm-3 item-col2">
                                              <div class="single-product" data-product-id="5bb3d2f3c224d42207c3ccea">
                                                <div class="product-img">
                                                    <a href="#">
														
                                                    </a>
                                                    <ul class="product-action">
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2>
													 <!--  <?php echo "<a href='#' id='cpnam".$rowdet['id']."'>".$rowdet['name']."</a>";?> -->
                                                    </h2>
													<div class="summary_description" title="<?php echo $rowdet['description']; ?>">
                                                      
                                                    </div>

                                                    <div class="row meta_desc">
                                                        <div class="col-md-4 col-xs-4 b-r">
                                                          <span class="original-price strikethrough new-price">
                                                              <p>Price</p>
                                                              <i>₹ 5000</i>
                                                            </span>
                                                        </div>
														<div class="col-md-4 col-xs-4 b-r">
														<span class="fipola-first-price new-price">
                                                              <p>Vdelivr Price</p>
                                                               <i>₹ 500</b></i>
                                                            </span>
                                                         
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 b-r">
                                                         <span class="fipola-first-price new-price">
                                                              <!--<p>Gross</p>-->
															
                                                            
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="product-price bg-product-price">
                                                        <div class="row">
                                                        
                                                        
                                                          <div class="col-md-12 col-xs-12 item-cart-info" >
														
														
														<div class="cart_add" style="display:none" data="4228">
														
														</div>
															
															<div class="quantity"  data="4228">
                          <div class="input-group" style="width: 100px">
							
                                  <span class=""><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </button>
							
								
                                  <span class=""><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </button>                            
						
                             
                             <span class="input-group-btn">
                                
                              </span>
                          </div>
                        </div>
															
															
												
														<div class="cart_add"  data="4228"> 
														 
														</div>
														<div class="quantity" style="display:none" data="4228">
                          <div class="input-group" style="width: 100px">
								
                                 <span class=""><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </button>
								
                                 <span class=""><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </button>                            
						
                             
                             <span class="input-group-btn">
                                
                              </span>
                          </div>
                        </div>
                        <div class="cart_add"  data="4228">
														</div>
														<div class="quantity" style="display:none" data="4228">
                          <div class="input-group" style="width: 100px">
								
                                  <span class=""><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </button>
								
								
                                  <span class=""><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </button>
                             <span class="input-group-btn">
                                
                              </span>
                          </div>
                        </div>
                                                          </div>
															
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                          </div>
										 </div>
										  <!-----single product end----->
                                     
                                  </div>
                              </div>
                              <!--Grid View End-->
                          </div>
                      </div>
                      <!--Shop Product Area End-->
            </div>
            <!--Shop Product Area End-->

        </div>
    </div>
</div>
<!--Product List Grid View Area End-->
 
		
   		<?php include 'footer.php';?>
	