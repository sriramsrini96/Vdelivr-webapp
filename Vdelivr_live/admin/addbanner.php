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
      <title>Banners- OON APP</title>
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
                  <h1>
                     Add Banner<!--small>Categories</small-->
                  </h1>
                  <ol class="breadcrumb">
                     <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
                     <li><a href="banner.php"><i class="fa fa-arrow-left"></i> Back to Banners</a></li>
                  </ol>
               </div>
            </div>
            <!-- /.row -->
            <div class="row" id="addbann">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">ADD BANNER</center>
                     </b>
                  </div>
                   <form role="form">
			 <div class="form-group">
				<label class="lab">Image</label>
				<input type="file" id="banimag" accept="image/*">
			 </div>
			 <div id="banerr" class="err"></div>
			 <div class="">
			 <button type="button" class="btn btn-success" id="submitban">Submit</button>
			 </div>
			 
		  </form>
		
               </div>
               <div class="col-lg-3"></div>
            </div>
            <!-- /.row -->
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <?php include"footer.php" ?>
      <script type="text/javascript">
         $(document).ready(function(){ 
         
         $("#libann").addClass("active");
         var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
         
         
         $(document).on("click", "#submitban", function(){
         var banimag=$("#banimag").val();
         if(banimag!=""){
         var filetype=$("#banimag")[0].files[0].type;
		 var fsize = $('#banimag')[0].files[0].size;
         if (($.inArray(filetype, iformat) !== -1)&&(fsize<1048576)) { //to be less than 1 mb
          //alert("dsa")
         var formData = new FormData();
          formData.append('banner', "banner");
         formData.append('com', "com");
            formData.append('insert', "insert");
            formData.append('banimagname', $("#banimag")[0].files[0].name); 
            formData.append('banimage', $("#banimag")[0].files[0]);
         $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:formData,
                    contentType: false, 
                    processData: false,                
                     success : function(data){
         //alert(data);
         if(data==1){
         $("#banimag").val("");
         $.redirect("banner.php","_self");
         }
         else{
         $("#banerr").html("This Image Already Exists").show().fadeOut(3000);
         }
                     }
                 });
         }
         else{
         $("#banerr").html("Select the Image File and Size less than 1 MB").show().fadeOut(3000);
         }
         }
         else{
         $("#banerr").html("Select the Image File").show().fadeOut(3000);
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