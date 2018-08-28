$(function(){
	//CLONE THE FIRST STEP
	var step_1 = $("#frm_register1").html()
	$("#frm_register1").on('submit', function(e){
		e.preventDefault();


		//getting registration step
		step = $("#step").val();

		if(step == 1){
			//basic info
			var name=$("#co_name").val();

			var co_serial = $("#co_serial").val();

			var province = $("#select_province").val();
			var district = $("#select_district").val();
			var sector = $("#select_sector").val();

			if(name.length>=3){
				if(province && district && sector){
					//we can proceed
					$.post(api_link, {action:'create_cooperative', step: 1, serial: co_serial, name:name, province:province, district:district, sector:sector})
					
					// hiding the step
					// $(".form-step[data-step=1]").addClass('uk-hidden');
					$("#frm_register1").remove();
					$(".form-step[data-step=2]").removeClass('uk-hidden');


					setTimeout(function(){
						location = location.href+"?step=2"
					}, 100)
				}else{
					showErrors("Hitamo intara, akarere n'umurenge kooperative iherereyemo");
				}
			}else{
				showErrors("Izina rigomba kuba ari rinini rirenga inyuguti eshatu");
			}


		}
	});

	$("#frm_register2").on('submit', function(e){
		e.preventDefault();
		admin_name = $("#admin_name").val()
		admin_dob = $("#admin_dob").val()
		admin_nid = $("#admin_nid").val()
		admin_name = $("#admin_name").val()
		admin_phone = $("#admin_phone").val()

		admin_gender = 'm'

		//credentials
		admin_username = $("#username").val()
		coopId = $("#coopid").val()
		admin_pwd = $("#admin_password").val()


		//Admin location
		province = $("#select_province").val()
		district = $("#select_district").val()
		sector = $("#select_sector").val();

		$.post(api_link, {action:'create_cooperative', step:2, cooperative:coopId, name:admin_name, phone: admin_phone, NID:admin_nid, gender:admin_gender, dateOfBirth:admin_dob, adminProvince: province, adminDistrict:district, adminSector:sector, adminUsername:admin_username, adminPassword:admin_pwd }, function(data){
				console.log(data)
				location = location.protocol+"//"+location.host+"/dashboard"
		})
	});

	

	//Temporary
	// $("#frm_register1").remove()


	$("#select_province").on('change', function(){
	    province = $(this).val();
	    dist_elem = $(this).parents("form").find('#select_district')

	    //getting the districts in province
	    $.post(api_link, {action:'get_districts', province: province}, function(data){
	    	// console.log(data)

	    	//adding data to dis select
	    	dists = data.data
	    	
	    	console.log(dist_elem)
	    	$(dist_elem).find(".option").remove()
	    	for(dist in dists){
	    		dist_data = dists[dist]
	    		$(dist_elem).append($('<option>', {
	    			class: 'option',
				    value: dist_data.districtcode,
				    text: dist_data.namedistrict
				}));
	    	}
	    	
	    })
	});

	$("#select_district").on('change', function(){
	    district = $(this).val();

	    //getting the sectors in district
	    $.post(api_link, {action:'get_sectors', district: district}, function(data){
	    	// console.log(data)

	    	//adding data to sects select
	    	sectors = data.data;
	    	$('#select_sector').find(".option").remove()
	    	for(dist in sectors){
	    		sect_data = sectors[dist]
	    		$('#select_sector').append($('<option>', {
	    			class: 'option',
				    value: sect_data.sectorcode,
				    text: sect_data.namesector
				}));
	    	}
	    	
	    })
	})

	// validate  NID  input
	$(".validateNID").on('keypress', function(e){
	    key = e.key

	    if(isNaN(key)){
	        alert('Only numbers allowed')
	    }

	    length = parseInt($(this).val().toString().length)+1

	    //NID should not go beyond 16
	    if(length>16){
	        return false;
	    }
	});

	$(".validatePhone").on('keypress', function(e){
	    key = e.key

	    if(isNaN(key)){
	        alert('Only numbers allowed')
	    }

	    length = parseInt($(this).val().toString().length)+1

	    //phone should not go beyond 10
	    if(length>10){
	        return false;
	    }
	});
});

function showErrors(error){
	$("#reg_errors").show().html(error);
}