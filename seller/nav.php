<style>

.skin-blue .sidebar-menu>li>.treeview-menu {
    margin: 0 1px;
    background: #AF8D3C !important;
}

.skin-blue .main-header .logo {
    background-color: #80b500!important;
    color: #f4f4f4!important;
}

.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #000;
    border-left-color: #fff;
}
.sidebar-menu {
    list-style: none;
    background: #fff!important;
    margin: 0;
    padding: 0;
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{
  background-color: #fff !important;
}
.skin-blue .sidebar a {
    color: #000;
}
</style>

<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!--<div class="user-panel" style="background:#F8694A">
            <div class="pull-left image">

			  <?php if($rowuser['img'] !='')
				  {
					  ?>
                    <img src="upload/admin/<?php echo $rowuser['img']?>" class="img-circle" alt="User Image" style="height:45px; width:45px" >
					<?php
				  }
				  else
				  {
					  ?>
					  <img src="dist/img/user.png" class="img-circle" alt="User Image" style="height:45px; width:45px;">
					  <?php
				  }
				  ?>
            </div>
            <div class="pull-left info">
              <p><?php echo $rowuser['name']?> <?php echo $rowuser['lastname']?></p>
			  <?php if($rowuser['loginstatus']==1)
			  {
				  ?>
				   <p style="color:#00C700"><i class="fa fa-circle " ></i> Online</p>
				  <?php

			  }
			  else{
				  ?>
				   <p style="color:#bdc3c7"><i class="fa fa-circle " ></i> Offline</p>
				  <?php
			  }
			  ?>

            </div>
          </div> -->

          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">


		<li class="<?php if($page_name=='dashboard.php' ){ ?>active<?php }?>">
                  <a href="dashboard.php" style="
    background-color: #AF8D3C !important;color:white;margin-left:-11px;padding-left: 25px;
"><i class="fa fa-dashboard"></i> Dashboard</a>

                </li>
		
                 <!-- <li class="treeview <?php  if($page_name=='edit_logo.php' || $page_name=='contactdetail_edit.php' ||$page_name=='add_slider_home.php'||$page_name=='edit_slider.php'|| $page_name=='view_slider_home.php'  || $page_name=='view_banners.php'
				   || $page_name=='edit_ads1.php'){?>active<?php }?>">
                            <a href="">

                <i class="fa fa-picture-o"></i> <span>App CMS</span> <span class="caret  "></span>
       
              </a>
              <ul class="treeview-menu">
                <li>
              <a href="edit_logo.php" >
                <i class="fa fa-circle-o"></i> <span>App Logo</span> 
              </a>
            </li>
            
             <li>
              <a href="contactdetail_edit.php" >
                <i class="fa fa-circle-o"></i> <span>Contact Detail</span> 
              </a>
            </li>
            
	      <-<li>-->
       <!--       <a href="view_slider_home.php" >-->
       <!--         <i class="fa fa-circle-o"></i> <span>App Slider</span> -->
       <!--       </a>-->
       <!--     </li>-->
             <!--  <li>
              <a href="view_banners.php" >
                <i class="fa fa-circle-o"></i> <span>Advertisment</span> 
              </a>
            </li> -->
					
            <!-- </ul>
                </li> --> 
		 <!-- <li class="treeview <?php if($page_name=='add-category.php' || $page_name=='view-category.php'||$page_name=='edit-category.php'   ){?>active<?php }?>">
              <a href="#">
                <i class="fa fa-dedent"></i> <span>Category </span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
                <li>
               <a href="view-category.php"><i class="fa fa-circle-o"></i> Manage Category</a>
            </li>

                <li>
                  <a href="add-category.php?addid=<?php echo $rowuser['seller_id']?>"><i class="fa fa-circle-o"></i>Add Category</a>

                </li>
                
	             </ul>
                </li>		
                <li class="treeview <?php if($page_name=='add-subcategory.php' ||$page_name=='edit_subcategory.php' || $page_name=='view-subcategory.php'){?>active<?php }?>">
              <a href="#">
                <i class="fa fa-dedent"></i> <span>Sub Category </span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
                <li>
               <a href="view-subcategory.php"><i class="fa fa-circle-o"></i> Manage Sub-Category</a>
            </li>

                <li>
                  <a href="add-subcategory.php?addid=<?php echo $rowuser['seller_id']?>"><i class="fa fa-circle-o"></i>Add Sub-Category</a>

                </li>
                
                
               </ul>
                </li>   
      
 -->
            <!-- <li class="treeview <?php if($page_name=='view-assignbrand.php' || $page_name=='add-assignbrand.php' || $page_name=='edit-assignbrand.php'||$page_name=='view-assignsize.php'|| $page_name=='add-assignsize.php' || $page_name=='edit-assignsize.php' ){?>active<?php }?>">
              <a href="view-assignsize.php">
               <i class="fa fa-dedent"></i> <span>Assignation</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
               
              <li>
                  <a href="view-assignbrand.php"><i class="fa fa-circle-o"></i> Manage Assigned Brands</a>

             </li>
         <li>
                  <a href="view-assignsize.php"><i class="fa fa-circle-o"></i> Manage Assigned Sizes</a>

             </li>
            </ul>
             </li> -->
     

              
            <!--  <li class="treeview <?php if($page_name=='view-size.php' || $page_name=='add-size.php' || $page_name=='edit-size.php' ){?>active<?php }?>">
              <a href="view-category.php">
               <i class="fa fa-dedent"></i> <span>Product Sizes</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
               
              <li>
                  <a href="view-size.php"><i class="fa fa-circle-o"></i> Manage Size</a>

             </li>
            
            </ul>
             </li>
 -->
             
                
     <li class="treeview <?php if($page_name=='producttax_edit.php'||$page_name=='single-product.php'||$page_name=='add-product.php'|| $page_name=='view-product.php'||  $page_name=='images-library.php' || $page_name == 'view-uploaded-image-library.php'){?>active<?php }?>">
              <a href="view-product.php">
                <i class="fa fa-list"></i> <span>Products</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
							
							<!-- ?id=<?php echo $rowuser['seller_id'];  ?> -->
							<li >
							<a href="view-product.php"><i class="fa fa-circle-o"></i> Manage Products</a>
							
							</li>
				     <!--  <li>
					<a href="view-inventory.php"><i class="fa fa-circle-o"></i> Manage Inventory</a>
							
							</li> -->
							
						<!-- <li>	
					<a href="excel_add.php"><i class="fa fa-circle-o"></i> Upload CSV</a>
							</li>
					 <li>
					<a href="view-uploaded-image-library.php"><i class="fa fa-circle-o"></i> Upload Images (Library)</a>
							</li>		
					 <li>
					<a href="producttax_edit.php"><i class="fa fa-circle-o"></i> Shipping Rate</a>
					</li>
				 -->

                  </ul>
                </li>           
              
               <li class="treeview <?php if($page_name=='booked-order.php' || $page_name=='single-order.php' || $page_name== 'cancel-order.php' || $page_name=='complete-order.php' ){?>active<?php }?>">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Orders</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
							
							
							<li >
							<a href="booked-order.php"><i class="fa fa-circle-o"></i> Manage Orders</a>
							
							</li>
							<li >
							<a href="shipping-order.php"><i class="fa fa-circle-o"></i> Shipping Orders</a>
							
							</li>
							<li >
							<a href="complete_order.php"><i class="fa fa-circle-o"></i> Complete Orders</a>
							
							</li>
							

                  </ul>
                </li>  


            <!-- <li class="treeview <?php// if($page_name=='view_customer.php'  ){?>active<?php// }?>">-->
            <!--  <a href="view-category.php">-->
            <!--   <i class="fa fa-dedent"></i> <span>Customers</span> <span class="caret  "></span>-->

            <!--  </a>-->
            <!--  <ul class="treeview-menu">-->
               
            <!--  <li>-->
            <!--      <a href="view_customer.php"><i class="fa fa-circle-o"></i> Manage Customer</a>-->

            <!-- </li>-->
            
            <!--</ul>-->
            <!-- </li>-->
 
                
                
               <!--  
                  <li>
              <a href="notification_view.php">
                <i class="fa fa-sign-in"></i> <span>Notification</span>
              </a>
            </li>
             -->

                
			       <li>
              <a href="logout.php">
                <i class="fa fa-sign-in"></i> <span>Logout</span>
              </a>
            </li>
            
       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
