<?php
$servername = "localhost";
$database = "test_august";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "SELECT date, hours, name, DAYOFWEEK(date) as day, DAYNAME(date) as dayname FROM time_reports INNER JOIN employees ON time_reports.employee_id = employees.id ORDER BY date ";
$result = $conn->query($sql); 
 while ($row = $result->fetch_assoc())
   {
   	
   		if ($row['date'] == $mark_day) {
   			 echo ' '.$row['name'].' ('.round(($row['hours']),2)." hours)";

   		} else {
   			 echo "\n";
   	   echo "| ".$row['dayname']."\t|".' '.$row['name'].' ('.round(($row['hours']),2)." hours)";
      
   }
       $mark_day = $row['date'];
   }


?>