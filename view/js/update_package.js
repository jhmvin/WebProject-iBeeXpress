$(document).ready(function(){
  $("#btn_send_package").click(function(){
    var a = $("#frm_add_package").valid();
    if(a == true){
    var data = $("#frm_add_package").serialize();
      $.ajax({
        data: data,
        type: "post",
        url: "rdr.php",
        success: function(data){
          if(data != "error"){
            
            popNotif("Success","Package Successfully Updated.","info");
            $("#main").load('main-view-package.php',function(){});
            //document.getElementById("frm_add_package").reset();
          }else{
            popNotif("Failed","Something went wrong.","none");
          }

        }
      });

    }else{
      //alert("Invalid Form");
      popNotif("Invalid Information","Please recheck all the details.","none");
    }
  });



  var validation = $("#frm_add_package").validate({
    rules:{
      txt_psname:{
        required : true,
        minlength: 6,
        letterswithbasicpunc: true,
      },
      txt_psadd:{
        required : true,
        minlength: 6,
      },
      txt_psemail:{
        required : true,
        email: true,
        minlength: 6,
      },
      txt_pscontact:{
        required : true,
        digits: true,
        minlength: 11,
        maxlength: 11,
      },

      //----------------
      txt_prname:{
        required : true,
        minlength: 6,
        letterswithbasicpunc: true,
      },
      txt_pradd:{
        required : true,
        minlength: 6,
      },
      txt_premail:{
        required : true,
        email: true,
        minlength: 6,
      },
      txt_prcontact:{
        required : true,
        digits: true,
        minlength: 11,
        maxlength: 11,
      },
      //-------------
      txt_destination:{
        required: true,
        valueNotEquals : "Select Destination",
      },
      txt_size:{
        required: true,
        valueNotEquals : "Select Size",
      },
      txt_amount:{
        required : true,
        digits: true,
        minlength: 3,
      }
      //end of rules
    },messages: {
        txt_destination: {
          valueNotEquals : "Please select a destination.",
        },txt_size:{
          valueNotEquals : "Please select a size.",
        },

    },

  });

});
