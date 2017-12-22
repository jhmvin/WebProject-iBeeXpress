


<div class = "panel" id = "create_staff">
	<div style = "line-height: 80px;height : 80px;background-color:#3B5998;width:100%">
		<h1 style = "padding-left: 320px;color:#FFFFFF">Create New Staff</h1>
	</div>
	<!--
	<div class = "headers"><img align = "middle" src = "icons/add_staff.png"><label class = "header_text"><strong>Add New Staff</strong></label></div>
-->
<div hidden id = "iconsss" style = "position:relative;left:0px;top:0px;height:300px;width:300px;">
	<img style= "position:relative;left:50px;top:40px;height:220px;width:220px;" align = "middle" src = "icons/add_staff.png">
	<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
</div>

<div hidden  id = "iconsss_text" style = "position:relative;left:20px;top:-50px;height:100px;width:300px;background-color:#D9EDF7;border: 2px solid #BCE8F1">
	<div style = "padding-top: 10px;padding-left: 40px;color: #31708F;font-size: 20px;"><strong>Grow With Us.</strong></div><br>
	<div style = "padding-left: 30px;color: #31708F">Every Employee is a Family</div>
	<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
</div>

<script src = "js/jquery-3.1.1.js"></script>
<script>
$(document).ready(function(){
	var validated = false;
	$("#btn_add").click(function(e){
		if(validated){

		}else{
			return;
		}

		var data = $("#frm_staff").serialize();
		//document.getElementById("frm_staff").submit();
		$.ajax({
			data: data,
			type: "post",
			url: "rdr.php",
			success: function(data){
				popNotif("Success","Staff Successfully Added.","info");
				document.getElementById("frm_staff").reset();
				validated = false;
			}
		});
	});

	$("#txt_accname").blur(function(){
		var user = "";
		user = $("#txt_accname").val().toUpperCase();
		$.get( "rdr.php?rdr=ctrajaxuser&res=user="+user, function( data ) {
			if(user.length < 6){
				$("#txt_accname").css({border: "1px solid red",});
				$("#err_accname").show();
				$("#err_accname").html("Must be atleast 6 characters.");
				validated = false;
				return;
			}

			if(data == "true"){
				$("#txt_accname").css({border: "1px solid red",});
				$("#err_accname").show();
				$("#err_accname").html("Username already exist.");
				validated = false;
			}else{
				$("#err_accname").hide();
				$("#txt_accname").css({border: "2px solid #BDC7D8",});
				validated = true;

			}
		});
	});
	$("#txt_pass").blur(function(){
		var pass = $("#txt_pass").val().length;
		if(pass < 6){
			$("#txt_pass").css({border: "1px solid red",});
			$("#err_pass").show();
			$("#err_pass").html("Must be atleast 6 characters.");
			validated = false;
			return;
		}else{
			validated = true;
			$("#err_pass").hide();
			$("#txt_pass").css({border: "2px solid #BDC7D8",});
		}

		//----------
		var pass = $("#txt_pass").val();
		var pass2 = $("#txt_pass2").val();
		if(pass != pass2){
			$("#txt_pass2").css({border: "1px solid red",});
			$("#err_pass2").show();
			$("#err_pass2").html("Passwords do not match.");
			validated = false;
			return;
		}else{
			validated = true;
			$("#err_pass2").hide();
			$("#txt_pass2").css({border: "2px solid #BDC7D8",});
		}


	});

	$("#txt_pass2").blur(function(){
		var pass = $("#txt_pass").val();
		var pass2 = $("#txt_pass2").val();
		if(pass != pass2){
			validated = false;
			$("#txt_pass2").css({border: "1px solid red",});
			$("#err_pass2").show();
			$("#err_pass2").html("Passwords do not match.");
			return;
		}else{
			validated = true;
			$("#err_pass2").hide();
			$("#txt_pass2").css({border: "2px solid #BDC7D8",});
		}
	});

	$("#txt_name").blur(function(){
		var name = $("#txt_name").val().trim().length;
		if(name == 0){
			validated = false;
			$("#txt_name").css({border: "1px solid red",});
			$("#err_name").show();
			$("#err_name").html("Staff name is required.");
		}else{
			validated = true;
			$("#err_name").hide();
			$("#txt_name").css({border: "2px solid #BDC7D8",});
		}
	});

	$("#iconsss").hide();
	$("#frm_staff").hide();
	$("#iconsss_text").hide();
	$("#iconsss").slideDown(function(){
		$("#iconsss_text").slideDown(function(){
			$("#frm_staff").fadeIn();
		})
	});



});

</script>

<form hidden id = "frm_staff" style = "width : 500px;position:relative;left:350px;top:-360px;" name = "frm_create" method = "POST" action = "rdr.php">
	<label>Account Name</label> <br>
	<input type = "textbox" name = "_mode" value = "ctr_add_staff" hidden>
	<input type = "text" name = "txt_accname" id = "txt_accname" placeholder = "Enter Account Name"><label style = "color: red;padding-left:10px;" hidden id = "err_accname">Error</label> <br>
	<label>Password</label> <br>
	<input type = "password" name = "txt_pass" id = "txt_pass" placeholder = "Enter Your Password"><label style = "color: red;padding-left:10px;" hidden id = "err_pass">Error</label> <br>
	<label>Confirm Password</label> <br>
	<input type = "password" name = "txt_pass2" id = "txt_pass2" placeholder = "Retype Your Password"><label style = "color: red;padding-left:10px;" hidden id = "err_pass2">Error</label> <br>
	<label>Staff Name</label> <br>
	<input type = "text" name = "txt_name" id = "txt_name" placeholder = "Employee's Name"><label style = "color: red;padding-left:10px;" hidden id = "err_name">Error</label> <br>
	<input id = "btn_add" class = "button" type = "button" value = "Add New Staff">

</form>
</div>
