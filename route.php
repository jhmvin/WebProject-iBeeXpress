<?php
require_once 'potato.model.php';require_once 'potato.router.php';require_once 'potato.auth.php';
if(isset($_GET['rdr'])){$rdr = $_GET['rdr'];}else{$rdr = "";}
if(isset($_GET['res'])){$res = $_GET['res'];}else{$res = "";}
/*
----------------------------------------------
| POTATO ROUTER
| List all your routes here ^^v
|
----------------------------------------------
| Route::get // get VIEW from ROOT FOLDER
| Route::getview // get VIEW from VIEW FOLDER
| Route::getctrl // get CONTROL from CONTROL FOLDER
| POST METHODS send variables from a form
| Route::post // send from root
| Route::postview // send from view
| Route::postctrl // send from control
|
*/

/*Default Route*/
if($rdr == ""){Route::getview('index','');}

/*------------------------------------------------------------------*/
/*Add Routes Here
[routes with the same name the first route will be executed]*/

//view routes
else if($rdr == "login"){Route::getview($rdr,$res);}
else if($rdr == "index"){Route::getview($rdr,$res);}
else if($rdr == "main"){Route::getview($rdr,$res);}

//control routes
else if($rdr == "ctrlogin"){Route::postctrl($rdr,$res);}
else if($rdr == "ctrlogout"){Route::getctrl($rdr,$res);}
else if($rdr == "ctrajaxuser"){Route::getctrl($rdr,$res);}

else if($rdr == "ctr_add_staff"){Route::postctrl($rdr,$res);}
else if($rdr == "ctr_update_staff"){Route::postctrl($rdr,$res);}
else if($rdr == "ctr_delete_staff"){Route::getctrl($rdr,$res);}
else if($rdr == "ctr_block_staff"){Route::getctrl($rdr,$res);}

else if($rdr == "ctr_add_remittance"){Route::postctrl($rdr,$res);}
else if($rdr == "ctr_add_package"){Route::postctrl($rdr,$res);}

else if($rdr == "ctr_archive_package"){Route::getctrl($rdr,$res);}
else if($rdr == "ctr_changestatus_package"){Route::getctrl($rdr,$res);}
else if($rdr == "ctr_update_package"){Route::getctrl($rdr,$res);}

else if($rdr == "ctr_archive_remittance"){Route::getctrl($rdr,$res);}
else if($rdr == "ctr_changestatus_remittance"){Route::getctrl($rdr,$res);}
else if($rdr == "ctr_update_remittance"){Route::getctrl($rdr,$res);}

else if($rdr == "ctr_get_values"){Route::getctrl($rdr,$res);}



/*End of Route List*/
/*------------------------------------------------------------------*/
else{echo "<img src = potato/home.png> <br>";echo "<h3>Oooops. Sorry The Route: <span style = 'color:red'>$rdr</span> is not found please register the route first<h3><br>";echo "<h5>REGISTER THE ROUTE FIRST at ROUTE.PHP<h5>";}

?>
