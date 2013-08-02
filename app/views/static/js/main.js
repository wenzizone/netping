//chart part
var time_chart = {
    chart: {
        // renderTo: 'container',
        type:'line', //type:'line',
        zoomType: 'x',
        spacingRight: 20
    },
    title: {
        // text: 'USD to EUR exchange rate from 2006 through 2008'
    },
    subtitle: {
        text: document.ontouchstart === undefined ?
            'Click and drag in the plot area to zoom in' :
            'Drag your finger over the plot to zoom in'
    },
    xAxis: {
        //type: 'datetime',
        //maxZoom: 14 * 24 * 3600000, // fourteen days
        title: {
            text: null
        }
    },
    yAxis: {
        title: {
            // text: 'Exchange rate'
        },
        min: 0.6,
        startOnTick: false,
        showFirstLabel: false
    },
    tooltip: {
        shared: true
    },
    legend: {
        enabled: true,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x:-10,
        y:80
    },
    plotOptions: {
        area: {
            //fillColor: {
            //    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
            //    stops: [
            //        [0, Highcharts.getOptions().colors[0]],
            //        [1, 'rgba(2,0,0,0)']
            //    ]
            //},
            lineWidth: 1,
            marker: {
                enabled: false,
                states: {
                    hover: {
                        enabled: true,
                        radius: 5
                    }
                }
            },
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            }
      },
      line: {
            marker: {
                enabled: false,
            }
     }},

    series: []
    //series: [{
    //    type: 'area',
    //    name: 'unnamed-1',
    //    pointInterval: 24 * 3600 * 1000,
    //    pointStart: Date.UTC(2006, 0, 01),
    //    data: [
    //    ]
    //}]
};

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

//time check form submit
$(function() {
	$('#btnsubmit').click(function() {
		$('#display').html('');
		$('#display').append('<div id="loading" style="padding-left:50%"><div class="left"><h3>loading</h3></div><div class="left" style="padding-top:20px"><img src="/views/static/img/loading.gif" border="0"></div></div>');
		$.ajax({
			url: '/api/get_detail',
			type: 'post',
			data: $('#frm_timecheck').serialize() + "&stime="+$('#stime').val()+"&etime="+$('#etime').val(),
			dataType: "json",
			success: function (data) {
				//console.log(data);
				var n = 0;
				for (i in data) {
					//console.log(data[i]);
					var chart = time_chart;
					$('#display').append('<div id=render'+n+'></div>');
					chart.title.text = "机房"+i+"的ping值";
					chart.chart.renderTo = "render"+n;
                    chart.xAxis.type = 'datetime';
					chart.series = [];
					for(ii in data[i]) {
						console.log(ii);
						chart.yAxis.title.text = ii+" 的值";
						for (iii in data[i][ii]) {
							console.log(iii);
							chart.series.push({'name':iii,'data':data[i][ii][iii]});
						}
						
					}
					$('#loading').remove();
					var chart = new Highcharts.Chart(chart);
                    n = n + 1;
				}
			}
		});
	});
});

//city check form submit
$(function() {
    $('#citychecksubmit').click(function() {
        $('#display').html('');
        $('#display').append('<div id="loading" style="padding-left:50%"><div class="left"><h3>loading</h3></div><div class="left" style="padding-top:20px"><img src="/views/static/img/loading.gif" border="0"></div></div>');
        $.ajax({
            url: '/api/get_city_check_detail',
            type: 'post',
            data: $('#frm_timecheck').serialize() + "&stime="+$('#stime').val()+"&etime="+$('#etime').val(),
            dataType: "json",
            success: function (data) {
                //console.log(data);
                var n = 0;
                for (i in data) {
                    //console.log(data[i]);
                    var chart = time_chart;
                    $('#display').append('<div id=render'+n+'></div>');
                    chart.yAxis.title.text = i+" 的值";
                    chart.chart.renderTo = "render"+n;
                    chart.series = [];
                    for(ii in data[i]) {
                        console.log(data[i][ii]['city']);
                        chart.title.text = "机房"+ii+"的ping值";
                        chart.xAxis.categories = data[i][ii]['city'];
                        chart.series.push({'name':ii,'data':data[i][ii]['data']});
                        //for (iii in data[i][ii]) {
                        //    console.log(iii);
                        //    chart.series.push({'name':iii,'data':data[i][ii][iii]});
                        //}
                        
                    }
                    $('#loading').remove();
                    var chart = new Highcharts.Chart(chart);
                    n = n + 1;
                }
            }
        });
    });
});