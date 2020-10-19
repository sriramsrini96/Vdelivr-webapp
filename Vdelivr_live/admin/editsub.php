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

    <title>Sub-Categories- OON APP</title>

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
            <!--<h1>View and Edit <small>Sub-Categories</small></h1>-->
            <h1>Sub-Category</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="subcategory.php"><i class="fa fa-arrow-left"></i> Back To Sub-Categories</a></li>
            </ol>
          </div>
        </div><!-- /.row -->


        <div class="row" id="editsubcate">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">EDIT SUB-CATEGORY</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Sub-Category Id</label>
                        <input type="text" class="form-control"  id="editsubcatid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Category Name</label>
                        <input type="text" class="form-control"  id="editsubcatcat" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Name</label>
                        <input type="text" class="form-control"  id="editsubcatname">
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Description</label>
                        <textarea class="form-control" rows="3"  id="editsubcatdesc"></textarea>
                     </div>
                     <div class="form-group">
                        <!--<label class="lab">Image</label>
                        <input type="file" id="subcatimag" accept="image/*">-->
                        <label class="lab">Image</label>
                        <img id="editsubcatimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
                     </div>
                     <div class="form-group">
                        <label class="lab">If Need,Change Image</label>
                        <input type="file" id="upsubcatimg" accept="image/*">
                     </div>
                     <div id="esubcaterr" class="err"></div>
            <center><button type="button" class="btn btn-success" id="updatesubcat">Update</button></center>
                  </form>
               </div>
               <div class="col-lg-3"></div>
            </div><!-- /.row -->




     


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->


    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#lisubc").addClass("active");
     $("#editsubcatid").val("");  
     $("#editsubcatname").val("");
     $("#editsubcatdesc").val("");
     $("#upsubcatimg").val("");
     $("#upsubcatcat").val("");
      var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];    
     var esubcatid=<?php echo $_POST['subcatid']?>;
     var editsubcatimage;
$.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{subcategory:"subcategory",vesubcatid :esubcatid },
                 dataType:"json",   
                success:function(data){ 
                //alert("data "+data+""+"id "+data.id+"cate "+data.category+" name "+data.name+" desc "+data.description+" img "+data.image)                           
                    $('#editsubcatid').val(data.id); 
                    $('#editsubcatcat').val(data.category); 
                    $('#editsubcatname').val(data.name);
                    $('#editsubcatdesc').val(data.description); 
                    $('#editsubcatimg').attr("src","upload/subcatimg/"+data.image);
                    editsubcatimage=data.image;
                     }  
           }); 


$(document).on('click', '#updatesubcat', function(){ 
         var upsubcatid=$("#editsubcatid").val();  
         var upsubcatname=$("#editsubcatname").val();
         var upsubcatdesc=$("#editsubcatdesc").val();
         if($("#upsubcatimg").val()!="")
         { upsubcatimage=$("#upsubcatimg")[0].files[0].name;
         }
        else
         upsubcatimage=editsubcatimage;
         var formData = new FormData();
         formData.append('subcategory', "subcategory");
         formData.append('com', "com");
         formData.append('upsubcatid', upsubcatid);
         formData.append('subcatname', upsubcatname);
         formData.append('subcatdesc', upsubcatdesc); 
         formData.append('subcatimagname', upsubcatimage);
         formData.append('upsubcatimagech', $("#upsubcatimg").val()); 
         formData.append('upsubcatimage', $("#upsubcatimg")[0].files[0]);
         
        if((upsubcatname.replace(/\s/g, '').length)&&(upsubcatdesc.replace(/\s/g, '').length)&&(upsubcatimage!="")){
         //alert("img val  _"+$("#upsubcatimg").val()+"_");
         //alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
         if($("#upsubcatimg").val()==""){
          $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",                   
                data: formData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  //alert(data);  
                  if(data==1){
                $("#editsubcatid").val("");  
                $("#editsubcatname").val("");
                $("#editsubcatdesc").val("");
                $("#upsubcatimg").val("");
                $("#upsubcatcat").val("");
                $.redirect("subcategory.php","_self");
                  } 
            else {
              //alert(data);
                //if(data="not updated sub-category already exists")
                $("#esubcaterr").html("This Sub-Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });

         }
         else{
             checkimg=checkimg($("#upsubcatimg"));
             if(checkimg==2){
              $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",                   
                data: formData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  //alert(data);  
                  if(data==1){
                $("#editsubcatid").val("");  
                $("#editsubcatname").val("");
                $("#editsubcatdesc").val("");
                $("#upsubcatimg").val("");
                $("#upsubcatcat").val("");
                $.redirect("subcategory.php","_self");
                  } 
            else {
              //alert(data);
                //if(data="not updated sub-category already exists")
                $("#esubcaterr").html("This Sub-Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });
             }
             else{
              $("#esubcaterr").html("Select the Image file").show().fadeOut(3000);
             }
         }
         
         }
         else{
         $("#esubcaterr").html("Enter all the values").show().fadeOut(3000);
         }       
            
      }); 

function checkimg(ele){
  //alert(ele);
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