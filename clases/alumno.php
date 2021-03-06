<?php
require_once('AccesoDatos.php');
class alumno
{
	public $id;
	public $nombre;
 	public $legajo;
  	public $sexo;
  	public function BorrarAlumno()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			delete 
			from alumno 				
			WHERE id=:id");	
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	}

	public static function BorrarAlumnoPorLegajo($legajo)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			delete 
			from calumno 				
			WHERE legajo=:legajo");	
			$consulta->bindValue(':legajo',$legajo, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	}
	public function ModificarAlumno()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			update alumno 
			set titel='$this->titulo',
			interpret='$this->cantante',
			jahr='$this->año'
			WHERE id='$this->id'");
		return $consulta->execute();
	}
	public static function ModificarAlumnoParametros($id, $nombre, $legajo, $sexo)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			update alumno 
			set nombre=:nombre,
			legajo=:legajo,
			sexo=:sexo
			WHERE id=:id");
		$consulta->bindValue(':id',$id, PDO::PARAM_INT);
		$consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
		$consulta->bindValue(':legajo', $legajo, PDO::PARAM_STR);
		$consulta->bindValue(':sexo', $sexo, PDO::PARAM_STR);
		return $consulta->execute();
	}
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->legajo."  ".$this->sexo;
	}

	public static function InsertarElAlumno($nombre, $legajo, $sexo)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alumno (nombre,legajo,sexo)values('$nombre', '$legajo', '$sexo')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();			
	}

	public function InsertarElAlumnoParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (nombre,legajo,sexo)values(:nombre,:legajo,:sexo)");
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
			$consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
			$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
			$consulta->execute();		
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	 
  	public static function TraerTodoLosAlumnos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, legajo as legajo,sexo as sexo from alumno");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "alumno");		
	}
	public static function TraerUnAlumno($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				SELECT id,
				nombre AS nombre,
				legajo AS legajo, 
				sexo AS sexo 
				FROM alumno 
				WHERE id=:id");
			$consulta->bindValue(':id',$id, PDO::PARAM_INT);
			$consulta->execute();
			return $consulta->fetchObject('alumno');	
	}

	public static function BorrarAlumnoPorID($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from alumno 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	}
		
	
	
}