<?php
$user=$_GET['user'];
$nama=$_GET['nama'];
$pass=$_GET['user'];
require('router_class.api.php');
$API = new routeros_api();
$API->debug = true;
if ($API->connect('web_ip','user_api','password')) {
$API->comm("/ip/hotspot/user/add", array(
"name" => $user,
"profile" => "facebook",
"limit-uptime" => "00:60:00",
"comment" => $nama,
"password" => $pass,
));
$READ = $API->read(false);
$ARRAY = $API->parse_response($READ);
print_r($ARRAY);
$API->disconnect();
}
?>