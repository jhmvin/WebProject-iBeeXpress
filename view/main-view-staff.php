<?php
require_once '../model/model.staff.php';
$staff = Staff::getInstance();
$staffs = $staff->where('role','=','staff');

function state($var){
	if($var >= 3){$state = "blocked";}
	else{$state = "active";}
	return $state;
}
?>
<style>
tr{
	font-family: calibri;
	font-size:20px;
}
.tbl_head{
	background-color:#d3d8de;
}
.hdelete, .hupdate{
	cursor:pointer;
}
</style>
<div class = "panel" id = "view_staff">

	<!--
	<div class = "headers" style = ""><img align = "middle" src = "icons/staff_info.png"><label class = "header_text"><strong>Staff Information</strong></label></div>
	-->
	<table width = 100% border = 1 cellspacing = 3>
	<tr style = "height: 80px;line-height : 40px;background-color:#3B5998;color:white"> <td colspan = 7><h1 style = "padding-top:20px;padding-left: 0px;color:#FFFFFF">Your Staffs</h1></td> </tr>
	<tr style = "line-height : 40px" class = "tbl_head"> <td>ID</td> <td>Account</td> <td>Name</td> <td>Status</td> <td colspan = 3>Action</td> </tr>
	<?php for($x = 0 ; $x<count($staffs); $x++){ $s = $staffs[$x] ?>
	<tr style = "line-height : 35px;background-color:#f2f2f2" >
		<td><?php print $s['id']; ?></td>
		<td><?php print $s['user']; ?></td>
		<td><?php print $s['name']; ?></td>
		<td > <img style = "height:25px;width:25px" src = "icons2/<?php print state($s['state']); ?>.png"></td>
		<td ><a class = "hupdate" url = "<?php print $s['id']; ?>"><img style = "height:25px;width:25px" src = "icons2/edit.png"> </td>
		<td ><a class = "hblock" url = "rdr.php?rdr=ctr_block_staff&res=id=<?php print $s['id']; ?>"><img style = "height:25px;width:25px" src = "icons2/block.png"></td>
		<td ><a class = "hdelete" url = "rdr.php?rdr=ctr_delete_staff&res=id=<?php print $s['id']; ?>"><img style = "height:25px;width:25px" src = "icons2/delete.png"> </td>
	</tr>
	<?php } ?>
	</table>
	<script src = "js/jquery-3.1.1.js"></script>
	<script>
		$(document).ready(function(){
			$("a.hdelete").click(function(){
				$.get( this.getAttribute("url"), function( data ) {
					if(data == "deleted"){
					$("#main").load('main-view-staff.php',function(){
						popNotif("Success","Staff Successfully Delete.","success");
					});
					}else{
						popNotif("Failed","Failed To Delete Staff.","none");
					}
				});

			}); // end delete

			$("a.hupdate").click(function(){
				//$("#main").empty();
				$("#main").hide();
				$("#main").load("main-update-staff.php?id="+this.getAttribute("url"),function(){
				$("#main").fadeIn();
				});
			});

			$("a.hblock").click(function(){
					$.get( this.getAttribute("url") ,function(data){
						if(data == "unblock"){
							$("#main").load('main-view-staff.php',function(){
								popNotif("Account Unblocked","Staff Successfully Unblock.","success");
							});
						}else{
							$("#main").load('main-view-staff.php',function(){
								popNotif("Account Blocked","Staff Successfully Blocked.","none");
							});

						}
					});

				});

		});
	</script>
</div>
