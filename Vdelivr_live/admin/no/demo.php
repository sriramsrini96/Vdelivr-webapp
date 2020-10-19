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

  </head>

  <body>

    <div id="wrapper">
         <?php include "header.php"; ?>
     
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>View and Add <small>here</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href="#addcate"><i class="fa fa-edit"></i>Add Categories</a></li>
            </ol>
            <!--div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a> for more information.
            </div-->
          </div>
        </div><!-- /.row -->




     <div class="row" id="catl">
          <div class="col-lg-12">
            <!--h2>Bordered with Striped Rows</h2-->
            <?php
    
       include "config.php";  
       $query=$conn->prepare("SELECT COUNT(*) FROM categories WHERE status=1");
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

$sel=$conn->prepare("SELECT * FROM categories WHERE status=1");
$sel->execute();
$select = $sel->setFetchMode(PDO::FETCH_ASSOC); 
$row = $sel->fetch();

//while($row = mysqli_fetch_array($result))
//while($row = $sel->fetch())
//{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";


echo "<td>" . $row['name'] . "</td>";


echo "<td><button type='button' class='btn btn-primary viewcat' id=".$row['id']." data-toggle='modal' data-target='#viewcat'>view</button></td>";
echo "<td><button type='button' class='btn btn-primary editcat' id=".$row['id']." data-toggle='modal' data-target='#editcat'>edit</button></td>";
echo "<td><button type='button' class='btn btn-danger deletecat' id=".$row['id']." data-toggle='modal' data-target='#deletecat'>delete</button></td>";
echo "</tr>";
//}
?>
<?php //echo "</tbody></table></div>";
      }
?>



                                 
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->









      

        <div class="row rowmar" id="addcate">
        <div class="col-lg-3">ssaaa</div>
          <div class="col-lg-6">
<div><b><center class="addhead">ADD CATEGORY</center></b></div>
            <form role="form">

              <!--div class="form-group">
                <label>Text Input</label>
                <input class="form-control">
                <p class="help-block">Example block-level help text here.</p>
              </div-->
              
              <div class="form-group">
                <label class="lab">Category Name</label>
                <input type="text" class="form-control" placeholder="Enter Category Name" id="catname">
              </div>

              <!--div class="form-group">
                <label>Static Control</label>
                <p class="form-control-static">email@example.com</p>
              </div-->

              <div class="form-group">
                <label class="lab">Category Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter Category Description" id="catdesc"></textarea>
              </div>
              <div class="form-group">
                <label class="lab">Image</label>
                <input type="file" id="catimag" accept="image/*">
              </div>
              <div id="caterr" class="err"></div>
              <center><button type="button" class="btn btn-success" id="submitcat">Submit</button></center>

              <!--div class="form-group">
                <label>Checkboxes</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  1
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  2
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  3
                  </label>
                </div>
              </div-->

              <!--div class="form-group">
                <label>Inline Checkboxes</label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 1
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 2
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 3
                </label>
              </div-->

              <!--div class="form-group">
                <label>Radio Buttons</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Radio  1
                  </label>
                </div>
               <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Radio  2
                  </label>
                </div>
               <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                    Radio  3
                  </label>
                </div>
              </div-->

              <!--div class="form-group">
                <label>Inline Radio Buttons</label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3"> 3
                </label>
              </div-->

              <!--div class="form-group">
                <label>Selects</label>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div-->

              <!--div class="form-group">
                <label>Multiple Selects</label>
                <select multiple class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div-->

              <!--button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button-->  

            </form>

          </div>
          <div class="col-lg-3">ssaaa</div>
          <!--div class="col-lg-6">
            <h1>Disabled Form States</h1>

            <form role="form">

              <fieldset disabled>

                <div class="form-group">
                  <label for="disabledSelect">Disabled input</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                </div>

                <div class="form-group">
                  <label for="disabledSelect">Disabled select menu</label>
                  <select id="disabledSelect" class="form-control">
                    <option>Disabled select</option>
                  </select>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Disabled Checkbox
                  </label>
                </div>

                <button type="submit" class="btn btn-primary">Disabled Button</button>

              </fieldset>

            </form>

            <h1>Form Validation</h1>

            <form role="form">

              <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Input with success</label>
                <input type="text" class="form-control" id="inputSuccess">
              </div>

              <div class="form-group has-warning">
                <label class="control-label" for="inputWarning">Input with warning</label>
                <input type="text" class="form-control" id="inputWarning">
              </div>

              <div class="form-group has-error">
                <label class="control-label" for="inputError">Input with error</label>
                <input type="text" class="form-control" id="inputError">
              </div>
            
            </form>
            
            <h1>Input Groups</h1>

            <form role="form">

              <div class="form-group input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Username">
              </div>

              <div class="form-group input-group">
                <input type="text" class="form-control">
                <span class="input-group-addon">.00</span>
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                <input type="text" class="form-control" placeholder="Font Awesome Icon">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control">
                <span class="input-group-addon">.00</span>
              </div>
              
              <div class="form-group input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>

            </form>
            
            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

          </div-->
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







    <?php include"footer.php" ?>
    <!--link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script-->

