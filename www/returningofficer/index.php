<?php
  include("Common.php");
  if(isset($_SESSION['IsLogin']))
  {
	  redirect("Dashboard.php");
  }
  else
  {
	  redirect("Login.php"); 
  }
  
?>