<?php  
class Login
{
    public function getDataUser($usuario)
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':usuario', $usuario);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }

    public function buscarEmail($usuario,$tipo) //Buscar Cambio Clave
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        if ($tipo == 1 OR $tipo == 2) 
        {
            $sql = "SELECT personal.email AS email FROM usuarios 
						INNER JOIN personal ON personal.id_usuario = usuarios.id_usuario 
						WHERE usuarios.usuario = :usuario";
        }
        elseif ($tipo == 3) 
        {
            $sql = "SELECT alumno_a.email AS email FROM usuarios 
						INNER JOIN alumno_a ON alumno_a.id_usuario = usuarios.id_usuario 
						WHERE usuarios.usuario = :usuario";
        }

        $statement = $conexion->prepare($sql);
        $statement->bindParam(':usuario', $usuario);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }

    public function modificarUsuario($campo, $valor, $usuario)
    {
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE usuarios SET $campo = :valor WHERE usuario=:usuario";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':valor', $valor);
        $statement->bindParam(':usuario', $usuario);
        if (!$statement) 
        {
            return 0;
        }
        else
        {
            $statement->execute();
            return 1;
        }
    }
}
?>