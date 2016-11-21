<?php
	session_start();
	if(isset($_SESSION['acesso-total'])=="logado")
	{
		return true;
	}
	else
	{
		unset($_SESSION['acesso-total']);
		header("location:index.php?erro-acesso");
	}
?>
