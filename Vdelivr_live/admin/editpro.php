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


        <div class="row" id="editprod">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">EDIT PRODUCT</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Product Id</label>
                        <input type="text" class="form-control" id="editproid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Name</label>
                        <input type="text" class="form-control" id="editproname">
                     </div>
                     <div class="form-group">
                        <label class="lab">Product Description</label>
                        <textarea class="form-control" rows="3" id="editprodesc"></textarea>
                     </div>


                     <div class="form-group">
                        <label class="lab">Quantity/Number</label>
                        <input type="number" class="form-control" id="editproquan" min="1">
                     </div>
                     <div class="form-group">
                        <label class="lab">Units</label>
                        <select class="form-control" id="editprounit">
                           <option value = "">---Select Unit---</option>
                           <option value = "pieces" id="1">pieces</option>
                           <option value = "kg" id="2">kg</option>
                           <option value = "litres" id="3">litres</option>
						   <option value = "gms" id="4">gms</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="lab">Actual Price</label>
                        <input type="number" class="form-control" id="editproactu" min="1">
                     </div>
                     <div class="form-group">                
                          <label class="lab">Discount Type</label><br> 
                          <label class="radio-inline">
                          <input type="radio" name="editprodis" id="editpercent" value="percent"> Percentage
                          </label>
                          <label class="radio-inline">
                          <input type="radio" name="editprodis" id="editamount" value="amount"> Amount
                          </label>
                     </div>
                     <div class="form-group">
                        <label class="lab">Discount Value</label>
                        <input type="number" class="form-control" id="editprovalu" min="1">
                     </div>
                     <div class="form-group">
                        <label class="lab">Display Price</label>
                        <input type="number" class="form-control" id="editprodisp" min="1" readonly>
                     </div>
					 
					 
					 <div class="form-group">
                        <label class="lab">Packing Charge</label>
                        <input type="number" class="form-control" id="editpropack" min="1">
                     </div>
					 <div class="form-group">
                        <label class="lab">GST</label>
                        <input type="number" class="form-control" id="editprogst" min="1">
                     </div>
					 <div class="form-group">
                        <label class="lab">Delivery Charge</label>
                        <input type="number" class="form-control" id="editprodeli" min="1">
                     </div>
					 
					 
					 
                     <div class="form-group">
                        <label class="lab">Image</label>
                        <img id="productimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
                     </div>



                     <div class="form-group">
                        <label class="lab">If Need,Change Image</label>
                        <input type="file" id="editproimag" accept="image/*">
                     </div>
                     <div id="editproerr" class="err"></div>
                     <center><button type="button" class="btn btn-success" id="upsubmitpro">Submit</button></center>
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
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
     $("input:radio[name='editprodis']").each(function(i) {
       this.checked = false;
});
     $("#editproid").val("");
     $("#editproname").val("");
     $("#editprodesc").val("");
     $("#editproquan").val("");
     $("#editprounit").val("");
     $("#editproactu").val("");
    // $("input:radio[name='editprodis'][value="+data.discount_type+"]").prop("checked",true); 
     $("#editprovalu").val("");
      $("#editprodisp").val("");
	  
	   $("#editpropack").val("");
	   $("#editprogst").val("");
	   $("#editprodeli").val("");
	  
      $("#productimg").attr("src","");

var eproid=<?php echo $_POST['veproid']?>;
var viewproimage;
    //alert(vproid);
       $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{product:"product",veproid :eproid },
                 dataType:"json",   
                success:function(data){ 
                //alert("data "+data+""+"id "+data.id+"cate "+data.category+" name "+data.name+" desc "+data.description+" img "+data.images)                           
                    $("#editproid").val(data.id);
                    //$("#editprocat").val(data.category);
                    //$("#editprosubcat").val(data.subcategory);
                    $("#editproname").val(data.name);
                    $("#editprodesc").val(data.description);
                    $("#editproquan").val(data.quantity_number);
                    $("#editprounit").val(data.units);
                    $("#editproactu").val(data.actual_price);
                    $("input:radio[name='editprodis'][value="+data.discount_type+"]").prop("checked",true); 
                    $("#editprovalu").val(data.discount_value);
                    $("#editprodisp").val(data.display_price);
                    $("#productimg").attr("src","upload/proimg/"+data.images);
                    viewproimage=data.images;
					
					$("#editpropack").val(data.packing_charge);
	                $("#editprogst").val(data.gst);
	                $("#editprodeli").val(data.delivery_charge);
					
                     }  
           }); 




