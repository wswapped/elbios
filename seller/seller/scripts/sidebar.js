$(document).ready(function(){
	$("a.menu").mouseover(function(){
		$(this).css({
			background:'#2B6ECE',
			color:'white'
		});
	});

	$("a.menu").mouseout(function(){
		$(this).css({
			background:'white',
			color:'#2B6ECE'
		});
	});
});