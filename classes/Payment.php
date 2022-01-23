<?php

	class Payment {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Payment //////////
		public function addPayment($data = array()) {
			$sql = "
				INSERT INTO payment_gateway_list (
					user_id,
					name,
					phone,
					purpose,
					amount,
					description,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPayment($condition = null) {
			$sql = "
				SELECT *
				FROM payment_gateway_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePayment($data) {
			$sql = "
				UPDATE payment_gateway_list
				SET 
				user_id = ?,
				name = ?,
				phone = ?,
				purpose = ?,
				amount = ?,
				description = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePayment($data = array()) {
			$sql = "
				DELETE
				FROM payment_gateway_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		

	}

?>