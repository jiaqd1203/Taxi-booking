<?php
	$cname = $_POST["checkName"];
	$cphone = $_POST["checkPhone"];
	$upunit = $_POST["checkPickupUnit"];
	$upstreet = $_POST["checkPickupStreet"];
	$upsuburb = $_POST["checkPickupSuburb"];
	$updatetime = $_POST["checkPickupDatetime"];
	$offunit = $_POST["checkDropoffUnit"];
	$offstreet = $_POST["checkDropoffStreet"];
	$offsuburb = $_POST["checkDropoffSuburb"];
	
	if(trim($cname) != "")
	{
		if(!preg_match('/^[a-zA-Z ]*$/', $cname))
		{
			echo "<font color='red'>Only letters and space</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($cphone) != "")
	{
		if(!preg_match('/^[0-9]*$/', $cphone))
		{
			echo "<font color='red'>Only numbers</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($upunit) != "")
	{
		if(!preg_match('/^[0-9A-Z]*$/', $upunit))
		{
			echo "<font color='red'>Only numbers or Uppercase letters</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($upstreet) != "")
	{
		if(!preg_match('/^[a-zA-Z0-9 ]*$/', $upstreet))
		{
			echo "<font color='red'>Only letters and numbers and space</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($upsuburb) != "")
	{
		if(!preg_match('/^[a-zA-Z ]*$/', $upsuburb))
		{
			echo "<font color='red'>Only letters and space</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
		
	if(trim($updatetime) != "")
	{
		$currentDate = date("Y-m-d H:i:s");
		$newUpDateTime = substr($updatetime,0,10) . " " . substr($updatetime,11,5) . date(":s");
		$currentDateNumber = strtotime($currentDate) + (12 * 60 * 60);
		$newUpDateTimeNumber = strtotime($newUpDateTime);
		if($currentDateNumber + 60 > $newUpDateTimeNumber)
		{
			echo "<font color='red'>Only after right now</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($offunit) != "")
	{		
		if(!preg_match('/^[0-9A-Z]*$/', $offunit))
		{
			echo "<font color='red'>Only numbers or Uppercase letters</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($offstreet) != "")
	{
		if(!preg_match('/^[a-zA-Z0-9 ]*$/', $offstreet))
		{
			echo "<font color='red'>Only letters and numbers and space</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
	
	if(trim($offsuburb) != "")
	{
		if(!preg_match('/^[a-zA-Z ]*$/', $offsuburb))
		{
			echo "<font color='red'>Only letters and space</font>";
		}
		else
		{
			echo "<font color='green'>OK</font>";
		}
	}
?>