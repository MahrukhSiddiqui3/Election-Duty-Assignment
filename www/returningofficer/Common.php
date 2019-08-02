<?php
session_start();
include("DbConnection.php");
$self = $_SERVER['PHP_SELF'];

function redirect($url)
{
	header("Location:".$url);
}

function get_officers($Gender,$PID,$RID,$BID=0,$AS=0)
{
	global $con;
	$sqll = "SELECT Name FROM users WHERE PSID = ".$PID." AND BID = ".$BID." AND RoleID = ".$RID."";
		if($Gender!= '')
			$sqll .= " AND Gender = '".$Gender."'";
	 // echo $sqll;
	$sql = mysqli_query($con,$sqll);
	if($AS==0)
	$res = mysqli_fetch_assoc($sql);
	else if($AS==1)
	{
		$res = mysqli_fetch_assoc($sql);
		$res = mysqli_fetch_assoc($sql);
	}
	return $res['Name'];
}

function getname($ID)
{
	global $con;
	$sqll = "SELECT Name FROM users WHERE ID = ".$ID."";
	$r = mysqli_query($con,$sqll) or die(mysql_error($con));
	$res = mysqli_fetch_assoc($r);
	return $res['Name'];
}
?>