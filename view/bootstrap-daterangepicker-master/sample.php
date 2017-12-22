<?php
session_start();
require_once '../../potato.auth.php';
Auth::noview();
?>
<html>
<head>
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" media="all" href="daterangepicker.css" />
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="moment.js"></script>
      <script type="text/javascript" src="daterangepicker.js"></script>


	  <style type="text/css">
      .demo { position: relative;margin:auto }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
	  .demo{
		top: 18px;
	  }
	  .con{
		position:relative;
		top: 100px;
		height: 200px;
		width: 500px;
		background-color:white;
		margin: auto;
-webkit-box-shadow: 1px 0px 5px 6px rgba(0,0,0,0.17);
-moz-box-shadow: 1px 0px 5px 6px rgba(0,0,0,0.17);
box-shadow: 1px 0px 5px 6px rgba(0,0,0,0.17);

	  }
      </style>
</head>
<body style = "background-color: #ECF0F5">

	  <div class = "con">
	  <div style = "height : 50px; background-color:#3C8DBC"><h2 style ="position: relative; top: 10px;color :white;left: 160px">Income Report</h2></div>
				  <div style = "width : 300px;" class="demo">
					<h2> Enter Date Range</h2>
					<input type="text" id="config-demo" class="form-control">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				  </div>
	  </div>

		  <script>
				$('#config-demo').daterangepicker({
					"showDropdowns": true,
					"showWeekNumbers": true,
					"alwaysShowCalendars": true,
					"startDate": "05/12/2017",
					"endDate": "05/18/2017"
				}, function(start, end, label) {
					//call sql generator
				  //alert("New date range selected: " + start.format('YYYY-MM-DD') + " to " + end.format('YYYY-MM-DD'));
          window.open("../../reports/daily.php?from="+start.format('YYYY-MM-DD')+"&to="+end.format('YYYY-MM-DD'), "_self");
          //window.location("../../reports/daily.php?from="+start.format('YYYY-MM-DD')+"&to="+end.format('YYYY-MM-DD'));
          //window.close();
				});
		  </script>
</body>
</html>
