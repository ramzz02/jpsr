<?php

	class About {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// About //////////
		public function add($data = array()) {
			$sql = "
				INSERT INTO aboutus_details (
					content,
					image_path,
					image_path2,
					image_path3,
					video_path,
					video_code
				) VALUES (
                    ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetch($condition = null) {
			$sql = "
				SELECT *
				FROM aboutus_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function update($data) {
			$sql = "
				UPDATE aboutus_details
				SET 
				content = ?,
				image_path = ?,
				image_path2 = ?,
				image_path3 = ?,
				video_path = ?,
				video_code = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function remove($data = array()) {
			$sql = "
				DELETE
				FROM aboutus_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>