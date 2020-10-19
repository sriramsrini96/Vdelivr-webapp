<?php $this->load->view('header'); 
 
 $map_details = $this->Common->hotelcord($urih);

 
 if(count($map_details) >0)
 {
	$str     = $map_details[0]['latlon'];
	$res_str = array_chunk(explode("*",rtrim($str,'*')),2);
	foreach( $res_str as &$val)
	{
		$val  = implode(",",$val);
	}
	$response =  implode("],[",$res_str);
 }else{$response = ''; }
 
 ?>
<style>
   .draggable 
   { 
   background: #fff; 	
   cursor: move;
   text-align: center;
   font-weight: bold;
   margin-bottom:30px;
   }
   .droppable 
   {  
   width: 100%;	
   list-style: none;
   margin: 0;
   padding: 0px;
   height: 100%;
   }
   .inner_image_hotel {
   padding: 8px;
   box-shadow: 0 0 40px rgba(0,0,0,.05);
   border:1px solid #ccc;
   }
   
   
   /*added style*/
   .formline{
	  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
   }
   .mar{
	   margin-top:5%;
   }
   .lab{
	   color:#574B90;    
       
   }
   
   
</style>
<nav>
   <ul class="menu_nav">
      <li class="nav_item "><a href="<?php echo SITE_URL.'Admin/hotel_home'; ?>">Home</a></li>
      <li class="nav_item"><a href="<?php echo SITE_URL.'Admin/pending_approval'; ?>">Pending Approval</a></li>
      <li class="nav_item active"><a href="<?php echo SITE_URL.'Admin/hotel'; ?>">Onboarded</a></li>
   </ul>
