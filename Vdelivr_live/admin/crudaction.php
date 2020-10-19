<?php
    include "config.php";
    //include "adminlog.php";
    if(isset($_POST['com'])){
      $catname=$_POST['catname']; 
      $catdesc=$_POST['catdesc']; 
      $catimagname=$_POST['catimagname']; 
      $catimagname2=$_POST['catimagname2']; 
      //$status=1;
      
      if(isset($_POST['insert'])){       
      $query=$conn->prepare("SELECT COUNT(*) FROM categories WHERE name =?");
      $query->execute([$catname]);
      $count = $query->fetchColumn();
      if ($count == 0)
      {  
       $in = $conn->prepare("INSERT INTO categories (name,description,image,image2)
    VALUES (?,?,?,?)");
       $in->execute([$catname,$catdesc,$catimagname,$catimagname2]);

       if(($in->rowCount())==1){
            $sourcePath = $_FILES['catimage']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/catimg/".$_FILES['catimage']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

            $sourcePath = $_FILES['catimage2']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/catimg/".$_FILES['catimage2']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }



       echo $in->rowCount();
      }     


    }
    if(isset($_POST['ecatid'])){
     $ecatid=$_POST['ecatid'];
      $check=$conn->prepare("SELECT COUNT(*) FROM categories WHERE name=? AND  NOT id=?");
      $check->execute([$catname,$ecatid]);
      $countc =$check->fetchColumn();
      if ($countc ==0){
        if($catimagname==""){
          $up =$conn->prepare("UPDATE categories SET name=?,description=? WHERE id=?"); 
          $up->execute([$catname,$catdesc,$ecatid]);
          echo $up->rowCount(); 
        }
        else{
          $upi =$conn->prepare("UPDATE categories SET name=?,description=?,image=?,image2=? WHERE id=?"); 
          $upi->execute([$catname,$catdesc,$catimagname,$catimagname2,$ecatid]);
          echo $upi->rowCount(); 
          if(($upi->rowCount())==1){
            if($_POST['imgcheck']!==""){
            $sourcePath = $_FILES['ecatimag']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/catimg/".$_FILES['ecatimag']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }
          if($_POST['imgcheck2']!==""){
            $sourcePath = $_FILES['ecatimag2']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/catimg/".$_FILES['ecatimag2']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }
          }

        }
      }
      else
        echo "Already Exists";
}

  
}

if(isset($_POST['catid'])){

    $catid=$_POST['catid'];
 $v=$conn->prepare("SELECT * FROM categories WHERE id=?");
      $v->execute([$catid]);
     $vd= $v->fetch();
     //print_r($vd);
     echo json_encode($vd);  
 }

if(isset($_POST['dcatid'])){
    $dcatid=$_POST['dcatid'];
    $status=0;
    $upd =$conn->prepare("UPDATE categories SET status=? WHERE id=?"); 
          $upd->execute([$status,$dcatid]);

    if(($upd->rowCount())==1){
    $upds =$conn->prepare("UPDATE sub_categories SET status=? WHERE category_id=?"); 
          $upds->execute([$status,$dcatid]);


    $updp =$conn->prepare("UPDATE products SET status=? WHERE category_id=?"); 
          $updp->execute([$status,$dcatid]);


          echo $upd->rowCount(); 
        }

    }

    ?>