$("#add_member_form").on('submit', function(e){
    //Creating branch
    //Getting inputs
    e.preventDefault();

    mname = $("#name_input").val();
    nid = $("#NID_input").val();
    phone = $("#phone_input").val();
    bdate = $("#bdate_input").val();
    gender = $("input[name=gender]:checked").val()
    profile_pic = document.querySelector("#user_pic_input").files[0]


    if(Boolean(mname) && Boolean(nid) && Boolean(phone) && Boolean(bdate) && Boolean(gender)){
        //Here we can create church

        var formdata = new FormData();

        fields = {action:'add_cooperative_member', name:mname, phone:phone, birth_date:bdate, NID:nid, gender:gender, location:'', picture:profile_pic, cooperative:current_cooperative};

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
                        location = 'members';
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
    	alert("Shyiramo amakuru yose y'umunyamuryango mushya")
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
