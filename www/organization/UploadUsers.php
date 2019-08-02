<?php
include ("Common.php");
if (isset($_FILES['file'])) {
	
	require_once "simplexlsx.class.php";
	
	$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );
	
	// echo '<h1>Parsing Result</h1>';
	// echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
	
	list($cols,) = $xlsx->dimension();
	
	foreach( $xlsx->rows() as $k => $r) {
	
	$sql11 = "INSERT INTO clients SET 
	CNIC = '".addcslashes($r[0],"'")."',
	FirstName = '".addcslashes($r[1],"'")."',
	LastName = '".addcslashes($r[2],"'")."',
	Grade = '".addcslashes($r[3],"'")."',
	CellNumber = '".addcslashes($r[4],"'")."',
	Email = '".addcslashes($r[5],"'")."',
	Address = '".addcslashes($r[6],"'")."',
	DateAdded = NOW()
	";
	echo $sql11.'<br>';
	

}
}

?>
<h1>Upload</h1>
<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
</form>
