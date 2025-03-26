<?php
session_start();
require('config/dbcon.php');


if(isset($_POST) && !empty($_POST['id'])){

	   // select image to delete    
	   $sql_select = "SELECT filename FROM gallery WHERE id = ".$_POST['id'];
	   $select_result = $con->query($sql_select);
	    $row = $select_result->fetch_row();
		$image_name = $row[0];

		// code to unlink(delete)  image physically from folder 
		$unl = unlink("./images/".$filename);

		$sql = "DELETE FROM gallery WHERE id = ".$_POST['id'];
		$conn->query($sql);
		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location:gallery.php");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location:gallery.php");
}


?>