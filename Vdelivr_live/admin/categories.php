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

    <title>Categories- OON APP</title>

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
            <!--<h1>View and Edit <small>Categories</small></h1>-->
            <h1>Categories</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
              <li><a href="#"><i class="fa fa-edit"></i> Edit Categories</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addcat">Add</button></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="catl">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       //$query=$conn->prepare("SELECT COUNT(*) FROM categories WHERE status=1");
       $query=$conn->prepare("SELECT COUNT(*) FROM categories");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="catelist">
                <thead>
                  <tr>
                    <th>CATEGORY ID</th>
                    <th>CATEGORY NAME</th>
                    <th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>

                <?php

//$sel=$conn->prepare("SELECT * FROM categories WHERE status=1");
$sel=$conn->prepare("SELECT * FROM categories");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 


//while($row = mysqli_fetch_array($result))
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";


echo "<td>" . $row['name'] . "</td>";


echo "<td><button type='button' class='btn btn-primary viewcat' id=".$row['id']." data-toggle='modal' data-target='#viewcat'>view</button></td>";
echo "<td><button type='button' class='btn btn-primary editcat' id=".$row['id']." data-toggle='modal' data-target='#editcat'>edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletecat' id=".$row['id']." data-toggle='modal' data-target='#deletecat'>delete</button></td>";
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

<div class="modal" id="viewcat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>VIEW CATEGORY</b></h2>
       <div class="form-group">
      <label for="vcatid">CATEGORY ID</label>
      <input type="text" class="form-control" id="vcatid" name="vcatid" style="width:100%" readonly>
      </div>

     <div class="form-group">
         <label for="vcatname">CATEGORY NAME</label>
         <input type="text" class="form-control" id="vcatname" name="vcatname" style="width:100%" readonly>
      </div>

      <div class="form-group">
      <label for="vcatdesc">CATEGORY DESCRIPTION</label>
      <textarea type="text" class="form-control" id="vcatdesc" name="vcatdesc" style="width:100%" readonly></textarea>
      </div> 

      <img id="vcatimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
      <img id="vcatimg2"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
       
     <button type="button" class="btn btn-default" data-dismiss="modal" id="viewclose">CLOSE</button>
  </div>

    </div>
  </div>
</div>



<div class="modal" id="editcat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>EDIT CATEGORY</b></h2>
       <div class="form-group">
      <label for="ecatid">CATEGORY ID</label>
      <input type="text" class="form-control" id="ecatid" name="ecatid" style="width:100%" readonly>
      </div>

     <div class="form-group">
         <label for="ecatname">CATEGORY NAME</label>
         <input type="text" class="form-control" id="ecatname" name="ecatname" style="width:100%">
      </div>

      <div class="form-group">
      <label for="ecatdesc">CATEGORY DESCRIPTION</label>
      <textarea type="text" class="form-control" id="ecatdesc" name="ecatdesc" style="width:100%"></textarea>
      </div> 

      <img id="ecatimg"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
      
      <div class="form-group">
                <label class="lab">IF NEED,CHANGE IMAGE</label>
                <input type="file" id="ecatimag" accept="image/*">
              </div>


      <img id="ecatimg2"  class="img-responsive" alt="img" style="width:100%;max-width:100px">
      
      <div class="form-group">
                <label class="lab">IF NEED,CHANGE IMAGE</label>
                <input type="file" id="ecatimag2" accept="image/*">
              </div>
              <div id="ecaterr" class="err"></div>


     <button type="button" class="btn btn-success"  id="updatecat">UPDATE</button>  
     <button type="button" class="btn btn-default" data-dismiss="modal" id="editclose">CLOSE</button>
  </div>

    </div>
  </div>
</div>


<div class="modal" id="deletecat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE CATEGORY</b></h2>
        <h3>Are you sure to remove the CATEGORY with</h3>
       <div class="form-group">
      <label for="dcatid">CATEGORY ID</label>
      <input type="text" class="form-control" id="dcatid" name="dcatid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletecate">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>  





<!-- 

    <?php include"footer.php" ?> -->
    


  </body>
</html>