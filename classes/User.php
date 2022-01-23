<?php error_reporting(E_ALL &~(E_NOTICE | E_STRICT));?>
<?php

	class User {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}

		public function login($username, $password = null) {
			$sql = "
				SELECT *
				FROM login_access_details
				WHERE username = ?
			";

			$data = array(
				$username
			);

			$query = $this->_db->query($sql, $data);
			$resultSet = $query->resultSet();
			if(count($resultSet)) {
				$resultSet = $resultSet[0];
				if($resultSet['password'] == $password) {
					$_SESSION['JPSR_Ad_login'] = $resultSet;
					return true;
				} else {
					$_SESSION['loginerror'] = false;
					return false;
				}
			} else {
				$_SESSION['loginerror'] = false;
				return false;
			}
		}


		public function addUser($data = array()) {
			$sql = "
				INSERT INTO login_access_details (
					access_name,
					username,
					password
				) VALUES (
					 ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

		public function getUsers($condition = null) {
			$sql = "
				SELECT *
				FROM login_access_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateUser($data) {
			$sql = "
				UPDATE login_access_details
				SET 
                access_name = ?,
                username = ?,
                password = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updatePassword($data) {
			$sql = "
				UPDATE login_access_details
				SET
					password = ?
				WHERE id = ?
			";

			$query = $this->_db->query($sql, $data);

			return $query;
		}
		
		
		public function remove($data = array()) {
			$sql = "
				DELETE
				FROM login_access_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

	}

?>