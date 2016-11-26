<?php
	session_start();
	if(isset($_SESSION['acesso-lista'])==5)
	{
		return true;
	}
	else
	{
		unset($_SESSION['acesso-lista']);
		header("location:criar-lista.php?erro-acesso");
	}
?>
