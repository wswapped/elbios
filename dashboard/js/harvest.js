$("#harvest_form").on('submit', function(e){
	//Adding a crop pricing
	e.preventDefault();

	form_elem  = $(this)
	//crop name
	crop = $("#cropselect").val();

	//crop grade
	crop_grade = $("#crop_grade").val();

	//harvest to be sold
	quantity = $("#crop_sales_quantity_input").val();
	
	//harvest to be taken by member
	quantity_remained = $("#crop_remain_quantity_input").val();

	owner = $("#member_id").val();

	harvestOwner = $('input[name=harvestOwner]:checked').val();

	if(Boolean(crop) && Boolean(crop_grade) && Boolean(quantity)){

		if(harvestOwner == 'cooperative'){
			fields = {action:'add_cooperative_harvest', crop:crop, crop_grade:crop_grade, quantity:quantity, quantity_remained:quantity_remained, cooperative:current_cooperative, addedBy:current_user};
		}else{
			fields = {action:'add_cooperative_harvest', crop:crop, crop_grade:crop_grade, quantity:quantity, owner:owner, quantity_remained:quantity_remained, cooperative:current_cooperative, addedBy:current_user};
		}

		

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
					location = 'harvest';
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
});

//when someone changes stock owner
$('input[name=harvestOwner]').on('change', function(){
	owner = $(this).val();

	if(owner == 'cooperative'){
		//hide the member details
		$("#member-additional").addClass('uk-hidden')
	}else{
		$("#member-additional").removeClass('uk-hidden')
	}
})

function log(data){
	console.log(data)
}