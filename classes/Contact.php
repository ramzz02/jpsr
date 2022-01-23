<?php

	class Contact {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Contact Info //////////
		public function add($data = array()) {
			$sql = "
				INSERT INTO contact_information (
					address,
					mobile_no,
					email
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetch($condition = null) {
			$sql = "
				SELECT *
				FROM contact_information
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function update($data) {
			$sql = "
				UPDATE contact_information
				SET 
				address = ?,
				mobile_no = ?,
				email = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function remove($data = array()) {
			$sql = "
				DELETE
				FROM contact_information 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        
        /////// Contact feedback //////////
		public function addFeedback($data = array()) {
			$sql = "
				INSERT INTO contact_feedback_details (
					f_name,
					l_name,
					mobile_no,
					email,
					category,
					comments,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchFeedback($condition = null) {
			$sql = "
				SELECT *
				FROM contact_feedback_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateFeedback($data) {
			$sql = "
				UPDATE contact_feedback_details
				SET 
				f_name = ?,
				l_name = ?,
				mobile_no = ?,
				email = ?,
				category = ?,
				comments = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeFeedback($data = array()) {
			$sql = "
				DELETE
				FROM contact_feedback_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>