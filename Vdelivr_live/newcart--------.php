 <?php include 'header.php';?>
 
 <?php include 'config.php';?>
 <section class="tilte_part "  style="background: url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/05/06/0659644af23f91e.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
				
                    <!--<h2>Eggs</h2>-->
					<h2>Cart</h2>
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <!--<li>Eggs</li>-->
							<li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <section>
  <!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Product</li>
									
									
									<li>Price</li>
									<li>Quantity</li>
									<li>Total</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_number">1</div></div>
											<div><div class="product_image"><img src="http://oonstore.in/oonadmin/upload/proimg/slide3.jpg" alt=""></div></div>
											<div class="product_name_container">
												<div class="product_name"><a href="product.html">Cool Flufy Clothing without Stripes</a></div>
												<div class="product_text">Second line for additional info</div>
											</div>
										</div>
										
										
										<div class="product_price product_text"><span>Price: </span>$3.99</div>
										<div class="product_quantity_container">
											<div class="quantity" style="display:block" data="4228">
                          <div class="input-group" >
                            
                                <!--<button type="button" class="btn btn-default btn-quantity btn-circle decrement_btn "  data="4228">-->
								<?php echo"<button type='button' class='btn btn-default btn-quantity btn-circle decrement_btn prodebtn'  data='4228' id='cpdec".$rowdet['id']."'>";?>
                                  <span class="glyphicon glyphicon-minus"></span>
                                </button>
								<!--<input type="text" name="quantity" class="form-control input-number item_cart_quantity" value="1" min="1" max="10"  readonly style="text-align: center">-->
								<?php echo"<input type='text' name='quantity' class='form-control input-number item_cart_quantity cpquach' value='1' min='1' max='10'  readonly style='text-align: center' id='cpqua".$rowdet['id']."'>"; ?>
								<!--<button type="button" class="btn btn-default btn-quantity btn-circle increment_btn"  data="4228">-->
								<?php echo "<button type='button' class='btn btn-default btn-quantity btn-circle increment_btn proinbtn'  data='4228' id='cpinc".$rowdet['id']."'>";?>
                                  <span class="glyphicon glyphicon-plus"></span>
                                </button>                            
						
                             
                             <span class="input-group-btn">
                                
                              </span>
                          </div>
                        </div>
										</div>
										<div class="product_total product_text"><span>Total: </span>$3.99</div>
									</li>
								</ul>
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="categories.html">clear cart</a></div>
									<div class="button button_continue trans_200"><a href="categories.html">continue shopping</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>


  
  </section>  
  <?php include 'footer.php';?>