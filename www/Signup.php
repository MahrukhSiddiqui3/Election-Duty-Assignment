<?php
include('Common.php');
 if(isset($_SESSION['IsLogin']))
  {
	  redirect("login.php");
  }
$ID=0;
$Password='';
$ConfirmPassword='';
$CNIC='';
$msg='';
if(isset($_REQUEST['CNIC']) && ctype_digit($_REQUEST['CNIC']))
$CNIC = $_REQUEST['CNIC'];


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
	 
    if(isset($_POST["ConfirmPassword"])) 
         $ConfirmPassword=trim($_POST["ConfirmPassword"]);
	     $ConfirmPassword=stripslashes($_POST["ConfirmPassword"]);
		 $ConfirmPassword=htmlspecialchars($_POST["ConfirmPassword"]);
	   $sql = "SELECT * FROM users WHERE CNIC='".$CNIC."' AND Password <> ''";
	   // echo $sql;
	   
	    $res = mysqli_query($con,$sql);
		$rows = mysqli_num_rows($res);
		// echo $rows;
		// exit();
		
		if ($rows>1)
		{
			$msg='<div class="callout callout-danger">

                <p>You have already set the password</p>
              </div>';
		}
	   else if($CNIC=='')
	   {
		$msg='Enter CNIC';
	
	   }
	   else if($Password=='')
            {
              $msg='<div class="callout callout-danger">

                <p>Please enter Password</p>
              </div>';
             }

        else if ($Password != $ConfirmPassword)
	        {
              $msg='<div class="callout callout-danger">

                <p>Password does not match</p>
              </div>';
            }
		
	
	if($msg =='')
	{
		$sql = "UPDATE  users
	SET 
	Password = '".$Password."'
	 WHERE CNIC='".$CNIC."'
	";
	mysqli_query($con,$sql) or die(mysqli_error($con));
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> Password has been set</button>
	
	</div>';
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
     <h2> SET PASSWORD </h2>
  </div>

  <div class="form" style="height:600px">
  <?php echo $msg; ?>
    
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<input type="text" placeholder="CNIC" name="CNIC"  pattern="\d*" title="Must contain numbers only without hyphens" maxlength="13"/>
      <input type="password" placeholder="Enter Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
      <input type="password" placeholder="Confirm Password" name="ConfirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
	 
      <button type="submit" >Sign up</button>
	  
       <input type="hidden" name="issubmit" value="true">
    </form>
  </div>
 
</div>


<script src="./js/login.js"></script>
</body>
</html>