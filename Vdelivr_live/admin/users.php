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

    <title>Users- OON APP</title>

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
            <h1>Users</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-edit"></i> Edit Users</a></li>
               <li class="addbtn"><button type="button" class="btn btn-primary" id="adduse">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->
     <div class="row" id="userl">
          <div class="col-lg-12">
            <?php
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM user WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="userlist">
                <thead>
                  <tr>
                    <th>USER ID</th>
                    <th>USER NAME</th>
                    <th>VIEW</th>
					<th>ORDER</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT * FROM user WHERE status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";


echo "<td>" . $row['name'] . "</td>";


echo "<td><button type='button' class='btn btn-primary viewuser' id=".$row['id'].">view</button></td>";
echo "<td><button type='button' class='btn btn-primary vieworder' id=".$row['id'].">orders</button></td>";
echo "<td><button type='button' class='btn btn-primary edituser' id=".$row['id'].">edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deleteuser' id=".$row['id']." data-toggle='modal' data-target='#deleteuser'>delete</button></td>";
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






<div class="modal" id="deleteuser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE USER</b></h2>
        <h3>Are you sure to remove the USER with</h3>
       <div class="form-group">
      <label for="duserid">USER ID</label>
      <input type="text" class="form-control" id="duserid" name="duserid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteusere">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
   

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#liuser").addClass("active");
    $('#userlist').DataTable();

$(document).on('click', '.viewuser', function(){  
           var vuserid = $(this).attr("id");
           $.redirect("viewuser.php",{vuserid:vuserid},"POST","_self");
      });


$(document).on('click', '.vieworder', function(){  
           var vouserid = $(this).attr("id");
           $.redirect("vieworder.php",{vouserid:vouserid},"POST","_self");
      });	  



 $(document).on('click', '.edituser', function(){  
           var euserid = $(this).attr("id");
           $.redirect("edituser.php",{euserid:euserid},"POST","_self");
      });  

$(document).on('click', '.deleteuser', function(){  
           var duserid = $(this).attr("id"); 
           $('#duserid').val(duserid); 
           //alert(userid);
                });  

$(document).on('click', '#deleteusere', function(){  
           var duserid =  $('#duserid').val();           
           //alert(catid);
           $.ajax({  
                url:"usersaction.php",  
                method:"POST",  
                data:{duserid :duserid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#userl").html("");

          $("#userl").load("Categories.php #userl",function()
            {
              $('#userlist').DataTable();               
            });  

            }         
                  }              
           });
      });

   $(document).on('click', '#adduse', function(){  
  $.redirect("adduser.php","_self");
      }); 



         
   

 }); 







</script>
  </body>
</html>