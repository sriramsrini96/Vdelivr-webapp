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
            <li><a href="users.php"><i class="fa fa-arrow-left"></i>  Back To Users</a></li>            
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row">          
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">EDIT USER</center></b></div>
            <form role="form">              
              <div class="form-group">
                <label class="lab">User ID</label>
                <input type="text" class="form-control"  id="euid" readonly>
              </div>
              <div class="form-group">
                <label class="lab">User Name</label>
                <input type="text" class="form-control"  id="euname">
              </div>
              <div class="form-group">                
                <label class="lab">Sex</label><br> 
                <label class="radio-inline">
                <input type="radio" name="eusex" id="eusexm" value="male"> male
                </label>
                <label class="radio-inline">
                <input type="radio" name="eusex" id="eusexf" value="female"> female
                </label>
              </div>
              <div class="form-group">
                <label class="lab">DOB</label>
                <input type="date" class="form-control"  id="eudob">
              </div>
              <div class="form-group">
                <label class="lab">Mobile Number</label>
                <input type="number" class="form-control"  id="eumob"  min="1">
                <div id="euerren" class="err"></div>
              </div>
              <div class="form-group">
                <label class="lab">Date Registered</label>
                <input type="text" class="form-control"  id="eudate" readonly>
              </div>
              <div class="form-group">
                <label class="lab">Email_ID</label>
                <input type="text" class="form-control"  id="euemail">
                <div id="euerrem" class="err"></div>
              </div>
              <div class="form-group">
                <label class="lab">Address</label>
                <textarea type="text" class="form-control"  id="euadd"></textarea>
              </div>
			  <div class="form-group">
                <label class="lab">State</label>
                <!--<input type="text" class="form-control"  id="eustate">-->
				<select class="form-control" id="eustate">
                           <option value = "">---Select State---</option>
                           <?php
                              include "config.php";
                              $opts =$conn->prepare("SELECT  id,state FROM statemaster WHERE status=1");
                              $opts->execute();
                              while ( $ds=$opts->fetch()) {
                              echo "<option id='".$ds['id']."' value='".$ds['state']."'>".$ds['state']."</option>";
                              }
                              ?>
                </select>
              </div>
              <div class="form-group">
                <label class="lab">City</label>
                <!--<input type="text" class="form-control"  id="eucity">-->
				<select class="form-control" id="eucity">
                           <option value = "">---Select City---</option>
                           <?php
                              include "config.php";
                              $optc =$conn->prepare("SELECT  id,state_id,city FROM citymaster WHERE status=1");
                              $optc->execute();
                              while ( $dc=$optc->fetch()) {
                              echo "<option id='".$dc['id']."' value='".$dc['city']."' data-group='".$dc['state_id']."'>".$dc['city']."</option>";
                              }
                              ?>
                </select>
              </div>
              <div class="form-group">
                <label class="lab">Pincode</label>
                <!--<input type="number" class="form-control"  id="eupin"  min="1">-->
				<select class="form-control" id="eupin">
                           <option value = "">---Select Pincode---</option>
                           <?php
                              include "config.php";
                              $optp =$conn->prepare("SELECT  id,city_id,pincode FROM pincodemaster WHERE status=1");
                              $optp->execute();
                              while ( $dp=$optp->fetch()) {
                              echo "<option id='".$dp['id']."' value='".$dp['pincode']."' data-group='".$dp['city_id']."'>".$dp['pincode']."</option>";
                              }
                              ?>
                </select>
                <!--<div id="euerrep" class="err"></div>-->
              </div>
            <div id="euerr" class="err"></div>
            <center><button type="button" class="btn btn-success" id="updateuser">Update</button></center>
              
              
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
     var euserid=<?php echo $_POST['euserid']?>;
    //alert(euserid)
$.ajax({  
                url:"usersaction.php",  
                method:"POST",  
                data:{veuserid :euserid },
                 dataType:"json",   
                success:function(data){                            
                    $('#euid').val(data.id); 
                    $('#euname').val(data.name); 
                    //$('#eusex').val(data.sex);
                    $("input:radio[name='eusex'][value="+data.sex+"]").prop("checked",true); 
                    $('#eudob').val(data.dob);
                    $('#eumob').val(data.mobile_no); 
                    $('#eudate').val(data.date_registered); 
                    $('#euemail').val(data.email_id); 
                    $('#euadd').val(data.address); 
                    //$('#eucity').val(data.city); 
                    //$('#eupin').val(data.pincode); 
                    //$('#eustate').val(data.state); 
                    $('#eucity option[id='+data.city+']').prop("selected",true); 
                    $('#eupin option[id='+data.pincode+']').prop("selected",true); 
                    $('#eustate option[id='+data.state+']').prop("selected",true);   		
                     }  
           }); 
