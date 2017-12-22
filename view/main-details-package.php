<?php
$trackno = $_GET['trackno'];
require_once '../model/model.package.php';
$remit = Package::getInstance();
$remit->release();
$remit->find("trackno:".$trackno,"self");
?>

<style>

.remit_col{
  width:170px;
  text-align:left;
  text-indent: 10px;
  font-weight: bold;
}
.remit_data{
  text-align: left;
  text-indent: 10px;
}
.remit_row{
  line-height : 30px;
  background-color:#f2f2f2;
}
.remit_icon{
  position:relative;
  top:10px;
  height:40px;
  width:40px;
}
</style>

<table width= 95% border=1 style = "margin-left:auto;margin-right:auto;">


  <tr  style = "line-height : 30px;background-color:#3B5998">
    <td colspan =2 style = "text-align:left;text-indent:10px;color:white;font-size:20px">
      Recepient
    </td>
    <td colspan =2 style = "text-align:left;text-indent:10px;color:white;font-size:20px">
      Sender
    </td>
  </tr>

  <tr  class = "remit_row">
    <td class = "remit_col">Name</td>
    <td class= "remit_data"><?php print $remit->getRec_name();?></td>
    <td class = "remit_col">Name</td>
    <td class= "remit_data"><?php print $remit->getSender_name();?></td>
  </tr>
  <tr  class = "remit_row">
    <td class = "remit_col">Contact</td>
    <td class= "remit_data"><?php print $remit->getRec_contact();?></td>
    <td class = "remit_col">Contact</td>
    <td class= "remit_data"><?php print $remit->getSender_contact();?></td>
  </tr>
  <tr  class = "remit_row">
    <td class = "remit_col">Email</td>
    <td class= "remit_data"><?php print $remit->getRec_email();?></td>
    <td class = "remit_col">Email</td>
    <td class= "remit_data"><?php print $remit->getSender_email();?></td>
  </tr>


  <tr  style = "line-height : 30px;background-color:#3B5998"> <td colspan =4 style = "text-align:left;text-indent:10px;color:white;font-size:20px">Details</td></tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Tracking Number</td>
    <td colspan = 3 class= "remit_data"><?php print "RM201700". $remit->getTrackno(); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Origin</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getOrigin(); ?></td>
    <td colspan = 1 class = "remit_col">Destination</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getDestination(); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Declared Value</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getValue(); ?></td>
    <td colspan = 1 class = "remit_col">Insurance</td>
    <td colspan = 1 class= "remit_data"><?php print (($remit->getValue()/500)*50); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Package Size</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getSize(); ?></td>
    <td colspan = 1 class = "remit_col">Delivery Fee</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getFee(); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Dispatch Date</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getDispatch(); ?></td>
    <td colspan = 1 class = "remit_col">Delivery Date</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getDelivery_date(); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Status</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getState(); ?></td>
    <td colspan = 1 class = "remit_col">Archive</td>
    <?php $arch= "Not in Archive"; if($remit->getArchive() == 1){$arch="Archived";}  ?>
    <td colspan = 3 class= "remit_data"> <?php print $arch; ?></td>
  </tr>






  <tr  class = "remit_row">
    <td style = "line-height:50px;" colspan = 1 class = "remit_col">Options</td>
    <td id = "pkg_edit" style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/edit_remit.png"> Modify</td>
    <td id = "pkg_change" style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/change_remit.png"> Change Status </td>
    <td id = "pkg_archive" style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/archive_remit.png"> Archive/Unarchive </td>
  </tr>

  <script>
  $(document).ready(function(){
    var trackno = "<?php print $remit->getTrackno(); ?>"
    $("#pkg_edit").click(function(){
      $("#package_info").fadeOut(function(){
        $("#main").load('main-update-package.php?id='+trackno,function(){});
      });

    });
    $("#pkg_change").click(function(){
      $.get( 'rdr.php?rdr=ctr_changestatus_package&res=id='+trackno ,function(data){
        $("#main").load('main-view-package.php',function(){
          $("#package_info").fadeOut(function(){
            if(data == "delivered"){
              popNotif("DELIVERED","Package state changed successfully","info");
            }else if(data == "dispatched"){
              popNotif("DISPATCHED","Package state changed successfully","info");
            }
          });
        });
      });
    });
    $("#pkg_archive").click(function(){
      $.get( 'rdr.php?rdr=ctr_archive_package&res=id='+trackno ,function(data){
        $("#main").load('main-view-package.php',function(){
          $("#package_info").fadeOut(function(){
            if(data == "archived"){
              popNotif("Successfully","Moved to Archive","info");
            }else if(data == "unarchive"){
              popNotif("Successfully","Moved out from Archive","info");
            }
          });
        });
      });
    });

  });
  </script>


</table>
