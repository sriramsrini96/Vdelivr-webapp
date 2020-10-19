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

            <div class="row" id="viewsubcate">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">VIEW SUB-CATEGORY</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Sub-Category Id</label>
                        <input type="text" class="form-control"  id="viewsubcatid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Category Name</label>
                        <input type="text" class="form-control"  id="viewsubcatcat" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Name</label>
                        <input type="text" class="form-control"  id="viewsubcatname" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Description</label>
                        <textarea class="form-control" rows="3"  id="viewsubcatdesc" readonly></textarea>
                     </div>
                     <div class="form-group">
                        <label class="lab">Image</label>
                        <img id="viewsubcatimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
                     </div>
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
    var vsubcatid=<?php echo $_POST['subcatid']?>;
    //alert(vsubcatid);
$.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{subcategory:"subcategory",vesubcatid :vsubcatid },
                 dataType:"json",   
                success:function(data){ 
                //alert("data "+data+""+"id "+data.id+"cate "+data.category+" name "+data.name+" desc "+data.description+" img "+data.image)                           
                    $('#viewsubcatid').val(data.id); 
                    $('#viewsubcatcat').val(data.category); 
                    $('#viewsubcatname').val(data.name);
                    $('#viewsubcatdesc').val(data.description); 
                    $('#viewsubcatimg').attr("src","upload/subcatimg/"+data.image);
                     }  
           }); 

 }); 

</script>
  </body>
</html>