<?php
session_start();
require_once '../potato.auth.php';
require("class/class.remittance.php");
$remit = new Remittance();
$displaylanding = true;

Auth::verifycover();
?>

<html>
<head>
	<link type ="text/css" rel = "stylesheet" href = "css/index.css">
	<style type = "text/css">
	#main{
		width : 1000px;
		margin-left : auto;
		margin-right : auto;
		background-color : #E9EBEE;
	}
	#landing{
		width : 1000px;
		background-color : #E9EBEE;
		height : 500px;
		color : #333333;
	}
	</style>
</head>
<body>
	<div id = "banner">
		<img style = " border-radius : 10px" align = "middle" class ="banner_content" src = "icons/bee.png">
		<label class = "banner_content" style = "left : 50px;">iBee Express</label>

		<img align = "middle" class ="banner_content" style = "right :110px;height : 30px; width : 30px;top:11px" src = "icons/login.png">
		<label class = "banner_content" style = "right : 50px;font-size : 17px;" ><a id = "modal_login" style = "color : white;cursor:pointer">Login</a></label>
	</div>



	<div id = "main">

		<form method = "POST" name = "frm_track" action = "<?php print htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<label style = "color:#333333"><strong>Tracking Number</strong></label><br>
			<input style = "text-align : center; width: 250px;" name = "txt_track" type = "text" placeholder = "Enter Tracking Number"><br>
			<input class = "button" style = "width : 250px;" type = "submit" value = "Search">
		</form>

		<?php
		// ----------------------------------------------------Recycled
		$displayremit = false;
		$displaypackage = false;


		if(isset($_POST['txt_track'])){
			$trackno = strtoupper($_POST['txt_track']);
			if(!empty($trackno)){
				if(substr($trackno,0,2) == 'RM'){
					if($row = $remit->getRemittance($trackno)){
						$displayremit = true;
					}else{
						$displaylanding = false;
						//print "No Records Found";
						print "<div class = 'headers'><img align = 'middle' src = 'icons/norecord.png'><label class = 'header_text'><strong>No Records Found!</strong></label></div>";
					}
				}else if(substr($trackno,0,2) == 'PK'){
					if($row = $remit->getPackage($trackno)){
						$displaypackage = true;
					}else{
						$displaylanding = false;
						//print "No Records Found";
						print "<div class = 'headers'><img align = 'middle' src = 'icons/norecord.png'><label class = 'header_text'><strong>No Records Found!</strong></label></div>";
					}
				}else{
					//print "No Records Found";
					$displaylanding = false;
					print "<div class = 'headers'><img align = 'middle' src = 'icons/norecord.png'><label class = 'header_text'><strong>No Records Found!</strong></label></div>";
				}
			}else{

			}

		}
		// ----------------------------------------------------Recycled
		?>

		<!-- RECYLCLED -->
		<div <?php if(!$displayremit){print "hidden";}else{$displaylanding = false;}?>>
			<div class = "headers"><img align = "middle" src = "icons/add_remit.png"><label class = "header_text"><strong>Money Remittance</strong></label></div>
			<table border = 1 width = 500px >
				<tr><td style = "line-height: 30px;background-color : #3B5998" colspan = 2 align = center><h3 style = "color:white">Money Remittance Details<h3></td></tr>
				<tr><td>Tracking Number</td> <td> <?php print $row['trackno']; ?> </td> </tr>
				<tr><td>Amount</td> <td> <?php print $row['amount']; ?> </td> </tr>
				<tr><td>Pick-up Branch</td> <td> <?php print $row['pickup']; ?> </td> </tr>
				<tr><td>Consignor</td> <td> <?php print $row['sender_name']; ?> </td> </tr>
				<tr><td>Status</td> <td> <?php print $row['complete']; ?> </td> </tr>
			</table>
		</div>

		<div <?php if(!$displaypackage){print "hidden";}else{$displaylanding = false;}?>>
			<div class = "headers"><img align = "middle" src = "icons/add_package.png"><label class = "header_text"><strong>Package Delivery</strong></label></div>
			<table border = 1 width = 500px <?php if(!$displaypackage)print "hidden";?>>
				<tr><td style = "line-height: 30px;background-color : #3B5998" colspan = 2 align = center><h3 style = "color:white">Package Delivery Details<h3></td></tr>
				<tr><td>Tracking Number</td> <td> <?php print $row['trackno']; ?> </td> </tr>
				<tr><td>Date Dispatched</td> <td> <?php print $row['dispatch']; ?> </td> </tr>
				<tr><td>Expected Delivery</td> <td> <?php print $row['delivery_date']; ?> </td> </tr>
				<tr><td>Status</td> <td> <?php print $row['state']; ?> </td> </tr>
				<tr><td>Consignor</td> <td> <?php print $row['sender_name']; ?> </td> </tr>
			</table>
		</div>
		<!-- RECYLCLED -->





		<div  <?php if(!$displaylanding)print "hidden";?> id = "landing">
			<br>
			<label style = "font-size : 30px;font-family : Helvetica;"><strong>Send money and packages to friends</strong></label><br>
			<label style = "font-size : 30px;font-family : Helvetica;"><strong>and families in the Philippines.</strong></label><br><br><br>

			<div class = "headers" style = "height : 75px;"><img align = "middle" src = "icons/track.png" style = "height : 50px; width : 50px;padding-right : 20px"><label style = "font-size : 20px; color :#333333;" class = "header_text"><strong>Track your transactions</strong> <span style = "color; #666666; margin-left : 20px;"> through our website.</span></label></div>

			<div class = "headers" style = "height : 75px;"><img align = "middle" src = "icons/present.png" style = "height : 50px; width : 50px;50px;padding-right : 20px"><label style = "font-size : 20px; color :#333333;" class = "header_text"><strong>Let them feel your presence</strong> <span style = "color; #666666; margin-left : 20px;"> with 9,816 branches nationwide.</span></label></div>

			<div class = "headers" style = "height : 75px;"><img align = "middle" src = "icons/visit.png" style = "height : 50px; width : 50px;50px;padding-right : 20px"><label style = "font-size : 20px; color :#333333;" class = "header_text"><strong>Visit</strong> <span style = "color; #666666; margin-left : 20px;"> the nearest branch to know more.</span></label></div>
		</div>



	</div>

	<!-- MODAL LOGIN -->
	<style>
	/* Full-width input fields */
	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	/* Set a style for all buttons */
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	button:hover {
		opacity: 0.8;
	}

	/* Extra styles for the cancel button */
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	/* Center the image and position the close button */
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}

	img.avatar {
		width: 40%;
		border-radius: 50%;
	}

	.container {
		padding: 16px;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px;
	}

	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid #888;
		width: 600px; /* Could be more or less, depending on screen size */
	}

	/* The Close Button (x) */
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: red;
		cursor: pointer;
	}

	/* Add Zoom Animation */
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}

	@-webkit-keyframes animatezoom {
		from {-webkit-transform: scale(0)}
		to {-webkit-transform: scale(1)}
	}

	@keyframes animatezoom {
		from {transform: scale(0)}
		to {transform: scale(1)}
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 100%;
		}
	}
	</style>

	<div id="id01" class="modal">

		<form id = "frm_login" class="modal-content animate">
			<input type = "textbox" name = "_mode" value = "ctrlogin" hidden>
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img style = "height: 200px; width : 200px" src="icons2/avatar.ico" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="txt_account" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="txt_pass" required>
				<br><label style = "color: red;padding-left:200px;"><b id = "error_message"></b></lable>
					<br>
					<button id = "btn_login" style = "background-color: #3B5998" type="button">Login</button>
				</div>


				<script>
				// Get the modal
				var modal = document.getElementById('id01');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
				</script>

				<script src = "js/jquery-3.1.1.js"></script>
				<script>
				$(document).ready(function(){
					$("#modal_login").click(function(){
						document.getElementById('id01').style.display='block';
					});
					$("#btn_login").click(function(){

						var data = $("#frm_login").serialize();
						$.ajax({
							data: data,
							type: "post",
							url: "rdr.php",
							success: function(data){
								if(data == "success"){
									window.location.href = 'rdr.php?rdr=main&res=show=add_package';
								}else{
									$("#error_message").html(data);
								}
							}
						});

					});
					//doc ready
				});
				</script>



				<!-- MODAL LOGIN -->



			</body>
			</html>
