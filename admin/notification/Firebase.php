<?php 
 
class Firebase {

    public function send($token,$data) {
$object1 = json_decode($test1);

        $fields = array(
                'registration_ids' =>array($token),
                "data" => array(
                             "message" => $data['message']
                           ),
                'priority' => 'high',
                'notification' => array(
                    'body' => $data['message'],
                    'title' => $data['message'],
                    'sound' => 'default',
                    'icon' => 'icon'
                ),
                'data'=>array(
                    'message' => $data['message'],
                    'title' => $data['message'],
                    'sound' => 'default',
                    'icon' => 'icon'
                ),
            );
       
       
      
       
        return $this->sendPushNotification($fields);
    }
    /*
    * This function will make the actuall curl request to firebase server
    * and then the message is sent 
    */
    private function sendPushNotification($fields) {
         
        //importing the constant files
      //  require_once 'Config.php';
        
        //firebase server url to send the curl request
        $url = 'https://fcm.googleapis.com/fcm/send';
 //AIzaSyC9Pwa4FQ1MTzw43y7JrsmmevYRjj_UiWI laguage
 //AIzaSyBAPcYew25xe7xrhdA2gbcL-RDbawNnWPA //blood
        //building headers for the request
        $headers = array(
  
        'Authorization: key=AIzaSyCZU57vJUwIWGxaevO7hEAraMZu4Dq_K8Q',
            'Content-Type: application/json'
        );

        //Initializing curl to open a connection
        $ch = curl_init();
 
        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);

        //adding headers 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        //adding the fields in json format 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        //finally executing the curl request 
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        //Now close the connection
        curl_close($ch);
 
        //and return the result 
        return $result;
    }
}