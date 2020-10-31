<?php  
	include '../models/conexion.php';
	include '../models/login.php';
	include './procesos.php';

	session_start();

	if (isset($_POST['acclogin'])) 
	{
		$user = $_POST['user'];
		$passw = $_POST['passw'];
		include './login.php';
		AccesoLogin($user,$passw);
	}
	elseif (isset($_POST['recuperar_clave'])) 
	{
		$user = $_POST['user'];
		include './login.php';
		OlvideClave($user);
	}
	elseif (isset($_POST['cambio_clave_token'])) 
	{
		$user = $_POST['user'];
		$token = $_POST['token'];
		$clave1 = $_POST['clave1'];
		$clave2 = $_POST['clave2'];

		include './login.php';

		CambioClaveToken($user,$token,$clave1,$clave2);
		}
    elseif (isset($_POST['Exit_login']))
    {
        exit_login();
    }
	else
	{
		header("Location:../index.php");
	}
?>