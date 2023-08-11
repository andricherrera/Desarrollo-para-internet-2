<?php
	
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="academia";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
        }
        public function read(){
            $sql = "SELECT * FROM Estudiantes";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
          }

        public function create($nombre,$apellido,$direccion){
            $sql = "INSERT INTO `Estudiantes` (nombre, apellido, direccion) VALUES ('$nombre', '$apellido', '$direccion')";
            $res = mysqli_query($this->con, $sql);
            if($res){
              return true;
            }else{
            return false;
         }
        }

        public function single_record($id){
			$sql = "SELECT * FROM Estudiantes where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombre,$apellido,$direccion, $id){
			$sql = "UPDATE Estudiantes SET nombre='$nombre', apellido='$apellido', direccion='$direccion' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
        }

        public function delete($id){
            $sql = "DELETE FROM Estudiantes WHERE id=$id";
            $res = mysqli_query($this->con, $sql);
            if($res){
            return true;
            }else{
            return false;
            }
            }

        
}
?>
