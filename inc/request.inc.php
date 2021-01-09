<?php
require_once("Mail.php");
require_once("secrets.php");


$subject = "Hi!";
$body = "Hi,\n\nHow are you?";


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
$to = "dn42@brand-web.net";
$host = "smtp.biocrafting.net";
$port = "587";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name       = test_input($_POST["name"]);
    $asn        = test_input($_POST["asn"]);
    $mail       = test_input($_POST["mail"]);
    $wgkey      = test_input($_POST["wgkey"]);
    $wgendpoint = test_input($_POST["wgendpoint"]);
    $bgpipv4    = test_input($_POST["bgpipv4"]);
    $bgpipv6    = test_input($_POST["bgpipv6"]);
    $addinfo    = test_input($_POST["addinfo"]);
    $bandwidth  = test_input($_POST["bandwidth"]);
    $date       = date('r', time());
    $messageid  = '<' .time() .'-' . md5($username . $mail) . '@' . $_SERVER['SERVER_NAME'] . '>';
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
    #Validate if atleast one BGP Peer is definied
    if (empty($bgpipv4) && empty($bgpipv6)){
        $isvalid = FALSE;
    }
    #Validate Ipv4 Endpoint
    if (isValidIPv4($bgpipv4) == FALSE && !empty($bgpipv4)){
        $isvalid = FALSE;
    }
    #Validate Ipv6 Endpoint
    if (isValidIPv6($bgpipv6) == FALSE && !empty($bgpipv6)){
        $isvalid = FALSE;
    }

    if($isvalid){
        $subject = "New Peering request from $name";
        $message = "Name: $name \r\nASN: $asn \r\nWireguard key: $wgkey \r\nWireguard endpoint: $wgendpoint \r\nBandwidth: $bandwidth \r\nIPv4 BGP Endpoint: $bgpipv4 \r\nIPv6 BGP Endpoint: $bgpipv6 \r\nAdditional Info: $addinfo \r\n\r\n Ansible: --extra-vars='name=$name asn=$asn wgkey=$wgkey wgendpoint=$wgendpoint bgpipv4=$bgpipv4 bgpipv6=$bgpipv6 bandwidth=$bandwidth'";
        #$header =   'Reply-To: '.$mail . "\r\n" .
        #            'X-Mailer: PHP/' . phpversion();
        #mail("dn42@brand-web.net", $subject, $message, $header);
        
        $headers = array ('To' => $to,
          'From' => $username,
          'Subject' => $subject,
          'Reply-To' => $mail,
          'Date'      => $date,
          'Message-ID' => $messageid
          );
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
        $sendmail = $smtp->send($to, $headers, $message);
    }
}

?>
