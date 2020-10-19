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
            <h1>Add User </h1>
            <ol class="breadcrumb">
            <li><a href="users.php"><i class="fa fa-arrow-left"></i> Back To Users</a></li>            
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row">          
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">ADD USER</center></b></div>
            <form role="form">
              <div class="form-group">
                <label class="lab">User Name</label>
                <input type="text" class="form-control"  id="auname">
              </div>
              <div class="form-group">
                <label class="lab">Email_ID</label>
                <input type="text" class="form-control"  id="auemail">
                <div id="auerrem" class="err"></div>
              </div>
              <div class="form-group">
                <label class="lab">Mobile Number</label>
                <input type="number" class="form-control"  id="aumob"  min="1">
                <div id="auerren" class="err"></div>
              </div>
              <div class="form-group">
                <label class="lab">DOB</label>
                <input type="date" class="form-control"  id="audob">
              </div>
              <div class="form-group">
                <label class="lab">Password</label>
                <input type="password" class="form-control"  id="aupass">
              </div>
              <div class="form-group">                
                <label class="lab">Gender</label><br> 
                <label class="radio-inline">
                <input type="radio" name="ausex" id="ausexm" value="male"> male
                </label>
                <label class="radio-inline">
                <input type="radio" name="ausex" id="ausexf" value="female"> female
                </label>
              </div>
              <div class="form-group">
                <label class="lab">Address</label>
                <textarea type="text" class="form-control"  id="auadd"></textarea>
              </div>
              <div class="form-group">
                <label class="lab">State</label>
                <select class="form-control" id="austate">
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
                <!--input type="text" class="form-control"  id="aucity"-->
                <select class="form-control" id="aucity">
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
                <!--input type="number" class="form-control"  id="aupin"  min="1"-->
                <select class="form-control" id="aupin">
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
                <div id="auerrep" class="err"></div>
              </div>
            <div id="auerr" class="err"></div>
            <center><button type="button" class="btn btn-success" id="submituser">Submit</button></center>
              
              
            </form>
          </div>
          <div class="col-lg-3"></div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include"footer.php" ?>
   

<script type="text/javascript">
     $(document).ready(function(){
     $("#liuser").addClass("active");
$(document).on('click', '#submituser', function(){
  var auname="",auemail="",aumob="",audob="",aupass="",ausex="",auadd="",austate="",aucity="",aupin="";
    auname=$("#auname").val();
    auemail=$("#auemail").val();
    aumob=$("#aumob").val();
    audob=$("#audob").val();
    aupass=$("#aupass").val();
    ausex=$("input[name='ausex']:checked").val();
    auadd=$("#auadd").val();
    austate=$("#austate option:selected").attr("id");
    aucity=$("#aucity option:selected").attr("id");
    aupin=$("#aupin option:selected").attr("id");
   if((auname.replace(/\s/g, '').length)&&(auemail.replace(/\s/g, '').length)&&(aumob.replace(/\s/g, '').length)&&(audob.replace(/\s/g, '').length)&&(aupass.replace(/\s/g, '').length)&&(ausex!="")&&(auadd.replace(/\s/g, '').length)&&((austate!="")&&(austate!=0)&&(typeof austate!== "undefined"))&&((aucity!="")&&(aucity!=0)&&(typeof aucity!== "undefined"))&&((aupin!="")&&(aupin!=0)&&(typeof aupin!== "undefined"))){
     //alert(auname+auemail+aumob+audob+aupass+ausex+auadd+austate+aucity+aupin);
     $.ajax({
                type:'POST',
                url:'usersaction.php',
                data:{com:"com",insert:"insert",auname:auname,ausex:ausex,audob:audob,aumob:aumob,aupass:aupass,auemail:auemail,auadd:auadd,aucity:aucity,aupin:aupin,austate:austate},
                success:function(data){
          //alert(data);
          if(data==1){
                      $("#auname").val("");
                      $("#auemail").val("");
                      $("#aumob").val("");
                      $("#audob").val("");
                      $("#aupass").val("");                     
                      $("#auadd").val("");
                      $("#austate option:selected").prop("selected", false)
                      $("#aucity option:selected").prop("selected", false)
                      $("#aupin option:selected").prop("selected", false)
                     $.redirect("users.php","_self");
          }
                    else{
            $("#auerr").html("This user Already Exists").show().fadeOut(3000);
          }
                }
            }); 
     
   }
   else{
     //alert("Enter all the values");
     $("#auerr").html("Enter all the values").show().fadeOut(3000);
   }
   
 });



 //});


 $('#auemail').on('blur', function() {
        var mail=$("#auemail").val();
        if(mail == '' || mail.indexOf('@') == -1 || mail.indexOf('.') == -1) {
           //alert("Invalid email address");
           $("#auerrem").html("Invalid email address").show().fadeOut(3000);
           $("#auemail").val("");
     }
        
    });
 $(document).on('keyup', '#aumob',function (e) {            
            if(((($("#aumob").val()).length)>10)&&(e.keyCode != 9)){
             //alert("The length of mobile number to be 10");
           $("#auerren").html("The length of mobile number to be 10").show().fadeOut(3000);
                   $(this).val('');
                 }
        });  
 $(document).on('blur', '#aumob',function (e) { 
     var mob=$("#aumob").val();
        var mob=$("#aumob").val();
        if(mob.length<10 ) {
           //alert("Invalid mobile number");
           $("#auerren").html("Invalid mobile number").show().fadeOut(3000);
           $("#aumob").val("");
     }
});


/*$(document).on('keyup', '#aupin',function (e) { 
     var mob=$("#aupin").val();
        var mob=$("#eupin").val();
        if(mob.length>6 ) {
           //alert("Invalid mobile number");
           $("#auerrep").html("Invalid Pincode").show().fadeOut(3000);
           $("#aupin").val("");
     }
});
 

 $(document).on('blur', '#aupin',function (e) { 
     var mob=$("#aupin").val();
        var mob=$("#aupin").val();
        if(mob.length<6 ) {
           //alert("Invalid mobile number");
           $("#auerrep").html("Invalid Pincode").show().fadeOut(3000);
           $("#aupin").val("");
     }
});*/


 $(document).on('change','#austate',function(){ 
       var valstate= $("#austate option:selected").attr("id");        
        var subcity = $('#aucity');
        $('option', subcity).filter(function(){
            if ($(this).attr('data-group') === valstate) {
                $(this).show(); 
            } else {
                $(this).hide();
                $('#aucity').val("");
                $("#aucity option:selected").prop("selected", false)
            }
        });
    });

$('#aucity').on('change', function(){       
       var valcity= $("#aucity option:selected").attr("id");        
        var subpin = $('#aupin');
        $('option', subpin).filter(function(){
            if ($(this).attr('data-group') === valcity) {
                $(this).show();
            } else {
                $(this).hide();
                $('#aupin').val("");
                $("#aupin option:selected").prop("selected", false)
            }
        });
    });




}); 

</script>
  </body>
</html>