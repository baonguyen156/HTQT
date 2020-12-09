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
					
					// if ($ssso2 < $minSO2) {
					// 	echo "<div class='row'>
					// 	<div class='col'><p style='color:green'>SO<sub>2</sub>=$ssso2</p></div>
						
					//   	</div>";
					// 	// echo "<p style='color:green'>SO<sub>2</sub>=$ssso2</p>";
					// 	$so2lv = 0;
					// }
					// elseif ($ssso2 >= $minSO2 && $ssso2 < $maxSO2 ){
					// 	echo "<p style='color:orange'>SO<sub>2</sub>=$ssso2</p>";
					// 	$so2lv = 1;
					// }
					// else {
					// 	echo "<p style='color:red'>SO<sub>2</sub>=$ssso2</p>";
					// 	$so2lv = 2;
					// }
					// // no2
					// if ($ssno2 < $minNO2) { 
					// 	echo "<p style='color:green'>NO<sub>2</sub>=$ssno2</p>";
					// 	$no2lv = 0;
					// }
					// elseif ($ssno2 >= $minNO2 && $ssno2 < $maxNO2 ){
					// 	echo "<p style='color:orange'>NO<sub>2</sub>=$ssno2</p>";
					// 	$no2lv = 1;
					// }
					// else {
					// 	echo "<p style='color:red'>NO<sub>2</sub>=$ssno2</p>";
					// 	$no2lv = 2;
					// }
					// // co
					// if ($ssco < $minCO) {
					// 	echo "<p style='color:green'>CO=$ssco</p>";
					// 	$colv = 0;
					// }
					// elseif ($ssco >= $minCO && $ssco < $maxCO ){
					// 	echo "<p style='color:orange'>CO=$ssco</p>";
					// 	$colv = 1;
					// }
					// else {
					// 	echo "<p style='color:red'>CO=$ssco</p>";
					// 	$colv = 2;
					// }
					// // ppm2.5
					// if ($ssppm25 < $minPPM25) {
					// 	echo "<p style='color:green'>PPM2.5=$ssppm25</p>";
					// 	$pm25lv = 0;
					// }
					// elseif ($ssppm25 >= $minPPM25 && $ssppm25 < $maxPPM25 ){
					// 	echo "<p style='color:orange'>PPM2.5=$ssppm25</p>";
					// 	$pm25lv = 1;
					// }
					// else {
					// 	echo "<p style='color:red'>PPM2.5=$ssppm25</p>";
					// 	$pm25lv = 2;
					// }
					// ppm10
					if ($ssso2 < 50 && $ssno2 < 50 && $ssco < 50 && $ssppm25 < 50){
						echo "<p style='color:green'>Tình trạng không khí bình thường 1</p>";
					}
					elseif ($ssso2 >300 || $ssno2 > 300 || $ssco > 300 || $ssppm25 > 300) {
						
						echo "<p style='color:brown'>Tình trạng không khí ở mức nguy hại</p>";
						echo "level 5";
						echo "<p style='color:brown'>Tình trạng không khí nguy hại 5</p>";
															
					}
					elseif ($ssso2 > 50 || $ssno2 > 50 || $ssco > 50 || $ssppm25 > 50 ) {
						if ($ssso2 < 100 && $ssno2 < 100 && $ssco < 100 && $ssppm25 < 100) {							
							echo "<p style='color:yellow'>Tình trạng không khí tb 2</p>";
						}																							
					}
					if ($ssso2 > 100 || $ssno2 > 100 || $ssco > 100 || $ssppm25 > 100 ) {
						if ($ssso2 < 200 && $ssno2 < 200 && $ssco < 200 && $ssppm25 < 200) {
							
							echo "<p style='color:orange'>Tình trạng không khí kém 3</p>";
						}																							
					}
					if ($ssso2 > 200 || $ssno2 > 200 || $ssco > 200 || $ssppm25 > 200 ) {
						if ($ssso2 < 300 && $ssno2 < 300 && $ssco < 300 && $ssppm25 < 300) {
							
							echo "<p style='color:red'>Tình trạng không khí xấu 4</p>";
						}													
					}
					
					
					
					// // so sanh

				
?>  