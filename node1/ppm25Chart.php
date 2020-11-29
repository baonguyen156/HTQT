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
	var ppm25Chart;
	function requestData() {
        $.ajax({
            url: 'get.php',
            success: function(point) {
                var series = ppm25Chart.series[0];
                var x = (new Date()).getTime();
                ppm25Chart.series[0].addPoint([x,point[1]], true, true);
                setTimeout(requestData, 2000);    
            },
            cache: false
        });
    }
	ppm25Chart = Highcharts.stockChart('ppm25_chart', {
	    chart: {
	        events: {
	            load: requestData
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
	        text: 'Dust PPM2.5'
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