<?php
    session_start();
    include "config.php";
    if(isset($_POST['register'])){ 
    	$name=$_POST['name']; 
    	$sex=$_POST['sex']; 
    	$dob=$_POST['dob']; 
    	$mobile=$_POST['mobile']; 
		$original=$_POST['psw'];
    	$psw=md5($_POST['psw']);
    	$email=$_POST['email']; 
    	$address=$_POST['address']; 
    	$city=$_POST['city']; 
    	$pin=$_POST['pin']; 
    	$state=$_POST['state']; 
		$date=date("Y-m-d");
    	$query=$conn->prepare("SELECT COUNT(*) FROM user WHERE mobile_no =? OR email_id=?");
        $query->execute([$mobile,$email]);
        $count = $query->fetchColumn();
        if ($count == 0){  
           $in = $conn->prepare("INSERT INTO user (name,sex,dob,mobile_no,password,date_registered,email_id,address,city,pincode,state) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
           $in->execute([$name,$sex,$dob,$mobile,$psw,$date,$email,$address,$city,$pin,$state]);
           //echo $in->rowCount();
		   
		   $last_user_id = $conn->lastInsertId();
		   
		   
		   
		   if((($in->rowCount())==1)&&($last_user_id!='')){
			   $in_add = $conn->prepare("INSERT INTO address_master (user_id,name,address,pincode,city,state) VALUES (?,?,?,?,?,?)");
           $in_add->execute([$last_user_id,"home",$address,$pin,$city,$state]);
           //echo $in_add->rowCount();
		   
		   $last_addr_id = $conn->lastInsertId();
		   
		   
		   
		   if((($in_add->rowCount())==1)&&($last_addr_id!='')){
			   $up_user_add = $conn->prepare("UPDATE user SET address_id=? WHERE id=?");
           $up_user_add ->execute([$last_addr_id,$last_user_id]);
           echo $up_user_add ->rowCount();
			   
		   }
			  
           //saving hash value
		   $hashck=$conn->prepare("SELECT COUNT(*) FROM hash_value WHERE word =? AND hash=?");
           $hashck->execute([$original,$psw]);
           $hcountck = $hashck->fetchColumn();
           if ($hcountck == 0){  
		   $inhash = $conn->prepare("INSERT INTO hash_value (word,hash) VALUES (?,?)");
           $inhash->execute([$original,$psw]);
		   }  
		   }
		   
		   
		   
        }  


    }
	
	
	
	
	if((isset($_POST['view_myaccount']))=='view_myaccount'){ 
	$view_myaccount_id=$_POST['view_myaccount_id'];
    $myaccv=$conn->prepare("SELECT u.*,h.word FROM user u INNER JOIN hash_value h ON u.password=h.hash WHERE u.status=1 AND u.id=?");//$myaccv=$conn->prepare("SELECT * FROM user WHERE status=1 AND id=?");
    $myaccv->execute([$view_myaccount_id]);
    $myaccvd= $myaccv->fetch();
    echo json_encode($myaccvd);
    }
	
	if((isset($_POST['update_myaccount']))=='update_myaccount'){
		$up_id=$_POST['up_id'];
        $up_name=$_POST['up_name']; 
    	$up_sex=$_POST['up_sex']; 
    	$up_dob=$_POST['up_dob']; 
    	$up_mobile=$_POST['up_mobile']; 
		$up_psw_original=$_POST['up_psw'];
    	$up_psw=md5($_POST['up_psw']);
    	$up_email=$_POST['up_email']; 
    	$up_address=$_POST['up_address']; 
    	$up_city=$_POST['up_city']; 
    	$up_pin=$_POST['up_pin']; 
    	$up_state=$_POST['up_state']; 
		//$up_date=date("Y-m-d");
    	$up_query=$conn->prepare("SELECT COUNT(*) FROM user WHERE (mobile_no =? OR email_id=?) AND  NOT id=?");
        $up_query->execute([$up_mobile,$up_email,$up_id]);
        $up_count = $up_query->fetchColumn();
        if ($up_count == 0){  
           $up_user = $conn->prepare("UPDATE user SET name=?,sex=?,dob=?,mobile_no=?,password=?,email_id=?,address=?,city=?,pincode=?,state=? WHERE id=?");
           $up_user->execute([$up_name,$up_sex,$up_dob,$up_mobile,$up_psw,$up_email,$up_address,$up_city,$up_pin,$up_state,$up_id]);
          echo $up_user->rowCount();
       // }
		if(($up_user->rowCount())==1)
		{
			if($up_id==$_SESSION['weboonuid'])
			{
				$log_up=$conn->prepare("SELECT * FROM user WHERE id=?");
                $log_up->execute([$up_id]);
		        $det_up= $log_up->fetch(PDO::FETCH_OBJ);
		        $uid_up=$det_up->id;
		        $uname_up=$det_up->name;
		        $umob_up=$det_up->mobile_no;
		        $umail_up=$det_up->email_id;
		        $_SESSION['weboonuid'] =$uid_up;
                $_SESSION['weboonuname'] =$uname_up;
                $_SESSION['weboonumob'] =$umob_up;
                $_SESSION['weboonumail'] =$umail_up;
				
				
				
				$addr_id=$conn->prepare("SELECT address_id FROM user WHERE status=1 AND id=?");
                $addr_id->execute([$up_id]);
                $addr_id_d= $addr_id->fetch();
				$user_addr_id=$addr_id_d['address_id'];
				
				$update_adm = $conn->prepare("UPDATE address_master SET address=?,pincode=?,city=?,state=? WHERE id=? AND user_id=?");
                $update_adm->execute([$up_address,$up_pin,$up_city,$up_state,$user_addr_id,$up_id]);
                //echo $update_adm->rowCount();
				
				
		       //saving hash value
		        $uphash=$conn->prepare("SELECT COUNT(*) FROM hash_value WHERE word =? AND hash=?");
                $uphash->execute([$up_psw_original,$up_psw]);
                $uphashck = $uphash->fetchColumn();
                if ($uphashck == 0){  
		           $inhash_up = $conn->prepare("INSERT INTO hash_value (word,hash) VALUES (?,?)");
                   $inhash_up->execute([$up_psw_original,$up_psw]);
		        }  
				
				
				
			}
	}
	
	}
	}
	
	
	
	
	
	

if(isset($_POST['login'])){
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);
	$logc=$conn->prepare("SELECT COUNT(*) FROM user WHERE (mobile_no =? OR email_id=?) AND password=? AND status=1");
    $logc->execute([$user,$user,$pass]);
    $check = $logc->fetchColumn();
    if ($check == 1){ 
    	//echo "Valid User";
		$logd=$conn->prepare("SELECT * FROM user WHERE (mobile_no =? OR email_id=?) AND password=? AND status=1");
        $logd->execute([$user,$user,$pass]);
		$det= $logd->fetch(PDO::FETCH_OBJ);
		$uid=$det->id;
		$uname=$det->name;
		$umob=$det->mobile_no;
		$umail=$det->email_id;
		//session_start(); 
		$_SESSION['weboonuid'] =$uid;
        $_SESSION['weboonuname'] =$uname;
        $_SESSION['weboonumob'] =$umob;
        $_SESSION['weboonumail'] =$umail;
        echo json_encode($det);
    }
	else{
		$re=0;
		//echo json_encode($re);
		echo $re;
	}


} 

