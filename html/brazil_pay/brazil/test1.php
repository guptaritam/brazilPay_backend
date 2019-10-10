<?php $curl = curl_init();
$username = "kishan789";
$name = "Kishan Sharma";
$email ="crazykane2000@gmail.com";
$balance = "0";

$data = "{  \n   \"_userName\":\"$username\",\n   \"_userDataJson\":{  \n      \"name\":\"$name\",\n      \"email\":\"$email\",\n      \"balance\":\"$balance\"\n   }\n}";
$length = strlen($data);

  curl_setopt_array($curl, array(
  CURLOPT_PORT => "3001",
  CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/add/user",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Length: $length",
    "Content-Type: application/json",
    "Cookie: connect.sid=s%3AFjJ-NIEm6_EPyKRgZgiGOfm-vy4Qw8QO.hZwQrlMxUDj0h2dFtI7DMv8tZqZqRIYifKEKh6ENzQ8",
    "Host: 18.217.132.185:3001",
    "Postman-Token: 21ea7f3e-8589-4e0c-af6c-ecc0a2df4cd8,90cb90e4-bd03-416c-8ef1-2ea582076b16",
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
}

?>