<?php
	include '../db.php';
	if (isset($_POST['Del_id'])) {
	$query = "DELETE FROM `products`  WHERE `id` = ".$_POST['Del_id']."";
		if ($db->query($query)) {
      echo "Successfully Deleted";		}
	}
	?>