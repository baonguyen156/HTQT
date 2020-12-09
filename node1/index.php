<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TRẠM ĐO 1</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			
		}

		td,
		th {
			
			text-align: center;
			font-size: 14px;

		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>

<body>
	<script language="javascript" type="text/javascript">
		function ajaxSetTDS() {
			var ajaxRequest; // Khai bao mot bien
			try {
				// Voi cac trinh duyet hien dai: Opera 8.0+, Firefox, Safari
				ajaxRequest = new XMLHttpRequest();
			} catch (e) {
				try {
					ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try {
						ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {
						// Thong bao khi xay ra loi
						alert("Co loi xay ra voi trinh duyet cua ban!");
						return false;
					}
				}
			}
			ajaxRequest.onreadystatechange = function() {
				if (ajaxRequest.readyState == 4) {
					var ajaxDisplay = document.getElementById('ajaxKQ');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}
			//    var tdsRQ = document.getElementById('tDS').value;
			//    var phRQ = document.getElementById('pH').value;
			//    var ratioA = document.getElementById('ratioA').value;
			
			var timer = document.getElementById('timer').value;
			
			var maxPPM25 = document.getElementById('maxPPM25').value;
			var minPPM25 = document.getElementById('minPPM25').value;
			
			
			var maxSO2 = document.getElementById('maxSO2').value;
			var minSO2 = document.getElementById('minSO2').value;
			var maxNO2 = document.getElementById('maxNO2').value;
			var minNO2 = document.getElementById('minNO2').value;
			var maxCO = document.getElementById('maxCO').value;
			var minCO = document.getElementById('minCO').value;
			
			var queryString = "setRequest.php?timer=" + timer + "&maxPPM25=" + maxPPM25 
			+ "&minPPM25=" + minPPM25 + "&maxSO2=" + maxSO2 + "&minSO2=" + minSO2 + "&maxNO2=" + maxNO2 + "&minNO2=" 
			+ minNO2 + "&maxCO=" + maxCO + "&minCO=" + minCO; 
			// ECHO DOC DATA TỪ WEB XUỐNG-> LOAD FILE setrequest.php
			console.log(queryString);
			ajaxRequest.open("POST", queryString, true);
			ajaxRequest.send(null);
		}
	</script>
	<img src="Logo_BKDN.png" width="500" height="500" id="logoHeaderBKDN" />
	<img src="Logo_DTVT.png" width="500" height="500" id="logoHeaderDTVT" />
	<div id="top">
		<center>HỆ THỐNG QUAN TRẮC CHẤT LƯỢNG KHÔNG KHÍ</center>
		<center>QUALITY AIR MONITORING SYSTEM</center>
	</div>
	<div class="header">
		<a href="../" class="btn btn-info" role="button"> HOME</a>
		<a href="#" class="btn btn-info" role="button"> TRẠM 1</a>
		<a href=".." class="btn btn-info" role="button"> TRẠM 2</a>
	</div>
	<div id="wrapper">
		<script src="ajaxDiv.js"></script>
		<div id="wrap_main">
			<script type="text/javascript">
				ajaxFunction();
			</script>
		</div>
	</div>
	<div class="dustChart">
		<div class="row">
			<div class="col-md-6">
				<div id="ppm25_chart" style="width: 500px; height: 400px; margin-left:100px"></div>
				<?php include "./ppm25Chart.php"; ?>
			</div>
			<div class="col-md-6">
				<div id="no2_chart" style="width: 500px; height: 400px; margin-right:50px"></div>
					<?php include "./no2Chart.php"; ?>
			</div>
		</div>
	</div>
	<div class="airChart">
	<div class="row">
			<div class="col-md-6">
				<div id="co_chart" style="width: 500px; height: 400px; margin-left:100px"></div>
				<?php include "./coChart.php"; ?>
			</div>
			<div class="col-md-6">
				<div id="so2_chart" style="width: 500px; height: 400px; margin-right:50px"></div>
				<?php include "./so2Chart.php"; ?>
			</div>
		</div>
	</div>
	<div class="myDiv">
		<form>
			<table align='center' border=1 cellspacing=2 cellpadding='4' style="width: 80%;">
				<tr id="trForm">
					<td>
						Danger PM2.5 : <input type='number' step='any' name='maxPPM25' id='maxPPM25'><br>
						Warning PM2.5: <input type='number' step='any' name='minPPM25' id='minPPM25'>
					</td>
					<td>
						Danger SO<sub>2</sub> : <input type='number' step='any' name='maxSO2' id='maxSO2'><br>
						Warning SO<sub>2</sub>: <input type='number' step='any' name='minSO2' id='minSO2'>
					</td>
					<td>
						Danger CO : <input type='number' name='maxCO' step='any' id='maxCO'><br>
						Warning CO: <input type='number' step='any' name='minCO' id='minCO'>
					</td>
				</tr>

				<tr id="trForm">
					
					<td>
						Danger NO<sub>2</sub> : <input type='number' step='any' name='maxNO2' id='maxNO2'><br>
						Warning NO<sub>2</sub>: <input type='number' step='any' name='minNO2' id='minNO2'>
					</td>
					<td>
						Update Time: <input type="text" name="timer" id="timer"> minutes&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						
					</td>
				</tr>
				<tr id="trForm">
					<td colspan="2">
						<div id='ajaxKQ'>Nhập giá trị để cập nhật</div>
					</td>
					<td>
						<input type="button" onclick='ajaxSetTDS()' value="submit">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>