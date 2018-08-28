//function to return urls to use

function access_rl(){
	return 'user_access';
}

//dashboard
function dashboard_rl(){
	return 'dashboard';
}
function redirectTo(url){
	window.location=url;
}


//ACTION RETURN MESSAGES

function successMsg(){
	return '200';
}
function forbiddenError(){
	return '500';
}

function systemError(){
	return '403';
}

function forbiddenErrorMsg(){
	return "Email cyangwa umubare w'ibanga ntabwo aribyo";
}

function systemMsg(){
	return 'Hari ikibazo gihari turi kugikemura';
}
