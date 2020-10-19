	<?php include 'header.php';?>
		
		
       
		
		<section class="tilte_part "  style="background: url('http://vdelivr.com/img/food-groups.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
                    <h2>Privacy Policy</h2>
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <li>Single category</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
		           <!--Header bottom Area End-->
				      <section class="corporate-about white-bg" ng-controller="CategoryController">
            <div class="category_container">
                <div class="row-2">
                    <div class="all-about">
					<!-- <?php include "categoryimg.php";?> -->
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
	
  
	
	<!--Single Product Area Start-->
<section class="single-product-area mt-20" ng-controller="ProductDetailsController">
    <div class="container">
        <!--Single Product Info Start-->
        <div class="row">
            <div class="single-product-info mb-50">
              <!--Single Product Image Start-->
              <div class="col-md-6 col-sm-6">
                  <!--Product Tab Content Start-->
                  <div class="single-product-tab-content tab-content">
                      <div id="w1" class="tab-pane fade in active">
                          <div class="easyzoom easyzoom--overlay">
                              <a href="https://store.baskmart.com/api/products/800ac920-ca13-11e8-bbf2-d36302f94d2b.jpg">
                                  <img src="https://store.baskmart.com/api/products/800ac920-ca13-11e8-bbf2-d36302f94d2b.jpg" alt="">
                              </a>
                          </div>
                      </div>
                  </div>
                  <!--Product Tab Content End-->
                </div>
                <!--Single Product Image End-->
                <!--Single Product Content Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="single-product-content">
                            <!--Product Nav Start-->
                        <div class="product-nav hide">
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <!--Product Nav End-->
                        <h1 class="product-title">Dynamite Shrimp Pops</h1>
                        <!--Product Rating Start-->
                        <div class="product-rating hide">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star on-color"></i>
                            <a class="review-link" href="#">(1 customer review)</a>
                        </div>
                        <!--Product Rating End-->
                        <!--Product Price Start-->
                        <div class="single-product-price hide">
                            <span class="old-price" ng-if=" > 219">₹ </span>
                            <span class="new-price">₹ 219</span>
                        </div>
                        <div class="row">
                          <div class="col-md-2 col-xs-6">
                            <span class="original-price strikethrough new-price">
                              <p>Price</p>
                              <i>₹ 219</i>
                            </span>
                          </div>
                          <div class="col-md-4 col-xs-6">
                            <span class="fipola-first-price new-price">
                              <p>Fipola First</p>
                              <i>₹ 197</i>
                            </span>
                          </div>
                        </div>
                        <!--Product Price End-->
                        <!--Product Quantity Start-->
                        <div class="single-product-quantity">
                            <form id="add_to_cart_form" ng-init="product_id = '5bb3d2f4c224d42207c3ceb4'">
                                <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="input-group" style="width: 100px">
                                            <span class="input-group-btn">
                                                <button type="button" ng-click="deductQuantity()" class="btn btn-default btn-number btn-circle">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" ng-model="quantity" name="quantity" id="item_quantity" class="form-control input-number item_quantity" value="1" min="1" max="10" readonly style="text-align: center">
                                            <span class="input-group-btn">
                                                <button type="button" ng-click="addQuantity()" class="btn btn-default btn-number btn-circle">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                </div>
                                    <button ng-cloak ng-click="addToCart(product_id, quantity)" ng-disabled="quantity == 0" class="quantity-button add-btn" type="button" data-price="219" data-name="Dynamite Shrimp Pops" data-id="dynamite_shrimp_pops" data-image="https://store.baskmart.com/api/products/800ac920-ca13-11e8-bbf2-d36302f94d2b.jpg">
                                      <span ng-if="!already_added">Add to Cart</span>
                                      <span ng-if="already_added">Update Cart</span>
                                    </button>
                            </form>
                        </div>
                        <!--Product Quantity End-->
                        <!--Product Sharing Start-->
                        <div class="single-product-sharing">
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://fipola.in/ready-to-fry/dynamite_shrimp_pops" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/share?text=Checkout%20Dynamite Shrimp Pops%20on%20Fipola&url=https://fipola.in/ready-to-fry/dynamite_shrimp_pops&hashtags=fipola" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://pinterest.com/pin/create/button/?url=https://fipola.in/ready-to-fry/dynamite_shrimp_pops&description=Checkout%20Dynamite Shrimp Pops" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!--Product Sharing End-->
                        <!--Product Description Start-->
                        <div class="product-description">
                            <p>
                              <p style="margin: 0px; padding: 0px 0px 15px; outline: none; text-align: justify; color: #231f20; font-family: MontserratLight; line-height: 22px;">Fipola's Dynamite Shrimp Pops are bite-size pieces of juicy shrimp chunks par-cooked in our deliciously spicy, crunchy batter. The crispy Dynamite Pops explode in your mouth with the succulence of spicy, tangy flavour.</p>
