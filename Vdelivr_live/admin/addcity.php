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

    <title>CityMaster- OON APP</title>

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
            <h1>Add City<!--small>here</small--></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="city.php"><i class="fa fa-arrow-left"></i> Back to Cities</a></li>
            </ol>
          </div>
        </div><!-- /.row -->




    


        <div class="row" id="addcity">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">ADD CITY</center></b></div>
            <form role="form">
              <div class="form-group">
                <label class="lab">State Name</label>
                <select class="form-control" id="state">
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
                <input type="text" class="form-control" placeholder="Enter Category Name" id="cityname">
              </div>
              <div id="cityerr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitcity">Submit</button></center>
            </form>

          </div>
          <div class="col-lg-3"></div>
          
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->




    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
    $("#licity").addClass("active");
    $('#citylist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');

     
    $(document).on("click", "#submitcity", function(){

   var cityname=$("#cityname").val();
   var state=$("#state option:selected").attr("id");
   
    if((cityname.replace(/\s/g, '').length)&&((state!="")&&(state!=0)&&(typeof state!== "undefined"))){
    	
      //alert("filetype : "+cityname);
    	
         $.ajax({
                url: "cityaction.php",
                type: "POST",                
                data:{com:"com",insert:"insert",state:state,cityname:cityname},
                success : function(data){
//alert(data);
if(data==1){
$("#cityname").val("");
$("#state option:selected").prop("selected", false)
 
                 $.redirect("city.php","_self");        
}
else{
   $("#cityerr").html("This City Already Exists").show().fadeOut(3000);
}
                 }
             });


    }
    else{
    	$("#cityerr").html("Enter All Values").show().fadeOut(3000);
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