$(document).on('click', '#updateuser', function(){
    var euname="",euemail="",eumob="",eudob="",eupass="",eusex="",euadd="",eustate="",eucity="",eupin="",euid="";
	euid=$("#euid").val();
    euname=$("#euname").val();
    euemail=$("#euemail").val();
    eumob=$("#eumob").val();
    eudob=$("#eudob").val();
    //eupass=$("#eupass").val();&&(eupass.replace(/\s/g, '').length)
    eusex=$("input[name='eusex']:checked").val();
    euadd=$("#euadd").val();
    eustate=$("#eustate option:selected").attr("id");
    eucity=$("#eucity option:selected").attr("id");
    eupin=$("#eupin option:selected").attr("id");
   if((euname.replace(/\s/g, '').length)&&(euemail.replace(/\s/g, '').length)&&(eumob.replace(/\s/g, '').length)&&(eudob.replace(/\s/g, '').length)&&(eusex!="")&&(euadd.replace(/\s/g, '').length)&&((eustate!="")&&(eustate!=0)&&(typeof eustate!== "undefined"))&&((eucity!="")&&(eucity!=0)&&(typeof eucity!== "undefined"))&&((eupin!="")&&(eupin!=0)&&(typeof eupin!== "undefined"))){
     //alert(euname+euemail+eumob+eudob+eupass+eusex+euadd+eustate+eucity+eupin);
     $.ajax({
                type:'POST',
                url:'usersaction.php',
                data:{com:"com",update:"update",auname:euname,ausex:eusex,audob:eudob,aumob:eumob,auemail:euemail,auadd:euadd,aucity:eucity,aupin:eupin,austate:eustate,euid:euid},
                success:function(data){
          //alert(data);
          if(data==1){
			          $("#euid").val("");
                      $("#euname").val("");
                      $("#euemail").val("");
                      $("#eumob").val("");
                      $("#eudob").val("");
                      $("#eupass").val("");                     
                      $("#euadd").val("");
                      $("#eustate option:selected").prop("selected", false)
                      $("#eucity option:selected").prop("selected", false)
                      $("#eupin option:selected").prop("selected", false)
                     $.redirect("users.php","_self");
          }
                    else{
            $("#euerr").html("This user Already Exists").show().fadeOut(3000);
          }
                }
            }); 
     
   }
   else{
     //alert("Enter all the values");
     $("#euerr").html("Enter all the values").show().fadeOut(3000);
   }
   	

 });


 $('#euemail').on('blur', function() {
        var mail=$("#euemail").val();
        if(mail == '' || mail.indexOf('@') == -1 || mail.indexOf('.') == -1) {
           //alert("Invalid email address");
           $("#euerrem").html("Invalid email address").show().fadeOut(3000);
           $("#euemail").val("");
     }
        
    });
 $(document).on('keyup', '#eumob',function (e) {            
            if(((($("#eumob").val()).length)>10)&&(e.keyCode != 9)){
             //alert("The length of mobile number to be 10");
           $("#euerren").html("The length of mobile number to be 10").show().fadeOut(3000);
                   $(this).val('');
                 }
        });  
 $(document).on('blur', '#eumob',function (e) { 
     var mob=$("#eumob").val();
        var mob=$("#eumob").val();
        if(mob.length<10 ) {
           //alert("Invalid mobile number");
           $("#euerren").html("Invalid mobile number").show().fadeOut(3000);
           $("#eumob").val("");
     }
});



 $(document).on('change','#eustate',function(){ 
       var valstate= $("#eustate option:selected").attr("id");        
        var subcity = $('#eucity');
        $('option', subcity).filter(function(){
            if ($(this).attr('data-group') === valstate) {
                $(this).show(); 
            } else {
                $(this).hide();
                $('#eucity').val("");
                $("#eucity option:selected").prop("selected", false)
            }
        });
    });

$('#eucity').on('change', function(){       
       var valcity= $("#eucity option:selected").attr("id");        
        var subpin = $('#eupin');
        $('option', subpin).filter(function(){
            if ($(this).attr('data-group') === valcity) {
                $(this).show();
            } else {
                $(this).hide();
                $('#eupin').val("");
                $("#eupin option:selected").prop("selected", false)
            }
        });
    });







/*$(document).on('keyup', '#eupin',function (e) { 
     var mob=$("#eupin").val();
        var mob=$("#eupin").val();
        if(mob.length>6 ) {
           //alert("Invalid mobile number");
           $("#euerrep").html("Invalid Pincode").show().fadeOut(3000);
           $("#eupin").val("");
     }
});
 

 $(document).on('blur', '#eupin',function (e) { 
     var mob=$("#eupin").val();
        var mob=$("#eupin").val();
        if(mob.length<6 ) {
           //alert("Invalid mobile number");
           $("#euerrep").html("Invalid Pincode").show().fadeOut(3000);
           $("#eupin").val("");
     }
});*/


}); 

</script>
  </body>
</html>