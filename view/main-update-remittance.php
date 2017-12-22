<?php
$id = $_GET['id'];
require_once '../model/model.remittance.php';
$staff = Remittance::getInstance();
$staff->release();
$staff->find("trackno:".$id,"self");
$r = $staff;
?>
<div  class = "panel" id = "new_remit">
	<!--
	<div class = "headers"><img align = "middle" src = "icons/add_remit.png"><label class = "header_text"><strong>Remittance Information</strong></label></div>
-->
<div style = "line-height: 80px;height : 80px;background-color:#3B5998;width:100%">
	<h1 style = "padding-left: 220px;color:#FFFFFF">Update Remittance Information</h1>
</div>

<div hidden id = "iconsss" style = "position:relative;left:0px;top:0px;height:300px;width:300px;">
	<img style= "position:relative;left:50px;top:40px;height:220px;width:220px;" align = "middle" src = "icons/add_remit.png">
	<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
</div>

<div hidden id = "iconsss_text" style = "position:relative;left:20px;top:-50px;height:100px;width:300px;background-color:#D9EDF7;border: 2px solid #BCE8F1">
	<div style = "padding-top: 10px;padding-left: 40px;color: #31708F;font-size: 20px;"><strong>Keep Your Money Safe</strong></div><br>
	<div style = "padding-left: 30px;color: #31708F">The most reliable Money Remittance in the Philippines</div>
	<div style = "position:relative;left:0px;width:300px;heigth:100px;"></div>
</div>

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
		$("#iconsss").hide();
		$("#new_remit_form").hide();
		$("#iconsss_text").hide();
		$("#iconsss").slideDown(function(){
			$("#iconsss_text").slideDown(function(){
				$("#new_remit_form").fadeIn();
			})
		});

	});
</script>
<script src = "js/update_remit.js">
</script>


<form hidden id = "new_remit_form" style = "width : 650px;position:relative;left:350px;top:-380px;" name = "frm_newRemittance" method = "POST" action = "script/rmtnew.php">
	<input type = "textbox" name = "_mode" value = "ctr_update_remittance" hidden>
	<input type = "textbox" name = "txt_id" value = "<?php print $r->getTrackno(); ?>" hidden>

	<label>Sender's Name</label> <br>
	<input type = "text" name = "txt_sname" id = "txt_sname" placeholder = "ex. Dela Cruz, Juan C." value = "<?php print $r->getSender_name();?>" ><label id = "err_sname" class = "messages">error</label> <br>
	<label>Sender's Contact Number</label> <br>
	<input type = "text" name = "txt_scon" id = "txt_scon" placeholder = "09368955866" value = "<?php print $r->getSender_contact();?>" ><label class = "messages">error</label> <br>
	<label>Recipient's Name</label> <br>
	<input type = "text" name = "txt_rname" id = "txt_rname" placeholder = "ex. Dela Cruz, Juan C." value = "<?php print $r->getRcv_name();?>"><label class = "messages">error</label> <br>
	<label>Recipient's Contact Number</label> <br>
	<input type = "text" name = "txt_rcon" id = "txt_rcon" placeholder = "09368955866" value = "<?php print $r->getRcv_contact();?>"> <label class = "messages">error</label> <br>
	<label>Recipient's E-mail Address</label> <br>
	<input type = "text" name = "txt_remail" id = "txt_remail" placeholder = "jhmvinperello@gmail.com" value = "<?php print $r->getRcv_mail();?>"> <label class = "messages">error</label> <br>
	<label>Amount</label> <br>
	<input type = "text" name = "txt_amount" id = "txt_amount" placeholder = "Enter Amount" value = "<?php print $r->getAmount();?>"> <label class = "messages">error</label> <br>
	<label>Preferred Pick-up Branch</label> <br>
	<select name = "txt_pickup" id = "txt_pickup">
		<option>Select Branch</option>
		<optgroup label = "Bulacan">
			<option>Malolos</option>
			<option>Bocaue</option>
			<option>Marilao</option>
		</optgroup>
		<optgroup label= "Pampanga">
			<option>Apalit</option>
			<option>San Fernando</option>
			<option>Angeles</option>
		</optgroup>
	</select> <label class = "messages">error</label> <br>
	<input class = "button" type = "button" id = "btn_submit" value = "Update Remittance">

</form>


</div>
