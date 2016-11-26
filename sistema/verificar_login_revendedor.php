<?php
	session_start();
	if(!isset($_SESSION['acesso']))
	{
		unset($_SESSION['acesso']);
		header("location:revendedor_login.php?erro-acesso");
	}
?>
