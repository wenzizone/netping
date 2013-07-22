// date control
$(function() {
	$('#timestart').datetimepicker({
		pickTime: false
	});
});

$(function() {
	$('#timeend').datetimepicker({
		pickTime: false
	});
});

//form submit
$(function() {
	$('#btnsubmit').click(function() {
		$('#display').append('<div style="text-align:center" class="left"><h3>loading</h3></div><div class="left" style="padding-top:20px"><img src="/static/img/loading.gif" border="0"></div>');
		$.ajax({
			url: '/index.php/api/get_detail',
			type: 'post',
			data: $('#frm_timecheck').serialize() + "&stime="+$('#stime').val()+"&etime="+$('#etime').val(),
			success: function (data) {
				alert('ok');
			}
		});
	});
});