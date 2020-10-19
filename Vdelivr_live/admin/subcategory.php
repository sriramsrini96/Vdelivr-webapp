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
            <h1>Sub-Categories</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit Sub-Categories</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addsubcat">Add</button></li>
            </ol>
           </div>
        </div><!-- /.row -->




     <div class="row" id="subcatl">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM sub_categories WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="subcatelist">
                <thead>
                  <tr>
                    <th>SUB-CATEGORY ID</th>
                    <th>CATEGORY NAME</th>
                    <th>SUB-CATEGORY NAME</th>
                    <th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT sub_categories.id,sub_categories.name,sub_categories.description,categories.name AS category FROM sub_categories INNER JOIN  categories ON sub_categories.category_id=categories.id WHERE sub_categories.status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";

echo "<td>" . $row['category'] . "</td>";



echo "<td>" . $row['name'] . "</td>";


echo "<td><button type='button' class='btn btn-primary viewsubcat' id=".$row['id'].">view</button></td>";
echo "<td><button type='button' class='btn btn-primary editsubcat' id=".$row['id'].">edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletesubcat' id=".$row['id']." data-toggle='modal' data-target='#deletesubcat'>delete</button></td>";
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




<div class="modal" id="deletesubcat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE SUB-CATEGORY</b></h2>
        <h3>Are you sure to remove the SUB-CATEGORY with</h3>
       <div class="form-group">
      <label for="dsubcatid">SUB-CATEGORY ID</label>
      <input type="text" class="form-control" id="dsubcatid" name="dsubcatid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletesubcate">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
   </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#lisubc").addClass("active");
    $('#subcatelist').DataTable();
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
    var editupim,editupim2;
     




$(document).on('click', '.viewsubcat', function(){  
           var subcatid = $(this).attr("id"); 
           $.redirect("viewsub.php",{subcatid:subcatid},"POST","_self");                  
      });  



 $(document).on('click', '.editsubcat', function(){  
           var subcatid = $(this).attr("id");  
           $.redirect("editsub.php",{subcatid:subcatid},"POST","_self");                    
      });  


$(document).on('click', '.deletesubcat', function(){  
           var dsubcatid = $(this).attr("id"); 
           $('#dsubcatid').val(dsubcatid); 
           //alert(userid);
     });  




$(document).on('click', '#deletesubcate', function(){  
           var dsubcateid =  $('#dsubcatid').val(); 
           $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{subcategory:"subcategory",dsubcateid :dsubcateid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#subcatl").html("");

          $("#subcatl").load("subcategory.php #subcatl",function()
            {
              $('#subcatelist').DataTable();               
            });  

            }         
                  }              
           });
      }); 


 

    $(document).on('click', '#addsubcat', function(){  
  $.redirect("addsubcategory.php","_self");
      });  

 }); 

</script>
  </body>
</html>