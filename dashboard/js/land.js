$("#add_land_form").on('submit', function(e){
    //Adding land
    e.preventDefault();

    name = $("#name_input").val();
    size = $("#size_input").val();

    landOwnerParty = $('input[name=landOwner]:checked').val(); //cooperative or member
    if(landOwnerParty == 'member'){
        owner = $("#owner_member_id").val();
    }else{
        owner = NaN;
    }

    


    if(Boolean(name) && Boolean(size) && Boolean(landOwnerParty)){
        //Here we can create cooperative land

        var formdata = new FormData();

        fields = {action:'add_cooperative_land', name:name, size:size, owner:landOwnerParty, ownerId:owner, cooperative:current_cooperative, addedBy:current_user};

        for (var prop in fields) {
            formdata.append(prop, fields[prop]);
        }

        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", function(){
            response = this.responseText;
            try{
                ret = JSON.parse(response);
                if(ret.status){
                    //create successfully(Giving notification and closing the modal);
                    $("#add_member_form .act-dialog[data-role=init]").hide();

                    $("#add_member_form .act-dialog[data-role=done]").removeClass('display-none');

                    setTimeout(function(){
                        location = 'land';
                    }, 1000)

                }else{
                    msg = ret.msg;
                }
            }catch(e){
                console.log(e);
            }

        }, false);
        ajax.open("POST", api_link);
        ajax.send(formdata);
    }else{
    	alert("Shyiramo amakuru yose y'ubutaka")
    }

})
//when someone wants to add land owner
$('input[name=landOwner]').on('change', function(){
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
$('.dropify').dropify({
    messages: {
        'default': 'Kanda cyangwa utereke ifoto hano',
        'replace': 'Simbuza mo ifoto',
        'remove':  'Kuraho',
        'error':   'Yebabawe, hari ikibazo cyabaye.'
    }
});