</nav>
<div class="main-content">
   <section class="section">
      
         <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
               <div class="Selection_header">
                  <form>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group ">
                              <label>Select City</label>
                              <select class="form-control" name="city" id="city">
                                 <option value="">Select City</option>
                                 <?php for($i=0;$i<count($city);$i++){
                                    if($uric  == $city[$i]['city_id'])
                                    { 
                                    $selected = "selected='selected'"; 
                                    }else{ $selected = ""; }
                                    echo '<option value="'.$city[$i]['city_id'].'" '.$selected.' >'.$city[$i]['city_name'].'</option>';
                                    } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group ">
                              <label>Select Hotel</label>
                              <select class="form-control" name="hotel" id="hotel">
                                 <option value="">Select Hotel</option>
                                 <?php for($i=0;$i<count($hotels);$i++){
                                    if($urih  == $hotels[$i]['hotel_id']){ 
                                    $selected = "selected='selected'"; 
                                    }else{ $selected = ""; }
                                    echo '<option value="'.$hotels[$i]['hotel_id'].'" '.$selected.'>'.$hotels[$i]['HotalName'].'</option>';
                                    } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <?php if($urih !=''){?>
               <div class="card">
                  <div class="card-header">
                     <h4>Bordered Tab</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 col-sm-12 col-md-3">
                           <ul class="nav nav-pills flex-column" id="myTab2" role="tablist">
                              <li class="nav-item ">
                                 <a class="nav-link  active" id="tab_1-tabselect" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab_1" aria-selected="false">Onboarding & Billing Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_2-tabselect" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab_2" aria-selected="false">Billing Statement</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_3-tabselect" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab_3" aria-selected="false">User Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " id="tab_4-tabselect" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab_4" aria-selected="true">Hotel Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_5-tabselect" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab_5" aria-selected="false">Geo Location Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_6-tabselect" data-toggle="tab" href="#tab6" role="tab" aria-controls="tab_6" aria-selected="false">Outlets</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_7-tabselect" data-toggle="tab" href="#tab7" role="tab" aria-controls="tab_7" aria-selected="false">Add Outlet</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_8-tabselect" data-toggle="tab" href="#tab8" role="tab" aria-controls="tab_8" aria-selected="false">Deals Analytics</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_9-tabselect" data-toggle="tab" href="#tab9" role="tab" aria-controls="tab_9" aria-selected="false">Deals Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="tab_10-tabselect" data-toggle="tab" href="#tab10" role="tab" aria-controls="tab_10" aria-selected="false">Sales Statement</a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-9">
                           <div class="tab-content" id="myTab2Content">
                              <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab_1-tabselect">
                                 <div class="row">
									 <?php echo form_open_multipart(SITE_URL.'Admin/addsubsc',array('class' => 'needs-validation', "autocomplete" => "off")); ?>
                                    <input type="hidden" name="hotelid" value="<?php echo $urih; ?>">
                                    <input type="hidden" name="cityid"  value="<?php echo $uric; ?>">
									<div class="col-md-12">
                                       <div class="tab_header">
                                          <div class="title">
                                             <p><strong>Subscription Details</strong></p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="left_side_box">
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control custom-checkbox">
                                                                  <!--<input type="checkbox" name="onboardchk" class="custom-control-input" id="check4">-->
                                                                  <p>Onboarding Date</p>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <input id="onboardate" type="text" class="form-control" name="onboardate" value="<?php echo $hotdet[0]['approve_date']; ?>">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control custom-checkbox">
                                                                  <!--<input type="checkbox" name="subschk" class="custom-control-input" id="check8">-->
                                                                  <p>Subscription</p>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <div class="row">
                                                            <div class="col-md-10">
                                                               <div class="row">
                                                                  <div class="col-md-4">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="subfrm[]" id="subfrm" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="subto[]" id="subto" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
																  <div class="col-md-2">
                                                                     <div class="form-group ">
                                                                        <!--<input id="frist_name" type="text" class="form-control" Placeholder="Amount" name="subscamt[]" >-->
                                                                     </div>
                                                                  </div>
																  <div class="col-md-2">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <input type="checkbox" name="active[]" class="form-control" value="">
																		   <label>Active</label>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                               <div class="btn_add">
                                                                  <a href="javascript:void(0);"  class="btn btn-icon subscdur"><i class="ion ion-plus"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control custom-checkbox">
                                                                  <!--<input type="checkbox" name="subdurchk" class="custom-control-input" id="check5" >-->
                                                                  <p>Subscription Duration</p>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <input id="subscdur" type="text" class="form-control" name="subscdur[]"  readonly >
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
												    <div class="row input_fields_containersub"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tab_header">
                                          <div class="title">
                                             <p><strong>Billing Rules</strong></p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="left_side_box">
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control custom-checkbox">
                                                                  <!--<input type="checkbox" name="trialchk" class="custom-control-input" id="check6">-->
                                                                  <p>Free Trial</p>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <div class="row">
                                                            <div class="col-md-10">
                                                               <div class="row">
                                                                  <div class="col-md-5">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="trialfrm[]" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-5">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="trialto[]" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
																   <div class="col-md-2">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <input type="checkbox" name="activetrial[]" class="form-control" value="">
																		   <label>Active</label>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                             <div class="col-md-2">
                                                               <div class="btn_add">
                                                                  <a href="javascript:void(0);"  class="btn btn-icon trialperiod"><i class="ion ion-plus"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group">
                                                                  <label>Remarks</label>
                                                                  <textarea class="form-control" name="trialremark[]" spellcheck="true"></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
													  <div class="row input_fields_containertrial"></div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control custom-checkbox">
                                                                  <!--<input type="checkbox" name="subamt" class="custom-control-input" id="check7">--> 
                                                                  <p>Subscription Amount before tax</p>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="row">
                                                                  <div class="col-md-2">
                                                                     <div class="form-group ">
                                                                        <input id="frist_name" type="text" class="form-control" name="subscamt[]" >
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="subscfrm[]" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-calendar"></i></div>
                                                                           </div>
                                                                           <input type="text" name="subscto[]" class="form-control bootstrap-datepicker" value="">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-2">
                                                                     <div class="btn_add">
																		 <a href="javascript:void(0);"  class="btn btn-icon btn_round subsctax"><i class="ion ion-plus"></i></a>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-md-12">
                                                                     <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" name="subscremark" spellcheck="true"></textarea>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
													    <div class="row input_fields_containertax"></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="addbtn_part">
                                          <button type="submit" class="btn btn-success">Save</button>
                                       </div>
                                    </div>
									<?php echo form_close(); ?>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab_2-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class=" billing_table">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="card">
                                                      <div class="card-header">
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <h4>Billing Statement</h4>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group ">
                                                                  <select class="form-control">
                                                                     <option>Export as XLS / PDF</option>
                                                                     <option>Export as Png / PDF</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                            <div class="duration_part">
                                                               <div class="col-md-12">
                                                                  <p>Duration</p>
                                                                  <div class="custom-control custom-radio">
                                                                     <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input show1">
                                                                     <label class="custom-control-label" for="customRadio1">From the date of subscription</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio">
                                                                     <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input show2">
                                                                     <label class="custom-control-label" for="customRadio2">Specific Period</label>
                                                                  </div>
                                                                  <div id="div1" class=" hide">
                                                                     <div class="row ">
                                                                        <div class="col-md-6">
                                                                           <div class="form-group">
                                                                              <div class="input-group">
                                                                                 <div class="input-group-prepend">
                                                                                    <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                                 </div>
                                                                                 <input type="text" class="form-control bootstrap-timepicker">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                           <div class="form-group">
                                                                              <div class="input-group">
                                                                                 <div class="input-group-prepend">
                                                                                    <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                                 </div>
                                                                                 <input type="text" class="form-control bootstrap-timepicker">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="card-body">
                                                         <div class="table-responsive">
                                                            <table class="table table-bordered display1" id="example1">
                                                               <thead>
                                                                  <tr>
                                                                     <th>#</th>
                                                                     <th>Duration</th>
                                                                     <th>Subcription</th>
                                                                     <th>Amount Due</th>
                                                                     <th>Due Date</th>
                                                                     <th>Status</th>
                                                                     <th>Remarks</th>
                                                                  </tr>
                                                               </thead>
                                                               <tbody>
															   <?php  for($i=0;$i<count($subscriptiondet);$i++) { $j=$i+1; 
																	   if($subscriptiondet[$i]['type_check']==2) 
																	   { 
																			$type_check='Subscription'; 
																			$amount=$subscriptiondet[$i]['sub_amt']; 
																			$remarks = $subscriptiondet[$i]['sub_remarks']; 
																	   } 
																	   else 
																	   { 
																			$type_check='Free Trail';  
																			$amount=0;  
																			$remarks = $subscriptiondet[$i]['trial_remark']; 
																	} ?>
                                                                  <tr>
																	<td><?php echo $j; ?></td>
                                                                     <td><?php echo $subscriptiondet[$i]['sub_frm'].'-'.$subscriptiondet[$i]['sub_to']; ?></td>                                                                    
                                                                     <td><?php echo $type_check; ?></td>
                                                                     <td><?php echo $amount; ?></td>
                                                                     <td><?php echo $subscriptiondet[$i]['sub_to']; ?></td>
                                                                     <td><?php echo 'NA'; ?></td>
                                                                     <td><?php  echo $remarks; ?></td>
                                                                  </tr>
															   <?php } ?>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                         <!--<div class="table-responsive">
                                                            <table class="table table-bordered display1">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Duration</th>
                                                                        <th>Subcription</th>
                                                                        <th>Amount Due</th>
                                                                        <th>Due Date</th>
                                                                        <th>Status</th>
                                                                        <th>Remarks</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>05 AUG - 04 SEPT 18</td>
                                                                        <td>18 Free Trial</td>
                                                                        <td>
                                                                            0
                                                                        </td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>Remarks</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>05 SEPT - 04 OCT 18</td>
                                                                        <td>Extended Free Trial</td>
                                                                        <td>
                                                                            0
                                                                        </td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>Remarks</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>05 OCT - 04 NOV 18</td>
                                                                        <td>Paid</td>
                                                                        <td>
                                                                            5000
                                                                        </td>
                                                                        <td>10 OCT 18</td>
                                                                        <td>WVD</td>
                                                                        <td>No redemptions hotel denied payment</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>05 NOV - 04 DEC 18</td>
                                                                        <td>Paid</td>
                                                                        <td>
                                                                            5000
                                                                        </td>
                                                                        <td>10 NOV 18</td>
                                                                        <td>RCD</td>
                                                                        <td>Remarks</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>05 NOV - 04 DEC 18</td>
                                                                        <td>Paid</td>
                                                                        <td>
                                                                            5000
                                                                        </td>
                                                                        <td>10 NOV 18</td>
                                                                        <td>RCD</td>
                                                                        <td>Remarks</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </div>-->
                                                      </div>
                                                      <!--<div class="card-footer text-right">
                                                         <nav class="d-inline-block">
                                                             <ul class="pagination mb-0">
                                                                 <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a></li>
                                                                 <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                 <li class="page-item"><a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a></li>
                                                             </ul>
                                                         </nav>
                                                         </div>-->
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab_3-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-12 col-sm-12 col-lg-12">
                                                <div class="card_data">
                                                   <div class="card-header">
                                                      <div class="float-right">
														<a href="javascript:void(0);"  class="btn btn-icon add_more_button"><i class="ion ion-plus"></i></a>
													  </div>
                                                      <div class="collapse show" id="mycard-collapse" style="">
                                                         <div class="card-body">
															<?php echo form_open_multipart(SITE_URL.'Admin/adduser',array('class' => 'needs-validation', "autocomplete" => "off")); ?>	
																 <input type="hidden" name="hotelid" value="<?php echo $urih; ?>">
																 <input type="hidden" name="cityid"  value="<?php echo $uric; ?>">
																<div class="row input_fields_container">
																</div>
																<input type="submit" name="submit" class="btn btn-primary adduser hide" value="Add User">
															<?php echo form_close();?>
															<hr>
                                                            <div class="table-responsive">
                                                               <table class="table table-bordered display1" id="example2">
                                                                  <thead>
                                                                     <tr>
                                                                        <th>S.no</th>
                                                                        <th>First Name</th>
                                                                        <th>Mobile</th>
                                                                        <th>Email</th>
                                                                        <th>Username</th>
                                                                        <th>Password</th>
                                                                        <th>Action</th>
                                                                     </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                     <?php
                                                                        if($hotel_users >0)
                                                                        {
																			for($i=0;$i<count($hotel_users);$i++)
																			{
																				$j= $i+1;
																				$password = str_repeat("*", strlen($hotel_users[$i]['password'])); 
                                                                        ?>		
																			 <tr>
																				<td><?php echo $j; ?></td>
																				<td><?php echo $hotel_users[$i]['Name']; ?></td>
																				<td><?php echo $hotel_users[$i]['Mobile']; ?></td>
																				<td><?php echo $hotel_users[$i]['Email']; ?></td>
																				<td><?php echo $hotel_users[$i]['username']; ?></td>
																				<td><?php echo '******'; ?></td>
																				<td>
																				   <a href="javascript:void(0);" class="btn btn-success small_btn" onclick="edituser(<?php echo $hotel_users[$i]['id']; ?>)">Edit</a>
																				   <a href="javascript:void(0);" class="btn btn-success small_btn" onclick="deleteuser(<?php echo $hotel_users[$i]['id']; ?>)">Delete</a>
																				</td>
																			 </tr>
                                                                     <?php		
																			} 
																		}else{
                                                                        	echo '<tr><td colspan="7">No Users</td></tr>';
                                                                        }
                                                                        ?>
                                                                  </tbody>
                                                               </table>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab_4-tabselect">
                                 <?php echo form_open_multipart(SITE_URL.'Admin/hotel',array('class' => 'needs-validation', "autocomplete" => "off")); ?>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_header">
                                          <div class="title">
                                             <p><strong>Hotel Details</strong></p>
                                          </div>
                                       </div>
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-md-9">
                                                <div class="left_side_box">
                                                   <input type="hidden" name="hotelid" value="<?php echo $urih; ?>">
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check1">Hotel Type</label>
                                                                  
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <select class="form-control" name="htypeval" required>
                                                                     <option value="">Select Type</option>
                                                                     <option value="1" <?php if($hotdet[0]['HotelType'] == 1) echo "selected='selected'";?>>Resort</option>
                                                                     <option value="2" <?php if($hotdet[0]['HotelType'] == 2) echo "selected='selected'";?>>Business</option>
                                                                     <option value="3" <?php if($hotdet[0]['HotelType'] == 3) echo "selected='selected'";?>>Leisure</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check2">Star Cateogry</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <select class="form-control" name="starcattype" required>
                                                                     <option> Select Star</option>
                                                                     <option value="3" <?php if($hotdet[0]['HotelStar'] == 1) echo "selected='selected'";?> >3</option>
                                                                     <option value="4" <?php if($hotdet[0]['HotelStar'] == 2) echo "selected='selected'";?> >4</option>
                                                                     <option value="5" <?php if($hotdet[0]['HotelStar'] == 3) echo "selected='selected'";?> >5</option>
                                                                     <option value="7" <?php if($hotdet[0]['HotelStar'] == 4) echo "selected='selected'";?> >7</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check3">Brand Chain</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <input id="brandname" type="text" class="form-control" value="<?php echo $hotdet[0]['Brand']; ?>" name="brandname" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check4">Location / Area</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <input id="locationname" type="text" class="form-control" value="<?php echo $hotdet[0]['Location']; ?>" name="locationname" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check5">City</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <select class="form-control" name="city" required>
                                                                     <option>Select City</option>
                                                                     <?php  for($i=0;$i<count($city);$i++){
                                                                        if($hotdet[0]['city'] == $city[$i]['city_id']){ $selec = 'selected="selected"'; }else { $selec= ''; }
                                                                        echo '<option value="'.$city[$i]['city_id'].'" '.$selec.'>'.$city[$i]['city_name'].'</option>';
                                                                        } ?>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
												   
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check6">Total Rooms</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <input id="rooms" type="text" class="form-control numcheck" value="<?php echo $hotdet[0]['TotalRooms']; ?>" name="rooms" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control">
                                                                  <label class="" for="check7">Pet Friendly</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group ">
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                     <input type="radio" id="customRadioInline1" value="1" <?php if($hotdet[0]['PetFriendly'] == 1) echo 'checked="checked"';?> name="petfriendly" class="custom-control-input" required>
                                                                     <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                     <input type="radio" id="customRadioInline2" value="2" <?php if($hotdet[0]['PetFriendly'] == 2) echo 'checked="checked"';?> name="petfriendly" class="custom-control-input" required>
                                                                     <label class="custom-control-label" for="customRadioInline2">No</label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <div class="title_side_box">
                                                            <div class="form-group">
                                                               <div class="custom-control ">
                                                                  <label class="" for="check8">Check-in/out Timing</label>
                                                               </div>
                                                            </div>
                                                            <p></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="row">
                                                                  <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                           </div>
                                                                           <input type="text" name="check_in" value="<?php echo date('h:i A',strtotime($hotdet[0]['CheckIn'])); ?>" class="form-control bootstrap-timepicker" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <div class="input-group">
                                                                           <div class="input-group-prepend">
                                                                              <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                           </div>
                                                                           <input type="text" name="check_out" value="<?php echo date('h:i a',strtotime($hotdet[0]['CheckOut'])); ?>" class="form-control bootstrap-timepicker" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="qrcode">
                                                   <ul>
                                                      <li class="generate_qrcode border-right" onclick="generateQr();" >Generate</li>
                                                      <li class="generate_qrcode">Modify</li>
                                                   </ul>
                                                   <div class="qrcode_image">
                                                      <img id="qrImage" src="" />
                                                   </div>
												   <input type="hidden" name="hidden_qr" id="hidden_qr"/>
                                                </div>
                                             </div>
											 <input class="dispqr" type="text">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tab_header">
                                          <div class="title">
                                             <span><strong>Hotel Pictures / Video </strong></span>
                                          </div>
                                       </div>
                                       <div class="inner_part">
                                          <div class="hotel_image_add">
                                             <div class="row">
												<div class="col-md-12">
                                                <div class="row droppableee">
                                                   <?php if(count($hotimg) > 0) { 
                                                      for($i=0;$i<count($hotimg);$i++){ ?>
                                                   <div class="col-md-4 draggableee " id="<?php echo $hotimg[$i]['id']; ?>" >
                                                      <div class="inner_image_hotel">
                                                         <figure>
                                                            <img class="profile-pic" src="<?php echo SITE_URL.'uploads/hotel/'.$hotimg[$i]['image'];?>">
                                                         </figure>
                                                         <figcaption>
                                                            <div class="row">
                                                               <div class="col-md-3">
                                                                  <div class="custom-control">
                                                                     <label class="" for="check19"></label>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-9">
                                                                  <ul class="select_image">
                                                                     <li><span class="btn btn-danger" onclick="rhmgdel(<?php echo $hotimg[$i]['id']; ?>);">Delete</span></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </figcaption>
                                                      </div>
                                                   </div>
                                                   <?php } }else{
                                                      echo '<div class="col-md-4">No Images</div>';
                                                      } ?>
                                                   <div class="col-md-4">
                                                      <input type="file" name="hotelimg[]" accept="image/*" multiple>
                                                   </div>
                                                </div>
												</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
							
                                 </br>
                                 <div class="col-md-12">
                                    <div class="addbtn_part">
                                       <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                 </div>
								 <hr>
								 <br>
                                 <?php echo form_close(); ?>
								 <div class="card margin-top">
								    <div class="col-md-12">
										<div class="card-header">
											<h3>Room Detail</h3>
											<div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addrooms" style="float:right;">Add Rooms</a></div>
										</div>
										<div class="card-body">
										   <div class="table-responsive">
											  <table class="table table-bordered display font_table" id="example3"  >
												 <thead>
													<tr>
													   <th>#</th>
													   <th>Room Type</th>
													   <th>No.of Rooms</th>
													   <th>Bed Type</th>
													   <th>Room Size</th>
													   <th>Mini Bar</th>
													   <th>Work Space</th>
													   <th>Bath Tub</th>
													   <th>Action</th>
													</tr>
												 </thead>
												 <tbody>
													<?php $j=1; for($i=0;$i<count($roomdet);$i++)
													   {
															if($roomdet[$i]['RoomType'] == 1)
															{
																$type = 'Standard';
															}elseif($roomdet[$i]['RoomType'] == 2)
															{
																$type = 'Deluxe';
															}elseif($roomdet[$i]['RoomType'] == 3)
															{
																$type = 'Suite';
															}
															if($roomdet[$i]['BedType'] == 1)
															{
																$btype = 'Twin';
															}elseif($roomdet[$i]['BedType'] == 2)
															{
																$btype = 'King';
															}elseif($roomdet[$i]['BedType'] == 3)
															{
																$btype = 'Queen';
															}
														
														?>
													<tr>
													   <td><?php echo $j++; ?></td>
													   <td><?php echo $type; ?></td>
													   <td><?php echo $roomdet[$i]['TotalRooms']; ?></td>
													   <td><?php echo $btype; ?></td>
													   <td><?php echo $roomdet[$i]['RoomSize']; ?></td>
													   <td><?php echo ($roomdet[$i]['MiniBar'] == 1)?'Yes':'No'; ?></td>
													   <td><?php echo ($roomdet[$i]['Workspace'] == 1)?'Yes':'No'; ?></td>
													   <td><?php echo ($roomdet[$i]['Bathtub'] == 1)?'Yes':'No'; ?></td>
													   <td><a href="<?php echo SITE_URL.'Admin/viewroom/'.$roomdet[$i]['room_id'].'/'.$urih.'/'.$uric; ?>"  ><i class="fa fa-eye" aria-hidden="true"></i></a>
														  <a href="javascript:void(0);"  onclick="edithotel(<?php echo $roomdet[$i]['room_id']; ?>)"><i class="fa fa-edit" aria-hidden="true"></i></a>
														  <a href="javascript:void(0);"  onclick="deleteroom(<?php echo $roomdet[$i]['room_id']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
													   </td>
													</tr>
													<?php } ?>
												 </tbody>
											  </table>
										   </div>
										</div>
									</div>
								 </div>
							 </div>
                              <div class="tab-pane fade"  id="tab5" role="tabpanel" aria-labelledby="tab_5-tabselect" style="overflow:hidden">
                                 <div class="gmap_1">
                                    <div class="row">
                                       <!--div class="col-md-12"-->
									   <div class="col-md-9">
                                          <div id="map-canvas" style="width: 600px; height: 400px"></div>
                                       </div>
									   <!--newly added-->
									   <div class="col-md-3">
									   	 <div class="card_data">
									        <div class="table-responsive" style="display: block;max-height: 400px;overflow-y: auto;-ms-overflow-style: -ms-autohiding-scrollbar;">
									           <table class="table table-bordered display1" id="fencedd">
									              <thead>
                                                     <tr>
                                                        <th>Fence Name</th>
                                                        <th>Action</th>                             
                                                     </tr>
                                                  </thead>
												  <tbody>
												    <?php for($ig=0;$ig<count($namefence);$ig++){?>
												     <tr>
													   <td><?php echo $namefence[$ig]['name'];?></td>
													   <td>                                                          
													    <a href="javascript:void(0);" onclick="editfence(<?php echo $namefence[$ig]['id']; ?>)"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0);" onclick="deletefence(<?php echo $namefence[$ig]['id']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
													   </td>
												     </tr>
													<?php }?>
												  </tbody>									   
									          </table>
									        </div>
									      </div>
									   
									   
									   
									   
									   
									   </div>
									   
									   
                                    </div>
                                 </div>
								 
								 
								 <!-- adding add fence-->
								 <div class="row">
								  
								    <div class="col-md-12"> 
									
									<div class="form-group form-inline mar">
  <label for="addfencena" class="control-label"><h4 class="lab">Add Fence : </h4></label>
  <input type="text" name="addfencena" class="form-control formline" id="addfencena" placeholder="Enter Fence Name">
  <a href="#" class="btn btn-primary" style="padding:2px 15px;font-size: 12px;border-radius:30px;" id="drawfence">Draw</a>
  <!--adding submit button-->
  <a href="#" class="btn btn-primary" style="padding:2px 15px;font-size: 12px;border-radius:30px;" id="submitfence">Submit</a>
</div>
									</div>
								 
								 </div>
								 
								 
                              </div>
                             
                              <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab_6-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_header">
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <select class="form-control" id="outlet_type">
                                                   <option value="">--Select Type--</option>
                                                   <option value="outlet_res">Restaurant</option>
                                                   <option value="outlet_bar">Bar</option>
                                                   <option value="outlet_spa">Spa & Salon</option>
                                                   <option value="outlet_travel">Travel / Activities</option>
                                                   <option value="outlet_laun">Laundry</option>
                                                   <option value="outlet_cake">Cake Shop</option>
                                                   <option value="outlet_flo">Florist</option>
                                                   <option value="outlet_din">In-Room Dining</option>
                                                   <option value="outlet_bus">Business Center</option>
                                                   <option value="outlet_gym">Gym</option>
                                                   <option value="outlet_swim">Swimming Pool</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <?php echo form_open_multipart(SITE_URL.'Admin/outlet/',array('class' => 'needs-validation', "autocomplete" => "off")) ?>
                                          <input type="hidden" name="hid" value="<?php echo $urih; ?>" id="hid">
                                          <input type="hidden" name="city" value="<?php echo $uric; ?>" id="city">
                                          <div class="outlet_form">																		
                                          </div>
                                          <?php echo form_close();?>																	
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab_7-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="card_data">
                                          <div class="table-responsive">
                                             <table class="table table-bordered display1" id="example4">
                                                <thead>
                                                   <tr>
                                                      <th>Outlet Name</th>
                                                      <th>Outlet Location</th>
                                                      <th>Outlet Style</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <?php for($i=0;$i<count($outlets);$i++){?>
                                                   <tr>
                                                      <td><?php echo $outlets[$i]['OutletName'];?></td>
                                                      <td><?php echo $outlets[$i]['OutletLocation'];?></td>
                                                      <td><?php echo $outlets[$i]['OutletStyle'];?></td>
                                                      <td>
                                                          <a href="<?php echo SITE_URL.'Admin/outletedit/'.$outlets[$i]['OutletId'].'/'.$outlets[$i]['OutletCat']; ?>" class="btn btn-primary small_btn">Edit</a>
                                                          <a href="javascript:void(0);" class="btn btn-primary small_btn" onclick="delete_outlet(<?php echo $outlets[$i]['OutletId'];  ?>)">Delete</a>
														  <?php if($outlets[$i]['OutletStatus'] == 1){ ?>
																<a href="javascript:void(0);" onclick="changestatus(0,<?php echo $outlets[$i]['OutletId']; ?>)" class="btn btn-primary small_btn">Inactive</a>
														  <?php }else{  ?>
																<a href="javascript:void(0);" onclick="changestatus(1,<?php echo $outlets[$i]['OutletId']; ?>)" class="btn btn-primary small_btn">Active</a>
														  <?php } ?>
														  
													  </td>
                                                   </tr>
                                                   <?php } ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab_8-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="left_side_box">
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="tab_header">
                                                            <div class="title">
                                                               <p><strong>Overview</strong></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                         <div class="duration_part">
                                                            <div class="col-md-12">
                                                               <p>Duration</p>
                                                               <div class="custom-control custom-radio">
                                                                  <input type="radio" id="customRadio3" name="dcustomRadio" value="1" class="custom-control-input show3" checked>
                                                                  <label class="custom-control-label" for="customRadio3">From the date of subscription</label>
                                                               </div>
                                                               <div class="custom-control custom-radio">
                                                                  <input type="radio" id="customRadio4" name="dcustomRadio" value="2" class="custom-control-input show4">
                                                                  <label class="custom-control-label" for="customRadio4">Specific Period</label>
                                                               </div>
                                                               <div id="div2" class="hide specificperiod2">
                                                                  <div class="row ">
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                           <div class="input-group">
                                                                              <div class="input-group-prepend">
                                                                                 <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                              </div>
                                                                              <input type="text" id="from_date" placeholder="From Date" class="form-control bootstrap-datepicker">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                           <div class="input-group">
                                                                              <div class="input-group-prepend">
                                                                                 <div class="input-group-text"><i class="ion ion-clock"></i></div>
                                                                              </div>
                                                                               <input type="text" id="to_date" placeholder="To Date" class="form-control bootstrap-datepicker">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                         <div class="below_part">
                                                            <div class="row">
                                                               <div class="col-md-12">
                                                                  <div class="form-group ">
                                                                    <select class="form-control" id="select_type">
																		<option value="">Select Type</option>
                                                                        <option value="1">View by Outlet</option>
                                                                        <option value="2">Full Hotel</option>
                                                                        <option value="3">Category</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="row">
                                                               <div class="col-md-12">
                                                                  <div class="form-group ">
                                                                     <select class="form-control" id="result_type">
																		
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="row">
																<button class="btn btn-success pull-right" type="button" id="deals_activity">Submit</button>
															 </div>
															 <hr>
															<br>
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input type="text" class="form-control"  value="Total Deals" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_deals" type="text" class="form-control" name="total_deals" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>															
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input  type="text" class="form-control"  value="Total Views" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_views" type="text" class="form-control" name="total_views" placeholder="" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input  type="text" class="form-control"  value="Total Purchases" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_purchase" type="text" class="form-control" name="total_purchase" placeholder="" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input  type="text" class="form-control" value="Total Redemptions" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_redeem" type="text" class="form-control" name="total_redeem" placeholder="" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input  type="text" class="form-control"  value="Total Cancellations" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_cancel" type="text" class="form-control" name="total_cancel" placeholder="" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-8">
                                                                  <div class="form-group ">
                                                                     <input type="text" class="form-control" value="Total Value Redeemed" autofocus="" readonly>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                     <input id="total_value_redeem" type="text" class="form-control" name="total_value_redeem" placeholder="" value="0" autofocus="">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="right_side_box">
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="tab_header">
                                                            <div class="title">
                                                               <p><strong>Audience Overview</strong></p>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                            <div class="chart_part">
                                                               <canvas id="pie_chart1"></canvas>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group ">
                                                               <select class="form-control">
                                                                  <option> Views</option>
                                                                  <option>Deal Views</option>
                                                                  <option>Purchases</option>
                                                                  <option>Redemptions</option>
                                                                  <option>Cancellations</option>
                                                               </select>
                                                            </div>
                                                            <div class="form_grp_lable">
                                                               <p>All the above to be viewed Walk-In vs Check-In</p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab9" role="tabpanel" aria-labelledby="tab_9-tabselect">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="inner_part">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="tab_header">
                                                   <div class="title">
                                                      <ul class="title_ul">
                                                         <li><strong>Live</strong></li>
                                                         <li> Expired</li>
                                                      </ul>
                                                      <div class="search_rightbox">
                                                         <form class="form-inline mr-auto">
                                                            <div class="search-element">
                                                               <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                                               <button class="btn" type="submit"><i class="ion ion-search"></i></button>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="right_side_drop">
                                                      <ul>
                                                         <li>
                                                            <div class="form-group ">
                                                               <select class="form-control" id="outletchg">
                                                                  <option value="">--Select Outlet--</option>
                                                                  <?php for($i=0;$i<count($outlets);$i++){ ?>
                                                                  <option value="<?php echo $outlets[$i]['OutletId'] ?>"><?php echo $outlets[$i]['OutletName'] ?></option>
                                                                  <?php } ?>  
                                                               </select>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="form-group ">
                                                               <select class="form-control">
                                                                  <option>Top Redemptions</option>
                                                                  <option>Hotel Saravanabhavan</option>
                                                               </select>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="form-group ">
                                                               <select class="form-control">
                                                                  <option>Time Left</option>
                                                                  <option>Hotel Saravanabhavan</option>
                                                               </select>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12" id="dealajax">
                                                <?php $count_live = count($deals);
                                                   for($d=0;$d<count($deals);$d++)
												   {
													   $viewcount =  $this->Common->viewcount($deals[$d]['DealId']); 
													   $boughtcount = $this->Common->boughtcount($deals[$d]['DealId']);
													   $redeemcount = $this->Common->redeemcount($deals[$d]['DealId']);
													   $date = $deals[$d]['EndDate'];
													   $time = $deals[$d]['EndTime'];
													   $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
													   $diff = strtotime($combinedDT)-time();
                                                   ?>
                                                <input type="hidden" value="<?php echo $count_live; ?>" id="count_live" />
                                                <div class="card mt-3">
                                                   <div class="card-body">
                                                      <div class="row">
                                                         <div class="col-md-8">
                                                            <div class="data_cart">
                                                               <div class="tab_header">
                                                                  <div class="title">
                                                                     <h4><?php echo $deals[$d]['DealName'];?></h4>
                                                                     <ul class="card_title_ul">
                                                                        <li><span><?php echo $deals[$d]['OutletName'];?> </span></li>
                                                                        <li><span><?php echo $deals[$d]['HotalName'];?></span></li>
                                                                        <li><span><?php echo $deals[$d]['OutletLocation'];?></span></li>
                                                                        <li><span class="last_child"><?php echo $deals[$d]['city_name'];?></span></li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-6">
                                                                  <ul class="live_card_box">
                                                                     <li>Views : <span><?php echo $viewcount; ?></span></li>
                                                                     <li>Bought : <span><?php echo $boughtcount; ?></span></li>
                                                                     <li>Redemptions : <span><?php echo $redeemcount; ?></span></li>
                                                                     <li>Cancellation : <span></span></li>
                                                                     <li>Time Left : <span class="data_time" id="timer" data-id="<?php echo $diff; ?>"  ></span></li>
                                                                  </ul>
                                                               </div>
                                                               <div class="col-md-6">
                                                                  <ul class="live_card_box">
                                                                     <li>Deal ID : <span>RODI020</span></li>
                                                                     <li>Created by : <span>Username</span></li>
                                                                     <li>Creation Date : <span>25</span></li>
                                                                     <li>Creation Time : <span></span></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <div class="live_right_box">
                                                               <div class="right_side_box">
                                                                  <div class="row">
                                                                     <div class="col-md-12">
                                                                        <div class="tab_header">
                                                                           <div class="title">
                                                                              <p><strong>Audience Overview</strong></p>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                           <div class="chart_part">
                                                                              <canvas id="pie_chart2" width="100" height="100"></canvas>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                           <div class="form-group ">
                                                                              <select class="form-control">
                                                                                 <option> Views</option>
                                                                                 <option>Deal Views</option>
                                                                                 <option>Purchases</option>
                                                                                 <option>Redemptions</option>
                                                                                 <option>Cancellations</option>
                                                                              </select>
                                                                           </div>
                                                                           <div class="form_grp_lable">
                                                                              <p>All the above to be viewed Walk-In vs Check-In</p>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab10" role="tabpanel" aria-labelledby="tab_10-tabselect">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                                       <div class="card">
                                          <div class="card-header">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="row">
                                                      <div class="col-md-6">
                                                         <div class="tab_header">
                                                            <div class="title">
                                                               <p><strong>Sales & Feedback Report</strong></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                         <div class="search_rightbox">
                                                            <form class="form-inline mr-auto">
                                                               <div class="search-element">
                                                                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                                                  <button class="btn" type="submit"><i class="ion ion-search"></i></button>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="margin-top">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="duration_part">
															<?php echo form_open(SITE_URL.'Admin/salesajx',array('class' => 'needs-validation', 'id' => "filterfrm" )); ?>
                                                               <div class="col-md-12">
                                                                  <div class="row ">
                                                                     <div class="col-md-2">
                                                                        <div class="custom-control custom-radio">
                                                                           <input type="radio" id="until" value="1" name="radiochk" class="custom-control-input show1 showw">
                                                                           <label class="custom-control-label" for="until">Until Date</label>
                                                                        </div>
                                                                     </div>
																	 <div class="col-md-2">
                                                                        <div class="custom-control custom-radio">
                                                                           <input type="radio" id="daterangee" value="2" name="radiochk" class="custom-control-input show2 showw">
                                                                           <label class="custom-control-label" for="daterangee">Date Range</label>
                                                                        </div>
                                                                     </div>
																	</div>
																<div class="row ">
																	<div class="col-md-12">
																	 <div id="daterangedv">
																		 <div class="col-md-6">
																			<div class="form-group">
																			   <div class="input-group">
																				  <div class="input-group-prepend">
																					 <div class="input-group-text"><i class="ion ion-clock"></i></div>
																				  </div>
																				  <input type="text" name="frmdate" class="form-control bootstrap-datepicker" autocomplete="off">
																			   </div>
																			</div>
																		 </div>
																		 <div class="col-md-6">
																			<div class="form-group">
																			   <div class="input-group">
																				  <div class="input-group-prepend">
																					 <div class="input-group-text"><i class="ion ion-clock"></i></div>
																				  </div>
																				  <input type="text" name="todate" class="form-control bootstrap-datepicker" autocomplete="off">
																			   </div>
																			</div>
																		 </div>
																	 </div>
																	 </div>
                                                                  </div>
																  <hr>
                                                                  <div class="row ">
                                                                     <div class="col-md-2">
                                                                        <p>&nbsp </p>
                                                                     </div>
                                                                     <div class="col-md-5">
                                                                        <div class="form-group ">
                                                                           <select class="form-control" name="outletid">
                                                                              <option>View by Outlet</option>
                                                                              <?php for($i=0;$i<count($outlets);$i++){
																				echo '<option value="'.$outlets[$i]['OutletId'].'">'.$outlets[$i]['OutletName'].'</option>';
																			  }
																			  ?>
																			 
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                           <div class="campaign_btn">
                                                                              <button type="button" id="submitbtn" class="btn btn-outline-primary btn-block">View</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
															   </form>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="exporting_title_part margin-bottom">
                                                      <div class="row">
                                                         <div class="col-md-4">
                                                            <p><strong>Export Options</strong></p>
                                                         </div>
                                                         <div class="col-md-8">
                                                            <div class="radio_part">
                                                               <div class="row">
                                                                  <div class="col-md-4">
                                                                     <div class="custom-control custom-radio">
                                                                        <input type="radio" id="chek1" name="radio" class="custom-control-input show1">
                                                                        <label class="custom-control-label" for="chek1">XLS</label>
                                                                     </div>
                                                                     <div class="custom-control custom-radio">
                                                                        <input type="radio" id="chek2" name="radio" class="custom-control-input show2">
                                                                        <label class="custom-control-label" for="chek2">PDF</label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="Show User Feedback">
                                                                        <label class="custom-control-label" for="Show User Feedback">Show User Feedback</label>
                                                                     </div>
                                                                     <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="Show Outlet Rating">
                                                                        <label class="custom-control-label" for="Show Outlet Rating">Show Outlet Rating</label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <div class="campaign_btn">
                                                                        <a href="#" class="btn btn-outline-primary btn-block" id="modal-2">Export</a>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="exporting_below_part margin-top ">
                                                      <div class="row">
                                                         <div class="col-md-4">
                                                            <p>Charming Bistro</p>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <p>Rating: </p>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <p>Total Amount :</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="table-responsive">
                                                   <table class="table table-bordered" id="example4">
														<thead>
                                                         <tr>
                                                            <th>#</th>
                                                            <th>Voucher ID</th>
                                                            <th>Deal ID</th>
                                                            <th>Pax</th>
                                                            <th>Redeemed On</th>
                                                            <th>Amount</th>
                                                            <th>Rating</th>
                                                            <th>Addl. Comments</th>
                                                         </tr>
													  </thead>
													  <tbody>
														
														<?php
															$j = 1;
															for($i=0;$i<count($sales);$i++)
															{
																echo '<tr>';
																echo '<td>'.$j++.'</td>';
																echo '<td>'.$sales[$i]['PurchaseId'].'</td>';
																echo '<td>'.$sales[$i]['UniqueId'].'</td>';
																echo '<td>'.$sales[$i]['NofPack'].'</td>';
																echo '<td>'.$sales[$i]['RedeemOn'].'</td>';
																echo '<td>'.$sales[$i]['TotalAmt'].'</td>';
																echo '<td></td>';
																echo '<td></td>';
																echo '</tr>';
															}
														?>
														
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                             <div class="card-footer text-right">
                                                <nav class="d-inline-block">
                                                   <ul class="pagination mb-0">
                                                      <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a></li>
                                                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                      <li class="page-item"><a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a></li>
                                                   </ul>
                                                </nav>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
   </section>
</div>

<div id="addrooms" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Room</h4>
      </div>
      <div class="modal-body">
	  <?php echo form_open_multipart(SITE_URL.'Admin/addrooms',array('class' => 'needs-validation', "autocomplete" => "off")); ?>
		<input type="hidden" name="hotelid" value="<?php echo $urih; ?>"/>
		<input type="hidden" name="cityid"  value="<?php echo $uric; ?>"/>
			<div class="row">
				<div class="col-md-9">
					<div class="left_side_box">
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check11">Room Type</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<select class="form-control" name="room_type" required>
												<option value="1">Standard</option>
												<option value="2">Deluxe</option>
												<option value="3">Suite</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check12">No. of rooms in category</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<input id="no_ofroom" type="text" value="" class="form-control" name="no_ofroom"  required><span id="errmsg" style="color:red;"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check13">Bed Type</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<select class="form-control" name="bed_type" required>
												<option value="1">Twin</option>
												<option value="2">King</option>
												<option value="3">Queen</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check14">Room Size</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<input id="room_size" type="text" value="" class="form-control" name="room_size" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check15">Mini Bar</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline11" name="minibar" value="1" class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline11">Yes</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline21" name="minibar"value="2" class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline21">No</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check16">Work Space</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline12" name="workspace" value="1" class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline12">Yes</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline22" name="workspace" value="2" class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline22">No</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check17">Bath Tub</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline13" name="bathtub" value="1" class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline13">Yes</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline23" name="bathtub" value="2"  class="custom-control-input" required >
												<label class="custom-control-label" for="customRadioInline23">No</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="title_side_box">
									<div class="form-group">
										<div class="custom-control">
											<label class="" for="check17">Room Image</label>
										</div>
									</div>
									<p></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group ">
											<input type="file" name="roomimage[]" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      </div>
      <div class="modal-footer">
		<input type="submit" name="submit" class="btn btn-primary" value="submit">
        <button type="button" class="btn btn-default" id="close_room" data-dismiss="modal">Close</button>
      </div>
	  <?php echo form_close(); ?>
    </div>
  </div>
</div>


<input id="swaprimg" type="hidden">
<input id="swaprimgg" type="hidden">
<div class="modal fade modal_border_input" id="myModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title pull-left">Edit User</h5>
         </div>
         <?php echo form_open_multipart(SITE_URL.'Admin/updatehuser', array('id' => 'form_validation')); ?>
			 <input type="hidden" name="hotelid" value="<?php echo $urih; ?>">
			 <input type="hidden" name="cityid"  value="<?php echo $uric; ?>">
			 <input type="hidden" name="check"   value="1">
			 <div class="modal-body" id="edit_modal">
			 </div>
			 <div class="modal-footer">
				<button type="submit" class="btn btn-success">Update</button>
			 </div>
         <?php echo form_close(); ?>
      </div>
   </div>
</div>
<div class="modal fade modal_border_input" id="myHotel" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title pull-left">Edit Room</h5>
         </div>
         <?php echo form_open_multipart(SITE_URL.'Admin/updateroom', array('id' => 'mainfrm')); ?>
         <div class="modal-body" id="edit_hotel">
            <input type="hidden" name="hotelid" value="<?php echo $urih; ?>">
            <input type="hidden" name="cityid"  value="<?php echo $uric; ?>">
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
         <?php echo form_close(); ?>
      </div>
   </div>
</div>
<?php $this->load->view('footer'); ?>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDvD_2tbTwBOdqz9zdeIO0jFZLJ_1aRaUM"></script>-->
<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDvD_2tbTwBOdqz9zdeIO0jFZLJ_1aRaUM&sensor=false&libraries=places&language=en-AU"></script-->


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvD_2tbTwBOdqz9zdeIO0jFZLJ_1aRaUM&libraries=drawing&callback=initialize"
         async defer></script>


<script>
$("#close_room").click(function()
{
	$("#addrooms").modal('hide');
});
$(".close").click(function()
{
	$("#addrooms").modal('hide');
});


  $("#no_ofroom").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
</script>
<script>
$('#hotel').change(function(){
		var city  = $('#city').val();
		var hotel = $('#hotel').val();
		
		if(city == '')
		{
			alert('Select City');
		}else{
			window.location.href = "<?php echo SITE_URL.'Admin/hotel/'; ?>"+city+'/'+hotel; 
		}
   });
   
	$(".numcheck").on("keypress keyup blur",function (event) {    
	   $(this).val($(this).val().replace(/[^\d].+/, ""));
		if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	
	var autocomplete = new google.maps.places.Autocomplete($("#locationname")[0], {});

	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		//alert(place.address_components[0].long_name);
		console.log(place.address_components[0].long_name);
		$("#locationname").val(place.address_components[0].long_name);
	});


   var hotel_id =	"<?php echo $urih; ?>";
   if(hotel_id!=''){
    var qrcode =	"<?php echo $qrcode; ?>";
   		if(qrcode!=''){
   			document.getElementById('qrImage').src = "https://chart.googleapis.com/chart?cht=qr&chl=" + "<?php echo $qrcode; ?>" + "&chs=160x160&chld=L|0";
   		}
   } 
   let generateQr = () => {
		let tenDigitQr = Math.floor((Math.random() * 10000000000) + 1)
		
		document.getElementById("hidden_qr").value = tenDigitQr;
		
		
		//alert(tenDigitQr);
		document.getElementById('qrImage').src = "https://chart.googleapis.com/chart?cht=qr&chl=" + tenDigitQr + "&chs=160x160&chld=L|0"
	}
	
	
		
	let generateQrrr= () => {
		let tenDigitQrrr = Math.floor((Math.random() * 10000000000) + 1)
		
		$('.dispqr').val(tenDigitQrrr);
		$(".dispqr input:text").val(tenDigitQrrr ); 

		
		//using Jquery
		// $(".qrImage").attr("src", "https://chart.googleapis.com/chart?cht=qr&chl=" +tenDigitQr+ "&chs=160x160&chld=L|0");
		document.getElementById("hidden_qrrr").value = tenDigitQrrr;
		
		document.getElementById('qrImageeee').src = "https://chart.googleapis.com/chart?cht=qr&chl=" + tenDigitQrrr + "&chs=160x160&chld=L|0"
	}
	
	
   
   $('#city').change(function()
   {
   	var hotel = $('#hotel').val();
   });
   function rhmgdel(hid)
   {
   	var city = '<?php echo $urih; ?>';
   	var hotel = '<?php echo $uric; ?>';
   	var data = "";
       $.ajax({
           type :"POST",
           url  : "<?php echo SITE_URL.'Admin/delhimg'; ?>",
           data : "hval="+hid,
           async: false,
           success : function(response) {
              window.location.href = "<?php echo SITE_URL.'Admin/hotel/'; ?>"+city+'/'+hotel;
           },
           error: function() {
               //alert('Error occured');
           }
       });
   }
   function rimgdel(rid)
   {
       $.ajax({
           type : "POST",
           url  : "<?php echo SITE_URL.'Admin/delrimg'; ?>",
           data : "rval="+rid,
           async: false,
           success : function(response) {
               
           },
           error: function() {
               //alert('Error occured');
           }
       });
   }
   // drag and drop
   $(document).ready(function() {
   	$('#divOuter2').css("margin","-540px 0 0 400px");
   	$('#divOuter3').css("margin","-540px 0 0 800px");
   
   	$(".droppable").sortable({
   	  update: function( event, ui ) {
   		Dropped();
   	  }
   	});
   });
   function changestatus(sta,id)
   {
	   $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/changestatus'; ?>",
   		data : "status="+sta+"&id="+id,
   		async: false,
   		success : function(response) {
   			location.reload();
   		},
   		error: function() {
   			//alert('Error occured');
   		}
   	});
   }
   function Dropped(event, ui){
   	
     var text = "";
     $(".draggable").each(function(){
   	//var p = $(this).position();
   	alert($(this).attr('id'));
   	text += $(this).attr('id')+',';
     });
     text = text.substring(0,text.length-1);    
     $('#swaprimg').val(text);
     
     $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/updatepos'; ?>",
   		//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
   		async: false,
   		success : function(response) {
   			
   		},
   		error: function() {
   			//alert('Error occured');
   		}
   	});
     refresh();
   }

   function edituser(id)
   {
   	$.get( "<?php echo SITE_URL;?>Admin/edituser/" + id, function( data ) {
   		$('#myModal').modal('show');

   		$("#edit_modal").html(data);
   	});
   
   }

   function deleteuser(id)
   {
   	 var city = '<?php echo $urih; ?>';
   	 var hotel = '<?php echo $uric; ?>';
   	  $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/deleteuser'; ?>",
   		data : "rid="+id,
   		async: false,
   		success : function(response) {
   			window.location.href = "<?php echo SITE_URL.'Admin/hotel/'; ?>"+city+'/'+hotel;
   		},
   		error: function() {
   			//alert('Error occured');
   		}
   	});
   }

   function edithotel(id)
   {
   	//alert(id);
   	
   	$.get( "<?php echo SITE_URL;?>Admin/edithotel/" + id, function( data ) {
   		$('#myHotel').modal('show');
   		$("#edit_hotel").html(data); 
   	});
   
   }
   
   function deleteroom(rid)
   {
		var city = '<?php echo $urih; ?>';
		var hotel = '<?php echo $uric; ?>';
		
		  $.ajax({
			type : "POST",
			url  : "<?php echo SITE_URL.'Admin/deleteroom'; ?>",
			data : "rid="+rid,
			async: false,
			success : function(response) {
				//window.location.href = "<?php echo SITE_URL.'Admin/hotel/'; ?>"+city+'/'+hotel;
				location.reload();
			},
			error: function() {
				
			}
		});
   }
   
   
   
   //added delete fence 
   function deletefence(fid)
   {
		
		  $.ajax({
			type : "POST",
			url  : "<?php echo SITE_URL.'Admin/deletefence'; ?>",
			data : "fid="+fid,
			async: false,
			success : function(response) {				
				location.reload();
			},
			error: function() {
				
			}
		});
   }
   
   
   
   

   $(document).ready(function() {
	   var max_fields_limit = 10; 
	   var x = 1; 
	   $('.add_more_button').click(function(e){ 
		   e.preventDefault(); 
		   $('.adduser').removeClass('hide');
		   if(x < max_fields_limit){ 
			    x++; 
				var y = x-1;
			   $('.input_fields_container').append('<div class="card_data"> <div class="card-header"> <div>User '+y+'</div ></div><div class="collapse show" id="mycard-collapse1" style=""> <div class="card-body"> <div class="row"> <div class="col-md-4"> <div class="form-group "> <select class="form-control" name="userole[]" required> <option value="Role">Role</option> <option value="Personal">Personal</option> </select> </div></div><div class="col-md-4"> <div class="form-group "> <input id="username" type="text" class="form-control" name="username[]" placeholder="Username" required> </div></div><div class="col-md-4"> <div class="form-group "> <input id="password" type="password" minlength="6" class="form-control" name="password[]" placeholder="Password" required> </div></div><div class="col-md-4"> <div class="form-group "> <input id="first_name" type="text" class="form-control" name="first_name[]" placeholder="Name" required> </div></div><div class="col-md-4"> <div class="form-group "> <input id="mobile" type="text" maxlength="10" class="form-control" name="mobile[]" placeholder="Phone" required> </div></div><div class="col-md-4"> <div class="form-group "> <input id="usremail" type="email" class="form-control" name="usremail[]" placeholder="Email" required> </div></div><div class="col-md-2 remove_field "><div class="btn_add"><button class="btn btn-default btn_round"><i class="ion-minus-round"></i></button></div></div></div></div></div></div>'); //add input field
		   }
		});  
	   $('.input_fields_container').on("click",".remove_field", function(e){ 
		   e.preventDefault();  $(this).parent('div').remove();  x--;
	   })
   });
	
	//subscription
	$(document).ready(function() {
	   var max_fields_limit = 10; 
	   var x = 1; 
	   $('.subscdur').click(function(e){ 
		   e.preventDefault(); 
		   if(x < max_fields_limit){ 
			    x++; 
				var y = x-1;
			   $('.input_fields_containersub').append('<div class="collapse show" id="mycard-collapse1" style=""> <div class="card-body"> <div class="row"> <div class="col-md-3"><div class="form-group"><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" id="subfrm'+x+'" name="subfrm[]" ></div></div></div><div class="col-md-3"> <div class="form-group "><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" id="subto'+x+'" name="subto[]"></div></div></div> <div class="col-md-3"> <div class="form-group "> <input id="subscdur'+x+'" type="text" class="form-control" name="subscdur[]" readonly > </div></div><div class="form-group"><div class="input-group"> <input type="checkbox" name="active[]" class="form-control" value=""> <label>Active</label></div></div><div class="col-md-2 remove_field "><div class="btn_add"><button class="btn btn-default btn_round"><i class="ion-minus-round"></i></button></div></div></div></div></div>'); //add input field
		   }
		   $("#subto"+x).change(function()
			{
				
				var subto  = $(this).val();
				var subfrm = $("#subfrm"+x).val();
				var timeDiff = Date.parse(subto) - Date.parse(subfrm);
				 var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
				  $("#subscdur"+x).val(daysDiff);
			});
		   $('.bootstrap-datepicker').datepicker({
				"autoclose": true
			});
		});  
	   $('.input_fields_containersub').on("click",".remove_field", function(e){ 
		   e.preventDefault();  $(this).parent('div').remove();  x--;
	   })
   });
   
   //trial Period
   $(document).ready(function() {
	   var max_fields_limit = 10; 
	   var x = 1; 
	   $('.trialperiod').click(function(e){ 
		   e.preventDefault(); 
		   if(x < max_fields_limit){ 
			    x++; 
				var y = x-1;
			   $('.input_fields_containertrial').append('<div class="collapse show" id="mycard-collapse1" style=""> <div class="card-body"> <div class="row"> <div class="col-md-3"><div class="form-group"><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" placeholder="Trial From" name="trialfrm[]" ></div></div></div><div class="col-md-3"> <div class="form-group "><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" name="trialto[]" placeholder="Trial To"></div></div></div><div class="col-md-3"> <div class="form-group "> <input type="text" class="form-control" name="trialremark[]" placeholder="Remarks"> </div></div><div class="form-group"><div class="input-group"> <input type="checkbox" name="activetrial[]" class="form-control" value=""> <label>Active</label></div></div><div class="col-md-2 remove_field "><div class="btn_add"><button class="btn btn-default btn_round"><i class="ion-minus-round"></i></button></div></div></div></div></div>'); //add input field
		   }
		   $('.bootstrap-datepicker').datepicker({
				"autoclose": true
			});
		});  
	   $('.input_fields_containertrial').on("click",".remove_field", function(e){ 
		   e.preventDefault();  $(this).parent('div').remove();  x--;
	   })
   });
   
   // Before tax
   $(document).ready(function() {
	   var max_fields_limit = 10; 
	   var x = 1; 
	   $('.subsctax').click(function(e){ 
		   e.preventDefault(); 
		   if(x < max_fields_limit){ 
			    x++; 
				var y = x-1;
			   $('.input_fields_containertax').append('<div class="collapse show" id="mycard-collapse1" style=""> <div class="card-body"> <div class="row"> <div class="col-md-3"><div class="form-group"><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" name="subscfrm[]" ></div></div></div><div class="col-md-3"> <div class="form-group "><div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"><i class="ion ion-calendar"></i></div></div><input type="text" class="form-control bootstrap-datepicker" name="subscto[]"></div></div></div><div class="col-md-3"> <div class="form-group "> <input type="text" class="form-control" name="subscamt[]"> </div></div><div class="form-group"><div class="input-group"> <input type="checkbox" name="active[]" class="form-control" value=""> <label>Active</label></div></div><div class="col-md-2 remove_field "><div class="btn_add"><button class="btn btn-default btn_round"><i class="ion-minus-round"></i></button></div></div></div></div></div>'); //add input field
		   }
		   $('.bootstrap-datepicker').datepicker({
				"autoclose": true
			});
		});  
	   $('.input_fields_containertax').on("click",".remove_field", function(e){ 
		   e.preventDefault();  $(this).parent('div').remove();  x--;
	   })
   });
   
   $(document).ready(function() {
		$('#divOuter2').css("margin","-540px 0 0 400px");
		$('#divOuter3').css("margin","-540px 0 0 800px");
	   
		$(".droppableee").sortable({
		  update: function( event, ui ) {
			Dropped();
		  }
		});
   });
   
   function Dropped(event, ui)
   {   	
     var text = "";
     $(".draggableee").each(function(){
		text += $(this).attr('id')+',';
     });
     text = text.substring(0,text.length-1);    
     $('#swaprimgg').val(text);
     var swapimg 	=	$('#swaprimgg').val();
     
     
     $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/updatepos'; ?>",
   		data : "hval="+swapimg,
   		async: false,
   		success : function(response) {
   			
   		},
   		error: function() {
   		}
   	});
     refresh();
   }


   $("#outlet_type").change(function()
   {
   //	var hotelid     = <?php echo $urih; ?>;
   	var outlet_val 	= $(this).val();
   	
   	 $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/outlettype'; ?>",
   		data : "oval="+outlet_val,
   		async: false,
   		success : function(response) {
   			$(".outlet_form").html(response);
			
			
   		},
   		error: function() {
   		}
   	});
   });
