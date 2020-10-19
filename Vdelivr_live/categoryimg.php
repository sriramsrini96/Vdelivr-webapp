<?php
                           include "config.php";
                           $queryc=$conn->prepare("SELECT COUNT(*) FROM categories");
                           $queryc->execute();
                           $countc = $queryc->fetchColumn();
                           if ($countc !=0)
						   {
                             $selc=$conn->prepare("SELECT id,name,image,image2,status FROM categories");
                             $selc->execute();
                             while($rowc = $selc->fetch())
                              {
								echo "<div class='col-lg-3 col-xs-6'>";
                                echo "<div class='single-about'  id='". $rowc['name'] ."'  onmouseover='imgchange(\"admin/upload/catimg/". $rowc['image2'] ."\",\"". $rowc['name'] ."\")' onmouseout='imgchange(\"admin/upload/catimg/". $rowc['image'] ."\",\"". $rowc['name'] ."\")'>";
                                echo "<div class=''>";
								//echo "<a href='category.php' class='about-content'>";
								if($rowc['status']==1){
									echo "<a href='javascript:void(0)' class='about-content catprozzic' id='catprozzic".$rowc['id']."'>";
								}
								else{
									echo "<a href='javascript:void(0)' class='about-content inactiveproductz'>";
								}
                                echo "<div class='img-containter'>";
                                echo "<img src='admin/upload/catimg/". $rowc['image'] ."' style='max-height: 55px' alt='". $rowc['name'] ."' />";
								echo "</div>";
                                echo "<h6>". $rowc['name'] ."</h6>";
                                echo "</a>";
								echo "</div>";
                                echo "</div>";
                                echo "</div>";
								}
							}
                        ?>
