$("#add_purch_form").on('submit', function(e){
    //Adding a purchasing order
    e.preventDefault();

    //product
    product = $("#productselect").val();

    var productUnitPrice = $("#productUnitPrice").val();
    var productUnitMeasure = $("#productMeasurement").val();
    var productQuantity = $("#productQuantity").val();
    var priceCurrency = $("#priceCurrency").val();

    //crop name
    type = $("#croptype").val();

    if(Boolean(productUnitPrice) && Boolean(productUnitPrice) && Boolean(productQuantity) && Boolean(priceCurrency)){
        alert("In good order")
        fields = {action:'addPurchasingOrder', product:product, productUnitPrice:productUnitPrice, productUnitMeasure:productUnitMeasure, productQuantity:productQuantity, priceCurrency:priceCurrency, doneBy:current_user};

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
        alert("Please enter all the information required for the purchasing order")
    }

})

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

$("#productselect").on('change', function(){
    selectedProduct = $(this).val();

    //getting variaties of the product
    $.post(api_link, {action:'get_product', product:selectedProduct}, function(data){
        if(typeof(data) != 'object')
            ret  = JSON.parse(data)
        else
            ret = data

        if(ret.status){
            $("#productMeasurement option").remove()

            console.log(ret)
            //checking product unit
            unit = ret['data'].units.main
            $("#productMeasurement").html(
                    $('<option>', {
                    class: 'option',
                    value: unit.id,
                    text: unit.measurementUnit
                })
            );
        }
    }, 'json')
});

$("#productUnitPrice").on('keyup', function(){
    changeTotalAmount()
})
$("#productQuantity").on('keyup', function(){
    changeTotalAmount()
})

$("#priceCurrency").on('change', function(){
    changeTotalAmount()
})


function changeTotalAmount(){
    //changes the total amount
    var unitPrice = $("#productUnitPrice").val();
    var productQuantity = $("#productQuantity").val();
    var currency = $("#priceCurrency").val();

    $("#orderAmount").val((unitPrice*productQuantity)+" "+currency)
}


$(".selectize").selectize()

function log(data){
    console.log(data)
}