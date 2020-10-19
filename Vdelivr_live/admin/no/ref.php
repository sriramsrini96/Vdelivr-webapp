//<!--?php
					//session_start();
					//$_SESSION['oonwebuser'] = data.name;
                    //$_SESSION['oonwebuemail'] = data.email;
					//?-->





					<?php
										   if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonupass'])){  ?>
										   <li class="hide_on_mobile login_signup" style="position: absolute">

		                                     <b class="icon-color  btn fifth "  style="cursor: pointer; margin-top: 5px; display: block">
		                                       <?php echo $_SESSION['weboonuname'];?>
		                                     </b>
											 <ul class="dropdown-menu" role="menu">
									          <li><a href="logout.php">Logout</a></li>
									         </ul>
		                                   </li>
										   <?php
										   }
										   else{
											 ?>


											 <?php
										   }
											 ?>