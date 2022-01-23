<?php

	class Policy {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Policy //////////
		public function addPolicy($data = array()) {
			$sql = "
				INSERT INTO policy_details (
					type,
					content
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPolicy($condition = null) {
			$sql = "
				SELECT *
				FROM policy_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePolicy($data) {
			$sql = "
				UPDATE policy_details
				SET 
				content = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePolicy($data = array()) {
			$sql = "
				DELETE
				FROM policy_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Disclaimer //////////
		public function addDisclaimer($data = array()) {
			$sql = "
				INSERT INTO disclaimer_details (
					chat,
					birthday_wishes
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchDisclaimer($condition = null) {
			$sql = "
				SELECT *
				FROM disclaimer_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateDisclaimer($data) {
			$sql = "
				UPDATE disclaimer_details
				SET 
				chat = ?,
				birthday_wishes = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeDisclaimer($data = array()) {
			$sql = "
				DELETE
				FROM disclaimer_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>