<?php
require("routeros_api.class.php");
$API = new routeros_api();
$API->debug = false;
$username_mikrotik  = "api";
$password_mikrotik  = "";
$iphost_mikrotik    = "10.10.50.1";

if($API->connect($iphost_mikrotik, $username_mikrotik, $password_mikrotik)){
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$confirm_password 	= $_POST['confirm_password'];
$phone		= $_POST['phone'];
$email	  	= $_POST['email'];
$mac	  	= $_POST['mac'];
$paket	  	= $_POST['paket'];
	try {
	$cekuser = $API->comm('/ip/hotspot/user/print',array(
			"?name"     => $username,
			));
	if(count($cekuser)>0){
		echo "<script>window.location='http://10.10.50.1/gagal.html'</script>";
	}else{
    $API->comm("/ip/hotspot/user/add", array(
			"server"		=> "all",
			"profile"		=> "paket",
			"name"     		=> $username,
			"password"		=> $password,
			"confirm_password"		=> $confirm_password,
			"email"			=> $email,
			"mac-address"	=> $mac,		
			"comment"		=> $phone,
			"disabled"	=> "yes",
			));
    echo "<script>window.location='http://10.10.50.1/logout.html'</script>";
		}
		$API->disconnect();
	} 
	catch (Exception $ex) {
	echo "Caught exception from router: " . $ex->getMessage() . "\n";
	}	
 
} else {
  echo " Router Not Connected";
  }
?>