<?php

	class OTP {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// OTP //////////
		public function addOTP($data = array()) {
			$sql = "
				INSERT INTO otp_services (
					mobile_no,
					otp
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchOTP($condition = null) {
			$sql = "
				SELECT *
				FROM otp_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateOTP($data) {
			$sql = "
				UPDATE otp_services
				SET 
				otp = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeOTP($data = array()) {
			$sql = "
				DELETE
				FROM otp_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>