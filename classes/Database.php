<?php 

	class Database {

		private $_db = null;
		private static $_instance = null;
		private $_rowCount = 0;
		private $_resultSet = null;
		private $_errors = false;

		protected function __construct() {
			$config = $GLOBALS['mysql'];
			$this->_db = new PDO(
				"mysql:host={$config['host']}; dbname={$config['database']}; charset=utf8", 
				$config['username'], 
				$config['password'],
				array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				)
			);

			

			$this->_db->exec("SET NAMES utf8");
		}

		
		public static function getInstance() {
			if(self::$_instance == null) {
				self::$_instance = new Database();
			}

			return self::$_instance;
		}

		public function query($sql, $data = array()) {
			try {
				$this->_errors = false;
				$stmt = $this->_db->prepare($sql);
				$count = 1;

				if(!empty($data)) {
					foreach($data as $dt) {
						$stmt->bindValue($count, $dt);
						$count++;
					}
				}

				$stmt->execute();
				$this->_rowCount = $stmt->rowCount();

				if(strpos($sql, "SELECT")) {
					$this->_resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			} catch(PDOException $ex) {
				$this->_errors = true;
				die($ex->getMessage());
			}

			return $this;
		}

		public function lastInsertID() {
			return $this->_db->lastInsertId();
		}

		public function rowCount() {
			return $this->_rowCount;
		}

		public function resultSet() {
			return $this->_resultSet;
		}

		public function errors() {
			return $this->_errors;
		}

	}

?>