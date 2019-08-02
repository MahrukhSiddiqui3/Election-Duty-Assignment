<?php
include('Common.php');
 if(isset($_SESSION['IsLogin']))
  {
	   redirect("table.php"); 
  }
$Password='';
$CNIC='';
$msg='';

if(isset($_POST['issubmit']	) && $_POST['issubmit'] == 'true')
{
	
	// exit;
	
	if(isset($_POST['Password']))
		$Password=trim($_POST['Password']);
	    $Password=stripslashes($_POST['Password']);
		$Password=htmlspecialchars($_POST['Password']);
	
	if(isset($_POST['CNIC']))
		$CNIC=trim($_POST['CNIC']);
	    $CNIC=stripslashes($_POST['CNIC']);
		$CNIC=htmlspecialchars($_POST['CNIC']);
	
	if($Password=='')
		$msg=' Enter Password';
	  if($CNIC=='')
		$msg='Enter CNIC';
	
	if($msg =='')
	{
		$sql = "SELECT Password,CNIC FROM users WHERE CNIC='".$CNIC."'";
		$res = mysqli_query($con,$sql) or die(mysqli_error($con)); 
		$row = mysqli_fetch_assoc($res);	
		if($row['CNIC'] == $CNIC)
		{
			$_SESSION['IsLogin']=true;
			$_SESSION['UserID']=$row['ID'];
			$_SESSION['Password']=$row['Password'];
			$_SESSION['CNIC']=$row['CNIC'];
			
			
			redirect("table.php");
		}
		else
		{
			$msg='Invalid Password / CNIC';
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

  <div class="form" style="height:300px">
  <?php echo $msg; ?>
    
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="password" placeholder="Enter CNIC" name="CNIC" pattern="\d*" title="Must contain numbers only without hyphens" maxlength="13"/>
	   <input type="password" placeholder="Enter Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
	  <a href="Signup.php" style="padding-top:none" ><h6>Password not set already?Set password first</h6></a>
      <button type="submit">login</button>
	  
       <input type="hidden" name="issubmit" value="true">
    </form>
  </div>
 
</div>


<script src="./js/login.js"></script>
</body>
</html>