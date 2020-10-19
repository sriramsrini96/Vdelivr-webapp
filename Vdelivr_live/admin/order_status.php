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

    <title>Order_Status- OON APP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssindex/csstable.css">
	<link rel="stylesheet" href="cssindex/cssbreadcrumb.css">

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>change order status</h1>
            <ol class="breadcrumb">
              <li><a href="order.php"><i class="fa fa-arrow-left"></i> Back To Orders</a></li>
            </ol>
          </div>
        </div><!-- /.row -->


        <div class="row" id="editorst">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div>
                     <b>
                        <center class="addhead">EDIT ORDER STATUS</center>
                     </b>
                  </div>
                  <form role="form">
                     <div class="form-group">
                        <label class="lab">Order Id</label>
                        <input type="text" class="form-control" id="editorstid" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">User Id</label>
                        <input type="text" class="form-control" id="editorstuser" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Products</label>
                        <textarea class="form-control" rows="3" id="editorstpro" readonly></textarea>
                     </div>
                     <div class="form-group">
                        <label class="lab">Quantity</label>
                        <input type="text" class="form-control" id="editorstquan"  readonly>
                     </div>
					 <div class="form-group">
                        <label class="lab">Amount</label>
                        <input type="number" class="form-control" id="editorstam" readonly>
                     </div>
                     <div class="form-group">
                        <label class="lab">Order status</label>
                        <select class="form-control" id="edit_order_status">
                           <option value = "">---Select Status---</option>
						   <option value = "cancelled" id="0">cancelled</option>
                           <option value = "ordered" id="1">ordered</option>
                           <option value = "intransit" id="2">intransit</option>
                           <option value = "delivered" id="3">delivered</option>
                        </select>
                     </div>
                     <div id="editorsterr" class="err"></div>
                     <center><button type="button" class="btn btn-success" id="upsubmitorst">Submit</button></center>
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
	    $("#liorde").addClass("active");
        $("#editorstid").val("");
        $("#editorstuser").val("");
        $("#editorstpro").val("");
        $("#editorstquan").val("");
        $("#editorstam").val("");
        $("#edit_order_status option:selected").prop("selected", false);
        var orderid=<?php echo $_POST['orderid']?>;

        $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{change_order_status:"change_order_status",orderid :orderid },
                dataType:"json",   
                success:function(data){ 
                    $("#editorstid").val(data.id);
                    $("#editorstuser").val(data.user_id);
                    $("#editorstpro").val(data.name);
                    $("#editorstquan").val(data.quantity);
                    $("#editorstam").val(data.amount);
                    $("#edit_order_status option[id='"+data.order_status+"']").attr("selected",true);
                     }  
           }); 




$(document).on("click", "#upsubmitorst", function(){
         var editorstid=$("#editorstid").val();
         var edit_order_status=$("#edit_order_status option:selected").attr("id");
		  //alert(editorstid+edit_order_status);
         if((editorstid.replace(/\s/g, '').length)&&((edit_order_status!="")&&(typeof edit_order_status!== "undefined"))){
           // alert(editorstid+edit_order_status);
             $.ajax({
                    url: "subcategoryaction.php",
                    type: "POST",                
                    data:{change_order_status:"change_order_status",editorstid :editorstid,edit_order_status:edit_order_status },               
                    success : function(data){
						//alert(data);
                      if(data==1){
                         $.redirect("order.php","_self");
                      }
                      else{
                        $("#editorsterr").html("Order Status Not Changed").show().fadeOut(3000);
                      }
                    }
                });
         
         }
         else{
         $("#editorsterr").html("Order Status Not Selected").show().fadeOut(3000);
         }
     });

 }); 
</script>
  </body>
</html>