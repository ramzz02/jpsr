<?php

	class Home {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Home Ad //////////
		public function addHomeAd($data = array()) {
			$sql = "
				INSERT INTO home_premium_ad (
					ad_1,
					ad_2,
					ad_3
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchHomeAd($condition = null) {
			$sql = "
				SELECT *
				FROM home_premium_ad
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateHomeAd($data) {
			$sql = "
				UPDATE home_premium_ad
				SET 
				ad_1 = ?,
				ad_2 = ?,
				ad_3 = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeHomeAd($data = array()) {
			$sql = "
				DELETE
				FROM home_premium_ad 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// popup Ad //////////
		public function addPopup($data = array()) {
			$sql = "
				INSERT INTO sub_popup_ad (
					ad_1,
					ad_2,
					ad_3,
					ad_4,
					ad_5
				) VALUES (
                    ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPopup($condition = null) {
			$sql = "
				SELECT *
				FROM sub_popup_ad
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePopup($data) {
			$sql = "
				UPDATE sub_popup_ad
				SET 
				ad_1 = ?,
				ad_2 = ?,
				ad_3 = ?,
				ad_4 = ?,
				ad_5 = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePopup($data = array()) {
			$sql = "
				DELETE
				FROM sub_popup_ad 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		

	}

?>