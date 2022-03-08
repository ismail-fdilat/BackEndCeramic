<?php
require_once("config.php");
include_once("user_functions.php");

	$action=$_REQUEST["action"];
		switch($action)
		{
			case 'User_register':
				User_register($conn);
				break;

			case 'seller_register':
				seller_register($conn);
				break;	

			case 'user_login':
				user_login($conn);
				break;

			case 'seller_login':
				seller_login($conn);
				break;	

			case 'User_Forgetpassword':
				User_Forgetpassword($conn);
				break;

			case 'seller_Forgetpassword':
				seller_Forgetpassword($conn);
				break;	

			case 'user_changepassword':
				user_changepassword($conn);
				break;	

			case 'seller_changepassword':
				seller_changepassword($conn);
				break;		

			case 'product':
				product($conn);
				break;	

			case 'show_product_id':
				show_product_id($conn);
				break;	

			case'getproduct_category':
				getproduct_category($conn);
				break;	

			case 'product_subcategory_category':
				product_subcategory_category($conn);
				break;

			case 'showproduct_category':
				showproduct_category($conn);
				break;	

		/*	case 'user_social_login':	
				user_social_login($conn);
				break;

			case 'seller_social_login':
				seller_social_login($conn);
				break;	*/	

			case 'user_showProfile':
				user_showProfile($conn);
				break;	

			case 'seller_showProfile':
				seller_showProfile($conn);
				break;
			
			case 'seller_addproduct':
				seller_addproduct($conn);
				break;	

			case 'seller_showproduct':
				seller_showproduct($conn);
				break;	

			case 'seller_review':	
				seller_review($conn);
				break;

			case 'user_wishlist':
				user_wishlist($conn);
				break;	

// case 'seller_detail':
// 				seller_detail($conn);
// 				break;
		/*	case 'order_list';
				order_list($conn);
				break;	
					
			case 'delete':
				delete($conn);
				break; */		
		}

	

?>