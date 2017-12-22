$(document).ready(function(){
  //declaration
  /*
  var txt_sname = "";
  var txt_scon = "";
  var txt_rname = "";
  var txt_rcon = "";
  var txt_remail = "";
  var txt_amount = "";
  var txt_pickup = "";
  */
  $("#btn_submit").click(function(){
    var a = $("#new_remit_form").valid();
    if(a == true){
      var data = $("#new_remit_form").serialize();
      $.ajax({
        data: data,
        type: "post",
        url: "rdr.php",
        success: function(data){
          if(data){
            popNotif("Success","Remittance Successfully Added.","info");
            document.getElementById("new_remit_form").reset();
          }else{
            popNotif("Failed","Something went wrong.","none");
          }

        }
      });

    }else{
      popNotif("Invalid Information","Please recheck all the details.","none");
    }
  });
  var validation = $("#new_remit_form").validate({
    rules: {
      txt_sname:{
        required : true,
        minlength: 6,
        letterswithbasicpunc: true,
      },txt_scon:{
        required : true,
        digits: true,
        minlength: 11,
        maxlength: 11,
      },txt_rname:{
        required : true,
        minlength: 6,
        letterswithbasicpunc: true,
      },txt_rcon:{
        required : true,
        digits: true,
        minlength: 11,
        maxlength: 11,
      },txt_remail:{
        required : true,
        email: true,
        minlength: 6,
      },txt_amount:{
        required : true,
        digits: true,
        minlength: 3,
      },txt_pickup:{
        required: true,
        valueNotEquals : "Select Branch",
      },


    },messages: {
        txt_pickup: {
          valueNotEquals : "Please select pickup branch.",
        }
    },
  });




  //get values
  /*
  function getValues(){
    txt_sname = $("#txt_sname").val();
    txt_scon = $("#txt_scon").val();
    txt_rname = $("#txt_rname").val();
    txt_rcon = $("#txt_rcon").val();
    txt_remail = $("#txt_remail").val();
    txt_amount = $("#txt_amount").val();
    txt_pickup = $("#txt_pickup").val();
  }
  */ /* not need ^^v */
});
