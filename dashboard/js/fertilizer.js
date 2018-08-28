$("#add_fertilizer_form").on('submit', function(e){
    e.preventDefault();

    //fertilzer
    fert = $("#fert_input").val();

    //fert quantity
    quantity = $("#quantity_input").val();

    //date quantity - DO WE NEED IT?
    date = $("#date_input").val();

    if(Boolean(fert) && Boolean(quantity)){

        fields = {action:'declare_fertilizer', cooperative:current_cooperative, fertilizerId:fert, quantity:quantity, date:date, addedBy:current_user};

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

            console.log(ret)
            if(ret.status){
                //create successfully(Giving notification and closing the modal);
                $("#add_crop_form .act-dialog[data-role=init]").hide();

                $("#add_crop_form .act-dialog[data-role=done]").removeClass('display-none');

                setTimeout(function(){
                    location = 'inputs';
                }, 1000)

            }else{
                alert(ret.msg)
                msg = ret.msg;
            }
        });
    }else{
    	alert("Shyiramo amakuru yose y'ifumbire yose")
    }
});


//For assigning fertilizer to member
$("#assign_fertilizer_form").on('submit', function(e){
    e.preventDefault();

    //fertilzer
    fert = $("#assign_fert_input").val();

    //fert quantity
    quantity = $("#assign_quantity_input").val();

    member = $("#assign_member").val();
    date = new Date()



    if(Boolean(fert) && Boolean(quantity)){

        fields = {action:'cooperative_assign_fertilizer', cooperative:current_cooperative, fertilizerId:fert, quantity:quantity, member:member, date:date, addedBy:current_user};

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
                    location = 'inputs';
                }, 1000)
            }else{
                alert(ret.msg)
                msg = ret.msg;
            }

            

        });
    }else{
        alert("Shyiramo amakuru yose y'ifumbire")
    }
});

$(".assign_fertilizer_btn").on('click', function(){
    name = $(this).data('membername')

    //signing the id in the form
    $("#assign_member").val($(this).data('memberid'))
    $("#assignee_name").html("<i>"+name+"</i>")
})

function log(data){
    console.log(data)
}