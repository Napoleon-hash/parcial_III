<?php  
	function Token($length) 
	{
		$key = '';
		$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
		for($i=0;$i<$length;$i++)
		{
			$key .= $pattern{rand(0,35)};
		}
		return $key;
	}

	function Email($correo,$token)
	{
		$destino = $correo;
        
        $desde = "jose.rivera1471@gmail.com";
        
        $cabeceras = 'from: Ayuda <'.$desde.'>'."\r\n".
                        'Reply-to: '.$desde.'>'."\r\n";
        
        $cabeceras .='Content-tipe: text/html; charset=utf-8'."\r\n";

        $mensaje = "token: ".$token;
        
		$contenido = "mensaje: ".$mensaje;
		
		mail($destino, "solicitud de token", $contenido, $cabeceras);
		
	} 

function exit_login()
{
    session_start(); // Iniciar la sesion
    $_SESSION = array();

    session_destroy();
    header("location: ../index.php");
}

function del()
   {
    session_start(); // Iniciar la sesion
    $_SESSION = array();

    session_destroy();
   
} 

?>