<?php
    include "config.php";
    if(isset($_POST['register'])){ 
    	$name=$_POST['name']; 
    	$sex=$_POST['sex']; 
    	$dob=$_POST['dob']; 
    	$mobile=$_POST['mobile']; 
    	$psw=md5($_POST['psw']);
    	$email=$_POST['email']; 
    	$address=$_POST['address']; 
    	$city=$_POST['city']; 
    	$pin=$_POST['pin']; 
    	$state=$_POST['state']; 
    	$query=$conn->prepare("SELECT COUNT(*) FROM user WHERE mobile_no =? OR email_id=?");
        $query->execute([$mobile,$email]);
        $count = $query->fetchColumn();
        if ($count == 0){  
           $in = $conn->prepare("INSERT INTO user (name,sex,dob,mobile_no,password,email_id,address,city,pincode,state) VALUES (?,?,?,?,?,?,?,?,?,?)");
           $in->execute([$name,$sex,$dob,$mobile,$psw,$email,$address,$city,$pin,$state]);
           echo $in->rowCount();
        }  


    }

if(isset($_POST['login'])){
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);
	$logc=$conn->prepare("SELECT COUNT(*) FROM user WHERE (mobile_no =? OR email_id=?) AND password=?");
    $logc->execute([$user,$user,$pass]);
    $check = $logc->fetchColumn();
    if ($check == 1){ 
    	echo "Valid User";
        }

} 

 ?>