</script>
<script type="text/javascript">
   //var PathData = [[13.017780298613227,80.23983232676983],[13.017564703182908,80.24053305387498],[13.016691213111157,80.24015285074711],[13.016846377054835,80.23915708065033]];
   
   var PathData = [[<?php echo $response; ?>]];
   var mardata = PathData[0];
   var MarkerData = mardata;
   
   function initialize() {
   	
   	var mapOptions = {
   		  zoom: 0,
   		// center: MarkerData,
   		  mapTypeId: 'satellite'
   		};
   	var map        = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
   	var infowindow = new google.maps.InfoWindow();
   	var center     = new google.maps.LatLng(MarkerData[0], MarkerData[1]);
   	var marker     = new google.maps.Marker({
   		position: center,
   		map: map,
   		title: MarkerData[2]
   	});
   	marker.setMap(map);
   	google.maps.event.addListener(marker, 'click', function() {
   		infowindow.setContent(this.title);
   		infowindow.open(map, this);
   		
   	});
   
   	var path = [];
   	var bounds = new google.maps.LatLngBounds();
   	//bounds.extend(center);
   
   	for (var i in PathData)
   	{
   		var p = PathData[i];
   		var latlng = new google.maps.LatLng(p[0], p[1]);
   		path.push(latlng);
   		bounds.extend(latlng);
   	}
   	var poly = new google.maps.Polygon({
   		paths: path,
   		strokeColor: '#FF0000',
   		strokeOpacity: 0.8,
   		strokeWeight: 3,
   		fillColor: '#FF0000',
   		fillOpacity: 0.1
   	});
   	
   	poly.setMap(map);
   		
   	map.fitBounds(bounds);
   	map.setZoom(map.getZoom()-1); 
	
	
	
	//Drawing the new fence and alert the coordinates
	//var polygonArray = [];
	var pts;
	var drawingManager = new google.maps.drawing.DrawingManager({
        //drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [           
            google.maps.drawing.OverlayType.POLYGON]
        },
 polygonOptions: {
            fillColor: '#BCDCF9',
            fillOpacity: 0.5,
            strokeWeight: 2,
            strokeColor: '#57ACF9',
            clickable: false,
            editable: false,
            zIndex: 1
        }
    });
    //console.log(drawingManager)
    drawingManager.setMap(map)
 google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
 pts ="";
        for (var i = 0; i < polygon.getPath().getLength(); i++) {
 pts += polygon.getPath().getAt(i).toUrlValue(6) + ",";
        }
        //polygonArray.push(polygon);
        alert(pts);
		drawingManager.set('drawingMode');
 });
	
	
	
