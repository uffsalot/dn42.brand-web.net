<?php require_once('inc/header.php');?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col">
        <div class="card text-white bg-dark mb-3 h-100">
            <div class="card-header">APT Mirror/Cache</div>
            <div class="card-body">
                <p>For DN42-only clients I host an instance of apt-cacher-ng at <a href="http://mirror.uffsalot.dn42:3142/">mirror.uffsalot.dn42:3142</a>.<br>
                <p>There are 2 ways to use this mirror.</p>
                <ol>
                    <li>
                        <dl>
                            <dt>Configure it as a proxy in your apt.conf</dt>
                            <dd><code>Acquire::http { Proxy "http://mirror.uffsalot.dn42:3142"; };</code><br>
                            <strong>Beware!</strong> You <strong>MUST</strong> choose a origin mirror which is dualstack or IPv6 only, as the container only has a public IPv6 address.
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt>Replace your source.list entries with my hostname</dt>
                            <dd><code>deb http://mirror.uffsalot.dn42/debian/ unstable main</code><br>
                            Only works for Debian &amp; Ubuntu. Maybe I will sometime create a full mirror at this address, but for now this is only a reverse proxy for apt-cacher-ng.
                            </dd>
                        </dl>
                    </li>
                </ol>
                </p>
            </div>
        </div>
        </div>
    </div>
</div>
<?php require_once('inc/footer.php');?>