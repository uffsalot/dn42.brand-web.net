<?php require_once('inc/header.php');?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 h-100">
            <div class="card-header">BGP IPv4 Peers</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
			<tr>
			<th scope="col" style="width: 0.133333%;">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">AS</th>
                        <th scope="col">Last state changed</th>
                        <th scope="col">Status</th>
                        <th scope="col">State</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php require_once("inc/get_peers.php"); 
                    if($resultv4){
                        foreach($protocolsv4 as $peer){
                            if($peer['state'] == "up") {echo '<th class="table-success"></th>';}else{echo '<th class="table-danger"></th>';}
                            echo '<td scope="row">'.$peer['protocol'].'</td>';
			    echo '<td><a href="https://explorer.burble.com/#/aut-num/AS'.$peer['neighbor_as'].'">'.$peer['neighbor_as'].'</a></td>';
			    echo '<td>'.$peer['state_changed'].'</td>';
                            echo '<td>'.$peer['state'].'</td>';
                            echo '<td>'.$peer['connection'].'</td></tr>';
                        }
                    } else {
                        echo "Birdwatcher currently not available";}
                        ?>
                </tbody> 
            </table> 
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 h-100">
            <div class="card-header">BGP IPv6 Peers</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
			<tr>
			<th scope="col" style="width: 0.133333%;">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">AS</th>
                        <th scope="col">Last state changed</th>
                        <th scope="col">Status</th>
                        <th scope="col">State</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php require_once("inc/get_peers.php"); 
                    if($resultv6){
                        foreach($protocolsv6 as $peer){
    			    echo '<tr>';
   			    if($peer['state'] == "up") {echo '<th class="table-success"></th>';}else{echo '<th class="table-danger"></th>';}
                            echo '<td scope="row">'.$peer['protocol'].'</td>';
			    echo '<td><a href="https://explorer.burble.com/#/aut-num/AS'.$peer['neighbor_as'].'">'.$peer['neighbor_as'].'</a></td>';
                            echo '<td>'.$peer['state_changed'].'</td>';
                            echo '<td>'.$peer['state'].'</td>';
                            echo '<td>'.$peer['connection'].'</td></tr>';
                        }
                    } else {
                        echo "Birdwatcher currently not available";}
                        ?>
                </tbody> 
            </table> 
            </div>
        </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
