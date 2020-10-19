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

    <title>PinCodeMaster- OON APP</title>

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
            <h1>Add Pincode<!--small>pincode</small--></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="pincode.php"><i class="fa fa-arrow-left"></i> Back to Pincodes</a></li>
              <!--li class="addbtn"><button type="button" class="btn btn-primary" id="addcity">Add</button></li-->
            </ol>
          </div>
        </div><!-- /.row -->


        <div class="row " id="addpin">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">ADD PINCODE</center></b></div>
            <form role="form">

           <div class="form-group">
                <label class="lab">State Name</label>
                <select class="form-control" id="pstate">
                  <option value = "">---Select State---</option>
                  <?php
                  include "config.php";
       $opt =$conn->prepare("SELECT  id,state FROM statemaster WHERE status=1");
      $opt->execute();
      $option = $opt->setFetchMode(PDO::FETCH_ASSOC); 

      while ( $d=$opt->fetch()) {
  echo "<option id='".$d['id']."' value='".$d['state']."'>".$d['state']."</option>";
}
    ?>
                </select>
                <!--input type="number" class="form-control" placeholder="Enter Pincode" id="pincode"-->
              </div>

             <div class="form-group">
                <label class="lab">City Name</label>
                <select class="form-control" id="pcity">
                  <option value = "">---Select City---</option>
                  <?php
                  include "config.php";  
       $opt =$conn->prepare("SELECT  id,city,state_id FROM citymaster WHERE status=1");
      $opt->execute();
      $option = $opt->setFetchMode(PDO::FETCH_ASSOC); 

      while ( $d=$opt->fetch()) {
  echo "<option id='".$d['id']."' value='".$d['city']."' data-group='".$d['state_id']."'>".$d['city']."</option>";
}
    ?>
                </select>
              </div>

              <div class="form-group">
                <label class="lab">Pincode</label>
                <input type="number" class="form-control" placeholder="Enter Pincode" id="pincode" max="6" min="1">
              </div>
              <div id="pinerr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitpin">Submit</button></center>
            </form>

          </div>
          <div class="col-lg-3"></div>
          
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->













    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#lipin").addClass("active");
    $('#pinlist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');
     
    $(document).on("click", "#submitpin", function(){

   var pincode=$("#pincode").val();
   var pstate=$("#pstate option:selected").attr("id");
   var pcity=$("#pcity option:selected").attr("id");
   
    if(((pincode.replace(/\s/g, '').length)==6)&&((pstate!="")&&(pstate!=0)&&(typeof pstate!== "undefined"))&&((pcity!="")&&(pcity!=0)&&(typeof pcity!== "undefined"))){
         $.ajax({
                url: "pincodeaction.php",
                type: "POST",                
                data:{com:"com",insert:"insert",pincode:pincode,pstate:pstate,pcity:pcity},
                success : function(data){
//alert(data);
if(data==1){
$("#pincode").val("");
$("#pstate option:selected").prop("selected", false)
                 $("#pcity option:selected").prop("selected", false)
 
                 $.redirect("pincode.php","_self");  

}
else{
   $("#pinerr").html("This PinCode Already Exists").show().fadeOut(3000);
}
                 }
             });


    }
    else{
    	$("#pinerr").html("Enter All Values").show().fadeOut(3000);

    }
});



$('#pincode').keyup(function (e) {
                if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }
        if(((($("#pincode").val()).replace(/\s/g, '').length)>6))
        {$("#pinerr").html("Pincode to be in six digit").show().fadeOut(3000);
      $("#pincode").val("");
    }
     });   




 

         
 $('input').keyup(function (e) {
                if (e.which === 13) {
             var index = $('input').index(this) + 1;
             $('input').eq(index).focus();
         }
     });   

 }); 




 $('#pstate').on('change', function(){       
       var val= $("#pstate option:selected").attr("id");        
        var sub = $('#pcity');
        $('option', sub).filter(function(){
            if ($(this).attr('data-group') === val) {
                $(this).show();
            } else {
                $(this).hide();
                $('#pcity').val("");
                $("#pcity option:selected").prop("selected", false)
            }
        });
    });
   



</script>
  </body>
</html>