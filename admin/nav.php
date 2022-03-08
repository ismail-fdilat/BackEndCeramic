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
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  
  <ul class="sidebar-menu">
		<li class="<?php if($page_name=='dashboard.php' ){ ?>active<?php }?>">
        <a href="dashboard.php" style="background-color: #AF8D3C !important;color:white;margin-left:-11px;padding-left: 25px;"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>


      <li>
        <a href="view-seller.php">
          <i class="fa fa-dedent"></i> <span>Seller</span>
        </a>
      </li>
        <li>
        <a href="tax.php">
          <i class="fa fa-dedent"></i> <span>Tax</span>
        </a>
      </li>
      
      
            
		  <li class="treeview <?php if($page_name=='view-deal.php' || $page_name=='add-deal.php' || $page_name=='edit-deal.php' || $page_name=='assign-deals-to-product.php' || $page_name=='view-today-deal.php' || $page_name=='assign-today-deals-to-product.php' || $page_name == 'view-banner.php' || $page_name == 'assign-banner-to-product.php' ){?>active<?php }?>">
              <a href="view-deal.php">
               <i class="fa fa-dedent"></i> <span>Slider</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
               
              <li>
                  <a href="view-deal.php"><i class="fa fa-circle-o"></i> Manage Slider</a>

             </li>
        <li>
                  <a href="assign-deals-to-product.php"><i class="fa fa-circle-o"></i>Assigned Slider To Products</a>

             </li>
       <li>
                  <a href="view-today-deal.php"><i class="fa fa-circle-o"></i> Manage Todays Slider</a>

             </li>
             
              <li>
                  <a href="view-banner.php"><i class="fa fa-circle-o"></i> Manage Banner</a>

             </li>
             
             <li>
                  <a href="assign-banner-to-product.php"><i class="fa fa-circle-o"></i>Assigned Banner To Products</a>

             </li>
        <!--<li>
                  <a href="assign-today-deals-to-product.php"><i class="fa fa-circle-o"></i> Assigned Todays Sale To Products</a>

             </li> -->
            </ul>
             </li>
             
		 <li class="treeview <?php if($page_name=='view-subcategory.php' || $page_name=='view-category.php'){
      ?>active<?php }?>">
              
              <a href="view-category.php">
                <i class="fa fa-dedent"></i> <span>Category </span> <span class="caret  "></span>
              </a>
              
              <ul class="treeview-menu">
                <li>
                  <a href="view-category.php"><i class="fa fa-circle-o"></i> Manage Category</a>
                </li>

                <li>
                  <a href="view-subcategory.php"><i class="fa fa-circle-o"></i>Manage Sub-Category</a>
                </li>
               
               </ul>
            </li>	

<!-- <li class="treeview <?php if($page_name=='view-size.php' || $page_name=='add-size.php' || $page_name=='edit-size.php' ){?>active<?php }?>">
              <a href="view-category.php">
               <i class="fa fa-dedent"></i> <span>Product Sizes</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
               
              <li>
                  <a href="view-size.php"><i class="fa fa-circle-o"></i> Manage Size</a>

             </li>
            
            </ul>
             </li> -->

           
        <li class="treeview <?php if($page_name=='view-product.php'){?>active<?php }?>">
              <a href="view-product.php">
                <i class="fa fa-list"></i> <span>Products</span> <span class="caret"></span>
              </a>

              <ul class="treeview-menu">          
                <li >
                  <a href="view-product.php"><i class="fa fa-circle-o"></i> Manage Products</a>
                </li>
              </ul>
          </li>   

     <li class="treeview <?php if($page_name=='booked-order.php' || $page_name=='single-order.php' || $page_name== 'cancel-order.php' || $page_name=='complete-order.php' ){?>active<?php }?>">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Orders</span> <span class="caret  "></span>

              </a>
              <ul class="treeview-menu">
              <li >
              <a href="all_orders.php"><i class="fa fa-circle-o"></i> ALL Orders</a>
              
              </li>
              
              <li >
              <a href="booked-order.php"><i class="fa fa-circle-o"></i> Manage Orders delivery</a>
              
              </li>
              <li >
              <a href="shipping-order.php"><i class="fa fa-circle-o"></i> Shipping Orders</a>
              
              </li>
              <li >
              <a href="complete-order.php"><i class="fa fa-circle-o"></i> Complete Orders</a>
              
              </li>
              <!--<li >-->
              <!--<a href="cancel-order.php"><i class="fa fa-circle-o"></i> Cancelled Orders</a>-->
              
              <!--</li>-->
              

                  </ul>
                </li>   
        <li class="treeview <?php if($page_name=='view-users.php'){?>active<?php }?>">
              <a href="view-users.php">
                <i class="fa fa-list"></i> <span>Users</span> <span class="caret"></span>
              </a>

              <ul class="treeview-menu">          
                <li >
                  <a href="view-users.php"><i class="fa fa-circle-o"></i> Manage Users</a>
                </li>
              </ul>
          </li>   

          
            <li>
              <a href="notification_view.php">
                <i class="fa fa-sign-in"></i> <span>Notification</span>
              </a>
            </li>
            
            <li>
              <a href="contact_us_queries.php">
                <i class="fa fa-sign-in"></i> <span>Contact Us Queries</span>
              </a>
            </li>
            
            <li>
                <a href="logout.php">
                  <i class="fa fa-sign-in"></i> <span>Logout</span>
                </a>
            </li>         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
