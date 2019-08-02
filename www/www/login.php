<?php
include('Common.php');
 if(isset($_SESSION['IsLogin']))
  {
	   redirect("table.php"); 
  }
$Name='';
$CNIC='';
$msg='';

if(isset($_POST['issubmit']	) && $_POST['issubmit'] == 'true')
{
	
	// exit;
	
	if(isset($_POST['Name']))
		$Name=trim($_POST['Name']);
	
	if(isset($_POST['CNIC']))
		$CNIC=trim($_POST['CNIC']);
	
	if($Name=='')
		$msg=' Enter Name';
	  if($CNIC=='')
		$msg='Enter CNIC';
	
	if($msg =='')
	{
		$sql = "SELECT ID,Name,CNIC,Name,Email FROM users WHERE Name='".$Name."'";
		$res = mysqli_query($con,$sql) or die(mysqli_error($con)); 
		$row = mysqli_fetch_assoc($res);	
		if($row['CNIC'] == $CNIC)
		{
			$_SESSION['IsLogin']=true;
			$_SESSION['UserID']=$row['ID'];
			$_SESSION['Name']=$row['Name'];
			$_SESSION['CNIC']=$row['CNIC'];
			$_SESSION['Name']=$row['Name'];
			$_SESSION['Email']=$row['Email'];
			redirect("table.php");
		}
		else
		{
			$msg='Invalid Name / CNIC';
		}
	}
	
}



?>

<html>
<head>
   <link rel="stylesheet" href="./css/login.css">
</head>

<body>
<div class="login-page" >
  <div class="heading">
     <h2> LOGIN  </h2>
  </div>

  <div class="form">
  <?php echo $msg; ?>
    
    <form class="login-form" action="<?php echo $self?>" method="post">
      <input type="text" placeholder="Enter Name" name="Name"/>
      <input type="password" placeholder="Enter CNIC" name="CNIC"/>
      <button type="submit">login</button>
       <input type="hidden" name="issubmit" value="true">
    </form>
  </div>
 
</div>


<script src="./js/login.js"></script>
</body>
</html>