//end	
	
	
	
	
	
   }
   
   google.maps.event.addDomListener(window, 'load', initialize);
   //google.maps.event.trigger(initialize, 'resize');
   
   
   
</script>



<script>

//adding script to hide/show the drawing modes using drawing control
$(document).ready(function() {
	
	
	drawingManager.setOptions({
  drawingControl: false
});
		
   });





</script>


<!--adding new script -->
<!--script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,drawing&ext=.js"></script-->



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><!-- -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><!-- -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script><!-- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><!-- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><!-- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><!-- -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><!-- -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
	
	$('.showw').change(function(){
		var val = $("input[name='radiochk']:checked").val();
		if(val == 2)
		{
			$('#daterangedv').show();
		}else{
			$('#daterangedv').hide();
		}	
	});
	
	
   $(document).ready(function() {
	   $('#daterangedv').hide();
       $('#example1').DataTable( {
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel', 'pdf'
           ]
       } );
   } );

   $(document).ready(function() {
       $('#example2').DataTable( {
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel', 'pdf'
           ]
       } );
   } );
   
   $(document).ready(function() {
       $('#example3').DataTable( {
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel', 'pdf'
           ]
       } );
   } );
   
   $(document).ready(function() {
       $('#example4').DataTable( {
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel', 'pdf'
           ]
       } );
   } );
   
   
   $(document).ready(function() {
       $('#example5').DataTable( {
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel', 'pdf'
           ]
       } );
   } );
   

   
   //converting fencedd table into datatable
   
   /*$(document).ready(function() {
       $('#fencedd').DataTable({searching: false});
   } );*/
   
   
   
   
   
   
   
   //define your time in second
   
   	var countlive = $("#count_live").val();
   	//alert(countlive);
   	for(i=0;i<countlive;i++)
	{
		var dat_val = $("span #timer").data('id');
   		
   		///var time_val = $("span #timer").data('user');
   		//=dat_val;
   		var c = 3492347;
   		var t;
   		timedCount();
    
   		function timedCount()
   		{
    
   			var hours = parseInt( c / 3600 ) % 24;
   			var minutes = parseInt( c / 60 ) % 60;
   			var seconds = c % 60;
    
   			var result = (hours < 10 ? "0" + hours : hours) + "h:" + (minutes < 10 ? "0" + minutes : minutes) + "m:" + (seconds  < 10 ? "0" + seconds : seconds)+"s";
    
   			
   			$('#timer').html(result);
   			c = c - 1;
   			t = setTimeout(function()
   			{
   			 timedCount()
   			},
   			1000);
   		}
   	}
   

