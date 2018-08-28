$("#set_pricing_form").on('submit', function(e){
	//Adding a crop pricing
	e.preventDefault();

	//crop name
	crop = $("#cropselect").val();

	//crop name
	crop_grade = $("#crop_grade").val();

	//proposed price
	price = $("#crop_price_input").val();


	if(Boolean(crop) && Boolean(crop_grade) && Boolean(price)){

		fields = {action:'add_cooperative_pricing', crop:crop, crop_grade:crop_grade, price:price, cooperative:current_cooperative, addedBy:current_user};

		$.post(api_link, fields, function(data){
			if(typeof(data) != 'object'){
				try{                
					ret = JSON.parse(data);                
				}catch(e){
					alert("Mutwihanganire hari ikibazo cyabayeho")
					console.log(e);
				}                
			}else{
				ret  = data;
			}

			if(ret.status){
				//create successfully(Giving notification and closing the modal);
				$("#add_crop_form .act-dialog[data-role=init]").hide();

				$("#add_crop_form .act-dialog[data-role=done]").removeClass('display-none');

				setTimeout(function(){
					location = 'pricing';
				}, 1000);

			}else{				
				msg = ret.msg;
				alert(msg)
			}

			

		});
	}else{
		alert("Shyiramo amakuru yose y'igihingwa gishya")
	}

})

$(".selectize").select2()

$("#cropselect").on('change', function(){
	crop = $(this).val();

	//getting variaties of the crop
	$.post(api_link, {action:'crop_grades', crop:crop}, function(data){
		if(typeof(data) != 'object')
			ret  = JSON.parse(data)
		else
			ret = data

		if(ret.status){
			for (var i = ret.data.length - 1; i >= 0; i--) {
				crop_data = ret.data[i]
				$("#crop_grade").append(
						$('<option>', {
						value: crop_data.id,
						text: crop_data.grade
					})
				);
			}
		}
	})
})

function log(data){
	console.log(data)
}