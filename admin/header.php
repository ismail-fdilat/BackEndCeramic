<?php
include('config.php');
require "auth.php";


  $full_name = $_SERVER['PHP_SELF'];
  $name_array = explode('/',$full_name);
  $count = count($name_array);
  $page_name = $name_array[$count-1];

  $admin_id=$_SESSION['admin_id'];

if(isset($_SESSION['admin_id']))
{
    $_SESSION['admin_id'];
    
    $connupdate=mysqli_query($conn,"update tbl_admin set loginstatus=1 where id='".$_SESSION['admin_id']."'");
    
    $sqluser=mysqli_query($conn,"select * from tbl_admin where id='".$_SESSION['admin_id']."'");
    $rowuser=mysqli_fetch_assoc($sqluser);
}
    $logoget=mysqli_query($conn,"select * from logo ");
    $logo=mysqli_fetch_assoc($logoget);

$base_url="https://shrinkcom.com/ceramic-api/seller/upload/product/";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="../img/logo.jpg" rel="icon" type="image/x-icon" />
    
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
   
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2.min.css">
    <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">

    
    
   
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <style>
   
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover
{

z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #80b500!important;
    border-color: #80b500 !important;


}   

.sidebar-menu {
    list-style: none;
    background: #000!important;
    margin: 0;
    padding: 0;
}
.skin-blue .main-header .navbar {
    background-color:#AF8D3C;
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #000;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
    width: 35px;
    height: 20px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #fd683e;
}

input:focus + .slider {
  box-shadow: 0 0 1px #fd683e;
}

input:checked + .slider:before {
  -webkit-transform: translateX(14px);
  -ms-transform: translateX(14px);
  transform: translateX(14px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style> 
</head>

    <body class="hold-transition skin-blue sidebar-mini" data-theme-version="dark" data-headerbg="color_3">
        <div id="preloader">
            <div class="gooey">
    		  <span class="dot"></span>
    		  <div class="dots">
    			<span></span>
    			<span></span>
    			<span></span>
    		  </div>
    		</div>
        </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="#" class="brand-logo">
				<img src="upload/<?php echo $logo['image'];?>" alt="" />
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="nav-item">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
                                <a class="nav-link bell-link ai-icon" href="notification_view.php">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M22.4604 3.84888H5.31685C4.64745 3.84961 4.00568 4.11586 3.53234 4.58919C3.059 5.06253 2.79276 5.7043 2.79202 6.3737V18.1562C2.79276 18.8256 3.059 19.4674 3.53234 19.9407C4.00568 20.4141 4.64745 20.6803 5.31685 20.6811C5.54002 20.6812 5.75401 20.7699 5.91181 20.9277C6.06961 21.0855 6.15832 21.2995 6.15846 21.5227V23.3168C6.15846 23.6215 6.24115 23.9204 6.39771 24.1818C6.55427 24.4431 6.77882 24.6571 7.04744 24.8009C7.31605 24.9446 7.61864 25.0128 7.92295 24.9981C8.22726 24.9834 8.52186 24.8863 8.77536 24.7173L14.6173 20.8224C14.7554 20.7299 14.9179 20.6807 15.0841 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.472 19.3664 21.6222 18.8359L24.8965 7.05011C24.9999 6.67481 25.0152 6.28074 24.9413 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.9309 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4604 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0841C14.5856 18.9972 14.0981 19.1448 13.6836 19.4219L7.84168 23.3168V21.5227C7.84094 20.8533 7.5747 20.2115 7.10136 19.7382C6.62802 19.2648 5.98625 18.9986 5.31685 18.9978C5.09368 18.9977 4.87969 18.909 4.72189 18.7512C4.56409 18.5934 4.47537 18.3794 4.47524 18.1562V6.3737C4.47537 6.15054 4.56409 5.93655 4.72189 5.77874C4.87969 5.62094 5.09368 5.53223 5.31685 5.5321H22.4604C22.5905 5.53243 22.7188 5.56277 22.8352 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2641 6.09045 23.2887 6.21821C23.3132 6.34597 23.3079 6.47766 23.2733 6.60304Z" fill="#9B9B9B"/>
									<path d="M7.84167 11.4233H12.0497C12.2729 11.4233 12.487 11.3347 12.6448 11.1768C12.8027 11.019 12.8913 10.8049 12.8913 10.5817C12.8913 10.3585 12.8027 10.1444 12.6448 9.98661C12.487 9.82878 12.2729 9.74011 12.0497 9.74011H7.84167C7.61846 9.74011 7.4044 9.82878 7.24656 9.98661C7.08873 10.1444 7.00006 10.3585 7.00006 10.5817C7.00006 10.8049 7.08873 11.019 7.24656 11.1768C7.4044 11.3347 7.61846 11.4233 7.84167 11.4233Z" fill="#9B9B9B"/>
									<path d="M15.4162 13.1066H7.84167C7.61846 13.1066 7.4044 13.1952 7.24656 13.3531C7.08873 13.5109 7.00006 13.725 7.00006 13.9482C7.00006 14.1714 7.08873 14.3855 7.24656 14.5433C7.4044 14.7011 7.61846 14.7898 7.84167 14.7898H15.4162C15.6394 14.7898 15.8534 14.7011 16.0113 14.5433C16.1691 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1691 13.5109 16.0113 13.3531C15.8534 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#9B9B9B"/>
								</svg>
                                </a>
							</li>
							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
								    <?php if($rowuser['img']=='') {?>
									<img src="../assets/images/avatar/profile-1.jpg" width="56" alt=""/>
								<?php } else {?>
									<img src="upload/admin/<?php echo $rowuser['img']?>" width="56" alt=""/>
								<?php }?>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
								    <a href="profile.php" class="dropdown-item ai-icon">
										<i class="far fa-address-card"></i>
										<span class="ms-2">Profile </span>
									</a>
									<a href="logout.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
							
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
		
		<?php include 'sidebar.php'; ?>
    