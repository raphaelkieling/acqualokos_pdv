<?php
	session_start();
	if(isset($_SESSION['acqua'])==3)
	{
		return true;
	}
	else
	{
		unset($_SESSION['acqua']);
		header("location:acqualokos_login.php?erro-acesso");
	}
?>
