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
                  <h1>
                     Add Product<!--small>Categories</small-->
                  </h1>
                  <ol class="breadcrumb">
                     <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
                     <li><a href="products.php"><i class="fa fa-arrow-left"></i> Back to Products</a></li>
                  </ol>
               </div>
            </div><!-- /.row -->
            <div class="row" id="addprod">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">ADD PRODUCT</center>
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
                     </div>
                     <div class="form-group">
                        <label class="lab">Sub-Category Name</label>
                        <select class="form-control" id="subcate">
                           <option value = "">---Select Sub-Category---</option>
                           <?php
                              include "config.php";
                              $opt =$conn->prepare("SELECT  id,name,category_id FROM sub_categories WHERE status=1");
                              $opt->execute();
                              $option = $opt->setFetchMode(PDO::FETCH_ASSOC); 
                              
                              while ( $d=$opt->fetch()) {
                              echo "<option id='".$d['id']."' value='".$d['name']."' data-group='".$d['category_id']."'>".$d['name']."</option>";
                              }
                              ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter Sub-Category Name" id="proname">
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Sub-Category Description" id="prodesc"></textarea>
                     </div>


                     <div class="form-group">
                        <label class="lab">Quantity/Number</label>
                        <input type="number" class="form-control" placeholder="Enter Quantity/Number" id="proquan" min="1">
                     </div>
                     <div class="form-group">
                        <label class="lab">Units</label>
                        <select class="form-control" id="prounit">
                           <option value = "">---Select Unit---</option>
                           <option value = "pieces" id="1">pieces</option>
                           <option value = "kg" id="2">kg</option>
                           <option value = "litres" id="3">litres</option>
                           <option value = "gms" id="4">gms</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="lab">Actual Price</label>
                        <input type="number" class="form-control" placeholder="Enter Actual Price" id="proactu" min="1">
                     </div>
                     <div class="form-group">                
                          <label class="lab">Discount Type</label><br> 
                          <label class="radio-inline">
                          <input type="radio" name="prodis" id="percent" value="percent"> Percentage
                          </label>
                          <label class="radio-inline">
                          <input type="radio" name="prodis" id="amount" value="amount"> Amount
                          </label>
                     </div>
                     <div class="form-group">
                        <label class="lab">Discount Value</label>
                        <input type="number" class="form-control" placeholder="Enter Discount Value" id="provalu" min="1">
                     </div>
                     <div class="form-group">
                        <label class="lab">Display Price</label>
                        <input type="number" class="form-control" placeholder="Enter Display Price" id="prodisp" min="1" readonly>
                     </div>
					 
					 
					 
					 <div class="form-group">
                        <label class="lab">Packing Charge</label>
                        <input type="number" class="form-control" placeholder="Enter Packing Charge" id="propack" min="1">
                     </div>
					 <div class="form-group">
                        <label class="lab">GST</label>
                        <input type="number" class="form-control" placeholder="Enter GST" id="progst" min="1">
                     </div>
					 <div class="form-group">
                        <label class="lab">Delivery Charge</label>
                        <input type="number" class="form-control" placeholder="Enter Display Price" id="prodeli" min="1">
                     </div>
					 
					 
					 



                     <div class="form-group">
                        <label class="lab">Image</label>
                        <input type="file" id="proimag" accept="image/*">
                     </div>
                     <div id="proerr" class="err"></div>
                     <center><button type="button" class="btn btn-success" id="submitpro">Submit</button></center>
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
         
         $("#liprod").addClass("active");
         var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
         
         
         $(document).on("click", "#submitpro", function(){
         var cate=$("#cate option:selected").attr("id");
         var subcate=$("#subcate option:selected").attr("id");
         var proname=$("#proname").val();
         var prodesc=$("#prodesc").val();
         var proimag=$("#proimag").val();
         var proquan=$("#proquan").val();
         var prounit=$("#prounit").val();
         var proactu=$("#proactu").val();
         var prodis=$("input[name='prodis']:checked").val();
         var provalu=$("#provalu").val();
         var prodisp=$("#prodisp").val();
		 
		 var propack=$("#propack").val();
		 var progst=$("#progst").val();
		 var prodeli=$("#prodeli").val();
		 
		 
         if(((cate!="")&&(cate!=0)&&(typeof cate!== "undefined"))&&((subcate!="")&&(subcate!=0)&&(typeof subcate!== "undefined"))&&(proname.replace(/\s/g, '').length)&&(prodesc.replace(/\s/g, '').length)&&(proimag!="")&&(proquan.replace(/\s/g, '').length)&&((prounit!="")&&(prounit!=0)&&(typeof prounit!== "undefined"))&&(proactu.replace(/\s/g, '').length)&&((prodis!="")&&(prodis!=0)&&(typeof prodis!== "undefined"))&&(provalu.replace(/\s/g, '').length)&&(prodisp.replace(/\s/g, '').length)&&(propack.replace(/\s/g, '').length)&&(progst.replace(/\s/g, '').length)&&(prodeli.replace(/\s/g, '').length)){
         //alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
         //alert("dsa")
         var filetype=$("#proimag")[0].files[0].type;
         if (($.inArray(filetype, iformat) !== -1)) {
          //alert("dsa")
         var formData = new FormData();
          formData.append('product', "product");
         formData.append('com', "com");
            formData.append('insert', "insert");
            formData.append('catep', cate);
            formData.append('subcate', subcate);
            formData.append('proname', proname);
            formData.append('prodesc', prodesc); 
            

            formData.append('proquan', proquan); 
            formData.append('prounit', prounit); 
            formData.append('proactu', proactu); 
            formData.append('prodis', prodis); 
            formData.append('provalu', provalu); 
            formData.append('prodisp', prodisp); 
			
			
			formData.append('propack', propack); 
			formData.append('progst', progst); 
			formData.append('prodeli', prodeli); 



            formData.append('proimagname', $("#proimag")[0].files[0].name); 
            formData.append('proimage', $("#proimag")[0].files[0]);
         $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:formData,
                    contentType: false, 
                    processData: false,                
                     success : function(data){
         //alert(data);
         if(data==1){
         $("#proname").val("");
         $("#prodesc").val("");
         $("#proimag").val("");
         $("#cate option:selected").prop("selected", false);
         $("#subcate option:selected").prop("selected", false)
         $.redirect("products.php","_self");
         }
         else{
         $("#proerr").html("This Product Already Exists").show().fadeOut(3000);
         }
                     }
                 });
         }
         else{
         $("#proerr").html("Select the Image File").show().fadeOut(3000);
         }
         }
         else{
         $("#proerr").html("Enter all the values").show().fadeOut(3000);
         }
         });
         
         
             
         $('input').keyup(function (e) {
                    if (e.which === 13) {
                 var index = $('input').index(this) + 1;
                 $('input').eq(index).focus();
             }
         });   
         
         
         
         $('#cate').on('change', function(){       
       var val= $("#cate option:selected").attr("id");        
        var sub = $('#subcate');
        $('option', sub).filter(function(){
            if ($(this).attr('data-group') === val) {
                $(this).show();
            } else {
                $(this).hide();
                $('#subcate').val("");
                $("#subcate option:selected").prop("selected", false)
            }
        });
    });
       


    $(document).on("change","input[name='prodis']",function(){
      //alert("change input typtpppp");
      var prodischkyc=$("input[name='prodis']:checked").val();
     if(((prodischkyc!="")&&(prodischkyc!=0)&&(typeof prodischkyc!== "undefined"))&&(($("#provalu").val()).replace(/\s/g, '').length))
      $("#provalu").keyup();
    });  
    


    $(document).on("keyup change","#proactu",function(){
      //alert("change actual");
      var prodischkya=$("input[name='prodis']:checked").val();
      if(((prodischkya!="")&&(prodischkya!=0)&&(typeof prodischkya!== "undefined"))&&(($("#provalu").val()).replace(/\s/g, '').length))
      $("#provalu").keyup();
    }); 



    $(document).on("keyup change","#provalu",function(){
      //alert("keyup");
      var prodischky=$("input[name='prodis']:checked").val();
      if(((prodischky!="")&&(prodischky!=0)&&(typeof prodischky!== "undefined"))&&(($("#proactu").val()).replace(/\s/g, '').length))
      {
        //alert($("input[name='prodis']:checked").val())
        if(($("input[name='prodis']:checked").val())=="percent")
        {
         //alert("ads")
         var acamtp=parseInt($("#proactu").val());
         var diamtp=parseInt($("#provalu").val());
         if(diamtp<100){
          var discountamt=(diamtp/100)*acamtp;
          var amtdispp=acamtp-discountamt;
		  amtdispp=amtdispp.toFixed(0);
          if((acamtp>amtdispp)&&(amtdispp>0))
          {$("#prodisp").val(amtdispp);}
	      else
		  {alert("Display amount should be less than actual amount");
	       //$("#provalu").val("");
	       $("#prodisp").val("");
	  }
	      //$("#prodisp").keyup();//gst();
         }
         else{
          alert("Percentage value should be Less Than  100");
          $("#provalu").val("");
          $("#prodisp").val("");
         }
        }
        else
        {
          var acamt=parseInt($("#proactu").val());
          var diamt=parseInt($("#provalu").val());
          if(acamt>diamt)
           {
            //alert("Fsd")
            var amtdisp=acamt-diamt;
            $("#prodisp").val(amtdisp);
			//$("#prodisp").keyup();//gst();
            }
           else
           {
             alert("Discount Amount should be Less Than Actual Amount");
             $("#provalu").val("");
             $("#prodisp").val("");
           } 
      }
    }
      else
      {
        alert("Actual Amount and Discount Type are Required");
        $("#provalu").val("");
      }
 });    




    /* $(document).on("keyup change","#prodisp",function(){
	  var display_price=parseInt($("#prodisp").val());
	  gst=(18/100)*display_price;
	  gst=gst.toFixed(2);
	  $("#progst").val(gst);
	   
   });*/
 


 
      
    });     
         
         
         
      </script>
   </body>
</html>