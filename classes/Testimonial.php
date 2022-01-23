<?php

	class Testimonial {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Testimonial //////////
		public function addTestimonial($data = array()) {
			$sql = "
				INSERT INTO testimonial_list (
					user_id,
					name,
					phone,
					services,
					feedback,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchTestimonial($condition = null) {
			$sql = "
				SELECT *
				FROM testimonial_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateTestimonial($data) {
			$sql = "
				UPDATE testimonial_list
				SET 
				user_id = ?,
				name = ?,
				phone = ?,
				services = ?,
				feedback = ?,
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateTestimonialStatus($data) {
			$sql = "
				UPDATE testimonial_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeTestimonial($data = array()) {
			$sql = "
				DELETE
				FROM testimonial_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Chat //////////
		public function addChat($data = array()) {
			$sql = "
				INSERT INTO chat_history (
					location,
					user_id,
					message,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchChat($condition = null) {
			$sql = "
				SELECT *
				FROM chat_history
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateChat($data) {
			$sql = "
				UPDATE chat_history
				SET 
				location = ?,
				user_id = ?,
				messsage = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateChatStatus($data) {
			$sql = "
				UPDATE chat_history
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeChat($data = array()) {
			$sql = "
				DELETE
				FROM chat_history 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		

	}

?>