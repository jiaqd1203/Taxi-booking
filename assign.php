<?php
	require_once("settings.php");

	$conn = mysqli_connect($host, $user, $pswd, $dbnm);

	if(!$conn) 
	{
		echo "<font color='red'>Connection Failure</font>";
	} 
	else 
	{
		$ref = $_POST["ref"];
		
		$querySelect = "select `ref`, `status` from `booking` where `ref` = $ref;";
			
		$selectResult = mysqli_query($conn, $querySelect);
		
		if(!$selectResult)
		{
			if($ref == null)
				echo "<font color='red'>Please input the booking reference number</font>";
			else
				echo "<font color='red'>No booking existence</font>";
		}
		else
		{
			$row = mysqli_fetch_row($selectResult);
			if((string)$row[0] == "")
				echo "<font color='red'>The booking reference number $ref does not exists</font>";
			else
			{
				if((string)$row[1] == "assigned")
				{
					echo "<font color='red'>The booking reference number $ref is already marked assigned</font>";
				}
				else
				{
					$queryUpdate = "UPDATE `booking` SET `status`='assigned' WHERE `ref`=$ref;";
					
					$updateResult = mysqli_query($conn, $queryUpdate);
					
					if(!$updateResult)
					{
						echo "SQL $queryUpdate ERROR";
					} 
					else
					{
						echo "<font color='green'>The booking request $ref has been properly assigned</font>";
					}
				}
			}
		}
		mysqli_close($conn);
	}
?>