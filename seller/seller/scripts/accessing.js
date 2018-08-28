$(document).ready(function(){
	var SweetAlert = function() {};
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var email=$("#email").val();
		var password=$("#password").val();
		if(ValidateEmail(email)){
			if(password.length>=6){
				login_request(email,password);
			}else{
				showErrors("Ijambo ry' ibanga rigomba kuba hejuru y'inyuguti 5");
			}
		}else{
			showErrors("email mwashyizemo nabi!");
		}
	});
});

function login_request(email,password){
	showLoader();
	$.post(access_rl(),{
		email:email,
		password:password
	},function(data){
		hideLoader();
		if(data.match(successMsg())){
			redirectTo(dashboard_rl());
		}else if(data.match(forbiddenError())){
			showErrors(forbiddenErrorMsg());
		}else if(data.match(systemError())){
			showErrors(systemMsg());
		}
	});
}
function showLoader(){
$("#errors").hide();
$("#loader").show();
}

function hideLoader(){
$("#loader").hide();
}

function showErrors(msg){
	$("#errors").show();
	$("#errors").html(msg);
}