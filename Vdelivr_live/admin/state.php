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

    <title>StateMaster- OON APP</title>

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
            <h1>View and Edit <small>State</small></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit State</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addstate">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="statel">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM statemaster WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="statelist">
                <thead>
                  <tr>
                    <th>STATE ID</th>
                    <th>STATE NAME</th>                    
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT * FROM statemaster WHERE status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";


echo "<td>" . $row['state'] . "</td>";


//echo "<td><button type='button' class='btn btn-primary viewcat' id=".$row['id']." data-toggle='modal' data-target='#viewcat'>view</button></td>";
echo "<td><button type='button' class='btn btn-primary editstate' id=".$row['id']." data-toggle='modal' data-target='#editstate'>edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletestate' id=".$row['id']." data-toggle='modal' data-target='#deletestate'>delete</button></td>";
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



        <!--div class="row rowmar" id="addstate">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div><b><center class="addhead">ADD STATE</center></b></div>
            <form role="form"> 
              <div class="form-group">
                <label class="lab">State Name</label>
                <input type="text" class="form-control" placeholder="Enter Category Name" id="statename">
              </div>
              <div id="stateerr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitstate">Submit</button></center>
            </form>

          </div>
          <div class="col-lg-3"></div>
          
        </div--><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->





<div class="modal" id="editstate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>EDIT STATE</b></h2>
       <div class="form-group">
      <label for="estateid">STATE ID</label>
      <input type="text" class="form-control" id="estateid" name="estateid" style="width:100%" readonly>
      </div>

     <div class="form-group">
         <label for="estatename">STATE NAME</label>
         <input type="text" class="form-control" id="estatename" name="estatename" style="width:100%">
      </div>

      
    
      
      
              <div id="estateerr" class="err"></div>


     <button type="button" class="btn btn-success"  id="updatestate">UPDATE</button>  
     <button type="button" class="btn btn-default" data-dismiss="modal" id="editclose">CLOSE</button>
  </div>

    </div>
  </div>
</div>


<div class="modal" id="deletestate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE STATE</b></h2>
        <h3>Are you sure to remove the STATE with</h3>
       <div class="form-group">
      <label for="dstateid">STATE ID</label>
      <input type="text" class="form-control" id="dstateid" name="dstateid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletest">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
    $("#listate").addClass("active");
    $('#statelist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');

     
    /*$(document).on("click", "#submitstate", function(){

   var statename=$("#statename").val();
   
    if((statename.replace(/\s/g, '').length)){
    	
      //alert("filetype : "+statename);
    	
         $.ajax({
                url: "stateaction.php",
                type: "POST",                
                data:{com:"com",insert:"insert",statename:statename},
                success : function(data){
alert(data);
if(data==1){
$("#statename").val("");
 
                  $("#statel").html("");

          $("#statel").load("state.php #statel",function()
            {
              $('#statelist').DataTable();               
            });           
}
else{
   $("#stateerr").html("This State Already Exists").show().fadeOut(3000);
}
                 }
             });


    }
    else{
    	$("#stateerr").html("Enter the State Name").show().fadeOut(3000);
    }
});*/







 $(document).on('click', '.editstate', function(){  
           var estateid = $(this).attr("id");                      
           $.ajax({  
                url:"stateaction.php",  
                method:"POST",  
                data:{estateid :estateid },
                 dataType:"json",   
                success:function(data){                            
                     $('#estateid').val(data.id);  
                     $('#estatename').val(data.state); 
                     }  
           });  
      });  




$(document).on('click', '#updatestate', function(){          
            var ustateid=$('#estateid').val();
            var estatename=$('#estatename').val();
          if((estatename.replace(/\s/g, '').length)){

             $.ajax({
                url: "stateaction.php",
                type: "POST",                
                data:{com:"com",ustateid:ustateid,statename:estatename},
                success : function(data){
//alert(data);
if(data==1){
$("#editclose").click();
 
                  $("#statel").html("");

          $("#statel").load("state.php #statel",function()
            {
              $('#statelist').DataTable();               
            });           
}
else{
   $("#estateerr").html("This State Already Exists").show().fadeOut(3000);
}
                 }
             });
            
           
              }
           else{            
             $("#estateerr").html("Enter the State").show().fadeOut(3000);
          }  
      }); 






$(document).on('click', '.deletestate', function(){  
           var dstateid = $(this).attr("id"); 
           $('#dstateid').val(dstateid); 
           //alert(userid);
                });  




$(document).on('click', '#deletest', function(){  
           var dstate =  $('#dstateid').val();           
           //alert(catid);
           $.ajax({  
                url:"stateaction.php",  
                method:"POST",  
                data:{dstate :dstate }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#statel").html("");

          $("#statel").load("state.php #statel",function()
            {
              $('#statelist').DataTable();               
            });           

            }         
                  }              
           });
      }); 


$(document).on('click', '#addstate', function(){  
  $.redirect("addstate.php","_self");
           
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