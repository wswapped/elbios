//ct-visits
$(document).ready(function () {
	labels = [];
	series = []
	for(var i = 0; i<userData.length; i++){
		sData = userData[i]

		date = new Date(sData['createdDate'])
		stringDate = date.getHours()+":"+date.getMinutes()

		labels.push(stringDate)
		series.push([sData['temp'], sData['rate']])

		if(i>25)
			break;
	}
	new Chartist.Line('#temp-pulse', {
			labels:labels,
			series: series
		}, {
			top: 0,
			low: 1,
			showPoint: true,
			fullWidth: true,
			plugins: [
				Chartist.plugins.tooltip()
			],
	 	axisY: {
		 // 	labelInterpolationFnc: function (value) {
			// 	return (value / 1) + 'k';
			// }
	 	},
	 	showArea: true
	});
})