<?php
	require_once("settings.php");

	$conn = mysqli_connect($host, $user, $pswd, $dbnm);

	if(!$conn) 
	{
		echo "<font color='red'>Connection Failure</font>";
	} 
	else 
	{
		$hours = $_POST["hours"];

		$seconds = ((int)$hours + 12) * 60 * 60;
		
		$queryCurrentUTC = "SELECT UNIX_TIMESTAMP();";
		
		$currentUTCResult = mysqli_query($conn, $queryCurrentUTC);
		
		$currentUTC = 0;
		
		if(!$currentUTCResult)
		{
			echo "SQL $queryCurrentUTC ERROR!";
		}
		else
		{
      			$currentUTC = mysqli_fetch_row($currentUTCResult)[0];
		}

		$hoursToSeconds = (int)$hours * 60 * 60;
		
		$queryCurrentTimestamp = "SELECT FROM_UNIXTIME($currentUTC + $seconds - $hoursToSeconds);";
		
		$currentTimestampResult = mysqli_query($conn, $queryCurrentTimestamp);
		
		$currentTimestamp = "0000-00-00 00:00:00";
		
		if(!$currentTimestampResult)
		{
			echo "SQL $queryCurrentTimestamp ERROR!";
		}
		else
		{
      			$currentTimestamp = mysqli_fetch_row($currentTimestampResult)[0];
		}
		
		$futureUTC = $currentUTC + $seconds;
		
		$queryFutureTimestamp = "SELECT FROM_UNIXTIME($futureUTC);";
		
		$futureTimestampResult = mysqli_query($conn, $queryFutureTimestamp);
		
		$futureTimestamp = "0000-00-00 00:00:00";
		
		if(!$futureTimestampResult)
		{
			echo "SQL $queryFutureTimestamp ERROR!";
		}
		else
		{
      			$futureTimestamp = mysqli_fetch_row($futureTimestampResult)[0];
		}
		
		//echo $currentTimestamp . " " . $futureTimestamp;
		
		$querySelectRequest = "select * from `booking` where `up_datetime` >= '$currentTimestamp' and `up_datetime` <= '$futureTimestamp' and `status` = 'unassigned';";
		
		$selectRequestResult = mysqli_query($conn, $querySelectRequest);
		
		$requests = "<table border='0'>";
		
		$requests = $requests . "<tr bgcolor='orange'>";
		$requests = $requests . "<th>Reference Number</th>";
		$requests = $requests . "<th>Customer Name</th>";
		$requests = $requests . "<th>Customer Phone</th>";
		$requests = $requests . "<th>Pick-up Unit</th>";
		$requests = $requests . "<th>Pick-up Street</th>";
		$requests = $requests . "<th>Pick-up Suburb</th>";
		$requests = $requests . "<th>Pick-up Date&Time</th>";
		$requests = $requests . "<th>Drop-off Unit</th>";
		$requests = $requests . "<th>Drop-off Street</th>";
		$requests = $requests . "<th>Drop-off Suburb</th>";
		$requests = $requests . "<th>Status</th>";
		$requests = $requests . "<th>Booking Date&Time</th>";
		$requests = $requests . "</tr>";
		
		while($row = mysqli_fetch_row($selectRequestResult))
		{
      			$requests = $requests . "<tr>";
      			for($i = 0; $i < 12; $i++)
      			{
       				$requests = $requests . "<td>" . $row[$i] . "</td>";
      			}
     			 $requests = $requests . "</tr>";
		}
    
    		$requests = $requests . "</table>";
    
    		echo $requests;

		mysqli_close($conn);
	}
?>