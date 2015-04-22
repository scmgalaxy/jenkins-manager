<?php
$url="http://jenkinurl/";
$username=$_POST['username'];
$password=$_POST['password'];
$cookies = '/tmp/cookies.txt';
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_TIMEOUT, 40); 
curl_setopt($ch, CURLOPT_HEADER, 1);  
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
curl_setopt($ch, CURLOPT_COOKIEJAR, '$cookie');
curl_setopt($ch, CURLOPT_COOKIEFILE, '$cookie');
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_id());
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US;           rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_URL, $url);  
curl_setopt($ch, CURLOPT_HTTPHEADER,array("Authorization: Basic " . base64_encode($username . ":" . $password)));
$result = curl_exec ($ch); 
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
if ($http_code=='200'){
header('Location: fill_job_form.php');
}
if (!$result) { 
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    curl_close($ch); // make sure we closeany current curl sessions 
    die($http_code.' Unable to connect to server. Please come back later.'); 
} 

?>