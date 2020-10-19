<?php
    include "config.php";
    if(isset($_POST['com'])){
      $statename=$_POST['statename']; 

      if(isset($_POST['insert'])){       
      $query=$conn->prepare("SELECT COUNT(*) FROM statemaster WHERE state =?");
      $query->execute([$statename]);
      $count = $query->fetchColumn();
      if ($count == 0)
      {  
       $in = $conn->prepare("INSERT INTO statemaster (state) VALUES (?)");
       $in->execute([$statename]);
       echo $in->rowCount();
      }     


    }


    if(isset($_POST['ustateid'])){
      $ustateid=$_POST['ustateid'];
      $check=$conn->prepare("SELECT COUNT(*) FROM statemaster WHERE state=? AND  NOT id=?");
      $check->execute([$statename,$ustateid]);
      $countc =$check->fetchColumn();
      if ($countc ==0){
          $up =$conn->prepare("UPDATE statemaster SET state=? WHERE id=?"); 
          $up->execute([$statename,$ustateid]);
          echo $up->rowCount(); 
      }
      else
        echo "Already Exists";
}
    
  
}

if(isset($_POST['estateid'])){

    $estateid=$_POST['estateid'];
     
     $v=$conn->prepare("SELECT * FROM statemaster WHERE id=? AND status=1");
      $v->execute([$estateid]);
      $vd= $v->fetch();
      echo json_encode($vd);  
 }

 if(isset($_POST['dstate'])){
    $dstate=$_POST['dstate'];
    $status=0;
    $upd =$conn->prepare("UPDATE statemaster SET status=? WHERE id=?"); 
          $upd->execute([$status,$dstate]);
          echo $upd->rowCount(); 
if(($upd->rowCount())==1){
  $updc =$conn->prepare("UPDATE citymaster SET status=? WHERE state_id=?"); 
   $updc->execute([$status,$dstate]);

    $updp =$conn->prepare("UPDATE pincodemaster SET status=? WHERE state_id=?"); 
    $updp->execute([$status,$dstate]);
}

    }

    ?>