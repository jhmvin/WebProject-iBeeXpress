$(document).ready(function(e) { //check document ready

	var show = getUrlVars()["show"];
	if(show == "reports"){
	$('#main').load('main-reports.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "create_account"){
		$('#main').load('main-create-staff.php',function(){
			$('#main').hide().slideDown();
		});
	}
	else if(show == "view_staff"){
		$('#main').load('main-view-staff.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "new_remittance"){
		$('#main').load('main-new-remittance.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "view_remittance"){
		$('#main').load('main-view-remittance.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "archive_remittance"){
		$('#main').load('main-archive-remittance.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "add_package"){
		$('#main').load('main-add-package.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "view_package"){
		$('#main').load('main-view-package.php',function(){
			$('#main').hide().slideDown();
		});
	}else if(show == "archive_package"){
		$('#main').load('main-archive-package.php',function(){
			$('#main').hide().slideDown();
		});
	}
	
	//reports
	$("#reports").hide();
	$("#view_reports").click(function(){
		$("#reports").slideToggle();
		$("#reports").addClass('shadow');
	});
	$("#reports").load('main-reports.php');

	
	
	$("#nav").css({height: "3000px;",});
	//
});//document ready end

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}

function popNotif(title,message,type){
	$("#message_space").hide();
	$("#message_space").slideDown();
	
	if(type == "info"){
		$("#message_space").css({
			background: "#D9EDF7",	
			border: "2px solid #BCE8F1",
		});
		$("#pop_body").css({
			color: "#31708F",
		});
		$("#dismiss").css({
			color: "#31708F",
			border: "2px solid #337AB7",
			background: "#D9EDF7",	
		});
		
	}else if(type == "success"){
		$("#message_space").css({
			background: "#DFF0D8",	
			border: "2px solid #D6E9C6",
		});
		$("#pop_body").css({
			color: "#3C763D",
		});
		$("#dismiss").css({
			color: "#3C763D",
			border: "2px solid #3C763D",
			background: "#DFF0D8",	
		});
	}else{
		$("#message_space").css({
			background: "#F2DEDE",	
			border: "1px solid #d19494",
		});
		$("#pop_body").css({
			color: "#A94442",
		});
		$("#dismiss").css({
			color: "#A94442",
			border: "1px solid #A94442",
			background: "#F2DEDE",	
		});
	}
	
	$("#pop_title").html(title);
	$("#pop_message").html(message);
}