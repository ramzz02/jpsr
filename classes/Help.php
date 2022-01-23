<?php

	class Help {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		public function fetchLanguage($condition = null) {
			$sql = "
				SELECT *
				FROM add_languages
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function fetchPage($condition = null) {
			$sql = "
				SELECT *
				FROM all_pages_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}


		/////// add video //////////
		public function addVideo($data = array()) {
			$sql = "
				INSERT INTO add_help_videos (
					language,
					page,
					video_code
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchVideo($condition = null) {
			$sql = "
				SELECT *
				FROM add_help_videos
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateVideo($data) {
			$sql = "
				UPDATE add_help_videos
				SET 
				language = ?,
				page = ?,
				video_code = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateVideoStatus($data) {
			$sql = "
				UPDATE add_help_videos
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeVideo($data = array()) {
			$sql = "
				DELETE
				FROM add_help_videos 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>