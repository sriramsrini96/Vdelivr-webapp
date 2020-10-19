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

    <title>Products- OON APP</title>

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
            <h1>Products</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="products.php"><i class="fa fa-arrow-left"></i> Back To Products</a></li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row" id="viewprod">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">VIEW PRODUCT</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Product Id</label>
                        <input type="text" class="form-control"  id="viewproid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Category Name</label>
                        <input type="text" class="form-control"  id="viewprocat" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Name</label>
                        <input type="text" class="form-control"  id="viewprosubcat" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Name</label>
                        <input type="text" class="form-control" id="viewproname" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Description</label>
                        <textarea class="form-control" rows="3" id="viewprodesc" readonly></textarea>
                     </div>
                     <div class="form-group">
                        <label class="lab">Quantity/Number</label>
                        <input type="text" class="form-control" id="viewproquan" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Units</label>
                        <input type="text" class="form-control"  id="viewprounit" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Actual Price</label>
                        <input type="text" class="form-control"  id="viewproactu" readonly>
                     </div>
                     <div class="form-group">                
                          <label class="lab">Discount Type</label><br> 
                          <input type="text" class="form-control"  id="viewprodis" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Discount Value</label>
                        <input type="text" class="form-control" id="viewprovalu" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Display Price</label>
                        <input type="number" class="form-control" id="viewprodisp" readonly>
                     </div>
					 
					 
					 <div class="form-group">
                        <label class="lab">Packing Charge</label>
                        <input type="number" class="form-control" id="viewpropack" readonly>
                     </div>
					 <div class="form-group">
                        <label class="lab">GST</label>
                        <input type="number" class="form-control" id="viewprogst" readonly>
                     </div>
					 <div class="form-group">
                        <label class="lab">Delivery Charge</label>
                        <input type="number" class="form-control" id="viewprodeli" readonly>
                     </div>
					 
					 
					 
                     <div class="form-group">
                        <label class="lab">Image</label>
                        <img id="viewproimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
                     </div>
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
     
     $("#liprod").addClass("active");
     var vproid=<?php echo $_POST['veproid']?>;
    //alert(vproid);
       $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{product:"product",veproid :vproid },
                 dataType:"json",   
                success:function(data){ 
                //alert("data "+data+""+"id "+data.id+"cate "+data.category+" name "+data.name+" desc "+data.description+" img "+data.images)                           
                    $("#viewproid").val(data.id);
                    $("#viewprocat").val(data.category);
                    $("#viewprosubcat").val(data.subcategory);
                    $("#viewproname").val(data.name);
                    $("#viewprodesc").val(data.description);
                    $("#viewproquan").val(data.quantity_number);
                    $("#viewprounit").val(data.units);
                    $("#viewproactu").val(data.actual_price);
                    $("#viewprodis").val(data.discount_type);
                    $("#viewprovalu").val(data.discount_value);
                    $("#viewprodisp").val(data.display_price);
					
					$("#viewpropack").val(data.packing_charge);
					$("#viewprogst").val(data.gst);
					$("#viewprodeli").val(data.delivery_charge);
					
                    $("#viewproimg").attr("src","upload/proimg/"+data.images);
                     }  
           }); 
    
 }); 







</script>
  </body>
</html>