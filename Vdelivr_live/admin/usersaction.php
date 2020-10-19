<?php
    include "config.php";



    if(isset($_POST['com'])){ 
      $auname=$_POST['auname']; 
      $ausex=$_POST['ausex']; 
      $audob=$_POST['audob']; 
      $aumob=$_POST['aumob']; 
      //$aupass=md5($_POST['aupass']);
      $auemail=$_POST['auemail']; 
      $auadd=$_POST['auadd']; 
      $aucity=$_POST['aucity']; 
      $aupin=$_POST['aupin']; 
      $austate=$_POST['austate'];

       if(isset($_POST['insert'])){
		$aupass=md5($_POST['aupass']);
        $date=date("Y-m-d"); 
        $query=$conn->prepare("SELECT COUNT(*) FROM user WHERE mobile_no =? OR email_id=?");
        $query->execute([$aumob,$auemail]);
        $count = $query->fetchColumn();
        if ($count == 0){  
           $in = $conn->prepare("INSERT INTO user (name,sex,dob,mobile_no,password,date_registered,email_id,address,city,pincode,state) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
           $in->execute([$auname,$ausex,$audob,$aumob,$aupass,$date,$auemail,$auadd,$aucity,$aupin,$austate]);
           //echo $in->rowCount();
		   
		   
		   $last_user_id = $conn->lastInsertId();
		   
		   
		   
		   if((($in->rowCount())==1)&&($last_user_id!='')){
			   $in_add = $conn->prepare("INSERT INTO address_master (user_id,name,address,pincode,city,state) VALUES (?,?,?,?,?,?)");
           $in_add->execute([$last_user_id,"home",$auadd,$aupin,$aucity,$austate]);
           //echo $in_add->rowCount();
		   
		   $last_addr_id = $conn->lastInsertId();
		   
		   
		   
		   if((($in_add->rowCount())==1)&&($last_addr_id!='')){
			   $up_user_add = $conn->prepare("UPDATE user SET address_id=? WHERE id=?");
           $up_user_add ->execute([$last_addr_id,$last_user_id]);
           echo $up_user_add ->rowCount();
			   
		   }
			   
		   }
		   
		   
		   
		   
		   
		   
        }  


    }
	
	
	 if(isset($_POST['update'])){
		 if(isset($_POST['euid'])){
			$euid=$_POST['euid']; 
			$up_query=$conn->prepare("SELECT COUNT(*) FROM user WHERE (mobile_no =? OR email_id=?) AND  NOT id=?");
            $up_query->execute([$aumob,$auemail,$euid]);
            $up_count = $up_query->fetchColumn();
           if ($up_count == 0){  
           $up_user = $conn->prepare("UPDATE user SET name=?,sex=?,dob=?,mobile_no=?,email_id=?,address=?,city=?,pincode=?,state=? WHERE id=?");
           $up_user->execute([$auname,$ausex,$audob,$aumob,$auemail,$auadd,$aucity,$aupin,$austate,$euid]);
          echo $up_user->rowCount();
		   if(($up_user->rowCount())==1)
		     {
				$addr_id=$conn->prepare("SELECT address_id FROM user WHERE status=1 AND id=?");
                $addr_id->execute([$euid]);
                $addr_id_d= $addr_id->fetch();
				$user_addr_id=$addr_id_d['address_id'];
				
				$update_adm = $conn->prepare("UPDATE address_master SET address=?,pincode=?,city=?,state=? WHERE id=? AND user_id=?");
                $update_adm->execute([$auadd,$aupin,$aucity,$austate,$user_addr_id,$euid]);
                //echo $update_adm->rowCount();
				
	         }
         }
		 
	 }
	 }
	
}



if(isset($_POST['veuserid'])){

    $veuserid=$_POST['veuserid'];
     
 $v=$conn->prepare("SELECT * FROM user WHERE id=? AND status=1");
      $v->execute([$veuserid]);
     $vd= $v->fetch();
      echo json_encode($vd);  
 }



    if(isset($_POST['duserid'])){
    $duserid=$_POST['duserid'];
    $status=0;
    $upd =$conn->prepare("UPDATE user SET status=? WHERE id=?"); 
          $upd->execute([$status,$duserid]);
          echo $upd->rowCount(); 

    }
 ?>