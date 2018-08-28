$("#harvest_sell_form").on('submit', function(e){
	//Adding a crop pricing
	e.preventDefault();

	form_elem  = $(this)
	//crop name
	crop = $("#cropselect").val();

	//crop grade
	// crop_grade = $("#crop_grade").val();

	//harvest to be sold
	quantity = $("#crop_sales_quantity_input").val();

	//wholesaler we are selling to
	seller = $("#seller_input").val()

	if(Boolean(crop) && Boolean(quantity) && Boolean(seller)){

		fields = {action:'sell_cooperative_harvest', crop:crop, quantity:quantity, cooperative:current_cooperative, seller: seller, addedBy:current_user};

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
				form_elem.find(".act-dialog[data-role=init]").hide();

				form_elem.find(".act-dialog[data-role=done]").removeClass('display-none');

				setTimeout(function(){
					location.reload();
				}, 1000);

			}else{				
				msg = ret.msg;
				alert(msg)
			}
		});
	}else{
		alert("Shyiramo amakuru yose asabwa kugirango ugurishe");
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