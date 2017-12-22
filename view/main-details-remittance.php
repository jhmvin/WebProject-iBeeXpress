<?php
$trackno = $_GET['trackno'];
require_once '../model/model.remittance.php';
$remit = Remittance::getInstance();
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
    <td class= "remit_data"><?php print $remit->getRcv_name();?></td>
    <td class = "remit_col">Name</td>
    <td class= "remit_data"><?php print $remit->getSender_name();?></td>
  </tr>
  <tr  class = "remit_row">
    <td class = "remit_col">Contact</td>
    <td class= "remit_data"><?php print $remit->getRcv_contact();?></td>
    <td class = "remit_col">Contact</td>
    <td class= "remit_data"><?php print $remit->getSender_contact();?></td>
  </tr>
  <tr  class = "remit_row">
    <td class = "remit_col">Email</td>
    <td class= "remit_data"><?php print $remit->getRcv_mail();?></td>
    <td class = "remit_col">Email</td>
    <td class= "remit_data">No E-mail</td>
  </tr>


  <tr  style = "line-height : 30px;background-color:#3B5998"> <td colspan =4 style = "text-align:left;text-indent:10px;color:white;font-size:20px">Details</td></tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Tracking Number</td>
    <td colspan = 3 class= "remit_data"><?php print "RM201700". $remit->getTrackno(); ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Amount</td>
    <td colspan = 3 class= "remit_data"><?php print $remit->getAmount();  ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Remittance Fee</td>
    <td colspan = 3 class= "remit_data"><?php print $remit->getFee();  ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Pick-up Branch</td>
    <td colspan = 3 class= "remit_data"><?php print $remit->getPickup();  ?></td>
  </tr>
  <tr  class = "remit_row">
    <td colspan = 1 class = "remit_col">Date</td>
    <td colspan = 1 class= "remit_data"><?php print $remit->getDate();  ?></td>
    <td colspan = 1 class = "remit_col">Status</td>
    <?php $stat = "Claimed: ". $remit->getComplete(); if($remit->getComplete() == "0000-00-00 00:00:00"){$stat = "For Claiming";} ?>
      <td colspan = 1 class= "remit_data"><?php print $stat; ?></td>
    </tr>
    <tr  class = "remit_row">
      <td colspan = 1 class = "remit_col">Archive</td>
      <?php $arch= "Not in Archive"; if($remit->getArchive() == 1){$arch="Archived";}  ?>
      <td colspan = 3 class= "remit_data"> <?php print $arch; ?></td>
    </tr>

    <tr  class = "remit_row">
      <td style = "line-height:50px;" colspan = 1 class = "remit_col">Options</td>
      <td id = "remit_edit" style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/edit_remit.png"> Modify</td>
      <td id = "remit_change"  style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/change_remit.png"> Change Status </td>
      <td id = "remit_archive" style = "line-height:50px;text-align:center;cursor:pointer" colspan = 1 class = "remit_row"><img class = "remit_icon" src = "icons2/archive_remit.png"> Archive/Unarchive </td>
    </tr>

    <script>
    var trackno = "<?php print $remit->getTrackno(); ?>"
    $(document).ready(function(){
      $("#remit_edit").click(function(){
        $("#remit_info").fadeOut(function(){
          $("#main").load('main-update-remittance.php?id='+trackno,function(){});
        });
      });
      $("#remit_change").click(function(){
        $.get( 'rdr.php?rdr=ctr_changestatus_remittance&res=id='+trackno ,function(data){
          $("#main").load('main-view-remittance.php',function(){
            $("#remit_info").fadeOut(function(){
              if(data == "claimed"){

                popNotif("CLAIMED","Money Remittance Notifications Sent","info");
              }else if(data == "unclaimed"){
                popNotif("PENDING","Money Remittance state changed successfully","info");
              }
            });
          });
        });
      });
      $("#remit_archive").click(function(){
        $.get( 'rdr.php?rdr=ctr_archive_remittance&res=id='+trackno ,function(data){
          $("#main").load('main-view-remittance.php',function(){
            $("#remit_info").fadeOut(function(){
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
