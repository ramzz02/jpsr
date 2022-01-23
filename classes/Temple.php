<?php

	class Temple {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Add Temple //////////
		public function addTemple($data = array()) {
			$sql = "
				INSERT INTO temples_list (
					location,
					ward_no,
					area,
					temple_name,
					person_name,
					mobile_no,
					email,
					address,
					landmark,
					city,

					district,
					state,
					pincode,
					alternative_mobile_no,
					landline_no,
					website,
					working_hour,
					temple_description,
					special_offer,
					temple_image,

					video,
					reg_date,
					enter_by
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchTemple($condition = null) {
			$sql = "
				SELECT *
				FROM temples_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}


		public function updateTemple($data) {
			$sql = "
				UPDATE temples_list
				SET 
				location = ?,
				ward_no = ?,
				area = ?,
				temple_name = ?,
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				city = ?,

				district = ?,
				state = ?,
				pincode = ?,
				alternative_mobile_no = ?,
				landline_no = ?,
				website = ?,
				working_hour = ?,
				temple_description = ?,
				special_offer = ?,
				temple_image = ?,

				video = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		
		public function updateTempleUpdated($data) {
			$sql = "
				UPDATE temples_list
				SET 
				updated_by = ?,
				updated_date = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateTempleStatus($data) {
			$sql = "
				UPDATE temples_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeTemple($data = array()) {
			$sql = "
				DELETE
				FROM temples_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeTempleListImage($data = array()) {
			$sql = "
				DELETE
				FROM temple_images 
                WHERE temple_id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add Business Image //////////
		public function addTempleImage($data = array()) {
			$sql = "
				INSERT INTO temple_images (
					temple_id,
					image_path,
					type,
					size
				) VALUES (
                    ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchTempleImage($condition = null) {
			$sql = "
				SELECT *
				FROM temple_images
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

        public function removeTempleImage($data = array()) {
			$sql = "
				DELETE
				FROM temple_images 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>