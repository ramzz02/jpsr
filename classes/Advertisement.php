<?php

	class Advertisement {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Add Ads //////////
		public function addAds($data = array()) {
			$sql = "
				INSERT INTO advertisement_list (
					business_id,
					person_name,
					mobile_no,
					email,
					address,
					page_details,
					image_position,
					advertisement_image,
					subscription_type,
					amount,
					payment_type,
					start_date,
					end_date,
					reg_date,
					enter_by
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchAds($condition = null) {
			$sql = "
				SELECT *
				FROM advertisement_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateAds($data) {
			$sql = "
				UPDATE advertisement_list
				SET 
				business_id = ?,
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				page_details = ?,
				image_position = ?,
				advertisement_image = ?,
				subscription_type = ?,
				amount = ?,
				payment_type = ?,
				start_date = ?,
				end_date = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateAdsStatus($data) {
			$sql = "
				UPDATE advertisement_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeAds($data = array()) {
			$sql = "
				DELETE
				FROM advertisement_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeBusinessListImage($data = array()) {
			$sql = "
				DELETE
				FROM directory_gallery_images 
                WHERE business_id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Advertisement title //////////
		public function addAdsTitle($data = array()) {
			$sql = "
				INSERT INTO home_page_ads (
					ads_title,
					ads_size,
					page
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchAdsTitle($condition = null) {
			$sql = "
				SELECT *
				FROM home_page_ads
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

        public function removeAdsTitle($data = array()) {
			$sql = "
				DELETE
				FROM home_page_ads 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Add payment period  //////////
		public function addPeriod($data = array()) {
			$sql = "
				INSERT INTO ads_payment_period (
					period
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPeriod($condition = null) {
			$sql = "
				SELECT *
				FROM ads_payment_period
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePeriod($data) {
			$sql = "
				UPDATE ads_payment_period
				SET 
				period = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updatePeriodStatus($data) {
			$sql = "
				UPDATE ads_payment_period
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePeriod($data = array()) {
			$sql = "
				DELETE
				FROM ads_payment_period
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Add payment subscription  //////////
		public function addSubscription($data = array()) {
			$sql = "
				INSERT INTO ads_payment_subscription (
					period,
					amount
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchSubscription($condition = null) {
			$sql = "
				SELECT *
				FROM ads_payment_subscription
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateSubscription($data) {
			$sql = "
				UPDATE ads_payment_subscription
				SET 
				period = ?,
				amount = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateSubscriptionStatus($data) {
			$sql = "
				UPDATE ads_payment_subscription
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeSubscription($data = array()) {
			$sql = "
				DELETE
				FROM ads_payment_subscription 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>