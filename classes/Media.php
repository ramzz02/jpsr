<?php

	class Media {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}

		/////// Media List //////////
		public function addMedia($data = array()) {
			$sql = "
				INSERT INTO social_media_list (
					location,
					facebook,
					twitter,
					instagram,
					linkedin,
					whatsapp,
					youtube,
					enter_by,
					enter_date
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

		public function fetchMedia($condition = null) {
			$sql = "
				SELECT *
				FROM social_media_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateMedia($data) {
			$sql = "
				UPDATE social_media_list
				SET 
				location = ?,
				facebook = ?,
				twitter = ?,
				instagram = ?,
				linkedin = ?,
				whatsapp = ?,
				youtube = ?,
				updated_by = ?,
				updated_date = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function remove($data = array()) {
			$sql = "
				DELETE
				FROM social_media_list
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>