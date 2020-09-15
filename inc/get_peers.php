<?php
$urlv4 = "http://router.fra4.dn42.brand-web.net:29184/protocols";
$ch=curl_init();
$timeout=5;
curl_setopt($ch, CURLOPT_URL, $urlv4);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$resultv4=curl_exec($ch);
curl_close($ch);
if($resultv4){
    
    $json = json_decode($resultv4, true);
    $protocolsv4 = $json['protocols'];
    $protocolsv4 = array_filter($protocolsv4, function ($var) {
        return ($var['bird_protocol'] == 'BGP');
    });
}

$urlv6 = "http://router.fra4.dn42.brand-web.net:29186/protocols";
$ch=curl_init();
$timeout=5;
curl_setopt($ch, CURLOPT_URL, $urlv6);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$resultv6=curl_exec($ch);
curl_close($ch);
if($resultv6){
    $json = json_decode($resultv6, true);
    $protocolsv6 = $json['protocols'];
    $protocolsv6 = array_filter($protocolsv6, function ($var) {
        return ($var['bird_protocol'] == 'BGP');
    });
}
?>