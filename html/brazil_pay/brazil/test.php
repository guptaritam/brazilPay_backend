<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "3001",
  CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/remainingSupply",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Cookie: connect.sid=s%3AFjJ-NIEm6_EPyKRgZgiGOfm-vy4Qw8QO.hZwQrlMxUDj0h2dFtI7DMv8tZqZqRIYifKEKh6ENzQ8",
    "Host: 18.217.132.185:3001",
    "Postman-Token: 640de58d-2f72-44a5-a140-cd5c8cea3089,78d1f403-2318-425e-b557-65e35c47debf",
    "User-Agent: PostmanRuntime/7.16.3",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>
