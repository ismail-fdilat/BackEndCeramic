<?php


require __DIR__ . '/Checkout-PHP-SDK-develop/vendor/autoload.php';


use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PaymentOrder
{
    
    /**
     * Setting up the JSON request body for creating the Order. The Intent in the
     * request body should be set as "CAPTURE" for capture intent flow.
     * 
     */
    private static function buildRequestBody($amount)
    {
        return [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $amount,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => "https://shrinkcom.com/ceramic-api/api/user.php?action=paypal_cancel",
                "return_url" => "https://shrinkcom.com/ceramic-api/api/user.php?action=paypal_success"
            ]
        ];
    }
    private static function buildRequestBodyOld()
    {


        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://shrinkcom.com/ceramic-api/api/user.php?action=paypal_success',
                    'cancel_url' => 'https://shrinkcom.com/ceramic-api/api/user.php?action=paypal_cancel',
                    'brand_name' => 'EXAMPLE INC',
                    'locale' => 'en-US',
                    'landing_page' => 'BILLING',
                    'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                    'user_action' => 'PAY_NOW',
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'reference_id' => 'PUHF',
                            'description' => 'Sporting Goods',
                            'custom_id' => 'CUST-HighFashions',
                            'soft_descriptor' => 'HighFashions',
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => '100.00',
                                    
                                ),
                            'items' =>
                                array(
                                    0 =>
                                        array(
                                            'name' => 'T-Shirt',
                                            'description' => 'Green XL',
                                            'sku' => 'sku01',
                                            'unit_amount' =>
                                                array(
                                                    'currency_code' => 'USD',
                                                    'value' => '90.00',
                                                ),
                                            'tax' =>
                                                array(
                                                    'currency_code' => 'USD',
                                                    'value' => '10.00',
                                                ),
                                            'quantity' => '1',
                                            'category' => 'PHYSICAL_GOODS',
                                        ),
                                  
                                ),
                          
                        ),
                ),
        );
    }

    /**
     * This is the sample function which can be sued to create an order. It uses the
     * JSON body returned by buildRequestBody() to create an new Order.
     */
    public static function createOrder($debug=false,$amount)
    {
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        $request->body = self::buildRequestBody($amount);

        $client = PayPalClient::client();
        $response = $client->execute($request);

        if ($debug)
        {
              return $response->result->links;
            // print "Status Code: {$response->statusCode}\n";
            // print "Status: {$response->result->status}\n";
            // print "Order ID: {$response->result->id}\n";
            // print "Intent: {$response->result->intent}\n";
            // print "Links:\n";
            // foreach($response->result->links as $link)
            // {
            //     print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
            // }


            // // To toggle printing the whole response body comment/uncomment below line
            // echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
        }


         // return $response;
      
    }
}


/**
 * This is the driver function which invokes the createOrder function to create
 * an sample order.
 */




