//For generating state based on country
$(document).ready(function(){
	$.ajax({
		type:'POST',
		url:baseurl+'ajax/generatestate/'+$("#usr_country").val()+'/user',
		success:function(msg){
			$('#usr_state').html(msg);
		}
	});
});

$('#usr_country').live('change',function(){
	$.ajax({
		type:'POST',
		url:baseurl+'ajax/generatestate/'+$(this).val(),
		success:function(msg){
			$('#usr_state').html(msg);
		}
	});
});