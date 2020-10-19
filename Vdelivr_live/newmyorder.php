<?php include 'session_start.php';?>
<?php
if(isset($_SESSION['weboonuid'])&&($_SESSION['weboonuname'])&&($_SESSION['weboonumob'])&&($_SESSION['weboonumail'])){
?>
<?php include 'header.php';?>

	<section class="tilte_part "  style="background: url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/05/06/0659644af23f91e.jpg') center center / cover no-repeat fixed;">
    <div class=" inner_part_title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 ">
                    <h2>My Orders</h2>
					
					<div class="breadcrumbs">
                        <ul>
                            <li><a href="Index.php">Home</a><span class="breadcome-separator">&gt;</span></li>
                            <li>My Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <section class="corporate-about white-bg" ng-controller="CategoryController">
            <div class="category_container">
                <div class="row-2">
                    <div class="all-about">
					    <?php include "categoryimg.php";?>
                    </div>
                </div> 
				<div class="row-2">
                    <div class="all-about">
					   <button class="btn btn-success"  data-toggle="modal" data-target="#success">Success</button>
					   <button class="btn btn-danger"  data-toggle="modal" data-target="#failure">failure</button>
					   <button class="btn btn-info"  data-toggle="modal" data-target="#coming_soon">coming soon</button>
                    </div>
                </div>
            </div>
        </section>
		<section>
		<div class="container page">
		<div class="row" id="ordl">
		<div class="col-md-12">
		<table class="table table-bordered table-responsive">
    <thead>
      <tr>
		<th>SI.NO</th>
		<th>PRODUCT ID</th>
		<th>QUANTITY</th>
		<th>ORDER STATUS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Chicken Curry Cut - Skin On,Chicken Curry Cut - Skin On5</td>
        <td>1</td>
        <td>delivered</td>
      </tr>
      <tr>
        <td>1</td>
        <td>Chicken Curry Cut - Skin On,Chicken Curry Cut - Skin On5</td>
        <td>1</td>
        <td>delivered</td>
      </tr>
      <tr>
         <td>1</td>
        <td>Chicken Curry Cut - Skin On,Chicken Curry Cut - Skin On5</td>
        <td>1</td>
        <td>delivered</td>
      </tr>
    </tbody>
  </table>
		</div>
          
		  </div>
        </div><!-- /.row -->
		</section>


<div class="modal fade success-popup" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        
      </div>
      <div class="modal-body text-center">
         <img src="https://apostille-express.ie/wp-content/uploads/2016/08/if_circle-check_Green.png" width=200>
          <p class="lead">Registration successfully !</p>
          
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade success-popup" id="failure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        
      </div>
      <div class="modal-body text-center">
         <img src="https://userscontent2.emaze.com/images/02b969df-2f0b-42f2-ab72-9c82c8d12b82/af8dad7aca34a61a61c16b257e3d791c.png" width=200>
          <p class="lead">Registration Failed !</p>
          
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade success-popup" id="coming_soon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        
      </div>
      <div class="modal-body text-center">
         <img src="https://cdn3.iconfinder.com/data/icons/coming-soon-1/512/Coming_Soon_Set12-01-512.png" width=200>
          <p class="lead">Coming soon </p>
          
      </div>
      
    </div>
  </div>
</div>



<?php include 'footer.php';?>
<?php 
}
else 
header("Location:index.php");
?>	
	