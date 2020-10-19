<?php
session_start();
if(isset($_SESSION['oonaid'])&&($_SESSION['oonaname'])&&($_SESSION['oonauserid'])&&($_SESSION['oonapass'])){  
header( 'Content-Type: text/html; charset=utf-8' ); 
}
else 
header("Location:index.php");
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>User</h1>
            <ol class="breadcrumb">
            <li><a href="users.php"><i class="fa fa-arrow-left"></i> Back To Users</a></li>            
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row">          
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">VIEW USER</center></b></div>
            <form role="form">              
              <div class="form-group">
                <label class="lab">User ID</label>
                <input type="text" class="form-control"  id="vuid" readonly>
              </div>
              <div class="form-group">
                <label class="lab">User Name</label>
                <input type="text" class="form-control"  id="vuname" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Sex</label>
                <input type="text" class="form-control"  id="vusex" readonly>
              </div>
              <div class="form-group">
                <label class="lab">DOB</label>
                <input type="text" class="form-control"  id="vudob" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Mobile Number</label>
                <input type="text" class="form-control"  id="vumob" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Date Registered</label>
                <input type="text" class="form-control"  id="vudate" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Email_ID</label>
                <input type="text" class="form-control"  id="vuemail" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Address</label>
                <textarea type="text" class="form-control"  id="vuadd" readonly></textarea>
              </div>
			  <div class="form-group">
                <label class="lab">State</label>
                <!--<input type="text" class="form-control"  id="vustate" readonly>-->
				 <select class="form-control" id="vustate" disabled>
                           <option value = "">---Select State---</option>
                           <?php
                              include "config.php";
                              $opts =$conn->prepare("SELECT  id,state FROM statemaster WHERE status=1");
                              $opts->execute();
                              //$option = $opt->setFetchMode(PDO::FETCH_ASSOC); 
                              
                              while ( $ds=$opts->fetch()) {
                              echo "<option id='".$ds['id']."' value='".$ds['state']."'>".$ds['state']."</option>";
                              }
                              ?>
                        </select>
              </div>
              <div class="form-group">
                <label class="lab">City</label>
                <!--<input type="text" class="form-control"  id="vucity" readonly>-->
				                <select class="form-control" id="vucity" disabled>
                           <option value = "">---Select City---</option>
                           <?php
                              include "config.php";
                              $optc =$conn->prepare("SELECT  id,state_id,city FROM citymaster WHERE status=1");
                              $optc->execute();
                              //$option = $opt->setFetchMode(PDO::FETCH_ASSOC); 
                              
                              while ( $dc=$optc->fetch()) {
                              echo "<option id='".$dc['id']."' value='".$dc['city']."' data-group='".$dc['state_id']."'>".$dc['city']."</option>";
                              }
                              ?>
                        </select>
              </div>
              <div class="form-group">
                <label class="lab">Pincode</label>
                <!--<input type="text" class="form-control"  id="vupin" readonly>-->
				<select class="form-control" id="vupin" disabled>
                           <option value = "">---Select Pincode---</option>
                           <?php
                              include "config.php";
                              $optp =$conn->prepare("SELECT  id,city_id,pincode FROM pincodemaster WHERE status=1");
                              $optp->execute();
                              //$option = $opt->setFetchMode(PDO::FETCH_ASSOC); 
                              
                              while ( $dp=$optp->fetch()) {
                              echo "<option id='".$dp['id']."' value='".$dp['pincode']."' data-group='".$dp['city_id']."'>".$dp['pincode']."</option>";
                              }
                              ?>
                        </select>
              </div>
              

              
              
            </form>
          </div>
          <div class="col-lg-3"></div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->



    <?php include"footer.php" ?>
   

<script type="text/javascript">
     $(document).ready(function(){ 
    // alert("view")
     $("#liuser").addClass("active");
     var vuserid=<?php echo $_POST['vuserid']?>;
     //var gender;
    //alert(vuserid)
$.ajax({  
                url:"usersaction.php",  
                method:"POST",  
                data:{veuserid :vuserid },
                 dataType:"json",   
                success:function(data){                            
                    $('#vuid').val(data.id); 
                    $('#vuname').val(data.name);
                   /* if(data.sex==1)
                      gender="male";
                    else 
                     if(data.sex==2)
                      gender="female";*/
                    $('#vusex').val(data.sex); 
                    $('#vudob').val(data.dob);
                    $('#vumob').val(data.mobile_no); 
                    $('#vudate').val(data.date_registered); 
                    $('#vuemail').val(data.email_id); 
                    $('#vuadd').val(data.address); 
                    //$('#vucity').val(data.city); 
                    //$('#vupin').val(data.pincode); 
                    //$('#vustate').val(data.state);   
					$('#vucity option[id='+data.city+']').prop("selected",true); 
					$('#vupin option[id='+data.pincode+']').prop("selected",true); 
					$('#vustate option[id='+data.state+']').prop("selected",true);   
                     }  
           }); 

}); 

</script>
  </body>
</html>