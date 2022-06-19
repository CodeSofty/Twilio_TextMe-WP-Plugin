<?php

// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Capture and submit form data

function capture_form_data(){ 
    if(isset($_POST['form_submit'])) {
        $client_number = sanitize_text_field($_POST['myphonenumber']);
        $twilio_number = sanitize_text_field($_POST['twiliophonenumber']);
        $message = sanitize_text_field($_POST['message']);

// Your Account SID and Auth Token from twilio.com/console
        $sid = $_ENV['TWILIO_CLIENT_SID'];
        $token = $_ENV['TWILIO_TOKEN'];
        $client = new Client($sid, $token);

        try{ 
            $text = $client->messages->create(
// Where to send a text message (your cell phone?)
                $client_number,
                array(
                    'from' => $twilio_number,
                    'body' => $message
                )
                
        );

        } catch(exception $err) {
            echo $err;
        }
}

}

?>