<script type="text/javascript">
     $(document).ready(function(){ 
     
     $("#licate").addClass("active");
    $('#catelist').DataTable();
    var iformat= ["image/jpeg","image/png","image/jpg","image/gif"];

     
    $(document).on("click", "#submitcat", function(){

   var catname=$("#catname").val();
   var catdesc=$("#catdesc").val();
   var catimag=$("#catimag").val(); 
   
   alert("catname   "+catname+"  catdesc  "+catdesc.length+"  catimag "+catimag);
   
    if((catname.replace(/\s/g, '').length)&&(catdesc.replace(/\s/g, '').length)&&(catimag!="")){
    	alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
    var filetype=$("#catimag")[0].files[0].type;
     if ($.inArray(filetype, iformat) !== -1) {
      alert("filetype : "+filetype);
    	var formData = new FormData();
    	formData.append('com', "com");
        formData.append('insert', "insert");
        formData.append('catname', catname);
        formData.append('catdesc', catdesc); 
        formData.append('catimagname', $("#catimag")[0].files[0].name); 
        formData.append('catimage', $("#catimag")[0].files[0]);
        
$.ajax({
                url: "crudaction.php",
                type: "POST",                
                data:formData,
                contentType: false, 
                processData: false,                
                 success : function(data){
alert(data);
if(data==1){
$("#catname").val("");
$("#catdesc").val("");
$("#catimag").val(""); 
                  $("#catl").html("");

          $("#catl").load("categories.php #catl",function()
            {
              $('#catelist').DataTable();               
            });           
}
else{
   $("#caterr").html("This Category Already Exists").show().fadeOut(3000);
}
                 }
             });
}
else{
  $("#caterr").html("Select the Image File").show().fadeOut(3000);
}
    }
    else{
    	$("#caterr").html("Enter all the values").show().fadeOut(3000);
    }
});



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
                      alert(origpath);
                      imgpath="upload/catimg/";
                      imgpath+=origpath;                      
                      alert(imgpath);
                      $("#vcatimg").attr("src",imgpath); 
                      $("#editimgfile").val("");                                                             
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
                      alert(eorigpath);
                      eimgpath="upload/catimg/";
                      eimgpath+=eorigpath;                      
                      alert(eimgpath);
                      $("#ecatimg").attr("src",eimgpath);   
                      $("#ecatimag").val("");                  
                     }  
           });  
      });  




