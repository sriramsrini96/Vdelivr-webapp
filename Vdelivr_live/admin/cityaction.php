<?php
    include "config.php";
    if(isset($_POST['com'])){
      $cityname=$_POST['cityname']; 
      

      if(isset($_POST['insert'])){ 
      $state=$_POST['state'];       
     // $query=$conn->prepare("SELECT COUNT(*) FROM citymaster WHERE city =? AND state_id=?");
     // $query->execute([$cityname,$state]);
      $query=$conn->prepare("SELECT COUNT(*) FROM citymaster WHERE city =?");
      $query->execute([$cityname]);
      $count = $query->fetchColumn();
      if ($count == 0)
      {  
       $in = $conn->prepare("INSERT INTO citymaster (city,state_id) VALUES (?,?)");
       $in->execute([$cityname,$state]);
       echo $in->rowCount();
      }     


    }


    if(isset($_POST['ucityid'])){
      $ucityid=$_POST['ucityid'];
      $check=$conn->prepare("SELECT COUNT(*) FROM citymaster WHERE city=? AND  NOT id=?");
      $check->execute([$cityname,$ucityid]);
      $countc =$check->fetchColumn();
      if ($countc ==0){
          $up =$conn->prepare("UPDATE citymaster SET city=? WHERE id=?"); 
          $up->execute([$cityname,$ucityid]);
          echo $up->rowCount(); 
      }
      else
        echo "Already Exists";
}
    
  
}

if(isset($_POST['ecityid'])){

    $ecityid=$_POST['ecityid'];
     
     $v=$conn->prepare("SELECT * FROM citymaster WHERE id=? AND status=1");
      $v->execute([$ecityid]);
      $vd= $v->fetch();
      echo json_encode($vd);  
 }


 if(isset($_POST['dcyid'])){
    $dcyid=$_POST['dcyid'];
    $status=0;
    $upd =$conn->prepare("UPDATE citymaster SET status=? WHERE id=?"); 
          $upd->execute([$status,$dcyid]);
          echo $upd->rowCount(); 

      if(($upd->rowCount())==1){
        $updp =$conn->prepare("UPDATE pincodemaster SET status=? WHERE city_id=?"); 
        $updp->execute([$status,$dcyid]);
      }

    }

    ?>