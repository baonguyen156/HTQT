<?php
header("Content-type: text/json"); 
/*$x = time() * 1000;
$y = rand(0, 100);*/
    $x = time();
    $servername = "localhost";
	$username = "root";
	$password = ""; 
	$dbname = "gp"; 		
	$link = new mysqli($servername,$username,$password, $dbname) or die ("no connect!!!!");
	mysqli_query($link,'SET NAMES UTF8');
	$query =  "SELECT * FROM data1 ORDER BY id DESC LIMIT 0,1";;
	$result = mysqli_query($link,$query) or die (mysqli_error($link));
	while ($row = mysqli_fetch_array($result)){	
		if ($row['id'] != -1) {
			$y= (double)$row['so2'];
			$z = (double)$row['pm25'];
			$a = (double)$row['no2'];
			$b = (double)$row['co'];
		}
	}
    // Create a PHP array and echo it as JSON
	$ret = array($x, $y, $z, $a, $b);
	mysqli_close($link);
    //echo $ret;
    echo json_encode($ret);
?>