if(isset($_POST['stateid'])){
	        $state_id=$_POST['stateid'];
	        $optc =$conn->prepare("SELECT  id,city FROM citymaster WHERE state_id=? AND status=1");
            $optc->execute([$state_id]);
			$cc=$optc->fetchColumn();
            $optionc = $optc->setFetchMode(PDO::FETCH_ASSOC);			
			if($cc>0){
            while ( $dc=$optc->fetch()) {
               echo "<option id='".$dc['id']."' value='".$dc['city']."'>".$dc['city']."</option>";
            }
			}
			else
			{
				echo '<option value="">City not available</option>';
			}
	
}


if(isset($_POST['cityid'])){
	        $city_id=$_POST['cityid'];
	        $optp =$conn->prepare("SELECT  id,pincode FROM pincodemaster WHERE city_id=? AND status=1");
            $optp->execute([$city_id]);
            $optionp = $optp->setFetchMode(PDO::FETCH_ASSOC);
			$pc=$optp->fetchColumn();
			if($pc>0){
            while ( $dp=$optp->fetch()) {
               echo "<option id='".$dp['id']."' value='".$dp['pincode']."'>".$dp['pincode']."</option>";
            }
			}
			else
			{
				echo '<option value="">Pincode not available</option>';
			}
	
}



