<?php
$name       = "";
$asn        = "";
$mail       = "";
$wgkey      = "";
$wgendpoint = "";
$bgpipv4    = "";
$bgpipv6    = "";
$addinfo    = "";
$bandwith    = "";
$isvalid      = TRUE;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name       = test_input($_POST["name"]);
    $asn        = test_input($_POST["asn"]);
    $mail       = test_input($_POST["mail"]);
    $wgkey      = test_input($_POST["wgkey"]);
    $wgendpoint = test_input($_POST["wgendpoint"]);
    $bgpipv4    = test_input($_POST["bgpipv4"]);
    $bgpipv6    = test_input($_POST["bgpipv6"]);
    $addinfo    = test_input($_POST["addinfo"]);
    $bandwidth    = test_input($_POST["bandwidth"]);

    /*echo $name;
    echo $asn;
    echo $mail;
    echo $wgkey;
    echo $wgendpoint;
    echo $bgpipv4;
    echo $bgpipv6; */


    #Validate Mail
    if (isValidEMail($mail) == FALSE){
        $isvalid = FALSE;
    }
    #Validate Ipv4 Endpoint
    if (isValidIPv4($bgpipv4) == FALSE){
        $isvalid = FALSE;
    }
    #Validate Ipv6 Endpoint
    if (isValidIPv6($bgpipv6) == FALSE){
        $isvalid = FALSE;
    }

    if($isvalid){
        $subject = "New Peering request from $name";
        $message = "Name: $name \r\nASN: $asn \r\nWireguard key: $wgkey \r\nWireguard endpoint: $wgendpoint \r\nBandwidth: $bandwidth \r\nIPv4 BGP Endpoint: $bgpipv4 \r\nIPv6 BGP Endpoint: $bgpipv6 \r\nAdditional Info: $addinfo";
        $header =   'Reply-To: '.$mail . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        mail("dn42@brand-web.net", $subject, $message, $header);
    }
}

?>
