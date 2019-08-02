<?php
 include("Common.php");
  include("CheckLogin.php");
  $EID=0;
  $FemaleBooth=0;
  $MaleBooth=0;
  $Gender='';
$ID=array();
$FEMALE=array();
$MALE=array();
$Presidingofficer=array();
$AssistantPresidingofficerMale=array();
$PollingofficerMale=array();
$AssistantPresidingofficerFemale=array();
$PollingofficerFemale=array();



  if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
	  $EID = $_REQUEST['EID'];
  
 $sql="SELECT p.ID,p.Postcode,p.StationName,p.Address,p.FemaleBooth,p.MaleBooth,p.UserID,p.Status,DATE_FORMAT(p.DateAdded, '%M %d %Y') as Added,DATE_FORMAT(p.DateModified, '%M %d %Y') as Modified FROM pollingstations p LEFT JOIN users u ON p.UserID = u.ID where p.ID <> 0 AND p.UserID=".$_SESSION['UserID']." AND p.ID = ". $EID."";
 $res=mysqli_query($con,$sql) or die (mysqli_error($con));
 echo $sql;
 
 $rows=mysqli_fetch_array($res);

 $MBoth = $rows['MaleBooth'];
 $FBoth = $rows['FemaleBooth'];
 $PCode = $rows['Postcode'];

echo '<br>';
echo "MALE BOOTH: " .$MBoth ."<br>";
echo "FEMALE BOOTH: ".$FBoth ."<br> " ."<br> ";
echo $PCode;

