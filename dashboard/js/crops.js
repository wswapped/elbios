$("#add_crop_form").on('submit', function(e){
    //Adding a crop
    e.preventDefault();

    //crop name
    crop = $("#cropselect").val();

     //crop name
    type = $("#croptype").val();

    // //grading
    // grades = $("#crop_grading").val().split(',');


    if(Boolean(crop) && Boolean(type)){

        fields = {action:'add_cooperative_crop', crop:crop, type:type, cooperative:current_cooperative, addedBy:current_user};

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
                    location = 'crops';
                }, 1000)

            }else{
                alert(ret.msg)
                msg = ret.msg;
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
    $.post(api_link, {action:'crop_varieties', crop:crop}, function(data){
        if(typeof(data) != 'object')
            ret  = JSON.parse(data)
        else
            ret = data

        if(ret.status){
            $("#croptype option").remove()
            for (var i = ret.data.length - 1; i >= 0; i--) {
                crop_data = ret.data[i]
                
                $("#croptype").append(
                        $('<option>', {
                        class: 'option',
                        value: crop_data.id,
                        text: crop_data.variety
                    })
                );
            }
        }
    }, 'json')
})

function log(data){
    console.log(data)
}