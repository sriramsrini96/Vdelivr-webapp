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

    <title>Payments- OON APP</title>

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
            <!--<h1>View and Edit <small>Payments</small></h1>-->
			<h1>Payments</h1>
            <ol class="breadcrumb">
              <!--li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li-->
             <!-- <li><a href="#"><i class="fa fa-edit"></i> Edit Payments</a></li>
              <li class="addbtn"><button type="button" class="btn btn-primary" id="addpay">Add</button></li>-->
			  <li><a href="#"><i class="fa fa-edit"></i>  Payments</a></li>
            </ol>
          </div>
        </div><!-- /.row -->




     <div class="row" id="payl">
          <div class="col-lg-12">
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM payments WHERE status=1");
       $query->execute();
       $count = $query->fetchColumn();
      if ($count !=0)
      {
        
         ?>
            <div class="table-responsive">
              <table class="tabdis"  border="1" id="paylist">
                <thead>
                  <tr>
                    <th>PAYMENT ID</th>
                    <th>ORDER ID</th>
                    <th>USER NAME</th>
					<th>TRANSACTION ID</th>
					<th>AMOUNT</th>
                    <th>DATE</th>
                    <!--<th>PAYMENT STATUS</th>
                    <th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>-->
                  </tr>
                </thead>
                <tbody>

                <?php

$sel=$conn->prepare("SELECT payments.id,payments.order_id,user.name,payments.razorpay_payment_id,payments.amount,payments.date FROM payments INNER JOIN user ON payments.user_id=user.id  WHERE payments.status=1");
$sel->execute();
while($row = $sel->fetch())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";

echo "<td>" . $row['order_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";



echo "<td>" . $row['razorpay_payment_id'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row['date'] . "</td>";


//echo "<td><button type='button' class='btn btn-primary vieword' id=".$row['id']." data-toggle='modal' data-target='#vieword'>view</button></td>";
//echo "<td><button type='button' class='btn btn-primary editord' id=".$row['id']." data-toggle='modal' data-target='#editord'>edit</button></td>";
//echo "<td><button type='button' class='btn btn-danger deleteord' id=".$row['id']." data-toggle='modal' data-target='#deleteord'>delete</button></td>";
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




<!--<div class="modal" id="deleteord">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="formtop content" autocomplete="off">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="reg"> <b>DELETE ORDER</b></h2>
        <h3>Are you sure to remove the ORDER with</h3>
       <div class="form-group">
      <label for="dordid">ORDER ID</label>
      <input type="text" class="form-control" id="dordid" name="dordid" style="width:100%" readonly>
      </div>     
     <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteorder">DELETE</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
  </div>
    </div>
  </div>
</div>-->







    <?php include"footer.php" ?>
    

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#lipaym").addClass("active");
    $('#paylist').DataTable();
    /*var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];
    var editupim,editupim2;
     




$(document).on('click', '.viewcat', function(){  
           var catid = $(this).attr("id");                      
           $.ajax({  
                url:"crudaction.php",  
                method:"POST",  
                data:{catid :catid },
                 dataType:"json",   
                success:function(data){                            
                     $('#vcatid').val(data.id);  
                     $('#vcatname').val(data.name);                    
                     $('#vcatdesc').val(data.description);
                      origpath=data.image;
                      imgpath="upload/catimg/";
                      imgpath+=origpath;
                      $("#vcatimg").attr("src",imgpath); 
                      $("#editimgfile").val("");
                      origpath2=data.image2;
                      imgpath2="upload/catimg/";
                      imgpath2+=origpath2;
                      $("#vcatimg2").attr("src",imgpath2); 
                      $("#editimgfile2").val("");  

                     }  
           });  
      });  



 $(document).on('click', '.editcat', function(){  
           var catid = $(this).attr("id");                      
           $.ajax({  
                url:"crudaction.php",  
                method:"POST",  
                data:{catid :catid },
                 dataType:"json",   
                success:function(data){                            
                     $('#ecatid').val(data.id);  
                     $('#ecatname').val(data.name);    
                     $('#ecatdesc').val(data.description);                
                     eorigpath=data.image;
                     editupim=data.image;
                     // alert(eorigpath);
                      eimgpath="upload/catimg/";
                      eimgpath+=eorigpath;                      
                    //  alert(eimgpath);
                      $("#ecatimg").attr("src",eimgpath);   
                      $("#ecatimag").val("");    

                      eorigpath2=data.image2;
                       editupim2=data.image2;
                     // alert(eorigpath2);
                      eimgpath2="upload/catimg/";
                      eimgpath2+=eorigpath2;                      
                     // alert(eimgpath2);
                      $("#ecatimg2").attr("src",eimgpath2);   
                      $("#ecatimag2").val("");                  
                     }  
           });  
      });  




$(document).on('click', '#updatecat', function(){          
            var ecatid = $('#ecatid').val();
            var ecatname=$('#ecatname').val();
            var ecatdesc=$('#ecatdesc').val();
            var ecatimg="";
            var ecatimg2="";
            var ecattype="",ecattype2="";
            if($("#ecatimag").val()!="")
           { ecatimg=$("#ecatimag")[0].files[0].name;
              ecattype=$("#ecatimag")[0].files[0].type;
       }
       else
        ecatimg=editupim;
       //alert("sdfsdfsdf")
       if($("#ecatimag2").val()!="")
           { ecatimg2=$("#ecatimag2")[0].files[0].name;
              ecattype2=$("#ecatimag2")[0].files[0].type;
       }
       else
        ecatimg2=editupim2;
       //alert($("#ecatimag")[0].files[0]+"dfhdgfh"+$("#ecatimag2")[0].files[0])
            var editformData = new FormData();
            editformData.append('com', "com");      
        editformData.append('ecatid', ecatid);
        editformData.append('catname', ecatname);
        editformData.append('catdesc', ecatdesc);
        editformData.append('catimagname',ecatimg);
        editformData.append('imgcheck',$("#ecatimag").val());
        editformData.append('ecatimag', $("#ecatimag")[0].files[0]);  
        editformData.append('catimagname2',ecatimg2);
        editformData.append('imgcheck2',$("#ecatimag2").val());
        editformData.append('ecatimag2', $("#ecatimag2")[0].files[0]);  
        //checkimg($("#ecatimag2"));
        //alert("sdfsdfsdf");       
          if((ecatname.replace(/\s/g, '').length)&&(ecatdesc.replace(/\s/g, '').length)){
            //alert("sdfsdfsdf");
            if((ecatimg=="")&&(ecatimg2==""))  {
            //alert("sdfsdfsdf");          
           $.ajax({  
                url:"crudaction.php",  
                method:"POST",                   
                data: editformData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  //alert(data);  
                  if(data==1){
                  $("#catl").html("");                   
                   $("#editclose").click();
          $("#catl").load("categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            }); } 
            else {
              //alert(data);
                //if(data="not updated sub-category already exists")
                $("#ecaterr").html("This Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });
             }

            else{
              checkimg1=checkimg($("#ecatimag"));
              checkimg2=checkimg($("#ecatimag2"));
              if (((checkimg1==0)||(checkimg1==2))&&((checkimg2==0)||(checkimg2==2))){
  //alert("asdads correct")
              $.ajax({  
                url:"crudaction.php",  
                method:"POST",                  
                data: editformData, 
                contentType: false, 
                processData: false,
                success : function(data){ 
                  alert(data);  
                  if(data==1){
                  $("#catl").html("");                   
                   $("#editclose").click();
          $("#catl").load("categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            }); } 
            else {
                $("#ecaterr").html("This Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });

            }
            else
              $("#ecaterr").html("Select the Image file").show().fadeOut(3000);
          }



              }
           else{            
             $("#ecaterr").html("Enter All the Values").show().fadeOut(3000);
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

$(document).on('click', '.deletecat', function(){  
           var catid = $(this).attr("id"); 
           $('#dcatid').val(catid); 
           //alert(userid);
                });  




$(document).on('click', '#deletecate', function(){  
           var catid =  $('#dcatid').val();           
           //alert(catid);
           $.ajax({  
                url:"crudaction.php",  
                method:"POST",  
                data:{dcatid :catid }, 
                success : function(data){ 
                  alert(data); 
                  if(data==1){ 
                  $("#catl").html("");

          $("#catl").load("Categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            });  

            }         
                  }              
           });
      }); 


 

    $(document).on('click', '#addord', function(){  
  $.redirect("addorders.php","_self");
           
      });  
         
 $('input').keyup(function (e) {
                if (e.which === 13) {
             var index = $('input').index(this) + 1;
             $('input').eq(index).focus();
         }
     });   */

 }); 







</script>
  </body>
</html>