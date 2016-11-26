<?php
	session_start();
	if(isset($_SESSION['acesso-bilheteria'])==4)
	{
		return true;
	}
	else
	{
		unset($_SESSION['acesso-bilheteria']);
		header("location:acesso_global.php?erro-acesso");
	}
?>
