$(function(){
	$("#frm_reg_member").submit(function(e){
		e.preventDefault();
		var firstname=$("#firstname").val();
		var lastname=$("#lastname").val();
		var id_number=$("#id_number").val();
		var phone=$("#phone").val();
		var residence=$("#residence").val();
		var co_id=$("#co_id").val();
		
		//check data now
		//save data
		$("#loading").show();
		$.post("save_member",{
			firstname:firstname,
			lastname:lastname,
			id_number:id_number,
			phone:phone,
			residence:residence,
			co_id:co_id
		},function(data){
			$("#loading").hide();
			if(data=="1"){
				alert("Member successfully saved");
				window.location="information";
			}
		});
	});
	//icon edit is clicked
	$(".icon_edit").click(function(){
		var id=$(this).attr("data");
	});
});