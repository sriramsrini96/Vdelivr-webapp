<?php
    include "config.php";
    //include "adminlog.php";
    if((isset($_POST['subcategory']))=="subcategory"){
    if(isset($_POST['com'])){
      //$cate=$_POST['cate']; 
      $subcatname=$_POST['subcatname']; 
      $subcatdesc=$_POST['subcatdesc']; 
      $subcatimagname=$_POST['subcatimagname']; 
      
      
      if(isset($_POST['insert'])){
      $cate=$_POST['cate'];       
      $query=$conn->prepare("SELECT COUNT(*) FROM sub_categories WHERE name =?");
      $query->execute([$subcatname]);
      $count = $query->fetchColumn();
      if ($count == 0)
      {  
       $in = $conn->prepare("INSERT INTO sub_categories (category_id,name,description,image)
    VALUES (?,?,?,?)");
       $in->execute([$cate,$subcatname,$subcatdesc,$subcatimagname]);

       if(($in->rowCount())==1){
            $sourcePath = $_FILES['subcatimage']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/subcatimg/".$_FILES['subcatimage']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }



       echo $in->rowCount();
      } 
    }

    if(isset($_POST['upsubcatid'])){
      $upsubcatid=$_POST['upsubcatid'];
      $checkusu=$conn->prepare("SELECT COUNT(*) FROM sub_categories WHERE name=? AND  NOT id=?");
      $checkusu->execute([$subcatname,$upsubcatid]);
      $countusu =$checkusu->fetchColumn();
      if ($countusu ==0){        
          $upsu =$conn->prepare("UPDATE sub_categories SET name=?,description=?,image=? WHERE id=?"); 
          $upsu->execute([$subcatname,$subcatdesc,$subcatimagname,$upsubcatid]);
          if((($upsu->rowCount())==1)&&($_POST['upsubcatimagech']!=="")){
            $sourcePath = $_FILES['upsubcatimage']['tmp_name']; 
            $targetPath = "upload/subcatimg/".$_FILES['upsubcatimage']['name']; 
            move_uploaded_file($sourcePath,$targetPath) ;
          }
          echo $upsu->rowCount(); 
        }

    }

}
if(isset($_POST['vesubcatid'])){

    $vesubcatid=$_POST['vesubcatid'];
     
 //$subv=$conn->prepare("SELECT * FROM categories WHERE id=? AND status=1");
 //SELECT sub_categories.id,sub_categories.name,sub_categories.description,categories.name AS category FROM sub_categories INNER JOIN  categories ON sub_categories.category_id=categories.id WHERE sub_categories.status=1
  $subv=$conn->prepare("SELECT sub_categories.id,sub_categories.name,sub_categories.description,sub_categories.image,categories.name AS category FROM sub_categories INNER JOIN  categories ON sub_categories.category_id=categories.id WHERE sub_categories.status=1 AND sub_categories.id=?");      

      $subv->execute([$vesubcatid]);
     $subvd= $subv->fetch();
      echo json_encode($subvd);  
 }

 if(isset($_POST['dsubcateid'])){
    $dsubcateid=$_POST['dsubcateid'];
    $status=0;
    $updsubc =$conn->prepare("UPDATE sub_categories SET status=? WHERE id=?"); 
          $updsubc->execute([$status,$dsubcateid]);

     if(($updsubc->rowCount())==1){
    $updpt =$conn->prepare("UPDATE products SET status=? WHERE sub_category_id=?"); 
          $updpt->execute([$status,$dsubcateid]);

          echo $updsubc->rowCount(); 
}
    }

}


if((isset($_POST['product']))=="product"){
    if(isset($_POST['com'])){
      //$catep=$_POST['catep'];
      //$subcate=$_POST['subcate']; 
      $proname=$_POST['proname']; 
      $prodesc=$_POST['prodesc'];

      $proquan=$_POST['proquan'];
      $prounit=$_POST['prounit'];
      $proactu=$_POST['proactu'];
      $prodis=$_POST['prodis'];
      $provalu=$_POST['provalu'];
      $prodisp=$_POST['prodisp'];
	  
	  
	  $propack=$_POST['propack'];
	  $progst=$_POST['progst'];
	  $prodeli=$_POST['prodeli'];
	  

      $proimagname=$_POST['proimagname']; 
      
      
      if(isset($_POST['insert'])){ 
      $catep=$_POST['catep'];
      $subcate=$_POST['subcate'];       
      $queryp=$conn->prepare("SELECT COUNT(*) FROM products WHERE name =?");
      $queryp->execute([$proname]);
      $countp = $queryp->fetchColumn();
      if ($countp == 0)
      {  
       /*$inp = $conn->prepare("INSERT INTO products (category_id,sub_category_id,name,description,images)
    VALUES (?,?,?,?,?)");
       $inp->execute([$catep,$subcate,$proname,$prodesc,$proimagname]);
	   $inp = $conn->prepare("INSERT INTO products (category_id,sub_category_id,name,description,quantity_number,units,actual_price,discount_type,discount_value,display_price,images)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)");
       $inp->execute([$catep,$subcate,$proname,$prodesc,$proquan,$prounit,$proactu,$prodis,$provalu,$prodisp,$proimagname]);*/


       $inp = $conn->prepare("INSERT INTO products (category_id,sub_category_id,name,description,quantity_number,units,actual_price,discount_type,discount_value,display_price,packing_charge,gst,delivery_charge,images)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       $inp->execute([$catep,$subcate,$proname,$prodesc,$proquan,$prounit,$proactu,$prodis,$provalu,$prodisp,$propack,$progst,$prodeli,$proimagname]);

       if(($inp->rowCount())==1){
            $sourcePathp = $_FILES['proimage']['tmp_name']; // Storing source path of the file in a variable
            $targetPathp = "upload/proimg/".$_FILES['proimage']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePathp,$targetPathp) ; // Moving Uploaded file
          }



       echo $inp->rowCount();
      } 
    }


    if(isset($_POST['editproid'])){
      $editproid=$_POST['editproid'];
      $checkupr=$conn->prepare("SELECT COUNT(*) FROM products WHERE name=? AND  NOT id=?");
      $checkupr->execute([$proname,$editproid]);
      $countupr =$checkupr->fetchColumn();
      if ($countupr ==0){        
          $uppr =$conn->prepare("UPDATE products SET name=?,description=?,quantity_number=?,units=?,actual_price=?,discount_type=?,discount_value=?,display_price=?,packing_charge=?,gst=?,delivery_charge=?,images=? WHERE id=?"); 
          $uppr->execute([$proname,$prodesc,$proquan,$prounit,$proactu,$prodis,$provalu,$prodisp,$propack,$progst,$prodeli,$proimagname,$editproid]);
          if((($uppr->rowCount())==1)&&($_POST['proimagch']!=="")){
            $sourcePath = $_FILES['upproimage']['tmp_name']; 
            $targetPath = "upload/proimg/".$_FILES['upproimage']['name']; 
            move_uploaded_file($sourcePath,$targetPath) ;
          }
          echo $uppr->rowCount(); 
        }

    }






}
if(isset($_POST['delproid'])){
  $delproid=$_POST['delproid'];
  $status=0;
  $updprod =$conn->prepare("UPDATE products SET status=? WHERE id=?"); 
  $updprod->execute([$status,$delproid]);
  echo $updprod->rowCount(); 

}


if(isset($_POST['veproid'])){

    $veproid=$_POST['veproid'];
    $prov=$conn->prepare("SELECT products.id,products.name,products.description,products.images,products.quantity_number,products.units,products.actual_price,products.discount_type,products.discount_value,products.display_price,categories.name AS category,sub_categories.name AS subcategory,products.packing_charge,products.gst,products.delivery_charge FROM products INNER JOIN  categories ON products.category_id=categories.id INNER JOIN  sub_categories ON products.sub_category_id=sub_categories.id WHERE products.status=1 AND products.id=?");      

    $prov->execute([$veproid]);
    $provd= $prov->fetch();
    echo json_encode($provd);  
 }




}

 


if((isset($_POST['banner']))=="banner"){
    if(isset($_POST['com'])){
      $banimagname=$_POST['banimagname']; 
      
      
      if(isset($_POST['insert'])){       
      $queryb=$conn->prepare("SELECT COUNT(*) FROM bannermaster WHERE name =?");
      $queryb->execute([$banimagname]);
      $countb = $queryb->fetchColumn();
      if ($countb == 0)
      {  
       $inb = $conn->prepare("INSERT INTO bannermaster (name) VALUES (?)");
       $inb->execute([$banimagname]);

       if(($inb->rowCount())==1){
            $sourcePathb = $_FILES['banimage']['tmp_name']; // Storing source path of the file in a variable
            $targetPathb = "upload/banimg/".$_FILES['banimage']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePathb,$targetPathb) ; // Moving Uploaded file
          }



       echo $inb->rowCount();
      } 
    }
	if(isset($_POST['editbanid'])){ 
	$editbanid=$_POST['editbanid'];
      $checkuprb=$conn->prepare("SELECT COUNT(*) FROM bannermaster WHERE name=? AND  NOT id=?");
      $checkuprb->execute([$banimagname,$editbanid]);
      $countuprb =$checkuprb->fetchColumn();
      if ($countuprb ==0){        
          $upprb =$conn->prepare("UPDATE bannermaster SET name=? WHERE id=?"); 
          $upprb->execute([$banimagname,$editbanid]);
          if((($upprb->rowCount())==1)&&($_POST['banimagch']!=="")){
            $sourcePath = $_FILES['upbanimage']['tmp_name']; 
            $targetPath = "upload/banimg/".$_FILES['upbanimage']['name']; 
            move_uploaded_file($sourcePath,$targetPath) ;
          }
          echo $upprb->rowCount(); 
        }
	}

}

if(isset($_POST['dbanid'])){
  $dbanid=$_POST['dbanid'];
  $status=0;
  $updban =$conn->prepare("UPDATE bannermaster SET status=? WHERE id=?"); 
  $updban->execute([$status,$dbanid]);
  echo $updban->rowCount(); 

}
if(isset($_POST['vebanid'])){
  $vebanid=$_POST['vebanid'];
  $veban =$conn->prepare("SELECT * FROM bannermaster WHERE  id=?"); 
  $veban->execute([$vebanid]);
  $vebandet=$veban->fetch();
  echo json_encode($vebandet); 

}

}



if((isset($_POST['change_order_status']))=="change_order_status"){
	if(isset($_POST['orderid'])){
		$orderid=$_POST['orderid'];
		$selor=$conn->prepare("SELECT b.id,b.user_id,b.product_id,b.quantity,b.amount,b.ordered_through,b.order_status,b.razorpay_payment_id,GROUP_CONCAT(a.name) name FROM orders b INNER JOIN products a ON FIND_IN_SET(a.id, b.product_id)> 0 WHERE (b.status=1 AND b.id=?) GROUP BY b.id ");
        $selor->execute([$orderid]);
        $row_or = $selor->fetch();
		echo json_encode($row_or);
	}
	
	if(isset($_POST['editorstid'])){
		$editorstid=$_POST['editorstid'];
		$edit_order_status=$_POST['edit_order_status'];
		$uporder_st =$conn->prepare("UPDATE orders SET order_status=? WHERE id=?"); 
        $uporder_st->execute([$edit_order_status,$editorstid]);
        echo $uporder_st->rowCount(); 
		
		if(($uporder_st->rowCount())==1){
			$delick =$conn->prepare("SELECT COUNT(*) FROM deliveries WHERE  order_id=?"); 
			$delick->execute([$editorstid]);
			if(($delick->fetchColumn())>0){
				if($edit_order_status==3){
					$up_del=$conn->prepare("UPDATE deliveries SET order_status=?,status=1 WHERE order_id=?"); 
					$up_del->execute([$edit_order_status,$editorstid]);				   	
				}
				else{
					$up_delt=$conn->prepare("UPDATE deliveries SET order_status=?,status=0 WHERE order_id=?"); 
					$up_delt->execute([$edit_order_status,$editorstid]);	
				}
				
			}
			else{
				if($edit_order_status==3){
					$in_del =$conn->prepare("INSERT INTO deliveries (order_id,order_status) VALUES (?,?)"); 
					$in_del->execute([$editorstid,$edit_order_status]);
					
				}
			}
			
		}
		
		
	}
	
}

 


    ?>