<div hidden  class = "panel" id = "new_pkg">

	<!--
	<div class = "headers"><img align = "middle" src = "icons/add_package.png"><label class = "header_text"><strong>Add New Package Delivery</strong></label></div>
-->

<style>
.messages{
	color: red;
	padding-left:10px;
	visibility: hidden;
}
label.error{
	color: red;
	padding-left:10px;
}
input.error{
	border: 1px solid red;
}
select.error{
	border: 1px solid red;
}
</style>

<script>
$(document).ready(function(){
	$("#new_pkg").hide().slideDown(1500);
});
</script>
<script src = "js/add_package.js"></script>

<form id = "frm_add_package" style = "height:1400px" name = "frm_newPackage" method = "POST" action = "rdr.php">

	<input type = "textbox" name = "_mode" value = "ctr_add_package" hidden>

	<div style = "line-height: 80px;height : 80px;background-color:#3B5998;width:100%">
		<h1 style = "padding-left: 80px;color:#FFFFFF">Package Sender Information</h1>
	</div>

	<div id = "iconsss" style = "position:relative;left:0px;top:0px;height:300px;width:300px;">
		<img style= "position:relative;left:50px;top:0px;height:220px;width:220px;" align = "middle" src = "icons/add_send.png">
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div id = "iconsss_text" style = "position:relative;left:20px;top:-70px;height:100px;width:300px;background-color:#D9EDF7;border: 2px solid #BCE8F1">
		<div style = "padding-top: 10px;padding-left: 40px;color: #31708F;font-size: 20px;"><strong>Stay Connected</strong></div><br>
		<div style = "padding-left: 30px;color: #31708F">SMS and E-mail notifications, never miss a moment</div>
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div style = "width : 560px;position:relative;left:350px;top:-360px;">
		<label>Name</label> <br>
		<input type = "text" name = "txt_psname" placeholder = "ex. Dela Cruz, Juan C." value = "" > <br>
		<label>Adress</label> <br>
		<input type = "text" name = "txt_psadd" placeholder = "Guinhawa Malolos Bulacan" value = "" >  <br>
		<label>E-mail</label> <br>
		<input type = "text" name = "txt_psemail" placeholder = "ex. delacruz@gmail.com" value = "" > <br>
		<label>Contact Number</label> <br>
		<input type = "text" name = "txt_pscontact" placeholder = "09221234567" value = "" > <br>
	</div>

	<div style = "position: relative; top :-300px;line-height: 80px;height : 80px;background-color:#3B5998;width:100%">
		<h1 style = "padding-left: 80px;color:#FFFFFF">Package Recipient Information</h1>
	</div>

	<div id = "iconsss" style = "position:relative;left:0px;top:-300px;height:300px;width:300px;">
		<img style= "position:relative;left:50px;top:10px;height:220px;width:220px;" align = "middle" src = "icons/add_recieve.png">
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div id = "iconsss_text" style = "position:relative;left:20px;top:-370px;height:100px;width:300px;background-color:#D9EDF7;border: 2px solid #BCE8F1">
		<div style = "padding-top: 10px;padding-left: 40px;color: #31708F;font-size: 20px;"><strong>Know Where It Is</strong></div><br>
		<div style = "padding-left: 30px;color: #31708F">With 24/7 deicated support and tracking information</div>
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div style = "width : 560px;position:relative;left:350px;top:-650px;">
		<label>Name</label> <br>
		<input type = "text" name = "txt_prname" placeholder = "ex. Mercado, Jelyn C." value = "">  <br>
		<label>Address</label> <br>
		<input type = "text" name = "txt_pradd" placeholder = "Capalanga Apalit Pampanga" value = ""><br>
		<label>E-mail</label> <br>
		<input type = "text" name = "txt_premail" placeholder = "ex. jelyn@gmail.com" value = "">  <br>
		<label>Contact Number</label> <br>
		<input type = "text" name = "txt_prcontact" placeholder = "09234561234" value = "" >  <br>
	</div>

	<div style = "position: relative; top :-600px;line-height: 80px;height : 80px;background-color:#3B5998;width:100%">
		<h1 style = "padding-left: 80px;color:#FFFFFF">Package Information</h1>
	</div>

	<div id = "iconsss" style = "position:relative;left:0px;top:-600px;height:300px;width:300px;">
		<img style= "position:relative;left:50px;top:10px;height:220px;width:220px;" align = "middle" src = "icons/add_package.png">
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div id = "iconsss_text" style = "position:relative;left:20px;top:-670px;height:100px;width:300px;background-color:#D9EDF7;border: 2px solid #BCE8F1">
		<div style = "padding-top: 10px;padding-left: 40px;color: #31708F;font-size: 20px;"><strong>Keep Your Package Safe</strong></div><br>
		<div style = "padding-left: 30px;color: #31708F">The most reliable Delivery Service in the Philippines</div>
		<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
	</div>

	<div style = "width : 560px;position:relative;left:350px;top:-950px;">
		<label>Destination</label> <br>
		<select id = "get_destination" name = "txt_destination">
			<option>Select Destination</option>
			<optgroup label = "Destination">
				<option>NCR</option>
				<option>NLUZON</option>
				<option>SLUZON</option>
				<option>VISAYAS</option>
				<option>MINDANAO</option>
			</optgroup>
		</select> <br>
		<label>Size</label> <br>
		<select id = "get_size" name = "txt_size">
			<option>Select Size</option>
			<optgroup label = "Size">
				<option>SMALL</option>
				<option>MEDIUM</option>
				<option>LARGE</option>
				<option>EXTRA</option>
			</optgroup>
		</select>  <br>
		<label>Declared Value</label> <br>
		<input type = "text" name = "txt_amount" placeholder = "Enter Amount" value = "">  <br>
		<h3 id = "get_fee">Remittance Fee: P 0.00</h3>
		<input style ="height: 50px;width: 500px;margin-top: 0px" id = "btn_send_package" class = "button" type = "button" value = "Add New Package">
	</div>
</form>
<script>
$("#get_destination").change(function(){
	get_package_fee($("#get_destination").val(),$("#get_size").val());
});
$("#get_size").change(function(){
	get_package_fee($("#get_destination").val(),$("#get_size").val());
});
function get_package_fee(destination,size){
	$.get( 'rdr.php?rdr=ctr_get_values&res=type=package:destination='+destination+':size='+size ,function(data){
		$("#get_fee").html("Remittance Fee: P " + data + ".00");
	});
}
</script>


</div>
