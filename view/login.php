<?php 
session_start();
require_once '../potato.auth.php';

Auth::verifycover();
?>
<html>
<head>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/jquery.cookie-1.4.1.js"></script>
	<style type = "text/css">
	
		.headers{
			width : auto;
			height : 125px;
		}
		.header_text{
			font-size : 30px;
			margin-left : 10px;
			color : black;
			position : relative;
			top: 10px;
		}
		body{
			margin : 0px 0px 0px 0px;
			padding : 0px 0px 0px 0px;
			font-family: "Lucida Grande", "Tahoma", "Helvetica";
			background-color : #E9EBEE;
			overflow-x: hidden;
		}
		select,input{
			width : 250px;
			height : 30px;
			padding-left : 10px;
			border:2px solid #BDC7D8;
			border-radius: 3px;
			margin-bottom : 10px;
		}
		.button{
			border : 1px solid black;
			color: white;
			height : 35px;
			line-height : 30px;
			width : 250px;
			border: 0;
			background: none;
			background-color : #4267B2;
		}
		#banner{
			color : white;
			width : 100%;
			height : 50px;
			line-height: 50px;
			background-color : #3b5998;
			white-space: nowrap;
			position :fixed;
			z-index :100;
			min-width : 500px;
		}
		.banner_content{
			text-align: center;
			padding-left : 20px;
			font-size : 20px;
			position : absolute;
			width : 50px;
		}
		a{
			 text-decoration: none;
			 text-align :center;
			 
		}
		#main{
			height: 170px;
			width : 300px;
			margin-left : auto;
			margin-right : auto;
			padding-left : 100px;
			padding-right : 100px;
			background-color : #E9EBEE;
		}
		#message{
			padding-top : 0px;
			height: 0px;
			width : 500px;
			margin-left : auto;
			margin-right : auto;
			background-color : white;
			line-height : 80px;
		}
	</style>

</head>
<body>

<div id = "banner">
	<img style = " border-radius : 10px" align = "middle" class ="banner_content" src = "icons/bee.png">
	<label class = "banner_content" style = "left : 50px;">iBee Express</label>
	
	<img align = "middle" class ="banner_content" style = "right :110px;height : 33px; width : 33px;top:5px" src = "icons/home.png">
	<label class = "banner_content" style = "right : 50px;font-size : 17px;" ><a style = "color : white;" href = "rdr.php?rdr=index">Home</a></label>
</div>



<div class = "headers" style = "width : 350px; margin-right : auto; margin-left : auto;padding-top : 120px;"><img align = "middle" src = "icons/employee.png"><label class = "header_text"><strong>Staff Sign-in</strong></label></div>

<div id = "main">
	<form method = "POST" name = "frm_login" action = "rdr.php">
	<!--POTATO POST OBJECT   value is the action-->
	<input type = "textbox" name = "_mode" value = "ctrlogin" hidden>
	
	<label>Account</label><br>
	<input id = "txt_account" name = "txt_account" type = "text" placeholder = "Username"><br>
	<script>
		$("#txt_account").blur(function(e){
			$.cookie("user",$("#txt_account").val(),{path: '/'});
			});
		$(document).ready(function(e){
			$("#txt_account").val($.cookie("user"));
		});
	</script>
	<label>Password</label><br>
	<input name = "txt_pass" type = "password" placeholder = "Password"><br>
	<input id= "submit" class = "button" type = "submit" value = "Sign-In">
	</form>
</div>


<?php

?>
<!--
<div id = "message">

<label style = "text-align : center;padding: 10px 141px 10px 141px;color: #A94442;background-color :<?php if(isset($_SESSION['action_message'])){print "#F2DEDE ;border : 1px solid #A94442;border-radius 1px;";}else {print "#E9EBEE";} ?>"><strong><?php if(isset($_SESSION['action_message'])){ print $_SESSION['action_message'];unset($_SESSION['action_message']);} ?></strong></label>

</div>
-->

</body>
</html>