<p>&nbsp;</p>
                            </p>
                        </div>
                        <!--Product Description End-->
                        <!--Product Meta Start-->
                        <div class="product-meta hide">
                            <span class="posted-in">
                                    Categories:
                                <a href="#">Accessories</a>,
                                <a href="#">Electronics</a>,
                                <a href="#">Tvs & Audios</a>,
                                <a href="#">Watches</a>
                            </span>
                        </div>
                        <!--Product Meta End-->
                    </div>
                </div>
                <!--Single Product Content End-->
            </div>
        </div>
        <!--Single Product Info End-->
        <!--Discription Tab Start-->
        <div class="row">
            <div class="discription-tab">
                <div class="col-md-12">
                    <div class="discription-review-contnet mb-40">
                            <!--Discription Tab Menu Start-->
                        <div class="discription-tab-menu">
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                    <li class="hide"><a data-toggle="tab" href="#review">Reviews (1)</a></li>
                                </ul>
                            </div>
                            <!--Discription Tab Menu End-->
                            <!--Discription Tab Content Start-->
                            <div class="discription-tab-content tab-content">
                              <div id="description" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="product-description">
                                          <p>
                                            <p style="margin: 0px; padding: 0px 0px 15px; outline: none; text-align: justify; color: #231f20; font-family: MontserratLight; line-height: 22px;">Fipola's Dynamite Shrimp Pops are bite-size pieces of juicy shrimp chunks par-cooked in our deliciously spicy, crunchy batter. The crispy Dynamite Pops explode in your mouth with the succulence of spicy, tangy flavour.</p>
<p>&nbsp;</p>
                                          </p>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div id="review" class="tab-pane fade hide">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="review-page-comment">
                                            <div class="review-comment">
                                                <h2>1 review for typesetting animal</h2>
                                                <ul>
                                                    <li>
                                                        <div class="product-comment">
                                                            <!-- <img src="img/comment-author/2.png" alt=""> -->
                                                            <div class="product-comment-content">
                                                                <p><strong>admin</strong>
                                                                    -
                                                                    <span>March 7, 2016:</span>
                                                                    <span class="pro-comments-rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </span>
                                                                </p>
                                                                <div class="description">
                                                                    <p>roadthemes</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="review-form-wrapper">
                                                    <div class="review-form">
                                                        <span class="comment-reply-title">Add a review </span>
                                                        <form action="#">
                                                            <p class="comment-notes">
                                                                <span id="email-notes">Your email address will not be published.</span>
                                                                 Required fields are marked
                                                                 <span class="required">*</span>
                                                            </p>
                                                            <div class="comment-form-rating">
                                                                <label>Your rating</label>
                                                                <div class="rating">
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="input-element">
                                                                <div class="comment-form-comment">
                                                                    <label>Comment</label>
                                                                    <textarea name="message" cols="40" rows="8"></textarea>
                                                                </div>
                                                                <div class="review-comment-form-author">
                                                                    <label>Name </label>
                                                                    <input required="required" type="text">
                                                                </div>
                                                                <div class="review-comment-form-email">
                                                                    <label>Email </label>
                                                                    <input required="required" type="text">
                                                                </div>
                                                                <div class="comment-submit">
                                                                    <button type="submit" class="form-button">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Discription Tab Content End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Discription Tab End-->
    </div>
</section>
<!--Single Product Area End-->

<!--Trending Product Start-->
    <section class="bestseller-product mb-55" ng-controller="CollectionController" ng-init="loadTrendingProducts()" ng-cloak>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <!--Section Title1 Start-->
                <div class="section-title1-border line-color">
                    <div class="section-title1">
                        <h3 class="header-color">Trending Products</h3>
                    </div>
                </div>
                <!--Section Title1 End-->
            </div>
        </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="product-tab-menu-area">
                        <div class="product-tab">
                            <ul>
                                <li class="active"><a data-toggle="tab" href="#amply">Chicken</a></li>
                                <li><a data-toggle="tab" href="#smarttV">Lumb / Mutton</a></li>
                                <li><a data-toggle="tab" href="#speaker">Sea Foods</a></li>
                                <li><a data-toggle="tab" href="#tv">Ready To Cook</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--Product Tab Start-->
            <div class="tab-content">
              <div id="amply" class="tab-pane fade in active">
                <div class="row">
                    <div class="trending-products owl-carousel">
                        <!--Single Product Start-->
                        <div class="col-md-12 item-col" ng-repeat="p in trending_products" ng-if="p.product_id.display_image[0]['image'] && p.product_id.is_available">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="/{[{p.product_id.product_category_id.url_slug}]}/{[{ p.product_id.url_slug }]}">
                                        <img class="first-img" ng-src="{[{ p.product_id.display_image[0]['image'] }]}" alt="{[{p.product_id.name}]}">
                                    </a>
                                    <!-- <span class="sicker">-7%</span> -->
                                    <!-- <ul class="product-action">
                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="product-content">
                                    <h2><a href="/{[{p.product_id.product_category_id.url_slug}]}/{[{ p.product_id.url_slug }]}">{[{ p.product_id.name }]}</a></h2>
                                    <div class="product-price">
                                        <span class="old-price" ng-if="p.product_id.compare_at_price">₹ {[{ p.product_id.compare_at_price }]}</span>
                                        <span class="new-price">₹ {[{ p.product_id.selling_price }]}</span>
                                        <!-- <a class="button add-btn" href="#" data-price="200" data-name="Chicken Biryani Cut - Skinless" ng-data-id="{[{ p.product_id._id }]}" ng-data-image="{[{ p.product_id.display_image[0]['image'] }]}">add to cart</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                </div>
              </div>
            </div>
            <!--Product Tab End-->
        </div>
    </section>
<!-- Trending Product End -->
<!-- Trending Product End -->


	 	<?php include 'footer.php';?>