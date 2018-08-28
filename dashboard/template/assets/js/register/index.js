// $(document).ready(function(){
// 	$("#frm_register").on("submit",function(e){
// 		e.preventDefault();
// 		//grab form content
// 		var co_name=$("#co_name").val();
// 		var co_serial=$("#co_serial").val();
// 		var co_location=$("#co_location").val();
// 		var co_admin_name=$("#co_admin_name").val();
// 		var co_admin_pin=$("#co_admin_pin").val();
// 		var co_admin_co_pin=$
// 		//validate data
// 		if(validateString(co_name)){
// 			if(validateString(co_serial)){
// 				if(validateString(co_location)){
// 					if(validateString(co_admin_name)){
// 						if(validateString(co_admin_pin) && validateInteger(co_admin_pin)){
// 							loader("ready to go");
// 						}else{
// 							displayError("Invalid Admin PIN");
// 						}
// 					}else{a
// 						displayError("Invalid Admin name");
// 					}
// 				}else{
// 					displayError("PLease select location");
// 				}
// 			}else{
// 				displayError("Invalid Cooperative ID");
// 			}
// 		}else{
// 			displayError("Invalid Cooperative name");
// 		}
// 	});

// 	$("#frm_register").on("submit",function(e){
// 		e.preventDefault();
// 		//grab form content
// 		var co_name=$("#co_name").val();
// 		var co_serial=$("#co_serial").val();
// 		var co_location=$("#co_location").val();
// 		var co_admin_name=$("#co_admin_name").val();
// 		var co_admin_pin=$("#co_admin_pin").val();
// 		var co_admin_co_pin=$
// 		//validate data
// 		if(validateString(co_name)){
// 			if(validateString(co_serial)){
// 				if(validateString(co_location)){
// 					if(validateString(co_admin_name)){
// 						if(validateString(co_admin_pin) && validateInteger(co_admin_pin)){
// 							loader("ready to go");
// 						}else{
// 							displayError("Invalid Admin PIN");
// 						}
// 					}else{a
// 						displayError("Invalid Admin name");
// 					}
// 				}else{
// 					displayError("PLease select location");
// 				}
// 			}else{
// 				displayError("Invalid Cooperative ID");
// 			}
// 		}else{
// 			displayError("Invalid Cooperative name");
// 		}
// 	});
// });

//function to display error
function displayError(error){
	UIkit.modal.alert(error);
}
function validateString(str){
	status=false;
	if(str.length>=3){
		status=true;
	}else{
		status=false;
	}
	return status;
}
function validateInteger(data)
{
	status=false;
    var z = data;
    if(!z.match(/^\d+/))
        {
        status=false;
        }else{
        	status=true;
        }
        return status;
}

function requesting(url){
$.ajax({  
	url: url,  
	type: "POST",  
	data: new FormData(this),  
	contentType: false,  
	processData:false,  
success: function(data)  
{
displayError(data); 
}  
});
}

function loader(msg){
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+msg+'<br/><img class=\'uk-margin-top\' src=assets/img/others/loader.gif alt=\'\'>');
}