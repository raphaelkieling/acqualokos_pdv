<?php
	if(isset($_SESSION['acesso'])){
		$id = $_SESSION['acesso'];
	}else{
		unset($_SESSION['acesso']);
		header("location:index.php");
	}
?>
