<script>
   
    /*var text = $("#abc").attr("data-id");
        text = parseInt(text);
    var name = typeof text;
    	alert(text+"-"+name);
    $(document).ready(function(){
        $("button").click(function(){
            alert($("input").val());
        })
    })*/
   /* var text = $("#abc").html();
        text = parseInt(text);
    var name = typeof text;
    	alert(text+"-"+name);*/
    /*var html = document.getElementById("abc").innerHTML;
        html = parseInt(html);
    var name = typeof html;
    	alert(html+"-"+name);*/
	Highcharts.setOptions({
	global: {
	useUTC: false
	}
	});

	// setInterval(function requestData() {
    //     $.ajax({
    //         url: 'getso2.php',
    //         success: function(point) {
    //             let series = SO2Chart.series[0];
    //             let x = (new Date()).getTime();
    //             SO2Chart.series[0].addPoint([x,point[1]], true, true);
	// 			NO2Chart.series[0].addPoint([x,point[3]], true, true);  
	// 			ppm25Chart.series[0].addPoint([x,point[2]], true, true);  
	// 			COChart.series[0].addPoint([x,point[4]], true, true);
    //         },
    //         cache: false
    //     }), 5000);

		// setInterval(requestData, 5000);

    }
	const SO2Chart = Highcharts.stockChart('so2_chart', {
	    chart: {
	        events: {
	        }
	    },
	    rangeSelector: {
	        buttons: [{
	            count: 1,
	            type: 'minute',
	            text: '1M'
	        }, {
	            count: 5,
	            type: 'minute',
	            text: '5M'
	        }, {
	            type: 'all',
	            text: 'All'
	        }],
	        inputEnabled: false,
	        selected: 0
	    },

	    title: {
	        text: 'SO2'
	    },
	    exporting: {
	        enabled: false
	    },
	    series: [{
	        name: 'Value',
	        data: (function () {
	            // generate an array of random data
	            var data = [],
	                time = (new Date()).getTime(),
	                i;

	         		for (i = -999; i <= 0; i += 1) {
	                data.push([
	                    time + i * 1000,
	                    0
	                ]);
	            }
	            return data;
	        }())
	    }]
	});
	//setTimeout("akt()",500);
</script>