$sql="SELECT u.ID,u.Gender,u.Grade,u.RoleID,r.RoleName,u.Name FROM users u LEFT JOIN roles r ON u.RoleID = r.ID  WHERE Postcode = ". $PCode."";
$res=mysqli_query($con,$sql) or die (mysqli_error($con));
 echo "<br>";
	while($rows=mysqli_fetch_array($res))
	{
	$ID=$rows['ID'];
	$Gender = $rows['Gender'];
	// echo $Gender;
	if($Gender=='Female')
	{
	array_push($FEMALE,$ID );

	}
	else
	{
	array_push($MALE, $ID);

	}

	echo $rows['Name']."<br>" ;
	echo $rows ['RoleID']."<br>";
	echo $rows ['Grade']."<br>";
	echo $rows['Gender']."<br>" ;
	echo "<br> ";
	}
	print_r($MALE);
	print_r($FEMALE);
		
		
	mysqli_data_seek($res,0);
		
		
	while($rows=mysqli_fetch_array($res))
  {
		$ID=$rows['ID'];
		$Grade = $rows['Grade'];
		$Gender = $rows['Gender'];
		
		if($Grade=='18' || $Grade =='19' || $Grade=='3')
		{
			array_push($Presidingofficer,$ID );

		}
		else if ($Grade=='17' || $Grade =='1')
		{
		
		
				 if($Gender=='Female')
				{
				array_push($AssistantPresidingofficerFemale, $ID);
				// echo $rows['Grade'];
				}
				else
				{
				array_push($AssistantPresidingofficerMale, $ID);

				}

		}
		else 
		{
		
		
		if($Gender=='Female')
		{
		array_push($PollingofficerFemale, $ID);
		}
		else
		{
		array_push($PollingofficerMale, $ID);

		}

		}

		
  }
		echo '<hr>';
	    
		print_r($Presidingofficer);
		print_r($AssistantPresidingofficerMale);
		print_r($AssistantPresidingofficerFemale);
		print_r($PollingofficerMale);
		print_r($PollingofficerFemale);
		$FinalPresidingfficer=array();
		$FinalAssistantPresidingofficerMale=array();
		$FinalAssistantPresidingofficerFemale=array();
		$FinalPollingofficerMale=array();
		$FinalPollingofficerFemale=array();
		
		
		// print_r($Presidingofficer);
		$NumberOfPresicidingOfficer=1;
		for($i=0; $i<$NumberOfPresicidingOfficer;$i++)
		{
			$FinalPresidingfficer[$i]=$Presidingofficer[rand(0,count($Presidingofficer)-1)];
			// echo '<hr>';
			// echo 'Presidingofficer<hr>';
			// print_r($Presidingofficer);
			// echo 'FinalPresidingfficer<hr><hr>';
			// print_r($FinalPresidingfficer);
		}
		// exit();
		// print_r($AssistantPresidingofficerMale);
		for($i=0; $i<($MBoth*2);$i++)
		{
			
			array_push($FinalAssistantPresidingofficerMale,$AssistantPresidingofficerMale[rand(0,count($AssistantPresidingofficerMale)-1)]);
			$key=array_search($FinalAssistantPresidingofficerMale[$i], $AssistantPresidingofficerMale);
			unset($AssistantPresidingofficerMale[$key]);
			$AssistantPresidingofficerMale = array_values($AssistantPresidingofficerMale);
			// echo 'AssistantPresidingofficerMale<hr>';
			// print_r($AssistantPresidingofficerMale);
			// echo 'FinalAssistantPresidingofficerMale<hr><hr>';
			// print_r($FinalAssistantPresidingofficerMale);

		}
		
		// exit();
		// print_r($AssistantPresidingofficerFemale);
		for($i=0; $i<($FBoth*2);$i++)
		{
			array_push($FinalAssistantPresidingofficerFemale,$AssistantPresidingofficerFemale[rand(0,count($AssistantPresidingofficerFemale)-1)]);
			$key=array_search($FinalAssistantPresidingofficerFemale[$i], $AssistantPresidingofficerFemale);
			unset($AssistantPresidingofficerFemale[$key]);
			$AssistantPresidingofficerFemale = array_values($AssistantPresidingofficerFemale);
			// echo '$AssistantPresidingofficerFemale<hr>';
			// print_r($AssistantPresidingofficerFemale);
			// echo '$FinalAssistantPresidingofficerFemale<hr><hr>';
			// print_r($FinalAssistantPresidingofficerFemale);
		}
		
		// exit();
		// print_r($PollingofficerMale);
		for($i=0; $i<($MBoth*1);$i++)
		{
			
			array_push($FinalPollingofficerMale,$PollingofficerMale[rand(0,count($PollingofficerMale)-1)]);
			$key=array_search($FinalPollingofficerMale[$i], $PollingofficerMale);
			unset($PollingofficerMale[$key]);
			$PollingofficerMale = array_values($PollingofficerMale);
			// echo 'PollingofficerMale<hr>';
			// print_r($PollingofficerMale);
			// echo 'FinalPollingofficerMale<hr><hr>';
			// print_r($FinalPollingofficerMale);
		}
		
		// exit();
		// print_r($PollingofficerFemale);
	
		for($i=0; $i<($FBoth*1);$i++)
		{
			array_push($FinalPollingofficerFemale,$PollingofficerFemale[rand(0,count($PollingofficerFemale)-1)]);
			$key=array_search($FinalPollingofficerFemale[$i], $PollingofficerFemale);
			unset($PollingofficerFemale[$key]);
			$PollingofficerFemale = array_values($PollingofficerFemale);
			// print_r($PollingofficerFemale);
			// echo 'PollingofficerFemale<hr>';
			// print_r($FinalPollingofficerFemale);
			// echo 'FinalPollingofficerFemale<hr><hr>';
		}
		
		// exit();
		echo '<hr>';
		echo $MBoth;
		echo '<hr>';
		echo $FBoth;
		echo '<hr>';
		print_r($FinalPresidingfficer);
		echo '<hr>';
		print_r($FinalAssistantPresidingofficerMale);
		echo '<hr>';
		print_r($FinalAssistantPresidingofficerFemale);
		echo '<hr>';
		print_r($FinalPollingofficerMale);
		echo '<hr>';
		print_r($FinalPollingofficerFemale);
		echo '<hr>';
		
		// exit();
		
		//FOR PSOFFICE
		$sqlPSOFFICE = "UPDATE users SET RoleID = 2,PSID = ".$EID." WHERE ID = ".$FinalPresidingfficer[0]."";
		echo $sqlPSOFFICE;
		// exit();
		mysqli_query($con,$sqlPSOFFICE);
		
		
		//FOR ASOFFICE
		$AsignBID = 1;
		for($i=1;$i<=(($MBoth)*2);$i++)
		{
			echo getname($FinalAssistantPresidingofficerMale[$i-1]);
			$sqlASOFFICE = "UPDATE users SET RoleID = 3,PSID = ".$EID.",BID=".($AsignBID)." WHERE ID = ".$FinalAssistantPresidingofficerMale[$i-1]."";
			echo $sqlASOFFICE;
			// exit();
			if($i%2==0)
				$AsignBID++;
			mysqli_query($con,$sqlASOFFICE);
		}
		//FOR ASOFFICE
		$AsignBID = 1;
		for($i=1;$i<=(($FBoth)*2);$i++)
		{
			echo getname($FinalAssistantPresidingofficerFemale[$i-1]);
			$sqlASOFFICE = "UPDATE users SET RoleID = 3,PSID = ".$EID.",BID=".($AsignBID)." WHERE ID = ".$FinalAssistantPresidingofficerFemale[$i-1]."";
			echo $sqlASOFFICE;
			// exit();
			if($i%2==0)
				$AsignBID++;
			mysqli_query($con,$sqlASOFFICE);
		}
		// exit();
		//FOR POFFICER
		$AsignBID = 1;
		for($i=1;$i<=(($MBoth));$i++)
		{
			echo getname($FinalPollingofficerMale[$i-1]);
			$sqlASOFFICE = "UPDATE users SET RoleID = 4,PSID = ".$EID.",BID=".($AsignBID)." WHERE ID = ".$FinalPollingofficerMale[$i-1]."";
			echo $sqlASOFFICE;
			// exit();
				$AsignBID++;
			mysqli_query($con,$sqlASOFFICE);
		}
		
		//FOR POFFICER
		$AsignBID = 1;
		for($i=1;$i<=(($FBoth));$i++)
		{
			echo getname($FinalPollingofficerFemale[$i-1]);
			$sqlASOFFICE = "UPDATE users SET RoleID = 4,PSID = ".$EID.",BID=".($AsignBID)." WHERE ID = ".$FinalPollingofficerFemale[$i-1]."";
			echo $sqlASOFFICE;
			// exit();
			$AsignBID++;
			mysqli_query($con,$sqlASOFFICE);
			echo "<script>window.location.href='ViewOfficers.php?EID=".$EID."'</script>";
		}
		
		// exit();
//	echo $rows['Name']."<br>" ;
 // echo $rows ['RoleID']."<br>";
 //  echo $rows ['Grade']."<br>";
//  echo $rows['Gender']."<br>" ;
 // echo "<br> ";
		// exit();
	
?>