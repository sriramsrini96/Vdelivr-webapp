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

    <title>Banner- OON APP</title>

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
            <h1>View and Edit <small>Banners</small></h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit Banners</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addban">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="banl">
          <div class="col-lg-12">
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM bannermaster WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="banlist">
                <thead>
                  <tr>
                    <th>BANNER ID</th>
                    <th>BANNER NAME</th>
                    <th>BANNER IMAGE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT id,name  FROM bannermaster WHERE status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td><img src=upload/banimg/".$row['name']." class='img-responsive' alt='img' style='width:100%;max-width:100px'></td>";

echo "<td><button type='button' class='btn btn-primary editban' id=".$row['id'].">edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deleteban' id=".$row['id']." data-toggle='modal' data-target='#deleteban'>delete</button></td>";
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




<div class="modal" id="deleteban">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE BANNER</b></h2>
        <h3>Are you sure to remove the BANNER with</h3>
       <div class="form-group">
      <label for="dbanid">BANNER ID</label>
      <input type="text" class="form-control" id="dbanid" name="dbanid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletebanner">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#libann").addClass("active");
    $('#banlist').DataTable();
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
    var editupim,editupim2;

$(document).on('click', '.deleteban', function(){  
           var banid = $(this).attr("id"); 
           $('#dbanid').val(banid);
                });  




$(document).on('click', '#deletebanner', function(){  
           var banid =  $('#dbanid').val();           
           //alert(catid);
           $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{banner:"banner",dbanid :banid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#banl").html("");

          $("#banl").load("banner.php #banl",function()
            {
              $('#banlist').DataTable();               
            });  

            }         
                  }              
           });
      }); 


 

    $(document).on('click', '#addban', function(){  
  $.redirect("addbanner.php","_self");
           
      });  
         
   $(document).on('click', '.editban', function(){  
	        var vebanid = $(this).attr("id");  
            $.redirect("editban.php",{vebanid:vebanid},"POST","_self");
          });

 }); 







</script>
  </body>
</html>