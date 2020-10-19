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

    <title>StateMaster- OON APP</title>

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
            <h1>Add State<!--small>here</small--></h1>
            <ol class="breadcrumb">
              <li><a href="state.php"><i class="fa fa-arrow-left"></i> Back to states</a></li>
              <!--li><a href="#addstate"><i class="fa fa-edit"></i>Add State</a></li-->
            </ol>
          </div>
        </div><!-- /.row -->




     


        <div class="row" id="addstate">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">ADD STATE</center></b></div>
            <form role="form"> 
              <div class="form-group">
                <label class="lab">State Name</label>
                <input type="text" class="form-control" placeholder="Enter Category Name" id="statename">
              </div>
              <div id="stateerr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitstate">Submit</button></center>
            </form>

          </div>
          <div class="col-lg-3"></div>
          
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->




    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
    $("#listate").addClass("active");
    $('#statelist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');

     
    $(document).on("click", "#submitstate", function(){

   var statename=$("#statename").val();
   
    if((statename.replace(/\s/g, '').length)){
    	
      //alert("filetype : "+statename);
    	
         $.ajax({
                url: "stateaction.php",
                type: "POST",                
                data:{com:"com",insert:"insert",statename:statename},
                success : function(data){
//alert(data);
if(data==1){
$("#statename").val("");
 
               /*   $("#statel").html("");

          $("#statel").load("state.php #statel",function()
            {
              $('#statelist').DataTable();               
            });   */   
            $.redirect("state.php","_self");     
}
else{
   $("#stateerr").html("This State Already Exists").show().fadeOut(3000);
}
                 }
             });


    }
    else{
    	$("#stateerr").html("Enter the State Name").show().fadeOut(3000);
    }
});




         
 $('input').keyup(function (e) {
                if (e.which === 13) {
             var index = $('input').index(this) + 1;
             $('input').eq(index).focus();
         }
     });   

 }); 







</script>
  </body>
</html>