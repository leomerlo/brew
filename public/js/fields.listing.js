$(document).ready(function() {
  $('.filter-container select').select2({
  	theme: "bootstrap"
  });

	$('.filter-container select').on('change',function(){

		$('#filter').submit();

	});  
});