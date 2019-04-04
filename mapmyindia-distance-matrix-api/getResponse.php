
<?php

error_reporting(0);

// $url = json_decode(urldecode($_POST['url']));

$url = base64_decode($_POST['url']);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);

curl_close($curl);

if(trim($result)!='')
{
$res['status']='success';
$res['data']=$result;
}
else{
$res['status']='fail';
$res['data']='';
}

echo json_encode($res);

?>


