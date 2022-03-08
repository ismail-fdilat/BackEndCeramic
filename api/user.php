<?php
require_once("config.php");
include_once("user_functions.php");
   
	$action=$_REQUEST["action"];
		switch($action)
		{
			case 'Register':
				  register($conn);
			break;
			
				case 'orderinvoice':
				  orderinvoice($conn);
			break;
			
			case 'Pdf':
				  pdf($conn);
			break;

			case 'paypal_payment':
				  paypal_payment($conn);
			break;
			case 'paypal_cancel':
				  paypal_cancel($conn);
			break;
			case 'paypal_success':
				  paypal_success($conn);
			break;

			case 'Login':
				 login($conn);
			break;
			
			case 'Profile':
				profile($conn);
			break;
			
			case 'UpdateProfileImage':
				updateprofileimage($conn);
			break;
			
		    case 'UpdateProfile':
				updateprofile($conn);
			break;
			
			case 'CountryList':
				countrylist($conn);
			break;
			
			case 'StateList':
				statelist($conn);
			break;
			
			case 'CityList':
				citylist($conn);
			break;

			case 'city_list':
				city_list($conn);
			break;
				
	        case 'SocialLogin':
				sociallogin($conn);
			break;
			
		    case 'VerifyEmail':
				verifyemail($conn);
			break;
			
		    case 'VerifyOTP':
				verifyotp($conn);
			break;
			
		    case 'SetPassword':
				setpassword($conn);
			break;
			
		    case 'Home':
				home($conn);
			break;
			
		    case 'Category':
				category($conn);
			break;
			
		    case 'SubCategory':
				subcategory($conn);
			break;
	        case 'Products':
				products($conn);
			break;

			case 'FilterProducts':
				filterproducts($conn);
			break;

			case 'ShippingAddress':
				shippingaddress($conn);
			break;

			case 'EditShippingAddress':
				editshippingaddress($conn);
			break;

			case 'RemoveShippingAddress':
				removeshippingaddress($conn);
			break;

			case 'GetShippingAddress':
				getshippingaddress($conn);
			break;
			
	        case 'SingleProduct':
				SingleProduct($conn);
			break;
			
	        case 'Size_stock':
				size_stock($conn);
			break;	
			
            case 'review':
				review($conn);
			break;

			case 'Get_review':
				Get_review($conn);
			break;

			case 'AddToCart':
				addtocart($conn);
			break;
			
			case 'UpdateToCart':
				updatetocart($conn);
			break;	
			
			case 'GetUserCart':
				getusercart($conn);
			break;	
			
			case 'BookOrder':
				bookorder($conn);
			break;
			case 'Contact_Us':
				contact($conn);
			break;
			
		case 'UpdatePaymentStatus':
				updatepaymentstatus($conn);
			break;
			
		case 'OrderHistory':
				orderhistory($conn);
			break;
			
    	case 'AddToWishlist':
			addtowishlist($conn);
			break;
			
		case 'GetUserWishlist':
			getuserwishlist($conn);
			break;				
		case 'RemoveUserWishlist':
			removeuserwishlist($conn);
			break;	
		case 'RemoveUserCart':
			removeusercart($conn);
			break;	
			
		case 'size':
		size($conn);
			break;
		case 'brand':
		brand($conn);
			break;	

		case 'payment':
		payment($conn);
			break;
		
		case 'ProductsOnoffer':
		productsOnoffer($conn);
			break;
		
		case 'ProductsOnBrand':
		productsOnBrand($conn);
			break;
			
			case 'update_token':
			update_token($conn);
		    break;
		    
		    case 'get_notification':
			get_notification($conn);
		    break;
		    
		     case 'contactdetail':
			contactdetail($conn);
		    break;
		    
		     case 'producttaxrate':
			producttaxrate($conn);
		    break;
		    
		    case 'Sale':
	    	sales($conn);
			break;

			  case 'productsearch':
	    	productsearch($conn);
			break;
			
			case 'selleregis':
	    	selleregis($conn);
			break;

			case 'changePassword':
				 changePassword($conn);
			break;
        case 'seller_detail':
 				seller_detail($conn);
 				break;
			
		}	
		
			
		

	

?>