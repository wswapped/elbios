series = []
var n = 0
for(var i = userData.length-1; i>=0; i--){
	n++
	sData = userData[i]
	date = new Date(sData['createdDate'])
	stringDate = date.getHours()+""+date.getMinutes()
	series.unshift({'period':date.getTime(), 'temp':sData['temp'], 'rate':sData['rate'], 'itouch':1})

	if(n > 20)
		break;
}
Morris.Area({
    element: 'temp-pulse',
    data: series,
    xkey: 'period',
    ykeys: ['temp', 'rate'],
    labels: ['Temp', 'Heart rate'],
    pointSize: 2,
    fillOpacity: 0,
    pointStrokeColors:['#1e88e5', '#f44336'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 1,
    hideHover: 'auto',
    lineColors: ['#1e88e5', '#f44336', '#9675ce'],
    resize: true        
});