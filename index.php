<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hệ Thống Quan Trắc</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>	
    <img src="Logo_BKDN.png" width="500" height="500" id="logoHeaderBKDN"/>
    <img src="Logo_DTVT.png" width="500" height="500" id="logoHeaderDTVT"/>
        <div id="top">  
            <center>HỆ THỐNG QUAN TRẮC CHẤT LƯỢNG KHÔNG KHÍ </center>
			<center> QUALITY AIR MONITORING SYSTEM</center>  
        </div>    
		<div class="header">		                            
            <a href="#" class="btn btn-info" role="button"> HOME</a>
            <a href="../HTQT/node1" class="btn btn-info" role="button"> TRẠM 1</a>
            <a href=".." class="btn btn-info" role="button"> TRẠM 2</a>   
		</div>
		<div id="wrapper">
            
			<?php include 'weather.php';?>
	
        </div> 
        <!-- <script src="ajaxDiv.js"></script> -->
		<div id="map"></div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO3qz7li_N7ZM1JkzyUjRnrOF4Dsj3RQ4&callback=initMap"></script>
		<script type="text/javascript">
			var markers = [];
			var map;

			function initialize() {
				map = new google.maps.Map(
					document.getElementById("map"), {
						center: new google.maps.LatLng(16.073224, 108.151963),
						zoom: 15,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					});
				var marker=[];
				var i=0;
				var status=[];
				var myLatlng=[];
				var color=[];
				var label=[];
				var infowindow=[];	
											
    							status[i] = "0";
    							myLatlng[i] = new google.maps.LatLng("16.075805", "108.153052");
    							color[i] = "green";
    							label[i] = "2";
    							i++;
    													
    							status[i] = "0";
    							myLatlng[i] = new google.maps.LatLng("16.075602", "108.152052");
    							color[i] = "green";
    							label[i] = "1";
    							i++;
    													
    							// status[i] = "1";
    							// myLatlng[i] = new google.maps.LatLng("16.065195", "108.161532");
    							// color[i] = "yellow";
    							// label[i] = "3";
    							// i++;
    													
    							// status[i] = "2";
    							// myLatlng[i] = new google.maps.LatLng("16.065814", "108.160245");
    							// color[i] = "red";
    							// label[i] = "4";
    							// i++;
    									    for (i = 0; i < 2; i++){
				    marker[i] = new google.maps.Marker({
	                    position: myLatlng[i],
	                    label: label[i],
						icon: {
							url: 'http://maps.google.com/mapfiles/ms/icons/' + color[i] + '.png',
							labelOrigin: new google.maps.Point(15, 10)
						},
	                    map: map,
	                    title: 'Node '+ i.toString()
                	});
				}
				for (i = 0; i < 2; i++){
					if (i==1) {
						infowindow = new google.maps.InfoWindow({
					    content: '',
					    position : myLatlng[i]
					  });
					}						
				}
				for (i = 0; i < 4; i++){
					marker[i].addListener('click', function() {
					infowindow.open(map, marker[i]);
					 });
				}
			}
			google.maps.event.addDomListener(window, "load", initialize);
        </script>
        <div id="footer">		
			<center>				
			<div id="project1"><b>&copy; Nguyen Ha Phuc Bao - 16DTCLC1 - Graduation Project</b></div>			
			</center>
		</div>			
    </body>
</html>
