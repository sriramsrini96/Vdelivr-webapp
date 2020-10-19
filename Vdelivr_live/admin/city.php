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

    <title>CityMaster- OON APP</title>

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
            <h1>View and Edit <small>City</small></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit City</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addcity">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="cityl">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM citymaster WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="citylist">
                <thead>
                  <tr>
                    <th>CITY ID</th>
                    <th>STATE</th>
                    <th>CITY NAME</th>                    
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT citymaster.id,citymaster.city,statemaster.state FROM citymaster INNER JOIN statemaster ON citymaster.state_id=statemaster.id WHERE citymaster.status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['state'] . "</td>";



echo "<td>" . $row['city'] . "</td>";


//echo "<td><button type='button' class='btn btn-primary viewcat' id=".$row['id']." data-toggle='modal' data-target='#viewcat'>view</button></td>";
echo "<td><button type='button' class='btn btn-primary editcity' id=".$row['id']." data-toggle='modal' data-target='#editcity'>edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletecity' id=".$row['id']." data-toggle='modal' data-target='#deletecity'>delete</button></td>";
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



       <!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->





<div class="modal" id="editcity">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>EDIT CITY</b></h2>
       <div class="form-group">
      <label for="ecityid">CITY ID</label>
      <input type="text" class="form-control" id="ecityid" name="ecityid" style="width:100%" readonly>
      </div>

     <div class="form-group">
         <label for="ecityname">CITY NAME</label>
         <input type="text" class="form-control" id="ecityname" name="ecityname" style="width:100%">
      </div>

      
    
      
      
              <div id="ecityerr" class="err"></div>


     <button type="button" class="btn btn-success"  id="updatecity">UPDATE</button>  
     <button type="button" class="btn btn-default" data-dismiss="modal" id="editclose">CLOSE</button>
  </div>

    </div>
  </div>
</div>


<div class="modal" id="deletecity">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE CITY</b></h2>
        <h3>Are you sure to remove the CITY with</h3>
       <div class="form-group">
      <label for="dcityid">CITY ID</label>
      <input type="text" class="form-control" id="dcityid" name="dcityid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteci">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
   
<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#licity").addClass("active");
    $('#citylist').DataTable(); 
    $("#limaster").addClass("open");
    $('#limdrop').removeAttr('data-toggle');

     
 /*   $(document).on("click", "#submitcity", function(){

   var cityname=$("#cityname").val();
   
    if((cityname.replace(/\s/g, '').length)){
    	
      //alert("filetype : "+cityname);
    	
         $.ajax({
                url: "cityaction.php",
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






 $(document).on('click', '.editcity', function(){  
           var ecityid = $(this).attr("id");                      
           $.ajax({  
                url:"cityaction.php",  
                method:"POST",  
                data:{ecityid :ecityid },
                 dataType:"json",   
                success:function(data){                            
                     $('#ecityid').val(data.id);  
                     $('#ecityname').val(data.city); 
                     }  
           });  
      });  




$(document).on('click', '#updatecity', function(){          
            var ucityid=$('#ecityid').val();
            var ecityname=$('#ecityname').val();
          if((ecityname.replace(/\s/g, '').length)){

             $.ajax({
                url: "cityaction.php",
                type: "POST",                
                data:{com:"com",ucityid:ucityid,cityname:ecityname},
                success : function(data){
//alert(data);
if(data==1){
$("#editclose").click();
 
                  $("#cityl").html("");

          $("#cityl").load("city.php #cityl",function()
            {
              $('#citylist').DataTable();               
            });           
}
else{
   $("#ecityerr").html("This City Already Exists").show().fadeOut(3000);
}
                 }
             });
            
           
              }
           else{            
             $("#ecityerr").html("Enter the City").show().fadeOut(3000);
          }  
      }); 






$(document).on('click', '.deletecity', function(){  
           var dcityid = $(this).attr("id"); 
           $('#dcityid').val(dcityid); 
           //alert(userid);
                });  




$(document).on('click', '#deleteci', function(){  
           var dcyid =  $('#dcityid').val();           
           //alert(catid);
           $.ajax({  
                url:"cityaction.php",  
                method:"POST",  
                data:{dcyid :dcyid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#cityl").html("");

          $("#cityl").load("city.php #cityl",function()
            {
              $('#citylist').DataTable();               
            });    

            }         
                  }              
           });
      }); 



$(document).on('click', '#addcity', function(){  
  $.redirect("addcity.php","_self");
           
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