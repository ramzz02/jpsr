<?php

	class Agent {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// add Agent //////////
		public function addAgent($data = array()) {
			$sql = "
				INSERT INTO agent_personal_information (
					agent_code,
					person_name,
					mobile_no,
					email,
					address,
					landmark,
					area,
					city,
					district,
					state,

					pincode,
					alternative_mobile_no,
					aadhaar_no,
					aadhaar_image_front,
					aadhaar_image_back,
					account_no,
					ifsc_code,
					holder_name,
					branch_name,
					year,

					reg_date,
					reg_time,
					enter_by,
					profile_pic
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchAgent($condition = null) {
			$sql = "
				SELECT *
				FROM agent_personal_information
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateAgentProfile($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				area = ?,
				city = ?,
				district = ?,
				state = ?,
				pincode = ?,

				alternative_mobile_no = ?,
				aadhaar_no = ?,
				aadhaar_image_front = ?,
				aadhaar_image_back = ?,
				profile_pic = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateAgentBank($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				account_no = ?,
				ifsc_code = ?,
				holder_name = ?,
				branch_name = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateAgentAdmin($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				area = ?,
				city = ?,
				district = ?,
				state = ?,
				pincode = ?,

				alternative_mobile_no = ?,
				aadhaar_no = ?,
				aadhaar_image_front = ?,
				aadhaar_image_back = ?,
				account_no = ?,
				ifsc_code = ?,
				holder_name = ?,
				branch_name = ?,
				profile_pic = ?,
				status = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateAgentStatusVstavew($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				status_view = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateAgentUpdated($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				updated_by = ?,
				updated_date = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateAgentProfilePicture($data) {
			$sql = "
				UPDATE agent_personal_information
				SET 
				profile_pic = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function remove($data = array()) {
			$sql = "
				DELETE
				FROM agent_personal_information 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        


	}

?>