$("#select_type").change(function()
{
	var select_val = $(this).val();
	if(select_val==1 || select_val==3 ){
		$("#result_type").show();
	var hotel = '<?php echo $urih; ?>';
	 $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/typedetails'; ?>",
   		data : "select_val="+select_val+"&hotel="+hotel,
   		//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
   		async: false,
   		success : function(response) {
   			$("#result_type").html(response);
   		},
   		error: function() {
   			//alert('Error occured');
   		}
   	});
	}else if(select_val==2)
	{
		$("#result_type").hide();
		var hotel = '<?php echo $urih; ?>';
		 $.ajax({
			type : "POST",
			url  : "<?php echo SITE_URL.'Admin/fullhoteldetails'; ?>",
			data : "hotel="+hotel,
			//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
			async: false,
			success : function(response) {
				var obj = JSON.parse(response);
				//alert(obj.name);
				$("#total_deals").val(obj.name);
				$("#total_views").val(obj.name1);
				$("#total_purchase").val(obj.name2);
				$("#total_redeem").val(obj.name3);
				$("#total_cancel").val(obj.name4);
				$("#total_value_redeem").val(obj.name5);
			},
			error: function() {
				//alert('Error occured');
			}
		});
	}
});

$("#deals_activity").click(function()
{
	var type_val = $("#select_type").val(); 
	if(type_val==1)
	{
		//alert(type_val);
		var select_val = $("#result_type").val();
		var duration 	= $("input[name='dcustomRadio']:checked").val();
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var hotel = '<?php echo $urih; ?>';
		 $.ajax({
			type : "POST",
			url  : "<?php echo SITE_URL.'Admin/outletdetails'; ?>",
			data : "select_val="+select_val+"&hotel="+hotel+"&duration="+duration+"&from_date="+from_date+"&to_date="+to_date,
			//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
			async: false,
			success : function(response) {
				var obj = JSON.parse(response);
				//alert(obj.name);
				$("#total_deals").val(obj.name);
				$("#total_views").val(obj.name1);
				$("#total_purchase").val(obj.name2);
				$("#total_redeem").val(obj.name3);
				$("#total_cancel").val(obj.name4);
				$("#total_value_redeem").val(obj.name5);
			},
			error: function() {
				//alert('Error occured');
			}
		});
	}
	else if(type_val==3)
	{
		var select_val = $("#result_type").val();
		
		var duration 	= $("input[name='dcustomRadio']:checked").val();
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var hotel = '<?php echo $urih; ?>';
		 $.ajax({
			type : "POST",
			url  : "<?php echo SITE_URL.'Admin/catdetails'; ?>",
			data : "select_val="+select_val+"&hotel="+hotel+"&duration="+duration+"&from_date="+from_date+"&to_date="+to_date,
			//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
			async: false,
			success : function(response) {
				var obj = JSON.parse(response);
				//alert(obj.name);
				$("#total_deals").val(obj.name);
				$("#total_views").val(obj.name1);
				$("#total_purchase").val(obj.name2);
				$("#total_redeem").val(obj.name3);
				$("#total_cancel").val(obj.name4);
				$("#total_value_redeem").val(obj.name5);
			},
			error: function() {
				//alert('Error occured');
			}
		});
	}
});

