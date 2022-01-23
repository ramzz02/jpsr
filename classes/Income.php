<?php

	class Income {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// add referral income //////////
		public function addIncome($data = array()) {
			$sql = "
				INSERT INTO referral_income (
					business_id,
					user_id,
					cash,
					reg_date,
					reg_time,
					status
				) VALUES (
                    ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchIncome($condition = null) {
			$sql = "
				SELECT *
				FROM referral_income
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateIncome($data) {
			$sql = "
				UPDATE referral_income
				SET 
				cash = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateIncomeStatus($data) {
			$sql = "
				UPDATE referral_income
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeIncome($data = array()) {
			$sql = "
				DELETE
				FROM referral_income 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





	}

?>