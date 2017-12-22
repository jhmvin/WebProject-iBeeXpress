<?php
require_once '../model/model.remittance.php';
$remit = Remittance::getInstance();
$remittances = $remit->where('archive','=','1');
 ?>

 <script>
$(document).ready(function(){
  $("a.clickables").click(function(){
    var trackno = $(this).attr("id");

    $("#details_remittance").load('main-details-remittance.php?trackno='+trackno,function(){
      $("#remit_info").slideDown();
    });
  });
});
 </script>
<div class = "panel" id = "view_remit">
	<!--
	<div class = "headers"><img align = "middle" src = "icons/view_remit.png"><label class = "header_text"><strong>Remittance Records</strong></label></div>
	-->
	<table width = 100% border = 0 cellspacing = 0>
	<tr style = "height: 80px;line-height : 40px;background-color:#3B5998;color:white"> <td colspan = 7><h1 style = "padding-top:20px;padding-left: 0px;color:#FFFFFF">Money Remittance Archive</h1></td> </tr>
	<tr  style = "line-height : 40px" class = "tbl_head"> <td>Tracking</td> <td>Recipient</td> <td>Sender</td> <td>Amount</td> <td>Status</td> <td>Details</td> </tr>
	<?php for($x = 0 ; $x<count($remittances); $x++){ $r = $remittances[$x] ?>
	<tr style = "line-height : 35px;background-color:#f2f2f2">
			<td><?php print "RM201700".$r['trackno']; ?></td>
			<td><?php print $r['rcv_name']; ?></td>
			<td><?php print $r['sender_name']; ?></td>
			<td><?php print $r['amount']; ?></td>
			<?php if($r['complete'] === '0000-00-00 00:00:00'){$status = "waiting";}else{$status = "cleared";} ?>
			<td> <img style = "height:25px;width:25px" src = "icons2/<?php print $status; ?>.png"> </td>

	<td> <a class = "clickables" style = "cursor:pointer;" id = "<?php print $r['trackno'] ?>">
<img style = "height:25px;width:25px" src = "icons2/details.png">
	</a> </tr>

	<?php }?>
	</table>
	</div>
