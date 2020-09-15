<?php
require_once('inc/functions.inc.php');
$myself = basename(test_input($_SERVER["SCRIPT_FILENAME"]), '.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>uffsalot.dn42</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">uffsalot.dn42</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?php if($myself == "index"){ echo 'active';}?>">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item <?php if($myself == "peers"){ echo 'active';}?>">
        <a class="nav-link" href="peers.php">Peers</a>
      </li>
      <li class="nav-item <?php if($myself == "request"){ echo 'active';}?>">
        <a class="nav-link" href="request.php">Request peering</a>
      </li>
    </ul>
  </div>
</nav>