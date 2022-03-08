<?php

   include 'Paypal_class.php';
	

	
 $user_id=1; 
 $amount=1; 

// $user_id=1;
// $ride_id=12;
            define("PAYPAL_API", 'a:4:{s:12:"gateway_name";s:6:"Paypal";s:14:"gateway_number";s:1:"2";s:8:"settings";a:2:{s:4:"mode";s:7:"sandbox";s:14:"merchant_email";s:22:"sb-7sokb6832296@business.example.com";}s:6:"status";s:6:"Enable";}');


            $Paypal_Details = unserialize(PAYPAL_API);


            
            $Paypal_Setting_Details = $Paypal_Details['settings'];

            $paypalmode = $Paypal_Setting_Details['mode'];
            $paypalEmail = $Paypal_Setting_Details['merchant_email'];

            $item_name = 'Pediatrics' . 'subscription payment : ' ;
			   
			$totalAmount = $amount; 
			$currency = 'USD';
            $original_currency = 'USD';
			if($currency != $original_currency){
				$currencyval = array('CurrencyVal' => round($amount, 2), 'CurrencyRev' => round($amount, 2));
				if (!empty($currencyval)) {
					$totalAmount = $currencyval['CurrencyVal'];
				}
			}
 	
            $quantity = 1;


            if ($paypalmode == 'sandbox') {
                $this->paypal_class->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
            } else {
                $this->paypal_class->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
            }

            $this->paypal_class->add_field('currency_code', $original_currency);

            $this->paypal_class->add_field('business', $paypalEmail); // Business Email

            $this->paypal_class->add_field('return', 'https://shrinkcom.com/ceramic-api/sucess.php'); // Return URL

            $this->paypal_class->add_field('cancel_return', 'https://shrinkcom.com/ceramic-api/sucess.php'); // Cancel URL

            #$this->paypal_class->add_field('notify_url', base_url() . 'v7/webview/trip/ipn'); // Notify url

            $this->paypal_class->add_field('custom', 'Subscription|' . $user_id . '|' ); // Custom Values			

            $this->paypal_class->add_field('item_name', 'subscription'); // Product Name

            $this->paypal_class->add_field('user_id', $user_id);

            $this->paypal_class->add_field('quantity', 1); // Quantity

            $this->paypal_class->add_field('amount',  $amount); // Price
//die('sdfsdasdf');
            $this->paypal_class->submit_paypal_post();



?>