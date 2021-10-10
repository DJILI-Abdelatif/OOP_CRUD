<?php
	
	session_start();
	
	class DBConfig {

		public  $connection;
		private $dsname = "mysql: host=localhost; dbname=oop_project_crud";
		private $user   = "root";
		private $psw	= "";
		private $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

		public function __construct() {
			$this->dbConnect();
		}

		public function dbConnect() {
			try{
				$this->connection = new PDO($this->dsname, $this->user, $this->psw, $this->option);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				echo "Faild To Connect : ". $e;
			}
		}

		public function check($variable) {
			$variable = $variable;
			return $variable;
		}

	}

?>