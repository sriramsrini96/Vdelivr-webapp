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

    <title>Categories- OON APP</title>

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
            <h1>Add Category<!--small>Categories</small--></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="categories.php"><i class="fa fa-arrow-left"></i> Back to Categories</a></li>
              
            </ol>
          </div>
        </div><!-- /.row -->



      

        <div class="row rowmar" id="addcate">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
<div><b><center class="addhead">ADD CATEGORY</center></b></div>
            <form role="form">
              
              <div class="form-group">
                <label class="lab">Category Name</label>
                <input type="text" class="form-control" placeholder="Enter Category Name" id="catname">
              </div>

              <div class="form-group">
                <label class="lab">Category Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter Category Description" id="catdesc"></textarea>
              </div>
              <div class="form-group">
                <label class="lab">Image 1</label>
                <input type="file" id="catimag" accept="image/*">
              </div>
              <div class="form-group">
                <label class="lab">Image 2</label>
                <input type="file" id="catimag2" accept="image/*">
              </div>
              <div id="caterr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitcat">Submit</button></center>

                

            </form>

          </div>
          <div class="col-lg-3"></div>
          
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->



    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#licate").addClass("active");
    $('#catelist').DataTable();
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];

     
    $(document).on("click", "#submitcat", function(){

   var catname=$("#catname").val();
   var catdesc=$("#catdesc").val();
   var catimag=$("#catimag").val();
   var catimag2=$("#catimag2").val(); 
   
   //alert("catname   "+catname+"  catdesc  "+catdesc.length+"  catimag "+catimag);
   
    if((catname.replace(/\s/g, '').length)&&(catdesc.replace(/\s/g, '').length)&&(catimag!="")&&(catimag2!="")){
    	//alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
    var filetype=$("#catimag")[0].files[0].type;
    var filetype2=$("#catimag2")[0].files[0].type;
     if (($.inArray(filetype, iformat) !== -1)&&($.inArray(filetype2, iformat) !== -1)) {
      //alert("filetype : "+filetype);
    	var formData = new FormData();
    	formData.append('com', "com");
        formData.append('insert', "insert");
        formData.append('catname', catname);
        formData.append('catdesc', catdesc); 
        formData.append('catimagname', $("#catimag")[0].files[0].name); 
        formData.append('catimage', $("#catimag")[0].files[0]);
        formData.append('catimagname2', $("#catimag2")[0].files[0].name); 
        formData.append('catimage2', $("#catimag2")[0].files[0]);
        
$.ajax({
                url: "crudaction.php",
                type: "POST",                
                data:formData,
                contentType: false, 
                processData: false,                
                 success : function(data){
//alert(data);
if(data==1){
$("#catname").val("");
$("#catdesc").val("");
$("#catimag").val(""); 
$("#catimag2").val(""); 
                 //  $(document).on('click', '#addcat', function(){  
  $.redirect("categories.php","_self");
           
      //});      
}
else{
   $("#caterr").html("This Category Already Exists").show().fadeOut(3000);
}
                 }
             });
}
else{
  $("#caterr").html("Select the Image File").show().fadeOut(3000);
}
    }
    else{
    	$("#caterr").html("Enter all the values").show().fadeOut(3000);
    }
});







 




$(document).on('click', '#updatecat', function(){          
            var ecatid = $('#ecatid').val();
            var ecatname=$('#ecatname').val();
            var ecatdesc=$('#ecatdesc').val();
            var ecatimg="";
            if($("#ecatimag").val()!="")
           { ecatimg=$("#ecatimag")[0].files[0].name;
              ecattype=$("#ecatimag")[0].files[0].type;
       }//alert("sdfsdfsdf")
            var editformData = new FormData();
            editformData.append('com', "com");      
        editformData.append('ecatid', ecatid);
        editformData.append('catname', ecatname);
        editformData.append('catdesc', ecatdesc);
        editformData.append('catimagname',ecatimg);
        editformData.append('ecatimag', $("#ecatimag")[0].files[0]);  
        //alert("sdfsdfsdf");       
          if((ecatname.replace(/\s/g, '').length)&&(ecatdesc.replace(/\s/g, '').length)){
            //alert("sdfsdfsdf");
            if(ecatimg=="")  {
            //alert("sdfsdfsdf");          
           $.ajax({  
                url:"crudaction.php",  
                method:"POST",                   
                data: editformData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  //alert(data);  
                  if(data==1){
                  $("#catl").html("");                   
                   $("#editclose").click();
          $("#catl").load("categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            }); } 
            else {
              //alert(data);
                //if(data="not updated sub-category already exists")
                $("#ecaterr").html("This Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });
             }

            else{
              if ($.inArray(ecattype, iformat) !== -1){
              $.ajax({  
                url:"crudaction.php",  
                method:"POST",                  
                data: editformData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  //alert(data);  
                  if(data==1){
                  $("#catl").html("");                   
                   $("#editclose").click();
          $("#catl").load("categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            }); } 
            else {
                $("#ecaterr").html("This Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });

            }
            else
              $("#ecaterr").html("Select the Image file").show().fadeOut(3000);
          }



              }
           else{            
             $("#ecaterr").html("Enter All the Values").show().fadeOut(3000);
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