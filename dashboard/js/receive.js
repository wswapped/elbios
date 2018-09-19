
if($("#receivingProgressChart").length){
    Morris.Area({
        element: 'receivingProgressChart',
        data:
        [
            {
                period: '2010',
                orders: 50,
            }, {
                period: '2011',
                orders: 60,
            }, {
                period: '2012',
                orders: 39,
            }, {
                period: '2013',
                orders: 41,
            }, {
                period: '2014',
                orders: 32,
            }, {
                period: '2015',
                orders: 21,
            },
             {
                period: '2016',
                orders: 31,
            },{
                period: '2017',
                orders: 23,
            }, {
                period: '2018',
                orders: 80,
            }, {
                period: '2019',
                orders: 70,
            }, {
                period: '2020',
                orders: 20,
            }, {
                period: '2021',
                orders: 35,
            },
             {
                period: '2022',
                orders: 15,
            }
        ],
        xkey: 'period',
        ykeys: ['orders'],
        labels: ['Processed Orders'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#dca90c'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 2,
        hideHover: 'auto',
        lineColors: ['#fdc006'],
        resize: true   
    });
}


if($(".showItemInspect").length){
    //if button for inspecting tem in ASN is clicked
    $(".showItemInspect").on('click', function(){
        var orderItemId  = $(this).data('orderitemid')
        alert(orderItemId);  
    })
    
}

//Select quantity
 $(function() {
    $('[data-plugin="knob"]').knob();
});