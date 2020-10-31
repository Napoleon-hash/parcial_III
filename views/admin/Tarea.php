<?php include 'controller/ejecutor.php'; ?>
<?php include 'controller/basedatos.php'; ?>
<?php
class Tarea {
	public static $tablename = "tareas";
	public function Tarea(){
		$this->titulo = "";
		$this->descripcion = "";
	}
    public function agregar(){
		$sql = "insert into tareas(titulo,descripcion,fecha_registro) value (\"$_POST[titulo]\",\"$_POST[descripcion]\",NOW())";
		Executor::doit($sql);
	}
	public static function mostrar(){
		$sql = "select * from ".self::$tablename."";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Tarea();
			$array[$cnt]->idtareas = $r['idtareas'];
			$array[$cnt]->titulo = $r['titulo'];
			$array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->fecha_registro = $r['fecha_registro'];
			$cnt++;
		}
		return $array;
	}
	public function actualizar(){
		$sql = "update tareas set titulo=\"$_POST[titulo]\",descripcion=\"$_POST[descripcion]\" where idtareas=".$_POST["id"];
		Executor::doit($sql);
	}
	public function eliminar(){
		$sql = "DELETE FROM tareas WHERE idtareas=".$_POST["id"];
		Executor::doit($sql);
	}

}

?>