$('#outletchg').change(function()
{
	var selval = $(this).val();
	$.ajax({
		type : "POST",
		url  : "<?php echo SITE_URL.'Admin/outletdeal'; ?>",
		data : "select="+selval,
		async: false,
		success : function(response) {
			$('#dealajax').html(response);
		},
		error: function() {
			alert('Error occured');
		}
	});
});
   function delete_outlet(id)
   {
   	var city = '<?php echo $uric; ?>';
   	var hotel = '<?php echo $urih; ?>';
   	 $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/delete_outlet'; ?>",
   		data : "id="+id,
   		//data : "hid="+<?php echo $urih; ?>+"&posi="+$('#swaprimg').val(),
   		async: false,
   		success : function(response) {
   			window.location.href = "<?php echo SITE_URL.'Admin/hotel/' ?>"+city+'/'+hotel;
   		},
   		error: function() {
   			//alert('Error occured');
   		}
   	});
   }
   
     //default QR image
	
</script>
<script>
$("#subto").change(function()
{
	var subto  = $(this).val();
	var subfrm = $("#subfrm").val();
	var timeDiff = Date.parse(subto) - Date.parse(subfrm);
     var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
	  $("#subscdur").val(daysDiff);
});

$('#submitbtn').click(function(){
	alert('inn');
	 $.ajax({
   		type : "POST",
   		url  : "<?php echo SITE_URL.'Admin/salesajx'; ?>",
   		data : $('#filterfrm').serialize(),
   		async: false,
   		success : function(response) {
   			
			
   		},
   		error: function() {
   			alert('Error occured');
   		}
   	});
});
</script>

<script> 

</script>
