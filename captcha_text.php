<?php

session_start();
$input_text=$_POST['captcha_input'];

$response=[];
if($_SESSION["pass"]==trim($input_text))
{
    $response['status']=1;
}
else
{
    $response['status']=0;
}
echo json_encode($response);
?>