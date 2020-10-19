<?php
    include "config.php";
    if(isset($_POST['com'])){
      $pincode=$_POST['pincode']; 
      

      if(isset($_POST['insert'])){ 
      $pstate=$_POST['pstate'];
      $pcity=$_POST['pcity'];          
      //$query=$conn->prepare("SELECT COUNT(*) FROM pincodemaster WHERE pincode=? AND state_id=?AND city_id =? ");
      //$query->execute([$pincode,$pstate,$pcity]);
      $query=$conn->prepare("SELECT COUNT(*) FROM pincodemaster WHERE pincode=?");
      $query->execute([$pincode]);
      $count = $query->fetchColumn();
      if ($count == 0)
      {  
       $in = $conn->prepare("INSERT INTO pincodemaster (pincode,state_id,city_id) VALUES (?,?,?)");
       $in->execute([$pincode,$pstate,$pcity]);
       echo $in->rowCount();
      }     


    }


    if(isset($_POST['upinid'])){
      $upinid=$_POST['upinid'];
      $check=$conn->prepare("SELECT COUNT(*) FROM pincodemaster WHERE pincode=? AND  NOT id=?");
      $check->execute([$pincode,$upinid]);
      $countc =$check->fetchColumn();
      if ($countc ==0){
          $up =$conn->prepare("UPDATE pincodemaster SET pincode=? WHERE id=?"); 
          $up->execute([$pincode,$upinid]);
          echo $up->rowCount(); 
      }
      else
        echo "Already Exists";
}
    
  
}

if(isset($_POST['epinid'])){

    $epinid=$_POST['epinid'];
     
     $v=$conn->prepare("SELECT * FROM pincodemaster WHERE id=? AND status=1");
      $v->execute([$epinid]);
      $vd= $v->fetch();
      echo json_encode($vd);  
 }


 if(isset($_POST['dpinid'])){
    $dpinid=$_POST['dpinid'];
    $status=0;
    $upd =$conn->prepare("UPDATE pincodemaster SET status=? WHERE id=?"); 
          $upd->execute([$status,$dpinid]);
          echo $upd->rowCount(); 

    }

    ?>