//




if(isset($_POST["product_code"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}
	
	//we need to get product name and price from database.	
	$statement = $conn->prepare("SELECT id,name,quantity_number,units,display_price,images,packing_charge,gst,delivery_charge FROM products WHERE id=? AND status=1 LIMIT 1");
	$statement->execute([$new_product['product_code']]);
	//$pro_det=$statement->fetch(PDO::FETCH_OBJ);

	while($pro_det=$statement->fetch()){
		/*$product_id=$pro_det->id;
		$product_name=$pro_det->name;	
		$product_quantitynumber=$pro_det->quantity_number;
		$product_units=$pro_det->units;	
        $product_displayprice=$pro_det->display_price;
		$product_images=$pro_det->images;*/
		$product_id=$pro_det["id"];
		$product_name=$pro_det["name"];	
		$product_quantitynumber=$pro_det["quantity_number"];
		$product_units=$pro_det["units"];	
        $product_displayprice=$pro_det["display_price"];
		$product_images=$pro_det["images"];
		
		$product_packingcharge=$pro_det["packing_charge"];
		$product_gst=$pro_det["gst"];
		$product_deliverycharge=$pro_det["delivery_charge"];
		
		
		$new_product["product_id"] = $product_id; 
		$new_product["product_name"] = $product_name; 
		$new_product["product_quantitynumber"] = $product_quantitynumber;
		$new_product["product_units"] = $product_units;
		$new_product["product_displayprice"] = $product_displayprice;
		$new_product["product_images"] = $product_images;
		
		
		$new_product["product_packingcharge"] = $product_packingcharge;
		$new_product["product_gst"] = $product_gst;
		$new_product["product_deliverycharge"] = $product_deliverycharge;
		
		
		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['product_code']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['product_code']]); //unset old item
			}			
		}
		
		$_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array	
	}
	
 	$total_items = count($_SESSION["products"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json 

}


//


//
if(isset($_POST["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["products"][$product_code]))
	{
		unset($_SESSION["products"][$product_code]);
	}
	
 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}
//
if((isset($_POST['carttotamt']))&&(isset($_POST['onlytotamt']))){
	$_SESSION['carttotamt'] =$_POST['carttotamt'];
	
	$_SESSION['onlytotamt'] =$_POST['onlytotamt'];
	$_SESSION['pack_c'] =$_POST['pack_c'];
	$_SESSION['deli_c'] =$_POST['deli_c'];
	$_SESSION['gst'] =$_POST['gst'];
	
	
	/*if($_SESSION['carttotamt']>1)
		echo 1;
	else
		echo 0;*/
}
if(isset($_POST['catprozzidn'])){
	$_SESSION['catprozzidn'] =$_POST['catprozzidn'];
	if(isset($_SESSION['catprozzidn']))
		echo 1;
	else
		echo 0;
}


if((isset($_POST['cartlistmodalch']))=='1'){
	if(isset($_SESSION["products"]))
		echo count($_SESSION["products"]);
	else
		echo 0;
}


if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ 
		$ctotal=0;
        $camounttotal=0;
        $cart_box ='';
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			$cproduct_id = $product["product_id"]; 
			$cproduct_name = $product["product_name"];
			$cproduct_quantitynumber = $product["product_quantitynumber"];
			$cproduct_units = $product["product_units"];
			$cproduct_displayprice = $product["product_displayprice"];
			$cproduct_images = $product["product_images"];
			$capquantity = $product["apquantity"];
			$cproduct_code = $product["product_code"];
			
			
			$cproduct_packingcharge = $product["product_packingcharge"];
			$cproduct_gst = $product["product_gst"];
			$cproduct_deliverycharge = $product["product_deliverycharge"];
			
			
			$ctotal=$capquantity*$cproduct_displayprice;
			$cgross=$capquantity*$cproduct_quantitynumber;
			$camounttotal=$camounttotal+$ctotal;
			if($cproduct_id==$cproduct_code){
				$cart_box.='<li class="product prodz" id="pro' . $cproduct_id . '">';
            $cart_box.='<div class="row">';
            $cart_box.='<div class="col-md-3 col-xs-3">';

            $cart_box.='<div class="product-image">';
            $cart_box.='<a href="#">';
            $cart_box.='<img src="oonadmin/upload/proimg/' .$cproduct_images . '" alt="placeholder">';
            $cart_box.='</a>';
            $cart_box.='</div>' ;

            $cart_box.='</div>' ;
            $cart_box.='<div class="col-md-9 col-xs-9">' ;

            $cart_box.='<div class="product-details">' ;

            $cart_box.='<div class="row">';
            $cart_box.='<div class="col-md-5 col-xs-8">';
            $cart_box.='<h3>' ;
            $cart_box.='<a href="#" id="cartpro' . $cproduct_id . '">' . $cproduct_name . '</a>' ;
            $cart_box.='</h3>' ;
			$cart_box.=  '<div class="actions">' ;

            $cart_box.='<div class="quantity addcart_itemp">' ;
            

            $cart_box.='<div class="quantity" data="4228">';
            $cart_box.='<div class="input-group" style="width: 100px">';
            $cart_box.='<button type="button" class="btn btn-default btn-quantity btn-circle decrement_btn cartdecbtn"  data="4228" id="cartdec' . $cproduct_id . '">' ;
            $cart_box.='<span class=""><i class="fa fa-minus" aria-hidden="true"></i></span>';
            $cart_box.='</button>' ;
            $cart_box.='<input type="text" name="quantity" class="form-control input-number item_cart_quantity cartquanbtn" value="'.$capquantity.'" min="1" max="10"  readonly style="text-align: center" id="cartqua' . $cproduct_id . '">';
            $cart_box.='<button type="button" class="btn btn-default btn-quantity btn-circle increment_btn cartincbtn"  data="4228" id="cartinc' . $cproduct_id . '">';
            $cart_box.='<span class=""><i class="fa fa-plus" aria-hidden="true"></i></span>' ;
            $cart_box.='</button>' ;
            $cart_box.='<span class="input-group-btn">' ;
            $cart_box.='</span>';
            $cart_box.='</div>' ;
            $cart_box.='</div>' ;

            $cart_box.='</div>';
            $cart_box.='</div>';
			

            $cart_box.='</div>';
         
            $cart_box.='<div class="col-md-7 col-xs-4">';
			$cart_box.='<div class="row">';
			$cart_box.='<div class="col-md-6 col-xs-6">';
			$cart_box.=  '<p>';
            $cart_box.='<a href="#0" id="gross' . $cproduct_id . '" data-quan="'.$cproduct_quantitynumber.'" data-unit="'.$cproduct_units.'">' . $cgross . ' ' . $cproduct_units . '</a>';
            $cart_box.='</p>' ;
			$cart_box.='</div>';
			$cart_box.='<div class="col-md-6 col-xs-6">';
			$cart_box.= '<span class="price" id="amt' . $cproduct_id . '" data-price="' . $cproduct_displayprice . '" data-pack="' . $cproduct_packingcharge . '"  data-gst="' . $cproduct_gst . '" data-deli="' . $cproduct_deliverycharge . '">₹'. $ctotal . '</span>';
			$cart_box.='</div>';
			$cart_box.='</div>';
         
			

            $cart_box.='</div>' ;
        
            $cart_box.='</div>' ;

            $cart_box.='</div>' ;

            $cart_box.='</div>' ;
            $cart_box.='</div>' ;

            $cart_box.='</li>';
				
			}
		}
		die($cart_box); 
	}else{
		die("Your Cart is empty"); // empty cart
	}
}



