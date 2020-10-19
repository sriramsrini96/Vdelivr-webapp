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

    <title>PinCodeMaster- OON APP</title>

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
            <h1>View and Edit <small>pincode</small></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit PinCode</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addpincode">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="pinl">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM pincodemaster WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="pinlist">
                <thead>
                  <tr>
                    <th>PINCODE ID</th>
                    <th>STATE</th>
                    <th>CITY NAME</th>
                     <th>PINCODE</th>                   
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT pincodemaster.id,pincodemaster.city_id,pincodemaster.pincode,citymaster.city,statemaster.state FROM pincodemaster INNER JOIN citymaster  ON pincodemaster.city_id=citymaster.id INNER JOIN statemaster ON pincodemaster.state_id=statemaster.id WHERE pincodemaster.status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";

echo "<td>" . $row['state'] . "</td>";

echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['pincode'] . "</td>";



//echo "<td><button type='button' class='btn btn-primary viewcat' id=".$row['id']." data-toggle='modal' data-target='#viewcat'>view</button></td>";
echo "<td><button type='button' class='btn btn-primary editpin' id=".$row['id']." data-toggle='modal' data-target='#editpin'>edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletepin' id=".$row['id']." data-toggle='modal' data-target='#deletepin'>delete</button></td>";
echo "</tr>";
}?>
<?php //echo "</tbody></table></div>";
      }
?>



                                 
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->



        

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->





<div class="modal" id="editpin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>EDIT PINCODE</b></h2>
       <div class="form-group">
      <label for="epinid">PINCODE ID</label>
      <input type="text" class="form-control" id="epinid" name="epinid" style="width:100%" readonly>
      </div>

     <div class="form-group">
         <label for="epincode">PINCODE </label>
         <input type="number" class="form-control" id="epincode" name="epincode" style="width:100%">
      </div>

      
    
      
      
              <div id="epinerr" class="err"></div>


     <button type="button" class="btn btn-success"  id="updatepin">UPDATE</button>  
     <button type="button" class="btn btn-default" data-dismiss="modal" id="editclose">CLOSE</button>
  </div>

    </div>
  </div>
</div>


<div class="modal" id="deletepin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE PINCODE</b></h2>
        <h3>Are you sure to remove the PINCODE with</h3>
       <div class="form-group">
      <label for="dpinid">PINCODE ID</label>
      <input type="text" class="form-control" id="dpinid" name="dpinid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletepincode">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#lipin").addClass("active");
    $('#pinlist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');
     
   /* $(document).on("click", "#submitcity", function(){

   var cityname=$("#cityname").val();
   
    if((cityname.replace(/\s/g, '').length)){
    	
      //alert("filetype : "+cityname);
    	
         $.ajax({
                url: "pincodeaction.php",
                type: "POST",                
                data:{com:"com",insert:"insert",cityname:cityname},
                success : function(data){
alert(data);
if(data==1){
$("#cityname").val("");
 
                  $("#cityl").html("");

          $("#cityl").load("city.php #cityl",function()
            {
              $('#citylist').DataTable();               
            });           
}
else{
   $("#cityerr").html("This City Already Exists").show().fadeOut(3000);
}
                 }
             });


    }
    else{
    	$("#cityerr").html("Enter the City Name").show().fadeOut(3000);
    }
});
*/






 $(document).on('click', '.editpin', function(){  
           var epinid = $(this).attr("id");                      
           $.ajax({  
                url:"pincodeaction.php",  
                method:"POST",  
                data:{epinid :epinid },
                 dataType:"json",   
                success:function(data){                            
                     $('#epinid').val(data.id);  
                     $('#epincode').val(data.pincode); 
                     }  
           });  
      });  




$(document).on('click', '#updatepin', function(){          
            var upinid=$('#epinid').val();
            var epincode=$('#epincode').val();
          if((epincode.replace(/\s/g, '').length)==6){

             $.ajax({
                url: "pincodeaction.php",
                type: "POST",                
                data:{com:"com",upinid:upinid,pincode:epincode},
                success : function(data){
//alert(data);
if(data==1){
$("#editclose").click();
 
                  $("#pinl").html("");

          $("#pinl").load("pincode.php #pinl",function()
            {
              $('#pinlist').DataTable();               
            });           
}
else{
   $("#epinerr").html("This Pincode Already Exists").show().fadeOut(3000);
}
                 }
             });
            
           
              }
           else{            
             $("#epinerr").html("Enter the Pincode").show().fadeOut(3000);
          }  
      }); 


$('#epincode').keyup(function (e) {
                if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }
        if(((($("#epincode").val()).replace(/\s/g, '').length)>6))
        {$("#epinerr").html("Pincode to be in six digit").show().fadeOut(3000);
      $("#epincode").val("");
    }
     });   


$(document).on('click', '.deletepin', function(){  
           var dpinid = $(this).attr("id"); 
           $('#dpinid').val(dpinid); 
           //alert(userid);
                });  




$(document).on('click', '#deletepincode', function(){  
           var dpinid =  $('#dpinid').val();           
           //alert(catid);
           $.ajax({  
                url:"pincodeaction.php",  
                method:"POST",  
                data:{dpinid :dpinid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#pinl").html("");

          $("#pinl").load("pincode.php #pinl",function()
            {
              $('#pinlist').DataTable();               
            });    

            }         
                  }              
           });
      }); 



  $(document).on('click', '#addpincode', function(){  
  $.redirect("addpincode.php","_self");
           
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