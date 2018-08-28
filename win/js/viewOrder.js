$(document).ready(function(){
	$('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format:'dd-mm-yyyy'
    });
});

$("#purchaseOrderConfirmationForm").on('submit', function(e){
	e.preventDefault();

	// ASN Form Submission
	orderId = currentOrderId;

	//checking items feedback
	ordersPlaceholders = $(".itemFeedBack");
	var orderItemsFeedback = []; //load feedback of all items

	for(var i=0; i<ordersPlaceholders.length; i++){
		orderFeedBack = ordersPlaceholders[i];
		var orderItemId = $(orderFeedBack).data('item')
		var orderItemManufacture = $(orderFeedBack).find('.manufactureDateInput').val()
		var orderItemExpiry = $(orderFeedBack).find('.expiryDateInput').val()
		orderItemsFeedback.push({'orderItemId':orderItemId, 'manufactureDate':orderItemManufacture, 'expiryDate':orderItemExpiry})

		//delivery and departure date
		var deliveryDate = $("#orderArrivalDate").val()
		var departureDate = $("#orderDepartureDate").val()

		//barcode type
		var barcodeType = $(".barcodeTypeInput:checked").val();

		//comment
		additionNotes = $("#additionNotes").val();


		//post data to the API
		$.post(apiLink, {action:'confirmPurchaseOrder', order:orderId, orderStatus:1, items:orderItemsFeedback, departureDate:departureDate, deliveryDate:deliveryDate, barcodeType:barcodeType, additionalFile:'', additionalNote:additionNotes, doneBy:currentUserId}, function(data){
			console.log(data)

			if(data.status){
				alert("Purchase order confirmed");
				window.location.reload();
			}else{
				alert("Error "+data.msg)
			}

		})
	}

	items = [];

})