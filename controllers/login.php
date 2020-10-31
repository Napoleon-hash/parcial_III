<?php  
function AccesoLogin($user, $passw)
{
    $consultas = new Login();
    $datos = $consultas->getDataUser($user);

    if ($datos) 
    {
        foreach ($datos as $res) 
        {
            $hash = $res['passw'];
            $tipo = $res['tipo'];
            $estado = $res['estado'];
        }

        if ($estado == 1) 
        {
            if (password_verify($passw, $hash)) 
            {
                if ($tipo == 1) 
                {
                    $_SESSION["usuario"] = $user;
                    $_SESSION["tipo"] = $tipo;
                    header("Location: ../views/admin/index.php");
                }
                elseif ($tipo == 2) 
                {
                    $_SESSION["usuario"] = $user;
                    $_SESSION["tipo"] = $tipo;
                    header("Location: ../views/docentes/index.php");
                }
                else
                {
                    $_SESSION["usuario"] = $user;
                    $_SESSION["tipo"] = $tipo;
                    header("Location: ../views/app/index.php");
                }
            }
            else
            {
                header("location:../index.php?mensaje=".base64_encode("Contraseña incorrecta..")); 
            }
        }
        else
        {
            header("location:../index.php?mensaje=".base64_encode("El usuario no tiene permisos de acceso"));
        }
    }
    else
    {
        header("location:../index.php?mensaje=".base64_encode("El usuario no se encuentra en la base de datos..."));
    }
}

function OlvideClave($user)
{
    $consultas = new Login();
    $datos = $consultas->getDataUser($user);
    if ($datos)
    {
        foreach ($datos as $res)
        {
            $tipo = $res['tipo'];
        }
        $buscaCorreo = $consultas->buscarEmail($user,$tipo);

        foreach ($buscaCorreo as $result)
        {
            $email = $result['email'];
        }
        $token = Token(8);

        Email($email,$token);

        $updatetoken = $consultas->modificarUsuario('token',$token,$user);

        if ($updatetoken)
        {
            echo'<script type="text/javascript">
                        alert("Token Generado revisar correo (spam)");
                        window.location.href="../cambio_clave.php";
                    </script>';
        }
        else
        {
            echo'<script type="text/javascript">
                        alert("Error al generar Token intente de nuevo");
                        window.location.href="../index.php";
                    </script>';
        }
    }
}

function CambioClaveToken($user,$token,$clave1,$clave2)
{
    $consultas = new Login();
    $datos = $consultas->getDataUser($user);

    if($datos)
    {
        foreach($datos as $res)
        {
            $tokenBD = $res['token'];
        }
        if($clave1 == $clave2)
        {    $tokenBD = $res['token'];
         if($token == $tokenBD)
         {
             $passw = password_hash($clave1, PASSWORD_DEFAULT);

             $updateClave = $consultas->modificarUsuario("passw",$passw,$user);
             $updateClave = $consultas->modificarUsuario("token",'',$user);

             if ($updateClave)
             {
                 echo'<script type="text/javascript">
                            alert("Clave mofidicada exitosamente)");
                            window.location.href="../index.php";
                        </script>';
             }
             else
             {            
                 echo'<script type="text/javascript">
                                alert("Error al modificar clave...");
                                window.location.href="../cambio_clave.php";
                            </script>';

             }
         }       
         else
         {            
             echo'<script type="text/javascript">
                            alert("Token Invalido....");
                            window.location.href="../cambio_clave.php";
                        </script>';

         }
        }
        else
        {            
            echo'<script type="text/javascript">
                        alert("El usuario no existe");
                        window.location.href="../cambio_clave.php";
                    </script>';

        }      
    }
}
?>