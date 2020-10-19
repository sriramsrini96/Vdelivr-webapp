<?php include 'session_start.php';?>
<!-- <?php
if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){
?>
<?php include 'header.php';?>
<?php 
    $view_myaccount_id=$_SESSION['weboonuid'];
    $myaccv=$conn->prepare("SELECT u.*,h.word FROM user u INNER JOIN hash_value h ON u.password=h.hash WHERE u.status=1 AND u.id=?");
    $myaccv->execute([$view_myaccount_id]);
    $myaccvd= $myaccv->fetch();
?> -->
    <!--<section class="tilte_part " style="background: url('https://www.foodforfitness.co.uk/wp-content/uploads/2016/05/fresh-vegetables_banner.jpg') center center / cover no-repeat fixed;">
        <div class=" inner_part_title">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
                        <h2>My Account</h2>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--Header bottom Area End-->
	<!--<section class="corporate-about white-bg" ng-controller="CategoryController">
            <div class="category_container">
                <div class="row-2">
                    <div class="all-about">
					<?php include "categoryimg.php";?>
                     
                    </div>
                </div>
            </div>
        </section>-->
	
	<!--main part start-->
	<section class="heading-banner-area privacy-policy">
<div class="container page">
    <div class="row">
      

        <div class="col-md-6 col-md-offset-3">


            <div class="panel panel-default">
               <div class="panel-heading"> 
				<div class="row">
				<div class="col-md-10 col-xs-10"><h4><img src="img/homelogo.png" alt=""></h4></div>
				</div>
				</div>
			   
                <div class="panel-body">

                    <div class="box box-info" style="display:block">

                        <div class="box-body formSection readOnly">
                            
                          <form>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">

                            <div class="col-sm-5 col-xs-12 tital ">Name</div>
                            <div class="col-sm-7 col-xs-12 ">
						
							<div class="input-group input-group-icon">
								
								<div class="input-icon"><i class="fa fa-user"></i></div>
							</div>
							
							
							</div>
                            
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Email </div>
                            <div class="col-sm-7 col-xs-12">
							<div class="input-group input-group-icon">
                                            <?php echo"<input type='email' name='email' id='email_ve' placeholder='Email Id' disabled required='' value='".$myaccvd['email_id']."'>";?>
                                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
                                        </div>
							
							
							</div>
							<div id="errema_ve" class="err"></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Phone</div>
                            <div class="col-sm-7 col-xs-12">
							<div class="input-group input-group-icon">
                                            <?php echo"<input type='text' name='phone' placeholder='Mobile number' id='phone_ve' disabled required='' onkeyup='validatephone(this);'  min='10' maxlength='10' value='".$myaccvd['mobile_no']."'>"?>
                                            <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                        </div>
							
							</div>
							<div id="errmob_ve" class="err"></div>
							<div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Date of birth</div>
                            <div class="col-sm-7 col-xs-12"> 
								<div class="input-group input-group-icon" id="sandbox-container">
                                            <?php echo"<input type='text' name='dob' id='dob_ve' placeholder='YYYY/MM/DD' disabled required='' value='".$myaccvd['dob']."'>";?>
                                            <div class="input-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                        </div>
							
							</div>
							
							
							<div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Password </div>
                            <div class="col-sm-7 col-xs-12">
							<div class="input-group input-group-icon">
                                            <?php echo"<input type='password' name='password' id='psw_ve' placeholder='Password' disabled required='' value='".$myaccvd['word']."'>"?>
                                            <div class="input-icon"><i class="fa fa-key"></i></div>
                                        </div><i class="fa fa-eye-slash" aria-hidden="true" id="show"></i>
							
							
							</div>
							
							

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Gender</div>
                            <div class="col-sm-7 col-xs-12">
							<div class="row">
							<div class="col-md-6 col-xs-6">
							<div class="input-group input-group-icon">
							            <?php
										   if($myaccvd['sex']==="male")
                                            echo"<input type='radio' name='gender' value='male' id='gender-male' checked='checked' disabled required=''>";
										   else
											echo"<input type='radio' name='gender' value='male' id='gender-male' disabled required=''>";   
										?>
                                            <label for="gender-male"><i class="fa fa-male"></i></label>
                                            
                                        </div>
							</div>
							<div class="col-md-6 col-xs-6">
							<div class="input-group input-group-icon">
							            <?php
										   if($myaccvd['sex']==="female")
                                            echo"<input type='radio' name='gender' value='female' id='gender-female'  disabled required='' checked='checked'>";
										   else
											echo"<input type='radio' name='gender' value='female' id='gender-female'  disabled required=''>";   
										?> 
                                            <label for="gender-female"><i class="fa fa-female"></i></label>
                                            
                                        </div>
							</div>
							</div>
						
							
							</div>
							
							<div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Address </div>
                            <div class="col-sm-7">
							<div class="input-group input-group-icon">
                                            <!--<input type="email" name="email" id="email_ve" placeholder="Email Id" disabled required="">-->
											<?php echo"<textarea  placeholder='Address' rows='3' id='comment_ve' disabled>".$myaccvd['address']."</textarea>";?>
                                            <!--<div class="input-icon"><i class="fa fa-address-book"></i></div>-->
                                        </div>
							
							
							</div>
							
							
							
							<div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">State</div>
                            <div class="col-sm-7">
							<div class="input-group ">
                                            <select name="choosecity" id="state_ve" required="" disabled>
                                            <option value="">Choose state</option>
											<?php
			                                    include "config.php"; 
                                                $opt =$conn->prepare("SELECT  id,state FROM statemaster WHERE status=1");
                                                $opt->execute();
                                                $option = $opt->setFetchMode(PDO::FETCH_ASSOC);
                                                while ( $d=$opt->fetch()) {
												  if($d['id']==	$myaccvd['state'])
                                                   echo "<option id='".$d['id']."' value='".$d['state']."' selected>".$d['state']."</option>";
											       else
													echo "<option id='".$d['id']."' value='".$d['state']."'>".$d['state']."</option>"; 
                                                }
                                            ?>
                                            </select>
                                        </div>
							
							</div>
							
							<div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">City</div>
                            <div class="col-sm-7 col-xs-12">
							<div class="input-group ">
                                            <select name="choosecity" id="city_ve" required="" disabled>
                                            <option value="">Choose city</option>
											<?php
			                                    $optc =$conn->prepare("SELECT  id,state_id,city FROM citymaster WHERE  status=1");
                                                $optc->execute();
                                                $optionc = $optc->setFetchMode(PDO::FETCH_ASSOC);
                                                while ( $dc=$optc->fetch()) {
												  if($dc['id']==$myaccvd['city'])
                                                      echo "<option id='".$dc['id']."' value='".$dc['city']."' data-group='".$dc['state_id']."' selected>".$dc['city']."</option>";
											      else
													  echo "<option id='".$dc['id']."' value='".$dc['city']."' data-group='".$dc['state_id']."'>".$dc['city']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
							
							</div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-12 tital ">Pincode</div>
                            <div class="col-sm-7 col-xs-12">
							<div class="input-group ">
                                            <select name="choosecity" required="" id="pincode_ve" disabled>
                                            <option value="">Choose Pincode</option>
											<?php			
	                                           $optp =$conn->prepare("SELECT  id,city_id,pincode FROM pincodemaster WHERE  status=1");
                                               $optp->execute();
                                               $optionp = $optp->setFetchMode(PDO::FETCH_ASSOC);
                                               while ( $dp=$optp->fetch()) {
												   if($dp['id']==$myaccvd['pincode'])
                                                     echo "<option id='".$dp['id']."' value='".$dp['pincode']."' data-group='".$dp['city_id']."' selected>".$dp['pincode']."</option>";
												   else
													   echo "<option id='".$dp['id']."' value='".$dp['pincode']."' data-group='".$dp['city_id']."'>".$dp['pincode']."</option>";
                                      			}
			                                ?>
                                            </select>
                                        </div>
							
							</div>

                           
							  <div class="clearfix"></div>
                            
							<div class="edit_btn editButton"><BUTTON  type="button" class=""><i class="fa fa-pencil" aria-hidden="true"></i></BUTTON></div>
							
							<div id="errall_ve" class="err"></div>
							
						  <div class="actionButtons">
						<a href="#" class="cancelButton">Cancel</a><button class="saveButton" type="submit" id="updateprofile">Update</button>
						</div>
						</form>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

	
	
	</section>
	<!--main part End-->
	
	
	
	
	
	
	
		<?php include 'footer.php';?>
		
	<?php 
}
else 
header("Location:index.php");
?>	
	
	
		<script>
 var oldValues = null;
        
$(document)
.on("click", ".editButton", function () {

    var section = $(this).closest(".formSection");
    var otherSections = $(".formSection").not(section);
    var inputs = section.find("input, select,textarea");

    section
      .removeClass("readOnly");

    otherSections
      .addClass("disabled")
      .find('button').prop("disabled", true);

    oldValues = {};
    inputs
      .each(function () { oldValues[this.id] = $(this).val(); })
      .prop("disabled", false);
})

.on("click", ".cancelButton", function (e) {

    var section = $(this).closest(".formSection");
    var otherSections = $(".formSection").not(section);
    var inputs = section.find("input, select,textarea");

    section
      .addClass("readOnly");

    otherSections
      .removeClass("disabled");

    $('button').prop("disabled", false);

    inputs
      .each(function() { $(this).val(oldValues[this.id]); })
      .prop("disabled", true)

    e.stopPropagation();
    e.preventDefault();
});

              </script> 
			  
			  
			  
			  
<script>
$(document).ready(function(){
	/*var userlog="<?php echo $_SESSION['weboonuid'];?>";
	$.ajax({
		url:"regaction.php",
		method:"POST",
		data:{view_myaccount:'view_myaccount',view_myaccount_id:userlog},
		dataType:"json",
		success:function(data){
			$("#name_ve").val(data.name);
			$("#email_ve").val(data.email_id);
			$("#phone_ve").val(data.mobile_no);
			$("#dob_ve").val(data.dob);
			$("#psw_ve").val(data.word);
			$("#comment_ve").val(data.address);
			$("input:radio[name='gender'][value="+data.sex+"]").prop("checked",true);
			$("#state_ve option[id='"+data.state+"']").attr('selected', true);
	        $("#city_ve option[id='"+data.city+"']").attr('selected', true);
	        $("#pincode_ve option[id='"+data.pincode+"']").attr('selected', true);
		}
	});*/





$(document).on("click", "#updateprofile", function(e){
	 e.preventDefault();
	 var up_id="<?php echo $_SESSION['weboonuid'];?>";
	 var name_ve="",email_ve="",phone_ve="",date_ve="",psw_ve="",sex_ve="",comment_ve="",state_ve="",city_ve="",pincode_ve="";
	  name_ve=$("#name_ve").val();
	  email_ve=$("#email_ve").val();
	  phone_ve=$("#phone_ve").val();
	  dob_ve=$("#dob_ve").val();
	  psw_ve=$("#psw_ve").val();
	  sex_ve=$("input[name='gender']:checked").val();
	  comment_ve=$("#comment_ve").val();
	  state_ve=$("#state_ve option:selected").attr("id");
	  city_ve=$("#city_ve option:selected").attr("id");
	  pincode_ve=$("#pincode_ve option:selected").attr("id");
	 if((name_ve.replace(/\s/g, '').length)&&(email_ve.replace(/\s/g, '').length)&&(phone_ve.replace(/\s/g, '').length)&&(dob_ve.replace(/\s/g, '').length)&&(sex_ve!="")&&(comment_ve.replace(/\s/g, '').length)&&((state_ve!="")&&(state_ve!=0)&&(typeof state_ve!== "undefined"))&&((city_ve!="")&&(city_ve!=0)&&(typeof city_ve!== "undefined"))&&((pincode_ve!="")&&(pincode_ve!=0)&&(typeof pincode_ve!== "undefined"))&&(psw_ve.replace(/\s/g, '').length)){
		 //alert(name_ve+email_ve+phone_ve+dob_ve+psw_ve+sex_ve+comment_ve+state_ve+city_ve+pincode_ve);
		 $.ajax({
                method:'POST',
                url:'regaction.php',
                //data:{update_myaccount:"update_myaccount",up_name:name_ve,up_sex:sex_ve,up_dob:dob_ve,up_mobile:phone_ve,up_psw:psw_ve,up_email:email_ve,up_address:comment_ve,up_city:city_ve,up_pin:pincode_ve,up_state:state_ve,up_id:userlog},
				data:{update_myaccount:"update_myaccount",up_name:name_ve,up_sex:sex_ve,up_dob:dob_ve,up_mobile:phone_ve,up_psw:psw_ve,up_email:email_ve,up_address:comment_ve,up_city:city_ve,up_pin:pincode_ve,up_state:state_ve,up_id:up_id},
                success:function(data){
					//alert(data);
					if(data==1){
						/*$("#errall").html("Successfully Registered").show().fadeOut(3000);
						$("#name").val("");
	                    $("#email").val("");
	                    $("#phone").val("");
	                    $("#date").val("");
	                    $("#pass").val("");	                    
	                    $("#comment").val("");
	                    //$("#state option:selected").attr("id");
						$("#state option[value='']").attr('selected', 'selected');
	                    $("#city option[value='']").attr('selected', 'selected');
	                    $("#pincode option[value='']").attr('selected', 'selected');
						alert("Successfully Registered!Login to Continue");
						$("#login-button").click();*/
						//alert("successfully saved ");
						$('#updated_success').modal('show');
						window.location.reload();
					}
                    else{
						$("#errall_ve").html("This user Already Exists").show().fadeOut(3000);
					}
                }
            }); 
		 
	 }
	 else{
		 //alert("Enter all the values");
		 $("#errall_ve").html("Enter all the values").show().fadeOut(3000);
	 }
	 
 });
 
 
 
 $(document).on('blur', '#phone_ve',function (e) { 
     var mob=$("#phone_ve").val();
        var mob=$("#phone_ve").val();
        if(mob.length<10 ) {
           //alert("Invalid mobile number");
           $("#errmob_ve").html("Invalid mobile number").show().fadeOut(3000);
           $("#phone_ve").val("");
     }
});

$('#email_ve').on('blur', function() {
       	var mail=$("#email_ve").val();
       	if(mail == '' || mail.indexOf('@') == -1 || mail.indexOf('.') == -1) {
           //alert("Invalid email address");
           $("#email_ve").val("");
		   $("#errema_ve").html("Invalid emailid").show().fadeOut(3000);
     }
});
 
 $('#email_ve').keyup(function() {
            var value = $(this).val();
            var valid = validateEmail(value);

            if (!valid) {
                $(this).css('color', 'red');
            } else {
                $(this).css('color', '#000');
            }
        });
 
 
 
 
 $(document).on("click", "#de_submit", function(e){
	 e.preventDefault();
	 var de_id="<?php echo $_SESSION['weboonuid'];?>";
	 var de_name="",de_address="",de_state="",de_city="",de_pincode="";
	  de_name=$("#de_name").val();
	  de_address=$("#de_address").val();
	  de_state=$("#de_state option:selected").attr("id");
	  de_city=$("#de_city option:selected").attr("id");
	  de_pincode=$("#de_pincode option:selected").attr("id");
	 if((de_name.replace(/\s/g, '').length)&&(de_address.replace(/\s/g, '').length)&&((de_state!="")&&(de_state!=0)&&(typeof de_state!== "undefined"))&&((de_city!="")&&(de_city!=0)&&(typeof de_city!== "undefined"))&&((de_pincode!="")&&(de_pincode!=0)&&(typeof de_pincode!== "undefined"))){
		 //alert(de_name+de_address+de_state+de_city+de_pincode+de_id);
		 $.ajax({
                method:'POST',
                url:'regaction.php',
				data:{insert_deli_add:"insert_deli_add",de_name:de_name,de_address:de_address,de_state:de_state,de_city:de_city,de_pincode:de_pincode,de_id:de_id},
                success:function(data){
					//alert(data);
					if(data==1){
						//alert("successfully saved ");
						$('#saved_success').modal('show');
						window.location.reload();
					}
                    else{
						$("#de_errall").html("This Address Already Exists").show().fadeOut(3000);
					}
                }
            }); 
		 
	 }
	 else{
		 //alert("Enter all the values");
		 $("#de_errall").html("Enter all the values").show().fadeOut(3000);
	 }
	 
 });
 
 
 $(document).on('change','#state_ve',function(){ 
       var valstate= $("#state_ve option:selected").attr("id");        
        var subcity = $('#city_ve');
        $('option', subcity).filter(function(){
            if ($(this).attr('data-group') === valstate) {
                $(this).show(); 
            } else {
                $(this).hide();
                $('#city_ve').val("");
                $("#city_ve option:selected").prop("selected", false)
            }
        });
    });

$('#city_ve').on('change', function(){       
       var valcity= $("#city_ve option:selected").attr("id");        
        var subpin = $('#pincode_ve');
        $('option', subpin).filter(function(){
            if ($(this).attr('data-group') === valcity) {
                $(this).show();
            } else {
                $(this).hide();
                $('#pincode_ve').val("");
                $("#pincode_ve option:selected").prop("selected", false)
            }
        });
    });
	
	
$(document).on('click','#show',function(){
	//$("#show").attr("class","");
	$("#show").toggleClass("fa-eye fa-eye-slash");
	if ($("#show").hasClass('fa-eye')) {
                $("#psw_ve").attr('type', 'text');
            }
    else if ($("#show").hasClass('fa-eye-slash')) {
                $("#psw_ve").attr('type', 'password');
            }
	
});

 
 
 
 
 
 
 });
</script>			  
       