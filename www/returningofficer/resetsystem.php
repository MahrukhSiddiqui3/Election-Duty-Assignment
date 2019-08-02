<?php
include("Common.php");

mysqli_query($con,"UPDATE  users SET BID = 0 , PSID = 0 , RoleID = 0  WHERE RoleID <> 1") or die(mysqli_error($con));
?>