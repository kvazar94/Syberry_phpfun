	<?php
	$servername = "localhost";
	$database = "test_august";
	$username = "root";
	$password = "root";


	$conn = new mysqli($servername, $username, $password, $database);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	$sql = "SELECT date, hours, name, employee_id, DAYOFWEEK(date) as day, DAYNAME(date) as dayname FROM time_reports INNER JOIN employees ON time_reports.employee_id = employees.id ORDER BY date ASC, hours DESC";
	$result = $conn->query($sql); 
	$count = 0;
	while ($row = $result->fetch_assoc())
	{
		$count++;
		if (($row['date'] == $mark_day) and $count <= 3) {
			$str = ' '.$row['name']." (".round(($row['hours']),2)." hours)\t";
			
			echo $str;


		} elseif($row['date'] != $mark_day) {
			$count = 1;
			echo "\n";
			echo "| ".$row['dayname']."\t|".' '.$row['name']."(".round(($row['hours']),2)." hours)\t";
		} 
		$mark_day = $row['date'];

	}


	?>