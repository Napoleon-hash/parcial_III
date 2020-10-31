<?php
class ConsultasG_BD // consultas generales a Base de Datos
{
    public function EstadoCicloTemp()
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $id = 1;
        $estado = 1;
        $sql = "SELECT * FROM c_temp WHERE id_c_temp = :id AND estado = :estado";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':estado', $estado);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }
    public function UltimoRegUser()
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT MAX(id_usuario) AS id_usuario FROM usuarios";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }

    public function listaCarrerasM()// lista de todas las carreras en BD
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM carreras";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }

    public function listacargoM()// lista de todas las carreras en BD
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM cargos";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }
    public function insertDatos($tabla, $campos, $valores) //funcion para insert datos en cualquier tabla
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO $tabla($campos) VALUES($valores)";
        $statement = $conexion->prepare($sql);
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
    public function verDataUser($tabla, $condicion)// lista de todas las carreras en BD
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM $tabla WHERE $condicion";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }
    public function buscavalor($tabla,$valor, $condicion)// lista de todas las carreras en BD
    {	
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT $valor FROM $tabla WHERE $condicion";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) 
        {
            $rows[] = $result;
        }
        return $rows;
    }
    public function modificarDatos($tabla, $campo, $valor, $condicional)
    {
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE $tabla SET $campo = :valor WHERE $condicional";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':valor', $valor);
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


    public function Datatabla($tabla)
    {
        $rows = null;
        $modelo = new ConexionBD();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM $tabla";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()) {

            $rows[] = $result;
        }
        return $rows;
    }
}


?>