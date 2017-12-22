<?php
session_start();
require_once '../potato.auth.php';
Auth::noview();
?>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/mainstyle.css">
	<script src = "js/jquery-3.1.1.js"></script>
	<script src = "js/jquery.validate.min.js"></script>
	<script src = "js/additional-methods.min.js"></script>
	<script src = "js/jquery-messages.js"></script>
</head>
<body id = "body">


<script src = "main.js">


</script>
<div class = "shadow" hidden style = "line-height: 80px;bottom: 0px;border: 1px solid #d19494;background-color: #F2DEDE;left : 270px;position:fixed;height:80px;width:1050px;z-index: 101;" id = "message_space">
	<span id = "pop_body" class = "unselectable" style = "position:relative;left : 0px;width: 100px;padding-left: 100px;color: #A94442;font-size:20px;"><strong id = "pop_title">Success</strong><span id = "pop_message" style = "padding-left:10px;"> SuccessSuccessSuccessSuccessSuccessSuccess</span></span>
	<input value = "Dismiss" id = "dismiss" type = "button" style = "cursor:pointer;font-size:20px;color:#A94442;background-color:#d19494;height: 50px;width: 100px;position:absolute;top: 17px; right : 20px;" value = "Ok">
	<script>
	$(document).ready(function(){
		$("#dismiss").click(function(){
			$("#message_space").slideUp(function(){

			});
		});
	});
	</script>
</div>
<div id = "banner">
	<img align = "middle" class ="banner_content" src = "icons/bee.png">
	<label class = "banner_content" style = "left : 50px">iBee Express</label>

	<img align = "middle" class ="banner_content" style = "right :110px; height : 30px; width : 30px;top:11px" src = "icons/exit.png">
	<label class = "banner_content" style = "right : 50px;font-size : 17px;" ><a style = "color : white;" href = "rdr.php?rdr=ctrlogout&res=2">Logout</a></label>

	<div>
	<img align = "middle" class ="banner_content" style = "right :290px; height : 30px; width : 30px;top:9px" src = "icons/reports.png">
	<label class = "banner_content" style = "right : 230px;font-size : 17px;" ><a id = "view_reports" style = "cursor:pointer;color : white;"> <!--href = "rdr.php?rdr=main&res=show=reports"--> View Reports</a></label>
	</div>
</div>
<div id = "nav">
	<!--<div hidden class = "nav_content"><label>My Name</label></div>-->
	<div class = "nav_content"><img align = "middle" class ="pnl_icon" style = "width : 60px; height :60px;" src = "icons/account_icon.png"><label style = "top : 8px;" class = "nav_links"><?php print substr(Auth::name(),0,21); ?></label></div>


	<ul>

	<div id = "pnl_admin">
		<li style = "font-size : 17px;padding-top : 25px;"><a style = "color :#B8C7CE;"><strong>Accounts</strong></a><li>

		<li><img align = "middle" class ="pnl_icon" src = "icons/add_staff.png"><a class ="nav_links" href = "rdr.php?rdr=main&res=show=create_account">New Staff</a></li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/staff_info.png"><a class ="nav_links" href = "rdr.php?rdr=main&res=show=view_staff">Staff Information</a></li>
	</div>
		<li style = "font-size : 17;padding-top : 10px;"><a style = "color :#B8C7CE;"><strong>Remittance</strong></a><li>

		<li><img align = "middle" class ="pnl_icon" src = "icons/add_remit.png"><a class ="nav_links" href = "rdr.php?rdr=main&res=show=new_remittance">New Remittance</a></li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/view_remit.png"><a class ="nav_links" href = "rdr.php?rdr=main&res=show=view_remittance">View Remittances</a></li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/archive.png"><a class ="nav_links" href = "rdr.php?rdr=main&res=show=archive_remittance">Remittance Archive</a></li>

		<li style = "font-size : 17px;padding-top : 10px;"><a style = "color :#B8C7CE;"><strong>Package</strong></a><li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/add_package.png"><a class ="nav_links"  href = "rdr.php?rdr=main&res=show=add_package">New Package</a></li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/view_package.png"><a class ="nav_links"  href = "rdr.php?rdr=main&res=show=view_package">View Packages</a></li>
		<li><img align = "middle" class ="pnl_icon" src = "icons/archive1.png"><a class ="nav_links"  href = "rdr.php?rdr=main&res=show=archive_package">Package Archive</a></li>
	</ul>
</div>

<div id = "main">
<!-- main -->
</div>
<div hidden id= "reports" class = "shadow" style= "position: fixed;right:110px;height : 370px; width: 300px;background-color: #FFFFFF">
	<!-- reports -->
</div>

<!-- remitance -->
<div hidden id = "remit_info" class = "shadow" style= "position: fixed;top:80px;right:100px;height : 550px; width: 900px;background-color: #FFFFFF">
<div style = "position:relative;top:-21px;padding-top:0px;margin-top:0px;line-height:80px;height:80px;width:100%;background-color:#3C8DBC">
		<h1 style = "padding-top:0px;padding-left: 30px;color:#FFFFFF">Remittance Information</h1>
		<input id ="close_remit" style = "position: relative;
										top: -85px;
										left: 780px;
										border: 1px solid white;
										background-color: #3C8DBC;
										width: 100px;
										color: white;
										height:50px;
										cursor:pointer;" type= "button" value = "Close">
	</div>
	<div id = "details_remittance">

	</div>

</div>

<!-- Package -->
<div hidden id = "package_info" class = "shadow" style= "position: fixed;top:80px;right:100px;height : 550px; width: 900px;background-color: #FFFFFF">
<div style = "position:relative;top:-21px;padding-top:0px;margin-top:0px;line-height:80px;height:80px;width:100%;background-color:#3C8DBC">
		<h1 style = "padding-top:0px;padding-left: 30px;color:#FFFFFF">Package Infomration</h1>
		<input id ="close_package" style = "position: relative;
										top: -85px;
										left: 780px;
										border: 1px solid white;
										background-color: #3C8DBC;
										width: 100px;
										color: white;
										height:50px;
										cursor:pointer;" type= "button" value = "Close">
	</div>
	<div id = "details_package">

	</div>

</div>

<script>
$("#close_remit").click(function(){
	$("#remit_info").fadeOut();
});
$("#close_package").click(function(){
	$("#package_info").fadeOut();
});
</script>



	</body>
</html>
