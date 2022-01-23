<?php

	class Upload {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Photos //////////
		public function addPhoto($data = array()) {
			$sql = "
				INSERT INTO upload_photos (
					image_path,
					type,
					size
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPhoto($condition = null) {
			$sql = "
				SELECT *
				FROM upload_photos
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePhoto($data) {
			$sql = "
				UPDATE upload_photos
				SET 
				image_path = ?,
				type = ?,
				size = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePhoto($data = array()) {
			$sql = "
				DELETE
				FROM upload_photos 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Videos //////////
		public function addVideo($data = array()) {
			$sql = "
				INSERT INTO upload_videos (
					video_path
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchVideo($condition = null) {
			$sql = "
				SELECT *
				FROM upload_videos
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateVideo($data) {
			$sql = "
				UPDATE upload_videos
				SET 
				video_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeVideo($data = array()) {
			$sql = "
				DELETE
				FROM upload_videos
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



	}

?>