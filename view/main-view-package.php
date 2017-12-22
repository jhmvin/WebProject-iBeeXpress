<?php
require_once '../model/model.package.php';
$package = Package::getInstance();
$packages = $package->where('archive','=','0');
 ?>

<script>
$(document).ready(function(){
  $("a.clickables").click(function(){
    var trackno = $(this).attr("id");
    $("#details_package").load('main-details-package.php?trackno='+trackno,function(){
      $("#package_info").slideDown();
    });


    });
  });
</script>
	<div class = "panel" id = "view_package">


		<!--
	<div class = "headers"><img align = "middle" src = "icons/view_package.png"><label class = "header_text"><strong>Package Delivery Records</strong></label> </div>
-->
	<table width = 100% border = 0 cellspacing = 0>
	<tr style = "height: 80px;line-height : 40px;background-color:#3B5998;color:white"> <td colspan = 7><h1 style = "padding-top:20px;padding-left: 0px;color:#FFFFFF">Package Delivery</h1></td> </tr>
	<tr style = "line-height : 40px" class = "tbl_head"> <td>Tracking</td> <td>Recipient</td> <td>Sender</td> <td>Destination</td> <td>Status</td> <td>Details</td> </tr>
  <?php for($x = 0 ; $x<count($packages); $x++){ $p = $packages[$x] ?>
	<tr style = "line-height : 35px;background-color:#f2f2f2">
			<td><?php print "PK201700".$p['trackno']; ?></td>
			<td><?php print $p['rec_name']; ?></td>
			<td><?php print $p['sender_name']; ?></td>
			<td><?php print $p['destination']; ?></td>

			<td><img style = "height:25px;width:25px" src = "icons2/<?php print $p['state']; ?>.png"> </td>

	<td>
		<a <a class = "clickables" style = "cursor:pointer;" id = "<?php print $p['trackno']; ?>">
	 <img style = "height:25px;width:25px" src = "icons2/details.png">
	 </a>
	</tr>

	<?php }?>
	</table>

	</div>
