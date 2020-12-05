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

	
?>