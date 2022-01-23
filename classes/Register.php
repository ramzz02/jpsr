<?php

	class Register {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		public function login($username, $password = null) {
			$sql = "
				SELECT *
				FROM user_registration_details
				WHERE phone = ?
			";

			$data = array(
				$username
			);

			$query = $this->_db->query($sql, $data);
			$resultSet = $query->resultSet();
			if(count($resultSet)) {
				$resultSet = $resultSet[0];
				if($resultSet['password'] == $password) {
					$_SESSION['Marketing_User_login'] = $resultSet;
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


		/////// add register //////////
		public function addRegister($data = array()) {
			$sql = "
				INSERT INTO user_registration_details (
					user_code,
					name,
					phone,
					email,
					password,
					city,
					business_display_city,
					area,
					ward_no,
					aadhaar_no,
					year,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}


		/////// add register //////////
		public function addAdminRegister($data = array()) {
			$sql = "
				INSERT INTO user_registration_details (
					user_code,
					name,
					phone,
					email,
					password,
					city,
					business_display_city,
					area,
					ward_no,
					aadhaar_no,
					occupation_type,
					company_name,
					business_name,
					salary_income,
					business_income,
					year,
					reg_date,
					reg_time,
					profile_pic
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchRegister($condition = null) {
			$sql = "
				SELECT *
				FROM user_registration_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateRegister($data) {
			$sql = "
				UPDATE user_registration_details
				SET 
				name = ?,
				phone = ?,
				email = ?,
				password = ?,
				city = ?,
				business_display_city = ?,
				area = ?,
				ward_no = ?,
				aadhaar_no = ?,
				occupation_type = ?,
				company_name = ?,
				business_name = ?,
				salary_income = ?,
				business_income = ?,
				profile_pic = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateAdminRegister($data) {
			$sql = "
				UPDATE user_registration_details
				SET 
				name = ?,
				phone = ?,
				email = ?,
				password = ?,
				city = ?,
				business_display_city = ?,
				area = ?,
				ward_no = ?,
				aadhaar_no = ?,
				occupation_type = ?,
				company_name = ?,
				business_name = ?,
				salary_income = ?,
				business_income = ?,
				profile_pic = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updatePassword($data) {
			$sql = "
				UPDATE user_registration_details
				SET 
				password = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateUserMobile($data) {
			$sql = "
				UPDATE user_registration_details
				SET 
				phone = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateRegisterProfilePicture($data) {
			$sql = "
				UPDATE user_registration_details
				SET 
				profile_pic = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeRegister($data = array()) {
			$sql = "
				DELETE
				FROM user_registration_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add member //////////
		public function addMember($data = array()) {
			$sql = "
				INSERT INTO user_member_details (
					user_id,
					member_name,
					member_dob,
					member_relationship,
					member_wedding_day
				) VALUES (
                    ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchMember($condition = null) {
			$sql = "
				SELECT *
				FROM user_member_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateMember($data) {
			$sql = "
				UPDATE user_member_details
				SET 
				user_id = ?,
				member_name = ?,
				member_dob = ?,
				member_relationship = ?,
				member_wedding_day = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeMember($data = array()) {
			$sql = "
				DELETE
				FROM user_member_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeUserMember($data = array()) {
			$sql = "
				DELETE
				FROM user_member_details 
                WHERE user_id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>