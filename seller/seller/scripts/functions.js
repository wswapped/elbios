
function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }else{
  	 return (false)
  }
   
}

function validate_string(data){
	var state=false;
	mystring = data;
validRegEx = /^[^\\\/&]*$/
if(mystring.match(validRegEx)){
	state=true;
}else{
	state=false;
}
return state;
}

function confirmPassword(pass,cpass){
	var state=false;
	if(pass.match(cpass)){
		state=true;
	}else{
		state=false;
	}
	return state;
}
function check_phone(str){
	var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}