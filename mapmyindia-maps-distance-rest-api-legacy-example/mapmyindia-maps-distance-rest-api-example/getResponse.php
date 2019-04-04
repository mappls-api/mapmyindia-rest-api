<?php
$url = json_decode($_POST['url']);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);

// also get the error and response code
//$errors = curl_error($curl);
//echo $errors;
curl_close($curl);
echo $result;
?>


