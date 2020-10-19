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
                  <h1>
                     Add Sub-Category<!--small>Categories</small-->
                  </h1>
                  <ol class="breadcrumb">
                     <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
                     <li><a href="subcategory.php"><i class="fa fa-arrow-left"></i> Back to Sub-Categories</a></li>
                  </ol>
               </div>
            </div>
            <!-- /.row -->
            <div class="row" id="addsubcate">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">ADD SUB-CATEGORY</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Category Name</label>
                        <select class="form-control" id="cate">
                           <option value = "">---Select Category---</option>
                           <?php
                              include "config.php";
                              $opt =$conn->prepare("SELECT  id,name FROM categories WHERE status=1");
                              $opt->execute();
                              $option = $opt->setFetchMode(PDO::FETCH_ASSOC); 
                              
                              while ( $d=$opt->fetch()) {
                              echo "<option id='".$d['id']."' value='".$d['name']."'>".$d['name']."</option>";
                              }
                              ?>
                        </select>
                        <!--input type="number" class="form-control" placeholder="Enter Pincode" id="pincode"-->
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Sub-Category Name" id="subcatname">
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Sub-Category Description" id="subcatdesc"></textarea>
                     </div>
                     <div class="form-group">
                        <label class="lab">Image</label>
                        <input type="file" id="subcatimag" accept="image/*">
                     </div>
                     <div id="subcaterr" class="err"></div>
                     <center><button type="button" class="btn btn-success" id="submitsubcat">Submit</button></center>
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
         
         $("#lisubc").addClass("active");
         $('#catelist').DataTable();
         var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
         
         
         $(document).on("click", "#submitsubcat", function(){
         var cate=$("#cate option:selected").attr("id");
         var subcatname=$("#subcatname").val();
         var subcatdesc=$("#subcatdesc").val();
         var subcatimag=$("#subcatimag").val();
         
         
         //alert("catname   "+catname+"  catdesc  "+catdesc.length+"  catimag "+catimag);
         
         if(((cate!="")&&(cate!=0)&&(typeof cate!== "undefined"))&&(subcatname.replace(/\s/g, '').length)&&(subcatdesc.replace(/\s/g, '').length)&&(subcatimag!="")){
         //alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
		 
         var filetype=$("#subcatimag")[0].files[0].type;
         if (($.inArray(filetype, iformat) !== -1)) {
         var formData = new FormData();
          formData.append('subcategory', "subcategory");
         formData.append('com', "com");
            formData.append('insert', "insert");
            formData.append('cate', cate);
            formData.append('subcatname', subcatname);
            formData.append('subcatdesc', subcatdesc); 
            formData.append('subcatimagname', $("#subcatimag")[0].files[0].name); 
            formData.append('subcatimage', $("#subcatimag")[0].files[0]);
         $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:formData,
                    contentType: false, 
                    processData: false,                
                     success : function(data){
         //alert(data);
         if(data==1){
         $("#subcatname").val("");
         $("#subcatdesc").val("");
         $("#subcatimag").val("");
         $("#cate option:selected").prop("selected", false)
         $.redirect("subcategory.php","_self");
         }
         else{
         $("#subcaterr").html("This Category Already Exists").show().fadeOut(3000);
         }
                     }
                 });
         }
         else{
         $("#subcaterr").html("Select the Image File").show().fadeOut(3000);
         }
         }
         else{
         $("#subcaterr").html("Enter all the values").show().fadeOut(3000);
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