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
              <li><a href="#"><i class="fa fa-edit"></i> Edit Products</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addpro">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="prol">
          <div class="col-lg-12">
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM products WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="prolist">
                <thead>
                  <tr>
                    <th>PRODUCT ID</th>
                    <th>CATEGORY NAME</th>
                    <th>SUB-CATEGORY NAME</th>
                    <th>PRODUCT NAME</th>
                    <th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT products.id,products.name,products.description,categories.name AS category,sub_categories.name AS sub_category FROM products INNER JOIN  categories ON products.category_id=categories.id INNER JOIN sub_categories ON products.sub_category_id=sub_categories.id WHERE products.status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";

echo "<td>" . $row['category'] . "</td>";
echo "<td>" . $row['sub_category'] . "</td>";



echo "<td>" . $row['name'] . "</td>";


echo "<td><button type='button' class='btn btn-primary viewpro' id=".$row['id'].">view</button></td>";
echo "<td><button type='button' class='btn btn-primary editpro' id=".$row['id'].">edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletepro' id=".$row['id']." data-toggle='modal' data-target='#deletepro'>delete</button></td>";
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




<div class="modal" id="deletepro">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE PRODUCT</b></h2>
        <h3>Are you sure to remove the PRODUCT with</h3>
       <div class="form-group">
      <label for="dproid">PRODUCT ID</label>
      <input type="text" class="form-control" id="dproid" name="dproid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteprod">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  







    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#liprod").addClass("active");
    $('#prolist').DataTable();
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
    var editupim,editupim2;
     




$(document).on('click', '.viewpro', function(){  
           var viewproid = $(this).attr("id"); 
           $.redirect("viewpro.php",{veproid:viewproid},"POST","_self"); 
      });  



 $(document).on('click', '.editpro', function(){  
           var editproid = $(this).attr("id");   
           $.redirect("editpro.php",{veproid:editproid},"POST","_self");  
      });  

$(document).on('click', '.deletepro', function(){  
           var delpid = $(this).attr("id"); 
           $('#dproid').val(delpid); 
           //alert(userid);
                });  




$(document).on('click', '#deleteprod', function(){  
           var delproid =  $('#dproid').val();           
           //alert(catid);
           $.ajax({  
                url:"subcategoryaction.php",  
                method:"POST",  
                data:{product:"product",delproid :delproid }, 
                success : function(data){ 
                  //alert(data); 
                  if(data==1){ 
                  $("#prol").html("");

          $("#prol").load("products.php #prol",function()
            {
              $('#prolist').DataTable();               
            });  

            }         
                  }              
           });
      }); 


 

    $(document).on('click', '#addpro', function(){  
  $.redirect("addproducts.php","_self");
      });  
         
 
 }); 







</script>
  </body>
</html>