<?php
	session_start();
	if(isset($_SESSION['admin'])==3)
	{
		return true;
	}
	else
	{
		unset($_SESSION['admin']);
		header("location:admin_login.php?erro-acesso");
	}
?>
