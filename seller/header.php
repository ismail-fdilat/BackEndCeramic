<?php
include('config.php');

if(!isset($_SESSION['seller_id']))
{
	echo '<script>window.location.href="index.php"</script>';
}
$full_name = $_SERVER['PHP_SELF'];
       $name_array = explode('/',$full_name);
        $count = count($name_array);
      $page_name = $name_array[$count-1];

if(isset($_SESSION['seller_id']))
{
    $_SESSION['seller_id'];
	$connupdate=mysqli_query($conn,"update seller set loginstatus=1 where seller_id='".$_SESSION['seller_id']."'");
	
// 	$sqluser=mysqli_query($conn,"select * from seller where seller_id='".$_SESSION['seller_id']."'");
   $sql="select seller.*, cities.* from seller left join cities on seller.city=cities.id where seller.seller_id='".$_SESSION['seller_id']."'";

    $sqluser=mysqli_query($conn,$sql);
   
    $rowuser=mysqli_fetch_assoc($sqluser);
}
$logoget=mysqli_query($conn,"select * from logo ");
$logo=mysqli_fetch_assoc($logoget);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Marble Ecommerce</title>
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
    <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
</style> 
    
    
  </head>

	  <body class="hold-transition skin-blue sidebar-mini">
	      
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
				<img src="../admin/upload/<?php echo $logo['image'];?>" alt="" />
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
							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
								    <?php if($rowuser['simg'] !='') { ?>
                                        <img src="upload/seller/<?php echo $rowuser['simg']?>" alt="User Image" width="56" >
                					<?php } else { ?>
                					    <img src="dist/img/user.png" alt="User Image" width="56">
                					<?php } ?>
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
