jQuery(document).ready(function($) {
			if (window.location.href.match('category.php') != null) {

	$.ajax({ 
				url: "../../regaction.php",
				type: "POST",
				data: {cartlistmodalch:'1'},				
				success : function(data){  
				  //alert("data ajax response cartlistmodalch "+data);
				  if(data>=1)
				  {
					  $('.cd-cart-container').removeClass('empty');
					  $('.cd-cart-container .cd-cart-trigger .count').find('li').eq(0).text(data);
                      $('.cd-cart-container .cd-cart-trigger .count').find('li').eq(1).text(data+1);
					  $("#cartlistmodal" ).load( "regaction.php", {"load_cart":"1"});
					  //window.onload = totamt;
				  }
				}
			});
	
	
	}
	
	//
	
    var cartWrapper = $('.cd-cart-container');
    var productId = 0;
    if (cartWrapper.length > 0) {
        var cartBody = cartWrapper.find('.body')
        var cartList = cartBody.find('ul').eq(0);
        var cartTotal = cartWrapper.find('.checkout').find('span');
        var cartTrigger = cartWrapper.children('.cd-cart-trigger');
        var cartCount = cartTrigger.children('.count')
        var addToCartBtn = $('.btn-add-to-cart');
        var undo = cartWrapper.find('.undo');
        var undoTimeoutId;
        addToCartBtn.on('click', function(event) {
            event.preventDefault();
           // alert($(this).attr("id"));
            var atcid = $(this).attr("id");
            addToCart(($(this)));
        });
        cartTrigger.on('click', function(event) {
            event.preventDefault();
            toggleCart();
        });
        cartWrapper.on('click', function(event) {
            if ($(event.target).is($(this))) toggleCart(true);
        });
    }

    function toggleCart(bool) {
        var cartIsOpen = (typeof bool === 'undefined') ? cartWrapper.hasClass('cart-open') : bool;
        if (cartIsOpen) {
            cartWrapper.removeClass('cart-open');
            clearInterval(undoTimeoutId);
            undo.removeClass('visible');
            cartList.find('.deleted').remove();
            setTimeout(function() {
                cartBody.scrollTop(0);
                if (Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
            }, 500);
        } else {
            cartWrapper.addClass('cart-open');
        }
    }

    function addToCart(trigger) {
        var cartIsEmpty = cartWrapper.hasClass('empty');
        //alert("tr" + trigger.attr('id'));
        addProduct(trigger);
        updateCartCount(cartIsEmpty);
        cartWrapper.removeClass('empty');
    }

    function addProduct(prodet) {
        productId = productId + 1;
        product_img = "";
       // alert("ss" + prodet.attr('id'));
        trigg = prodet.attr('id').replace('acbtnz', '');
        var acid = trigg;

        apimg = $("#cpimg" + acid).attr("src");
        apnam = $("#cpnam" + acid).text();
        appri = $("#cppri" + acid).text();
		
		
		appripack = $("#cppri" + acid).attr("data-pack");
		apprigst = $("#cppri" + acid).attr("data-gst");
		apprideli = $("#cppri" + acid).attr("data-deli");
		
		
        var cgrc = parseInt($("#gr" + acid).attr("data-quan"));
        var cgru = $("#gr" + acid).attr("data-unit");
       // alert(apimg + " " + apnam + " " + appri + "acid  " + acid + "productId " + productId);

        var productAdded = $(
            '<li class="product prodz" id="pro' + acid + '">' +
            '<div class="row">' +
            '<div class="col-md-3 col-xs-3">' +

            '<div class="product-image">' +
            '<a href="#">' +
            '<img src="' + apimg + '" alt="placeholder">' +
            '</a>' +
            '</div>' +

            '</div>' +
            '<div class="col-md-9 col-xs-9">' +

            '<div class="product-details">' +

            '<div class="row">' +
            '<div class="col-md-5 col-xs-8">' +
            '<h3>' +
            '<a href="#" id="cartpro' + acid + '">' + apnam + '</a>' +
            '</h3>' +
			  '<div class="actions">' +

            '<div class="quantity addcart_itemp">' +
            

            '<div class="quantity" data="4228">' +
            '<div class="input-group" style="width: 100px">' +
            '<button type="button" class="btn btn-default btn-quantity btn-circle decrement_btn cartdecbtn"  data="4228" id="cartdec' + acid + '">' +
            '<span class=""><i class="fa fa-minus" aria-hidden="true"></i></span>' +
            '</button>' +
            '<input type="text" name="quantity" class="form-control input-number item_cart_quantity cartquanbtn" value="1" min="1" max="10"  readonly style="text-align: center" id="cartqua' + acid + '">' +
            '<button type="button" class="btn btn-default btn-quantity btn-circle increment_btn cartincbtn"  data="4228" id="cartinc' + acid + '">' +
            '<span class=""><i class="fa fa-plus" aria-hidden="true"></i></span>' +
            '</button>' +
            '<span class="input-group-btn">' +
            '</span>' +
            '</div>' +
            '</div>' +

            '</div>' +
            '</div>' +
			

            '</div>' +
         
            '<div class="col-md-7 col-xs-4">' +
			'<div class="row">'+
			'<div class="col-md-6 col-xs-6">'+
			  '<p>' +
            '<a href="#0" id="gross' + acid + '" data-quan="'+cgrc+'" data-unit="'+cgru+'">' + cgrc + ' ' + cgru + '</a>' +
            '</p>' +
			'</div>'+
			'<div class="col-md-6 col-xs-6">'+
			 '<span class="price" id="amt' + acid + '" data-price="' + appri + '" data-pack="' + appripack + '" data-gst="' + apprigst + '" data-deli="' + apprideli + '">₹' + appri + '</span>' +
			'</div>'+
			'</div>'+
         
			

            '</div>' +
        
            '</div>' +

            '</div>' +

            '</div>' +
            '</div>' +

            '</li>'
        );
        cartList.prepend(productAdded);
        //alert("added");
        totamt();
		//
		addajax(acid,1);
		//
    }

    function updateCartCount(emptyCart, quantity) {
        if (typeof quantity === 'undefined') {
            var actual = Number(cartCount.find('li').eq(0).text()) + 1;
            var next = actual + 1;
            if (emptyCart) {
                cartCount.find('li').eq(0).text(actual);
                cartCount.find('li').eq(1).text(next);
            } else {
                cartCount.addClass('update-count');
                setTimeout(function() {
                    cartCount.find('li').eq(0).text(actual);
                }, 150);
                setTimeout(function() {
                    cartCount.removeClass('update-count');
                }, 200);
                setTimeout(function() {
                    cartCount.find('li').eq(1).text(next);
                }, 230);
            }
        } else {
            var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
            var next = actual + 1;
            cartCount.find('li').eq(0).text(actual);
            cartCount.find('li').eq(1).text(next);
        }
    }

    var quantity = 0;
    $(document).on("click", ".cartincbtn", function() {
        var t = $(this).siblings('.item_cart_quantity');
        var quantity = parseInt($(t).val());
        $(t).val(quantity + 1);

        var cincid = $(this).attr("id");
       // alert(cincid);
        var cexeincid = cincid.replace('cartinc', '');
        //alert(cexeincid);
        $("#cpqua" + cexeincid).val(quantity + 1);
        //alert("cd");

        var action = "add";
        cart_individual(cexeincid, action);
		
		//
		var addajaxcount=quantity + 1;
		addajax(cexeincid,addajaxcount);
		//

    });

    $(document).on("click", ".cartdecbtn", function() {
        var t = $(this).siblings('.item_cart_quantity');
        var quantity = parseInt($(t).val());

        var cdecid = $(this).attr("id");
        //alert(cdecid);
        var cexedecid = cdecid.replace('cartdec', '');
        //alert(cexedecid);

        if (quantity > 1) {
            $(t).val(quantity - 1);

            $("#cpqua" + cexedecid).val(quantity - 1);
           // alert("cd");

            var action = "sub";
            cart_individual(cexedecid, action);
			
			
			//
		var addajaxcount=quantity - 1;
		addajax(cexedecid,addajaxcount);
		//
			

        } else {
            $('#pro' + cexedecid).remove();
            $("#cpdec" + cexedecid).closest('.quantity').toggle();
            $("#cpdec" + cexedecid).closest('.item-cart-info').children('.cart_add').show();

            var actual = Number(cartCount.find('li').eq(0).text()) - 1;
            var next = actual - 1;
            cartCount.find('li').eq(0).text(actual);
            cartCount.find('li').eq(1).text(next);
            totamt();
			
			//
			remajax(cexedecid)
			//
        }

    });

    $('.proinbtn').click(function() {
        var t = $(this).siblings('.item_cart_quantity');
        var quantity = parseInt($(t).val());
        $(t).val(quantity + 1);

        //
        var incid = $(this).attr("id");
        //alert(incid);
        var exeincid = incid.replace('cpinc', '');
        //alert(exeincid);
        $("#cartqua" + exeincid).val(quantity + 1);
        //alert("d");
       
        var action = "add";
        individual(exeincid, action);
		
		//
		var addajaxcount=quantity + 1;
		addajax(exeincid,addajaxcount);
		//

    });

    $('.prodebtn').click(function() {
        var t = $(this).siblings('.item_cart_quantity');
        var quantity = parseInt($(t).val());

        //
        var decid = $(this).attr("id");
        //alert(decid);
        var exedecid = decid.replace('cpdec', '');
        //alert(exedecid);
        

        if (quantity > 1) {
            $(t).val(quantity - 1);

            $("#cartqua" + exedecid).val(quantity - 1);
            //alert("d");
            //
            var action = "sub";
            individual(exedecid, action);
			
			
			//
		var addajaxcount=quantity - 1;
		addajax(exedecid,addajaxcount);
		//
			

        } else {
            $('#pro' + exedecid).remove();
            $(this).closest('.quantity').toggle();
            $(this).closest('.item-cart-info').children('.cart_add').show();

            var actual = Number(cartCount.find('li').eq(0).text()) - 1;
            var next = actual - 1;
            cartCount.find('li').eq(0).text(actual);
            cartCount.find('li').eq(1).text(next);
            totamt();
			
			
			//
			remajax(exedecid)
			//
			

        }

    });

    function individual(idpro, action) {
        //alert(idpro + " idpro");
        var quan = parseInt($("#cpqua" + idpro).val());
        //alert(quan + " quan");

        var amt = parseInt($("#amt" + idpro).attr("data-price"));
        //alert(amt + " amt");
        var inamt = quan * amt;
        //alert(idpro + " " + inamt);
        var grcount = parseInt($("#gr" + idpro).attr("data-quan"));
        var grunit = $("#gr" + idpro).attr("data-unit");
        //alert("GRCOUNT  " + grcount + "   GRUNIT  " + grunit);
        grossdp = (quan * grcount);
        $("#gross" + idpro).text(grossdp + " " + grunit);
        $("#amt" + idpro).text('₹' + inamt);
        totamt();
    }
	
	function cart_individual(idpro, action) {
        //alert(idpro + " idpro");
        var quan = parseInt($("#cartqua" + idpro).val());
        //alert(quan + " quan");

        var amt = parseInt($("#amt" + idpro).attr("data-price"));
        //alert(amt + " amt");
        var inamt = quan * amt;
        //alert(idpro + " " + inamt);
        var grcount = parseInt($("#gross" + idpro).attr("data-quan"));
        var grunit = $("#gross" + idpro).attr("data-unit");
        //alert("GRCOUNT  " + grcount + "   GRUNIT  " + grunit);
        grossdp = (quan * grcount);
        $("#gross" + idpro).text(grossdp + " " + grunit);
        $("#amt" + idpro).text('₹' + inamt);
        totamt();
    }
	
	

    function totamt() {
        var totamt = 0;
		var pack_c=0,gst=0,deli_c=0;
        var productsid = new Array();
        var productquantity = new Array();
        $(".prodz").each(function() {
           //alert("sdf");
            var proid = ($(this).attr("id")).replace("pro", "");
            totamt = totamt + parseInt(($("#amt" + proid).text()).replace('₹', ''));
           //alert("proid " + proid + "  totamt " + totamt);
            productsid.push(proid);
            productquantity.push(parseInt($("#cpqua" + proid).val()));
			
			var q=parseInt($("#cartqua" + proid).val());
			var data_pack=parseInt($("#amt" + proid).attr("data-pack"));
			pack_c=pack_c+(data_pack*q);
			deli_c=deli_c+parseInt(($("#amt" + proid).attr("data-deli")));			
			var data_price=parseInt(($("#amt" + proid).attr("data-price")));
			var gstf=parseFloat(($("#amt" + proid).attr("data-gst")));
			gst=gst+(((gstf/100)*data_price)*q);
			//alert("pack_c  "+pack_c+" deli_c "+deli_c+" gst "+gst);
			
        });
		//alert(totamt);
        cartTotal.text(totamt);
		gst=parseFloat(gst.toFixed(2));
		
		pack_c=parseFloat(pack_c.toFixed(2));
		deli_c=parseFloat(deli_c.toFixed(2));
		
		overallamt=totamt+pack_c+deli_c+gst;
		//$("#payamt").text(totamt);
        //alert("productsid:   " + (productsid.toString()) + "  productquantity:  " + (productquantity.toString()))
		$.ajax({ 
				url: "../../regaction.php",
				type: "POST",
				data: {carttotamt:overallamt,onlytotamt:totamt,pack_c:pack_c,deli_c:deli_c,gst:gst}//,				
				/*success : function(data){  
				  alert("data ajax response "+data);
				}*/
			});
    }
	
	
	
	//
	function addajax(ajaxidpro,apquantity){
		//alert("ajax call to add"); 
		$.ajax({ 
				url: "../../regaction.php",
				type: "POST",
				data: {product_code:ajaxidpro,apquantity:apquantity},
				dataType: "json",
				success : function(data){  
				  //alert("data ajax response "+data.items+" products "+data.products/*[0][product_id]*/);
				  $("#cart_count_part").text(data.items);
				}
			});
	}
	//
	
	//
	function remajax(remidpro){
		//alert("ajax call to remove"); 
		$.ajax({ 
				url: "../../regaction.php",
				type: "POST",
				data: {remove_code:remidpro},
				dataType: "json",
				success : function(data){  
				  //alert("data ajax response "+data.items);
				  $("#cart_count_part").text(data.items);
				}
			});
	}
	//
	
	
	//
	$(document).on("click", ".finalinc", function() {
        var t = $(this).attr('id');
		//alert(t);
		t= t.replace('finc', '');
		//alert(t);
        var quantity = parseInt($("#fqua"+t).val());
		quantity=quantity + 1;
        $("#fqua"+t).val(quantity);
		cartindi(t);
		//
		var addajaxcount=quantity;
		addajax(t,addajaxcount);
		//

    });

    $(document).on("click", ".finaldec", function() {
        var t = $(this).attr('id');
		//alert(t)
		t= t.replace('fdec', '');
		//alert(t)
        var quantity = parseInt($("#fqua"+t).val());
        if (quantity > 1) {
			quantity=quantity - 1;
            $("#fqua"+t).val(quantity);
			cartindi(t);
			//
		var addajaxcount=quantity;
		addajax(t,addajaxcount);
		//
        } else {
            $('#zcartli' + t).remove();
            carttotamt();
			//
			remajax(t)
			//
        }

    });
	
	//
	
	
	function carttotamt() {
        var carttotamt = 0;
		var cpack_c=0,cgst=0,cdeli_c=0;
        $(".zcartli").each(function() {
            var proid = ($(this).attr("id")).replace("zcartli", "");
			//alert(proid);
            carttotamt = carttotamt + parseInt(($("#factp" + proid).text()).replace('₹', ''));
			
			
			var cq=parseInt($("#fqua" + proid).val());
			var cdata_pack=parseInt($("#factp" + proid).attr("data-pack"));
			cpack_c=cpack_c+(cdata_pack*cq);
			cdeli_c=cdeli_c+parseInt(($("#factp" + proid).attr("data-deli")));			
			var cdata_price=parseInt(($("#factp" + proid).attr("data-price")));
			var cgstf=parseFloat(($("#factp" + proid).attr("data-gst")));
			cgst=cgst+(((cgstf/100)*cdata_price)*cq);
			//alert("cpack_c  "+cpack_c+" cdeli_c "+cdeli_c+" cgst "+cgst);
			
			
			
			
        });
		cgst=parseFloat(cgst.toFixed(2));
		
		cpack_c=parseFloat(cpack_c.toFixed(2));
		cdeli_c=parseFloat(cdeli_c.toFixed(2));
		
		coverallamt=carttotamt+cpack_c+cdeli_c+cgst;
		
		
		//alert(carttotamt+" carttotamt");
		$.ajax({ 
				url: "../../regaction.php",
				type: "POST",
				data: {carttotamt:coverallamt,onlytotamt:carttotamt,pack_c:cpack_c,deli_c:cdeli_c,gst:cgst//carttotamt:carttotamt
				}//,				
				/*success : function(data){  
				  alert("data ajax response "+data);
				}*/
			});
			
			
			$("#producttotalamount").text(carttotamt);
			$("#productgst").text(cgst);
			$("#productpack").text(cpack_c);
			$("#productdeli").text(cdeli_c);
			
			
			
			$("#ctotalamount").text(coverallamt);
			
			//checkout_amount(carttotamt);
    }
	function cartindi(tc){
		//alert(tc);
		var quantity = parseInt($("#fqua"+tc).val());
		//alert(quantity);
		var factp = parseInt($("#factp" +tc).attr("data-price"));
        //alert(factp + " factp");
        var finamt = quantity * factp;
       //alert(finamt + " " + finamt);
        var fgrcount = parseInt($("#fqua" + tc).attr("data-quantity"));
        var fgrunit = $("#fgross" + tc).attr("data-unit");
        //alert("fGRCOUNT  " + fgrcount + "   fGRUNIT  " + fgrunit);
        fgrossdp = (quantity * fgrcount);
        $("#fgross" + tc).text(fgrossdp + " " + fgrunit);
        $("#factp" + tc).text('₹' + finamt);
        carttotamt();
	}
	/*function checkout_amount(amount)
	{//alert("befor checkout");
	////var ss=$('script.checkout_amount').attr('data-amount');
	//alert(ss+"  as")
		$('script.checkout_amount').attr('data-amount', amount*100);
		//var ss=$('script.checkout_amount').attr('data-amount');
	//alert(ss+"  as")
		//alert("after checkout");
	}*/

});
