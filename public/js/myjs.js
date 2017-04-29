$(document).ready(function(){
	
	$('.select2').select2();
	setInterval(function(){
		$('.loader').hide();
		$('.dttable').show();
		$('.dttable').DataTable();	
	}, 1000);
	$('#kembali').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		window.history.back();
	});
});















