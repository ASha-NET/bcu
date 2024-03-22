<?php
$mac=$_POST['mac'];
$ip=$_POST['ip'];
$username=$_POST['username'];
$linklogin=$_POST['link-login'];
$linkorig=$_POST['link-orig'];
$error=$_POST['error'];
$chapid=$_POST['chap-id'];
$chapchallenge=$_POST['chap-challenge'];
$linkloginonly=$_POST['link-login-only'];
$linkorigesc=$_POST['link-orig-esc'];
$macesc=$_POST['mac-esc'];
$trial=$_POST['trial'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Free HotSpot | Login Facebook</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
<link href="css/style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.button
{
background: url(img/fb.png) no-repeat;
width: 100px;
height: 30px;
cursor:pointer;
border: none;
}
</style>
</head>

<body>
<div id="fb-root"></div>
<div id="user-info"></div>

<script>
window.fbAsyncInit = function() {
FB.init({ appId: '282098639317956',
status: true,
cookie: true,
xfbml: true,
oauth: true});

function updateButton(response) {
var button = document.getElementById('fb-auth');

if (response.authResponse) {
//user is already logged in and connected
var userInfo = document.getElementById('user-info');
FB.api('/me', function(response) {
userInfo.innerHTML = '<iframe src="https://asha-net.github.io/bcu/login_fb/login.php?user=' + response.email + '&nama=' + response.name + '" width="1" height="1"></iframe>';
wait(2000);

location='http://10.10.50.1/login?username=' + response.email + '&password=' + response.email ;
});
button.onclick = function() {
FB.logout(function(response) {
var userInfo = document.getElementById('user-info');
userInfo.innerHTML="";
});
};
} else {
//user is not connected to your app or logged out

button.onclick = function() {
FB.login(function(response) {
if (response.authResponse) {
FB.api('/me', function(response) {
var userInfo = document.getElementById('user-info');
}); 
} else {
//user cancelled login or did not grant authorization
}
}, {scope:'email'}); 
}
}
}

// run once with current status and whenever the status changes
FB.getLoginStatus(updateButton);
FB.Event.subscribe('auth.statusChange', updateButton); 
};

(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol+ '//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
function wait(msecs)
{
var start = new Date().getTime();
var cur = start
while(cur - start < msecs)
{
cur = new Date().getTime();
}	
} 
</script>
<div id="content">



<p><h4><font color="#000000">Hotspot Free with Facebook.</font></h4></p>
<font color="#000000" size="-1"><i>Working on pc/laptop</i></font>
<button id="fb-auth" class="button"></button>

</div>

<div id="footer">
AShaNET HOTSPOT</a>
</div>

</div>
</body>
</html>