$(document).on('click', '#updatecat', function(){          
            var ecatid = $('#ecatid').val();
            var ecatname=$('#ecatname').val();
            var ecatdesc=$('#ecatdesc').val();
            var ecatimg="";
            if($("#ecatimag").val()!="")
           { ecatimg=$("#ecatimag")[0].files[0].name;
              ecattype=$("#ecatimag")[0].files[0].type;
       }//alert("sdfsdfsdf")
            var editformData = new FormData();
            editformData.append('com', "com");      
        editformData.append('ecatid', ecatid);
        editformData.append('catname', ecatname);
        editformData.append('catdesc', ecatdesc);
        editformData.append('catimagname',ecatimg);
        editformData.append('ecatimag', $("#ecatimag")[0].files[0]);  
        //alert("sdfsdfsdf");       
          if((ecatname.replace(/\s/g, '').length)&&(ecatdesc.replace(/\s/g, '').length)){
            //alert("sdfsdfsdf");
            if(ecatimg=="")  {
            //alert("sdfsdfsdf");          
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
              //alert(data);
                //if(data="not updated sub-category already exists")
                $("#ecaterr").html("This Category Already Exists").show().fadeOut(3000);

            }                   
                  } 
            });
             }

            else{
              if ($.inArray(ecattype, iformat) !== -1){
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


/*$(document).on("click", "#submitcat", function(){

   var catname=$("#catname").val();
   var catdesc=$("#catdesc").val();
   var catimag=$("#catimag").val();
   
   //alert("msg: : "+$("#msg").Editor("getText"));  
   //alert("cate"+cate+"subcate"+subcate+"lan"+lan+"age"+age);
   alert("catname   "+catname+"  catdesc  "+catdesc.length+"  catimag "+catimag);
  
    //if((title!="")&&(name!="")&&(age!="")&&((cate!="")&&(cate!=0)&&(typeof cate!== "undefined"))&&((subcate!="")&&(subcate!=0)&&(typeof subcate!== "undefined"))&&((lan!="")&&(typeof lan!== "undefined"))&&(aimgfile!="")&&(msg!="")&&(file!="")){

    if((catname.replace(/\s/g, '').length)&&(catdesc.replace(/\s/g, '').length)&&(catimag!="")){
    	alert("inside  catname   "+catname+"  catdesc  "+catdesc.length+"  catimg "+catimag);
    	imgresult=checkimg();
    	audresult=checkaud();
    	var aimgfilename=$("#aimgfile")[0].files[0].name;
    	var filename=$("#file")[0].files[0].name;    	
    	 	var dur=$("#duration").val();    	 	
    	 	//alert(dur);    	
    	 if((imgresult==1)&&(audresult==2)){
    	 	var audext = $('#file').val().split('.').pop().toLowerCase();
    	 	var audsize=$("#file")[0].files[0].size;
    	 	var formData = new FormData();
        formData.append('insert', "insert");
        formData.append('tname', catname);
        formData.append('aname', name);
        formData.append('age', age);
        formData.append('cate', cate);
        formData.append('subcate', subcate);        
        formData.append('aimgfilename', aimgfilename);
        formData.append('image', $("#aimgfile")[0].files[0]);
        formData.append('msg', msg); 
        formData.append('filename', filename);
        formData.append('audext', audext);
        formData.append('audsize', audsize);
        formData.append('audio', $("#file")[0].files[0]);
        formData.append('dur',dur);
 


          
             $.ajax({
                url: "addingaction.php",
                type: "POST",                
                data:formData,
                contentType: false, 
                processData: false,
                 success : function(data){
                  //alert(data);
               if(data==1)
               {
                $("#tname").val("");
                $("#aname").val("");
                $("#age").val("");
                $("#cate").val("");
                $("#subcate").val("");                       
                $("#msg").Editor("setText","");  
                $("#file").val("");
                $("#aimgfile").val("");
                $("#duration").val("");

                  

         }   
         else
         if(data==0)   
             $("#erralla").html("Item Already Exist").show().fadeOut(3000);
                   }
                        });
 }
 else{
 	if(imgresult==0)
	  $("#errfili").html("Select  Image File").show().fadeOut(3000);
  else
  {
  	if(audresult==0)
  	$("#errfila").html("Select  Audio File").show().fadeOut(3000);
  else
  	$("#errfila").html("file size to be less than 50 MB").show().fadeOut(3000);
  }
}
     
}
else{
	  $("#erralla").html("Enter all the values").show().fadeOut(3000);
}
    });   
    /*$(document).on("click", "#submit", function(){

   var title=$("#tname").val();
   var name=$("#aname").val();
   var age=$("#age").val();
   var cate=$("#cate option:selected").attr("id");
   var subcate=$("#subcate option:selected").attr("id");
   //var lan=$("#lan option:selected").attr("id");   
   var aimgfile=$("#aimgfile").val();
   var msg=$("#msg").Editor("getText");    
   var file=$("#file").val();    
   //alert("msg: : "+$("#msg").Editor("getText"));  
   //alert("cate"+cate+"subcate"+subcate+"lan"+lan+"age"+age);
  
    //if((title!="")&&(name!="")&&(age!="")&&((cate!="")&&(cate!=0)&&(typeof cate!== "undefined"))&&((subcate!="")&&(subcate!=0)&&(typeof subcate!== "undefined"))&&((lan!="")&&(typeof lan!== "undefined"))&&(aimgfile!="")&&(msg!="")&&(file!="")){

    if((title!="")&&(name!="")&&(age!="")&&((cate!="")&&(cate!=0)&&(typeof cate!== "undefined"))&&((subcate!="")&&(subcate!=0)&&(typeof subcate!== "undefined"))&&(aimgfile!="")&&(msg!="")&&(file!="")){
    	imgresult=checkimg();
    	audresult=checkaud();
    	var aimgfilename=$("#aimgfile")[0].files[0].name;
    	var filename=$("#file")[0].files[0].name;    	
    	 	var dur=$("#duration").val();    	 	
    	 	//alert(dur);    	
    	 if((imgresult==1)&&(audresult==2)){
    	 	var audext = $('#file').val().split('.').pop().toLowerCase();
    	 	var audsize=$("#file")[0].files[0].size;
    	 	var formData = new FormData();
        formData.append('insert', "insert");
        formData.append('tname', title);
        formData.append('aname', name);
        formData.append('age', age);
        formData.append('cate', cate);
        formData.append('subcate', subcate);        
        formData.append('aimgfilename', aimgfilename);
        formData.append('image', $("#aimgfile")[0].files[0]);
        formData.append('msg', msg); 
        formData.append('filename', filename);
        formData.append('audext', audext);
        formData.append('audsize', audsize);
        formData.append('audio', $("#file")[0].files[0]);
        formData.append('dur',dur);
 


          
             $.ajax({
                url: "addingaction.php",
                type: "POST",                
                data:formData,
                contentType: false, 
                processData: false,
                 success : function(data){
                  //alert(data);
               if(data==1)
               {
                $("#tname").val("");
                $("#aname").val("");
                $("#age").val("");
                $("#cate").val("");
                $("#subcate").val("");                       
                $("#msg").Editor("setText","");  
                $("#file").val("");
                $("#aimgfile").val("");
                $("#duration").val("");

                  

         }   
         else
         if(data==0)   
             $("#erralla").html("Item Already Exist").show().fadeOut(3000);
                   }
                        });
 }
 else{
 	if(imgresult==0)
	  $("#errfili").html("Select  Image File").show().fadeOut(3000);
  else
  {
  	if(audresult==0)
  	$("#errfila").html("Select  Audio File").show().fadeOut(3000);
  else
  	$("#errfila").html("file size to be less than 50 MB").show().fadeOut(3000);
  }
}
     
}
else{
	  $("#erralla").html("Enter all the values").show().fadeOut(3000);
}
    });     */   
         
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