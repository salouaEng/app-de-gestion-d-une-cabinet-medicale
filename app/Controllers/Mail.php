<?php

namespace App\Controllers;
class Mail extends BaseController{
    public function index(){
        $email = \Config\Services::email();
        

$email->setFrom('salouaouissa2002@gmail.com','saloua ouissa');
$email->setTo('sosomustafa2021@gmail.com');
//$email->setCC('another@another-example.com');
//$email->setBCC('them@their-example.com');

$email->setSubject('Email Test');
$email->setMessage('Testing the email class.');

if($email->send()){echo "secces";}  
else $data=$email->printDebugger(['headers']);
print_r($data); }
}
?>