$(document).on("click", "#upsubmitpro", function(){
         var editproid=$("#editproid").val();
         var editproname=$("#editproname").val();
         var editprodesc=$("#editprodesc").val();
         //var editproimag=$("#editproimag").val();
         if($("#editproimag").val()!="")
         { editproimag=$("#editproimag")[0].files[0].name;
         }
        else
         editproimag=viewproimage;
         var editproquan=$("#editproquan").val();
         var editprounit=$("#editprounit").val();
         var editproactu=$("#editproactu").val();
         var editprodis=$("input[name='editprodis']:checked").val();
         var editprovalu=$("#editprovalu").val();
         var editprodisp=$("#editprodisp").val();
		 
		 var editpropack=$("#editpropack").val();
	     var editprogst=$("#editprogst").val();
	     var editprodeli=$("#editprodeli").val();
		 
         if((editproname.replace(/\s/g, '').length)&&(editprodesc.replace(/\s/g, '').length)&&(editproimag!="")&&(editproquan.replace(/\s/g, '').length)&&((editprounit!="")&&(editprounit!=0)&&(typeof editprounit!== "undefined"))&&(editproactu.replace(/\s/g, '').length)&&((editprodis!="")&&(editprodis!=0)&&(typeof editprodis!== "undefined"))&&(editprovalu.replace(/\s/g, '').length)&&(editprodisp.replace(/\s/g, '').length)&&(editpropack.replace(/\s/g, '').length)&&(editprogst.replace(/\s/g, '').length)&&(editprodeli.replace(/\s/g, '').length)){
         //alert(editproquan+editprounit+editproactu+editprodis+editprovalu+editprodisp);
         var checkimgck=checkimg($("#editproimag"));
          //alert("adsasd")
         if ((checkimgck==0)||(checkimgck==2)) {
          //alert("dsa")
         var eformData = new FormData();
            eformData.append('product', "product");
            eformData.append('com', "com");
            eformData.append('editproid', editproid);
            eformData.append('proname', editproname);
            eformData.append('prodesc', editprodesc); 
            

            eformData.append('proquan', editproquan); 
            eformData.append('prounit', editprounit); 
            eformData.append('proactu', editproactu); 
            eformData.append('prodis',  editprodis); 
            eformData.append('provalu', editprovalu); 
            eformData.append('prodisp', editprodisp); 
			
			
			eformData.append('propack', editpropack); 
			eformData.append('progst', editprogst); 
			eformData.append('prodeli', editprodeli); 



            eformData.append('proimagname',editproimag); 
            eformData.append('proimagch',$("#editproimag").val()); 
            eformData.append('upproimage', $("#editproimag")[0].files[0]);
         $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:eformData,
                    contentType: false, 
                    processData: false,                
                     success : function(data){
         //alert(data);
         if(data==1){
         $("#editproname").val("");
         $("#editprodesc").val("");
         $("#editproimag").val("");
         $.redirect("products.php","_self");
         }
         else{
         $("#editproerr").html("This Product Already Exists").show().fadeOut(3000);
         }
                     }
                 });
         }
         else{
         $("#editproerr").html("Select the Image File").show().fadeOut(3000);
         }
         }
         else{
         $("#editproerr").html("Enter all the values").show().fadeOut(3000);
         }
         });



       $(document).on("change","input[name='editprodis']",function(){
      //alert("change input typtpppp");
      var prodischkyc=$("input[name='editprodis']:checked").val();
     if(((prodischkyc!="")&&(prodischkyc!=0)&&(typeof prodischkyc!== "undefined"))&&(($("#editprovalu").val()).replace(/\s/g, '').length))
      $("#editprovalu").keyup();
    });  
    


    $(document).on("keyup change","#editproactu",function(){
      //alert("change actual");
      var prodischkya=$("input[name='editprodis']:checked").val();
      if(((prodischkya!="")&&(prodischkya!=0)&&(typeof prodischkya!== "undefined"))&&(($("#editprovalu").val()).replace(/\s/g, '').length))
      $("#editprovalu").keyup();
    }); 



    $(document).on("keyup change","#editprovalu",function(){
      //alert("keyup");
      var prodischky=$("input[name='editprodis']:checked").val();
      if(((prodischky!="")&&(prodischky!=0)&&(typeof prodischky!== "undefined"))&&(($("#editproactu").val()).replace(/\s/g, '').length))
      {
        //alert($("input[name='prodis']:checked").val())
        if(($("input[name='editprodis']:checked").val())=="percent")
        {
         //alert("ads")
         var acamtp=parseInt($("#editproactu").val());
         var diamtp=parseInt($("#editprovalu").val());
         if(diamtp<100){
          var discountamt=(diamtp/100)*acamtp;
          var amtdispp=acamtp-discountamt;
		  amtdispp=amtdispp.toFixed(0);
          if((acamtp>amtdispp)&&(amtdispp>0))
          $("#editprodisp").val(amtdispp);
	      else
		  {alert("Display amount should be less than actual amount");
	  //$("#editprovalu").val("");
	       $("#editprodisp").val("");
	  }
         }
         else{
          alert("Percentage value should be Less Than or Equal to 100");
          $("#editprovalu").val("");
          $("#editprodisp").val("");
         }
        }
        else
        {
          var acamt=parseInt($("#editproactu").val());
          var diamt=parseInt($("#editprovalu").val());
          if(acamt>diamt)
           {
            //alert("Fsd")
            var amtdisp=acamt-diamt;
            $("#editprodisp").val(amtdisp);
            }
           else
           {
             alert("Discount Amount is Greater Than Actual Amount");
             $("#editprovalu").val("");
             $("#editprodisp").val("");
           } 
      }
    }
      else
      {
        alert("Actual Amount and Discount Type are Required");
        $("#editprovalu").val("");
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