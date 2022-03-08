<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }
    
    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * ProductionEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AXN-MkQQC78VTNVvICwYymB3SNu19tZRIwDtYiNRYAm1Id_ctJ9FIDzMHPKTEAweU2y-YHMUE6RPO55j";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EGioLN2Z1C5U_i_t7nwIDrBdFSBVYzVf3bjDMccJS-fCOlB6bLmiO6jqjIqDyfy2eQ8FEsO6wCUPAzQy";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