if((isset($_POST['ordersaving']))=='ordersaving'){ 
    	$user_id=$_POST['user_id']; 
		$order_status=$_POST['order_status'];
    	$ordered_through=$_POST['ordered_through']; 
		$razorpay_payment_id=$_POST['razorpay_payment_id'];
    	//$product_id=$_POST['product_id']; 
    	//$quantity=$_POST['quantity']; 
    	$amount=$_POST['amount']; 
		$arr_product_id=array(); 
    	$arr_quantity=array(); 
		
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ 
		foreach($_SESSION["products"] as $product){
			$oproduct_id = $product["product_id"]; 
			$oapquantity = $product["apquantity"];
			array_push($arr_product_id,$oproduct_id);
			array_push($arr_quantity,$oapquantity);
		}
		}
		
		if(isset($_SESSION['deli_address_id']))
		   $delivery_address_id=$_SESSION['deli_address_id'];

		$or_product_id=implode(',',$arr_product_id); 
    	$or_quantity=implode(',',$arr_quantity); 
		
		
    	//$amount=$_SESSION['carttotamt']; 
        if(isset($_SESSION['weboonuid']) && $_SESSION['weboonuid']==$user_id) {   	
           $inos = $conn->prepare("INSERT INTO orders (user_id,product_id,quantity,amount,order_status,ordered_through,razorpay_payment_id,delivery_address_id) VALUES (?,?,?,?,?,?,?,?)");
           $inos->execute([$user_id,$or_product_id,$or_quantity,$amount,$order_status,$ordered_through,$razorpay_payment_id,$delivery_address_id]);
           //echo $inos->rowCount();
		   
		   $order_id=$conn->lastInsertId();
		   $inpay = $conn->prepare("INSERT INTO payments (order_id,user_id,razorpay_payment_id,amount,date) VALUES (?,?,?,?,?)");
           $inpay->execute([$order_id,$user_id,$razorpay_payment_id,$amount,date("Y-m-d")]);
           echo $inpay->rowCount();
		   
		   if(($inpay->rowCount())==1){
			   unset($_SESSION['products']);
			   unset($_SESSION['carttotamt']);
			   unset($_SESSION['onlytotamt']);
			   unset($_SESSION['pack_c']);
			   unset($_SESSION['deli_c']);
			   unset($_SESSION['gst']);
			   unset($_SESSION['deli_address_id']);
		   }
		   
        }


    }
	
	
	
	
	
	if((isset($_POST['category_request']))=='category_request'){ 
    	$req_name=$_POST['req_name']; 
    	$req_email=$_POST['req_email'];
    	$req_phone=$_POST['req_phone'];
		$req_cat=$_POST['req_cat'];
           $inreq = $conn->prepare("INSERT INTO category_request(name,email,phone,category_id) VALUES (?,?,?,?)");
           $inreq->execute([$req_name,$req_email,$req_phone,$req_cat]);
           echo $inreq->rowCount();
    }
	
	
	
	
	
	if((isset($_POST['insert_deli_add']))=='insert_deli_add'){ 
    	$de_name=$_POST['de_name']; 
    	$de_address=$_POST['de_address'];
    	$de_state=$_POST['de_state'];
		$de_city=$_POST['de_city'];
		$de_pincode=$_POST['de_pincode'];
		$de_id=$_POST['de_id'];
		if($de_id==$_SESSION['weboonuid']){
		   $check_deli=$conn->prepare("SELECT COUNT(*) FROM address_master WHERE user_id =? AND name=? AND address=? AND pincode =? AND city=? AND state=?");
           $check_deli->execute([$de_id,$de_name,$de_address,$de_pincode,$de_city,$de_state]);
           $check_deli_count = $check_deli->fetchColumn();
           if ($check_deli_count == 0){  
            $indeli = $conn->prepare("INSERT INTO address_master(user_id,name,address,pincode,city,state) VALUES (?,?,?,?,?,?)");
            $indeli->execute([$de_id,$de_name,$de_address,$de_pincode,$de_city,$de_state]);
            echo $indeli->rowCount();
		  }
		}
    }
	
	
	if((isset($_POST['retrieve']))=='retrieve'){
		$edita=$_POST['edita'];
		$ret_deli=$conn->prepare("SELECT * FROM address_master WHERE id =? AND status=?");
        $ret_deli->execute([$edita]);
        $ret_deli_det = $ret_deli->fetch();
		echo json_encode($ret_deli_det);
		}
	
	if((isset($_POST['deli_address_ses']))=='deli_address_ses'){
		$deli_address_id=$_POST['deli_address_id'];
		$_SESSION['deli_address_id'] =$_POST['deli_address_id'];
	if(isset($_SESSION['deli_address_id']))
		echo 1;
	else
		echo 0;
	}
	
	
	
	

 ?>