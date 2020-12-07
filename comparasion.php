<?php
				// if (isset($_GET['submit'])) {
					
				// }
				 
					$servername = "localhost"; //Servername luôn luôn là localhost
					$username = "root"; //m?c d?nh username là root
					$password = ""; //password b? tr?ng
					$dbname = "gp"; //tên database chúng ta v?a t?o khi nãy
					$link = new mysqli($servername,$username,$password, $dbname) or die ("no connect!!!!");
					mysqli_query($link,'SET NAMES UTF8');
					date_default_timezone_set('Asia/Ho_Chi_Minh');					
					$query = "SELECT * FROM data1 ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($link,$query) or die (mysqli_error($link));
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result))// tạo bang sql tren database
							{		
								// echo " 										
								// 	".$row['pm25'].";
								// 	".$row['pm10'].";
								// 	".$row['so2'].";
								// 	".$row['no2'].";
								// 	".$row['co'].";									
								// ";
								// lay data tu DB
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
						echo "<p style='color:green'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 0;
					}
					elseif ($ssso2 >= $minSO2 && $ssso2 < $maxSO2 ){
						echo "<p style='color:orange'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 1;
					}
					else {
						echo "<p style='color:red'>SO<sub>2</sub>=$ssso2</p>";
						$so2lv = 2;
					}
					// no2
					if ($ssno2 < $minNO2) { 
						echo "<p style='color:green'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 0;
					}
					elseif ($ssno2 >= $minNO2 && $ssno2 < $maxNO2 ){
						echo "<p style='color:orange'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 1;
					}
					else {
						echo "<p style='color:red'>NO<sub>2</sub>=$ssno2</p>";
						$no2lv = 2;
					}
					// co
					if ($ssco < $minCO) {
						echo "<p style='color:green'>CO=$ssco</p>";
						$colv = 0;
					}
					elseif ($ssco >= $minCO && $ssco < $maxCO ){
						echo "<p style='color:orange'>CO=$ssco</p>";
						$colv = 1;
					}
					else {
						echo "<p style='color:red'>CO=$ssco</p>";
						$colv = 2;
					}
					// ppm2.5
					if ($ssppm25 < $minPPM25) {
						echo "<p style='color:green'>PPM2.5=$ssppm25</p>";
						$pm25lv = 0;
					}
					elseif ($ssppm25 >= $minPPM25 && $ssppm25 < $maxPPM25 ){
						echo "<p style='color:orange'>PPM2.5=$ssppm25</p>";
						$pm25lv = 1;
					}
					else {
						echo "<p style='color:red'>PPM2.5=$ssppm25</p>";
						$pm25lv = 2;
					}
					// ppm10
					if ($so2lv < $status && $no2lv < $status && $colv < $status && $pm25lv < $status){
						echo "<p style='color:green'>Tình trạng không khí bình thường</p>";
					}
					elseif ($so2lv > $status || $no2lv > $status || $colv > $status || $pm25lv > $status ) {						
						echo "<p style='color:red'>Tình trạng không khí ở mức nguy hiem</p>";
						echo "level 2";	
						echo "<audio controls autoplay><source src=\"sound.mp3\" type=\"audio/mpeg\"></audio>";					
					}
					elseif ($so2lv = $status || $no2lv = $status || $colv = $status || $pm25lv = $status) {
						if ($so2lv <= $status && $no2lv <= $status && $colv <= $status && $pm25lv <= $status) {
							echo "<p style='color:orange'>Tình trạng không khí ở mức canh bao</p>";
							echo "level 1";
						}											
					}
					
					
					// // so sanh

				
?>  