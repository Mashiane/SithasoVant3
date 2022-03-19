<?php $rest_json = file_get_contents("php://input");$_POST = json_decode($rest_json, true);$request='';if(isset($_POST['request'])){$request = $_POST['request'];$params = $_POST['params'];}if (!function_exists($request)) die("invalid request: '" . $request . "'"); 
function EmailSend($from, $to, $cc, $subject, $msg) { 
$hdr  = 'MIME-Version: 1.0' . "\r\n"; 
$hdr .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$hdr .= 'X-Mailer:PHP/' . phpversion() . "\r\n"; 
$hdr .= "From:" . $from . "\r\n"; 
$extra = '-f '. $from; 
$hdr .= "Cc: " . $cc . "\r\n"; 
$response = (mail($to, $subject, $msg, $hdr, $extra)) ? "success" : "failure"; 
$output = json_encode(Array("response" => $response)); 
header('content-type: application/json; charset=utf-8'); 
echo($output); 
} 
$values = array_values($params);call_user_func_array($request, $values);?>