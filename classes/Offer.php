<?php

	class Offer {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// banner //////////
		public function addBanner($data = array()) {
			$sql = "
				INSERT INTO offer_banners (
					image_path
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBanner($condition = null) {
			$sql = "
				SELECT *
				FROM offer_banners
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateBanner($data) {
			$sql = "
				UPDATE offer_banners
				SET 
				image_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeBanner($data = array()) {
			$sql = "
				DELETE
				FROM offer_banners 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add Category //////////
		public function addCategory($data = array()) {
			$sql = "
				INSERT INTO offer_category_list (
					category_name
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchCategory($condition = null) {
			$sql = "
				SELECT *
				FROM offer_category_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateCategory($data) {
			$sql = "
				UPDATE offer_category_list
				SET 
				category_name = ?,
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateCategoryStatus($data) {
			$sql = "
				UPDATE offer_category_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeCategory($data = array()) {
			$sql = "
				DELETE
				FROM offer_category_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// industry //////////
		public function addIndustry($data = array()) {
			$sql = "
				INSERT INTO industry_offers (
					image_path
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchIndustry($condition = null) {
			$sql = "
				SELECT *
				FROM industry_offers
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateIndustry($data) {
			$sql = "
				UPDATE industry_offers
				SET 
				image_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeIndustry($data = array()) {
			$sql = "
				DELETE
				FROM industry_offers 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add offer form //////////
		public function addOffer($data = array()) {
			$sql = "
				INSERT INTO offers_list (
					location,
					user_id,
					business_id,
					category,
					title,
					image_path,
					offer_description,
					amount,
					period_start_date,
					period_end_date,
					payment_type,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchOffer($condition = null) {
			$sql = "
				SELECT *
				FROM offers_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateOffer($data) {
			$sql = "
				UPDATE offers_list
				SET 
				business_id = ?,
				category = ?,
				title = ?,
				image_path = ?,
				offer_description = ?,
				amount = ?,
				period_start_date = ?,
				period_end_date = ?,
				payment_type = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateOfferStatus($data) {
			$sql = "
				UPDATE offers_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeOffer($data = array()) {
			$sql = "
				DELETE
				FROM offers_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		
		
		
		/////// amount //////////
		public function addAmount($data = array()) {
			$sql = "
				INSERT INTO offer_amount (
					amount
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchAmount($condition = null) {
			$sql = "
				SELECT *
				FROM offer_amount
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateAmount($data) {
			$sql = "
				UPDATE offer_amount
				SET 
				amount = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeAmount($data = array()) {
			$sql = "
				DELETE
				FROM offer_amount 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		

	}

?>