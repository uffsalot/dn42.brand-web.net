<?php require_once('inc/header.php');?>
<?php require_once('inc/request.inc.php');?>
<div class="container-fluid pt-4">
    <div class="row justify-content-md-center">
        <div class="col col-lg-10">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $isvalid == FALSE) {
              echo '<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Warning!</h4>
			<p class="mb-0">Error! Please check your input.</p>';
			if(empty($bgpipv4) && empty($bgpipv6)) { echo '<p class="mb-0">Atleast one BGP peer has to be defined.</p>';
                    echo '</div>';}
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $isvalid == TRUE) {
              echo '<div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Well done!</strong> Your peering request was sucessfully transmitted. I will contact you via E-Mail to further coordinate the peering.</a>
                    </div>';}?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 h-100">
            <div class="card-header">Request Peering</div>
            <div class="card-body">
                <form action="request.php" method="POST">
                  <fieldset>
                  <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                  <label class="col-form-label">Name</label>
                                  <input type="text" class="form-control" placeholder="uffsalot" id="name" name="name" value="<?php echo $name?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                  <label class="col-form-label">AS Number</label>
                                  <input type="number" min="0" class="form-control" placeholder="4242420780" id="asn" name="asn" value="<?php echo $asn?>" required>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Email address</label>
                  <input type="email" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isValidEMail($mail)) {echo 'class="form-control is-invalid"';}else{echo 'class="form-control"';}?> id="mail" aria-describedby="emailHelp" placeholder="dn42@brand-web.net" name="mail" value="<?php echo $mail?>" required>
                  <small id="emailHelp" class="form-text text-muted">I will never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                      <label class="col-form-label">Wireguard Public Key</label>
                      <input type="text" class="form-control" placeholder="7V65FxvD9AQetyUr0qSiu+ik8samB4Atrw2ekvC0xQM=" id="wgkey" name="wgkey" value="<?php echo $wgkey;?>">
                </div>
                <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                  <label class="col-form-label">Wireguard Endpoint (incl. Port)</label>
                                  <input type="text" class="form-control" placeholder="dn42.example.com:45188" id="wgendpoint" name="wgendpoint" value="<?php echo $wgendpoint;?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Bandwith</label>
                                <select class="custom-select" name="bandwidth">
                                    <option value="0.1">&gt;= 0.1 MBit</option>
                                    <option value="1">&gt;= 1 MBit</option>
                                    <option value="10">&gt;= 10 MBit</option>
                                    <option selected="" value="100">&gt;= 100 MBit</option>
                                    <option value="1000">&gt;= 1000 MBit</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
				  <label class="col-form-label">IPv4 BGP Endpoint</label>
                                  <input type="text" <?php if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!isValidIPv4($bgpipv4) && !empty($bgpipv4))) {echo 'class="form-control is-invalid"';}else{echo 'class="form-control"';}?> placeholder="172.20.191.191" id="bgpipv4" name="bgpipv4" value="<?php echo $bgpipv4;?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                  <label class="col-form-label">IPv6 BGP Endpoint</label>
                                  <input type="text" <?php if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!isValidIPv6($bgpipv6) && !empty($bgpipv6))){echo 'class="form-control is-invalid"';}else{echo 'class="form-control"';}?> placeholder="fe80::780" id="bgpipv6" name="bgpipv6" value="<?php echo $bgpipv6;?>">
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Additional Information</label>
                    <textarea class="form-control" name="addinfo" id="addinfo" rows="3"><?php echo $addinfo;?></textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </fieldset>
                </form>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 h-100">
            <div class="card-header">Peering</div>
            <div class="card-body">
                <dl>
                    <dt>Location</dt>
                    <dd>Frankfurt, Germany - IP-Projects (First Colo FRA4)</dd>
                    <dt>Bandwith</dt>
                    <dd>1 Gbps</dd>
                    <dt>Remote (IPv4/IPv6)</dt>
                    <dd>router.fra4.dn42.brand-web.net</dd>
                    <dt>AS</dt>
                    <dd>4242420780</dd>
                    <dt>BGP Endpoint (IPv4)</dt>
                    <dd>172.20.191.129</dd>
                    <dt>BGP Endpoint (IPv6)</dt>
                    <dd>fe80::780</dd>
                    <dt>BGP Multiprotocol</dt>
                    <dd>not yet</dd>
                    <dt>VPN Type</dt>
                    <dd>Wireguard (preferred), OpenVPN</dd>
                    <dt>Wireguard Port</dt>
                    <dd>4&lt;last 4 digits of your ASN&gt;</dd>
                    <dt>Wireguard Public Key</dt>
                    <dd>7V65FxvD9AQetyUr0qSiu+ik8samB4Atrw2ekvC0xQM=</dd>
                </dl>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
