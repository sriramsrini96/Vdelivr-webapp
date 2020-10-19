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

    <title>Banner- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">


    <style>

.breadcrumb > li + li:before {
    padding: 0 5px;
    color: #ccc;
    content: "\00a0";
}
.addbtn{
      margin-top: -7px;
      float:right;
}
</style>

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <!--<h1>View and Edit <small>Products</small></h1>-->
            <h1>Banner</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="banner.php"><i class="fa fa-arrow-left"></i> Back To Banner</a></li>
            </ol>
          </div>
        </div><!-- /.row -->


        <div class="row" id="editbann">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">EDIT BANNER</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Product Id</label>
                        <input type="text" class="form-control" id="editbanid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Image</label>
                        <img id="bannerimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
                     </div>



                     <div class="form-group">
                        <label class="lab">If Need,Change Image</label>
                        <input type="file" id="editbanimag" accept="image/*">
                     </div>
                     <div id="editbanerr" class="err"></div>
                     <center><button type="button" class="btn btn-success" id="upsubmitban">Submit</button></center>
                  </form>
               </div>
               <div class="col-lg-3"></div>
            </div>
            <!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#libann").addClass("active");
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
     $("#editbanid").val("");
      $("#editbanimag").val("");
      $("#bannerimg").attr("src","");

var ebanid=<?php echo $_POST['vebanid']?>;
var viewbanimage;
    //alert(vproid);
       $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{banner:"banner",vebanid :ebanid },
                 dataType:"json",   
                success:function(data){ 
                //alert("data "+data+""+"id "+data.id+"cate "+data.category+" name "+data.name+" desc "+data.description+" img "+data.images)                           
                    $("#editbanid").val(data.id);
                    $("#bannerimg").attr("src","upload/banimg/"+data.name);
                    viewbanimage=data.name;
                     }  
           }); 




$(document).on("click", "#upsubmitban", function(){
         var editbanid=$("#editbanid").val();
         if($("#editbanimag").val()!="")
         { editbanimag=$("#editbanimag")[0].files[0].name;
         }
        else
         editbanimag=viewbanimage;
         if((editbanimag.replace(/\s/g, '').length)){
         //alert(editproquan+editprounit+editproactu+editprodis+editprovalu+editprodisp);
         var checkimgck=checkimg($("#editbanimag"));
         var checkfilesizeck=checkfilesize($("#editbanimag"));
          //alert("adsasd")
         if (((checkimgck==0)||(checkimgck==2))&&((checkfilesizeck==0)||(checkfilesizeck==2))) {
          //alert("dsa")
         var eformData = new FormData();
            eformData.append('banner', "banner");
            eformData.append('com', "com");
            eformData.append('editbanid', editbanid);
            eformData.append('banimagname',editbanimag); 
            eformData.append('banimagch',$("#editbanimag").val()); 
            eformData.append('upbanimage',$("#editbanimag")[0].files[0]);
         $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:eformData,
                    contentType: false, 
                    processData: false,                
                    success : function(data){
         if(data==1){
         $("#editbanname").val("");
         $("#editbanimag").val("");
         $.redirect("banner.php","_self");
         }
         else{
         $("#editbanerr").html("This Banner Already Exists").show().fadeOut(3000);
         }
                     }
                 });
         }
         else{
         $("#editbanerr").html("Select the Image File and Size less than 1 MB").show().fadeOut(3000);
         }
         }
         else{
         $("#editbanerr").html("Enter  the value").show().fadeOut(3000);
         }
         });


function checkimg(ele){
  if(ele.val()!==""){
  var imgty=(ele)[0].files[0].type;
  if($.inArray(imgty, iformat) !== -1)
  {//alert(imgty);
    return 2;//correct format
  }
  else 
    return 1;//file selected but not an image
 }
else
  return 0;//no image selected
}

function checkfilesize(ele){
  if(ele.val()!==""){
  var fsize=(ele)[0].files[0].size;
  if(fsize<1048576)//to be less than 1 mb
  {
    return 2;//correct size
  }
  else 
    return 1;//file selected but not correct size
 }
else
  return 0;//no image selected
}
    
  

 }); 







</script>
  </body>
</html>