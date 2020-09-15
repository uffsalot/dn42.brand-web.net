<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function isValidIPv4($ip)
{
   if ( false === filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) )
   {
       return false;
   }
   else
   {
       return true;
   }
}

function isValidIPv6($ip)
{
   if ( false === filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) )
   {
       return false;
   }
   else
   {
       return true;
   }
}

function isValidEMail($email)
{
   if ( false === filter_var($email, FILTER_VALIDATE_EMAIL) )
   {
       return false;
   }
   else
   {
       return true;
   }
}
?>