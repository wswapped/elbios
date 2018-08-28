$(function(){
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var username=$("#login_username").val();
		var password=$("#login_password").val();

		if(username.length>=3){
			if(password.length>=3){
				//can show request
				$("#login_loader").show();
				$("#login_errors").hide();


				$.post(api_link, {
					action: 'login',
					username:username,
					password:password
				},function(data){
					$("#login_loader").hide();

					if(data.status){
						window.location="home";
					}else{
						// alert(data.msg);
						$("#login_errors").show().html(data.msg);
					}
				});
			}else{
				$("#login_errors").show().html("Please enter valid password");
			}
		}else{
			alert("Error");
			$("#login_errors").show().html("Please enter valid username");
		}
	});
});

function showErrors(error){
	$("#login_errors").show();
	$("#login_errors").html(error);

}