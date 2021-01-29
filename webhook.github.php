<?php

$headers=[];
foreach (getallheaders() as $name => $value)
    $headers[$name]=$value;
    
$data = json_decode(file_get_contents('php://input'), true);

$fields = array(
  'app_id' => "90c57079-9ef2-4719-bddf-361e6510de17",
  'included_segments' => array('All'),
  'template_id' => '9619ded7-ae48-4843-96ed-c46308a96c43'
);

$fields = json_encode($fields);

ob_start();

echo $_SERVER["REQUEST_URI"];
echo "\n\n";
echo "Headers:".print_r($headers, 1);
echo "\n";
echo "\$_GET:".print_r($_GET, 1);
echo "\n";
echo "\$_POST:".print_r($_POST, 1);
echo "\n";
echo "JSON POST:".print_r($data, 1);

$resultado = ob_get_clean();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://onesignal.com/api/v1/notifications",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $fields,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json; charset=utf-8",
    "Authorization: Basic ZWViNzIzYWUtZmMwMC00OGVjLWI0NDQtNWY1MjgwNzcwNGRh"
  )
));

$response = curl_exec($curl);

curl_close($curl);

mail("webhook.github@guilhermebranco.com.br","Webhook GitHub",$resultado,"From: webhook.github@guilhermebranco.com.br");

http_response_code(202);
?>