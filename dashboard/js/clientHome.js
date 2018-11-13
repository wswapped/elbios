//temp-pulse
$(document).ready(function () {
	labels = [];
	series = []
	for(var i = 0; i<userData.length; i++){
		sData = userData[i]

		date = new Date(sData['createdDate'])
		stringDate = date.getHours()+":"+date.getMinutes()

		labels.push(stringDate)
		// series.push([sData['temp'], sData['rate']])
		series.push([sData['temp']])

		if(i>20)
			break;
	}
	new Chartist.Line('#temp-puslse', {
			labels:labels,
			series: series
		}, {
			top: 0,
			low: 1,
			showPoint: true,
			fullWidth: false,
			plugins: [
				Chartist.plugins.tooltip()
			],
	 	axisY: {
		 // 	labelInterpolationFnc: function (value) {
			// 	return (value / 1) + 'k';
			// }
	 	},
	 	// showArea: true
	});
})

series = []
for(var i = 0; i<userData.length; i++){
	sData = userData[i]

	date = new Date(sData['createdDate'])
	stringDate = date.getHours()+""+date.getMinutes()
	series.push({'period':date.getTime(), 'temp':sData['temp'], 'rate':sData['rate'], 'itouch':1})

	if(i>20)
		break;
}

Morris.Area({
    element: 'temp-pulse',
    data: series,
    xkey: 'period',
    ykeys: ['temp', 'rate'],
    labels: ['Temp', 'Heart rate'],
    pointSize: 3,
    fillOpacity: 0,
    pointStrokeColors:['#00bfc7', '#fdc006'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 1,
    hideHover: 'auto',
    lineColors: ['#1e88e5', '#f44336', '#9675ce'],
    resize: true        
});