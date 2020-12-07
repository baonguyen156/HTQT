<?php

    $servername = "localhost"; //Servername luôn luôn là localhost
	$username = "root"; //m?c d?nh username là root
	$password = ""; //password b? tr?ng
	$dbname = "gp"; //tên database chúng ta v?a t?o khi nãy
	$link = new mysqli($servername,$username,$password, $dbname) or die ("no connect!!!!");
	mysqli_query($link,'SET NAMES UTF8');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$query = "SELECT * FROM data1 ORDER BY id DESC LIMIT 0,5";
	$result = mysqli_query($link,$query) or die (mysqli_error($link));
	if (mysqli_num_rows($result) > 0)
	{
		echo "<center><h2>Value Table: </h2><p><table align='center' border=1 cellspacing=2 cellpadding='6'>";
        echo "<tr><td><h4>ID</h4></td>
                <td><h4>Temperature</h4></td>
				<td><h4>Humidity</h4></td>
				<td><h4>Light Intensive</h4></td>
				<td><h4>Atmosphere</h4></td>
				<td><h4>Noise</h4></td>
				<td><h4>PM2.5</h4></td>
                <td><h4>SO<sub>2</sub></h4></td>
                <td><h4>NO<sub>2</sub></h4></td>
                <td><h4>CO</h4></td>
                <td><h4>Time</h4></h3></td></tr>";
		while ($row = mysqli_fetch_array($result))// tạo bang sql tren database
		{
            echo "<center><tr><td>".$row['id']."</td>
                    <td>".$row['temp']."</td>
                    <td>".$row['humi']."</td>
					<td>".$row['light']."</td>
					<td>".$row['pa']."</td>
					<td>".$row['noise']."</td>
                    <td>".$row['pm25']."</td>
                    <td>".$row['so2']."</td>
                    <td>".$row['no2']."</td>
                    <td>".$row['co']."</td>
                    <td>".$row['time']."</td>
                </tr></center>";
		}
	}	
		else 
		{
			echo "No data!";
		}	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}



	$query = "SELECT * FROM data1 ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($link,$query) or die (mysqli_error($link));
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result))// tạo bang sql tren database
							{		
								
								$ssso2 = $row['so2'];
								$ssno2 = $row['no2'];
								$ssco = $row['co'];
								$ssppm25 = $row['pm25'];
								

							}
					}
					$query = "SELECT * FROM setting ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($link,$query) or die (mysqli_error($link));
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result))// tạo bang sql tren database
							{		
								
								$maxPPM25 = $row['maxPPM25'];
								$minPPM25 = $row['minPPM25'];
								$maxSO2 = $row['maxSO2'];
								$minSO2 = $row['minSO2'];
								$maxNO2 = $row['maxNO2'];
								$minNO2 = $row['minNO2'];
								$maxCO = $row['maxCO'];
								$minCO = $row['minCO'];

							}
					}														
					$status = 1;

					if ($ssso2 < $minSO2) {
						// echo "<div class='row'>
						// <div class='col'><p style='color:green'>SO<sub>2</sub>=$ssso2</p></div>
						
					  	// </div>";
						// echo "<p style='color:green'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 0;
					}
					elseif ($ssso2 >= $minSO2 && $ssso2 < $maxSO2 ){
						// echo "<p style='color:orange'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 1;
					}
					else {
						// echo "<p style='color:red'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 2;
					}
					// no2
					if ($ssno2 < $minNO2) { 
						// echo "<p style='color:green'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 0;
					}
					elseif ($ssno2 >= $minNO2 && $ssno2 < $maxNO2 ){
						// echo "<p style='color:orange'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 1;
					}
					else {
						// echo "<p style='color:red'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 2;
					}
					// co
					if ($ssco < $minCO) {
						// echo "<p style='color:green'>CO=$ssco</p>";
						$colv = 0;
					}
					elseif ($ssco >= $minCO && $ssco < $maxCO ){
						// echo "<p style='color:orange'>CO=$ssco</p>";
						$colv = 1;
					}
					else {
						// echo "<p style='color:red'>CO=$ssco</p>";
						$colv = 2;
					}
					// ppm2.5
					if ($ssppm25 < $minPPM25) {
						// echo "<p style='color:green'>PPM2.5=$ssppm25</p>";
						$pm25lv = 0;
					}
					elseif ($ssppm25 >= $minPPM25 && $ssppm25 < $maxPPM25 ){
						// echo "<p style='color:orange'>PPM2.5=$ssppm25</p>";
						$pm25lv = 1;
					}
					else {
						// echo "<p style='color:red'>PPM2.5=$ssppm25</p>";
						$pm25lv = 2;
					}
					// ppm10
					if ($so2lv < $status && $no2lv < $status && $colv < $status && $pm25lv < $status){
						echo "<div class='alert alert-success'>
								<p style='color:green'><span class='glyphicon glyphicon-cloud'> </span><strong>Fresh Air !</strong></p> 
					 		</div>";
					}
					elseif ($so2lv > $status || $no2lv > $status || $colv > $status || $pm25lv > $status ) {										
						echo "<div class='alert alert-danger'>
							<span class='glyphicon glyphicon-alert'></span> <strong>Danger!</strong>
							<audio controls autoplay><source src=\"sound.mp3\" type=\"audio/mpeg\"></audio>
					 		</div>";
						// echo "<audio controls resume><source src=\"sound.mp3\" type=\"audio/mpeg\"></audio>";					
					}
					elseif ($so2lv = $status || $no2lv = $status || $colv = $status || $pm25lv = $status) {
						if ($so2lv <= $status && $no2lv <= $status && $colv <= $status && $pm25lv <= $status) {

							echo "<div class='alert alert-warning'>
								<p style='color:orange'><span class='glyphicon glyphicon-warning-sign'></span><strong>Warning!</strong> Air pollution level 1</p>	
					 		</div>";
						
							
						}											
					}
	
?>