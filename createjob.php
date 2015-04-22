<?php
$url="http://jenkin url/createItem?name=mynewtestjob"; 
$input1=$_POST['input1'];
//get all other inputs and created request data xml 
// hard coded for now....
$req_data="<?xml version='1.0' encoding='UTF-8'?><project><actions/><description></description><keepDependencies>false</keepDependencies><properties/><scm class='hudson.scm.NullSCM'/><canRoam>true</canRoam><disabled>false</disabled><blockBuildWhenDownstreamBuilding>false</blockBuildWhenDownstreamBuilding><blockBuildWhenUpstreamBuilding>false</blockBuildWhenUpstreamBuilding><triggers class='vector'/><concurrentBuild>false</concurrentBuild><builders/><publishers/><buildWrappers/></project>";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_TIMEOUT, 40); 
curl_setopt($ch, CURLOPT_HEADER, 1);  
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt( $ch, CURLOPT_COOKIE, '/tmp/cookies.txt' );
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req_data);

$result = curl_exec ($ch); 
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print_r($http_code);
print_r($result);
//prints :The requested URL /login was not found on this server.
?>