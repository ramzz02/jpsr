<?php

	class Business {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Add Business //////////
		public function addBusiness($data = array()) {
			$sql = "
				INSERT INTO business_directory_list (
					business_name,
					person_name,
					login_user_mobile_no,
					user_mobile_no,
					mobile_no,
					email,
					address,
					landmark,
					area,
					ward_no,

					city,
					location,
					district,
					state,
					pincode,
					alternative_mobile_no,
					landline_no,
					website,
					working_hour,
					category,

					logo,
					video,
					refered_by,
					refered_by_code,
					business_description,
					special_offer,
					payment_type,
					subscription_order,
					plan,
					amount,

					subscription_start_date,
					subscription_end_date,
					reg_date,
					enter_by
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBusiness($condition = null) {
			$sql = "
				SELECT *
				FROM business_directory_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateBusinessOrder($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				payment_type = ?,
				subscription_order = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateBusinessPaymentStatus($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				payment_status = ?,
				txn_id = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateSingleBusinessUser($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				business_name = ?,
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				area = ?,
				ward_no = ?,
				city = ?,
				location = ?,

				district = ?,
				state = ?,
				pincode = ?,
				alternative_mobile_no = ?,
				landline_no = ?,
				website = ?,
				working_hour = ?,
				category = ?,
				refered_by = ?,
				refered_by_code = ?,

				business_description = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateSingleBusinessUserBy($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				status = ?,
				updated_by = ?,
				updated_by_date = ?


				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateUserMedia($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				logo = ?,
				video = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateUserPlanMedia($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				logo = ?,
				video = ?,
				payment_type = ?,
				subscription_order = ?,
				plan = ?,
				amount = ?,
				subscription_start_date = ?,
				subscription_end_date = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateBusinessUser($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				business_name = ?,
				person_name = ?,
				login_user_mobile_no = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				area = ?,
				ward_no = ?,
				city = ?,

				location = ?,
				district = ?,
				state = ?,
				pincode = ?,
				alternative_mobile_no = ?,
				landline_no = ?,
				website = ?,
				working_hour = ?,
				category = ?,
				logo = ?,

				video = ?,
				refered_by = ?,
				refered_by_code = ?,
				business_description = ?,
				special_offer = ?,
				payment_type = ?,
				subscription_order = ?,
				plan = ?,
				amount = ?,
				subscription_start_date = ?,

				subscription_end_date = ?,
				reg_date = ?,
				enter_by = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateBusinessAdmin($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				business_name = ?,
				person_name = ?,
				login_user_mobile_no = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				landmark = ?,
				area = ?,
				ward_no = ?,
				city = ?,

				location = ?,
				district = ?,
				state = ?,
				pincode = ?,
				alternative_mobile_no = ?,
				landline_no = ?,
				website = ?,
				working_hour = ?,
				category = ?,
				logo = ?,

				video = ?,
				refered_by = ?,
				refered_by_code = ?,
				business_description = ?,
				special_offer = ?,
				payment_type = ?,
				subscription_order = ?,
				plan = ?,
				amount = ?,
				subscription_start_date = ?,
				
				subscription_end_date = ?,
				payment_status = ?,
				updated_by = ?

				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateBusinessStatus($data) {
			$sql = "
				UPDATE business_directory_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeBusiness($data = array()) {
			$sql = "
				DELETE
				FROM business_directory_list 
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



		/////// Add Business Image //////////
		public function addBusinessImage($data = array()) {
			$sql = "
				INSERT INTO directory_gallery_images (
					business_id,
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

	
		public function fetchBusinessImage($condition = null) {
			$sql = "
				SELECT *
				FROM directory_gallery_images
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

        public function removeBusinessImage($data = array()) {
			$sql = "
				DELETE
				FROM directory_gallery_images 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add Business Image Active //////////
		public function addBusinessImageActive($data = array()) {
			$sql = "
				INSERT INTO business_directory_image_activation (
					business_id,
					name,
					type,
					status
				) VALUES (
                    ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBusinessImageActive($condition = null) {
			$sql = "
				SELECT *
				FROM business_directory_image_activation
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}


		public function updateBusinessImageActiveStatus($data) {
			$sql = "
				UPDATE business_directory_image_activation
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeBusinessImageActive($data = array()) {
			$sql = "
				DELETE
				FROM business_directory_image_activation 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}





		/////// Add Category //////////
		public function addCategory($data = array()) {
			$sql = "
				INSERT INTO business_category_list (
					category_name,
					category_image
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchCategory($condition = null) {
			$sql = "
				SELECT *
				FROM business_category_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateCategory($data) {
			$sql = "
				UPDATE business_category_list
				SET 
				category_name = ?,
				category_image = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateCategoryCount($data) {
			$sql = "
				UPDATE business_category_list
				SET 
				count = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateCategoryStatus($data) {
			$sql = "
				UPDATE business_category_list
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
				FROM business_category_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Add payment period  //////////
		public function addPeriod($data = array()) {
			$sql = "
				INSERT INTO business_period (
					period,
					premium_order,
					period_days
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPeriod($condition = null) {
			$sql = "
				SELECT *
				FROM business_period
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePeriod($data) {
			$sql = "
				UPDATE business_period
				SET 
				period = ?,
				premium_order = ?,
				period_days = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updatePeriodStatus($data) {
			$sql = "
				UPDATE business_period
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
				FROM business_period 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Add plan  //////////
		public function addPlan($data = array()) {
			$sql = "
				INSERT INTO business_plan (
					plan_code,
					plan_name,
					status
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPlan($condition = null) {
			$sql = "
				SELECT *
				FROM business_plan
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePlan($data) {
			$sql = "
				UPDATE business_plan
				SET 
				plan_code = ?,
				plan_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updatePlanStatus($data) {
			$sql = "
				UPDATE business_plan
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removePlan($data = array()) {
			$sql = "
				DELETE
				FROM business_plan 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Add payment subscription  //////////
		public function addSubscription($data = array()) {
			$sql = "
				INSERT INTO business_subscription (
					period,
					plan,
					amount
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchSubscription($condition = null) {
			$sql = "
				SELECT *
				FROM business_subscription
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateSubscription($data) {
			$sql = "
				UPDATE business_subscription
				SET 
				period = ?,
				plan = ?,
				amount = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateSubscriptionStatus($data) {
			$sql = "
				UPDATE business_subscription
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
				FROM business_subscription 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add emergency  //////////
		public function addEmergency($data = array()) {
			$sql = "
				INSERT INTO emergency_services (
					service_name,
					contact_number
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchEmergency($condition = null) {
			$sql = "
				SELECT *
				FROM emergency_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateEmergency($data) {
			$sql = "
				UPDATE emergency_services
				SET 
				service_name = ?,
				contact_number = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeEmergency($data = array()) {
			$sql = "
				DELETE
				FROM emergency_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeEmergencyList($data = array()) {
			$sql = "
				DELETE
				FROM emergency_services 
                WHERE status = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add train  //////////
		public function addTrain($data = array()) {
			$sql = "
				INSERT INTO train_timings (
					location,
					train_name,
					train_no,
					days,
					departure_place,
					departure_time,
					arrival_place,
					arrival_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchTrain($condition = null) {
			$sql = "
				SELECT *
				FROM train_timings
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateTrain($data) {
			$sql = "
				UPDATE train_timings
				SET 
				location = ?,
				train_name = ?,
				train_no = ?,
				days = ?,
				departure_place = ?,
				departure_time = ?,
				arrival_place = ?,
				arrival_time = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeTrain($data = array()) {
			$sql = "
				DELETE
				FROM train_timings 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeTrainLocation($data = array()) {
			$sql = "
				DELETE
				FROM train_timings 
                WHERE location = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add bus  //////////
		public function addBus($data = array()) {
			$sql = "
				INSERT INTO bus_timings (
					location,
					bus_type,
					bus_name,
					days,
					departure_place,
					departure_time,
					arrival_place,
					arrival_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBus($condition = null) {
			$sql = "
				SELECT *
				FROM bus_timings
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateBus($data) {
			$sql = "
				UPDATE bus_timings
				SET 
				location = ?,
				bus_type = ?,
				bus_name = ?,
				days = ?,
				departure_place = ?,
				departure_time = ?,
				arrival_place = ?,
				arrival_time = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeBus($data = array()) {
			$sql = "
				DELETE
				FROM bus_timings 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function removeBusLocation($data = array()) {
			$sql = "
				DELETE
				FROM bus_timings 
                WHERE location = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add Office //////////
		public function addOffice($data = array()) {
			$sql = "
				INSERT INTO government_offices_list (
					location,
					ward_no,
					area,
					office_name,
					person_name,
					mobile_no,
					email,
					address,
					timing,
					days,
					description,
					office_image,
					reg_date,
					status
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchOffice($condition = null) {
			$sql = "
				SELECT *
				FROM government_offices_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateOffice($data) {
			$sql = "
				UPDATE government_offices_list
				SET 
				location = ?,
				ward_no = ?,
				area = ?,
				office_name = ?,
				person_name = ?,
				mobile_no = ?,
				email = ?,
				address = ?,
				timing = ?,
				days = ?,
				description = ?,
				office_image = ?,
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeOffice($data = array()) {
			$sql = "
				DELETE
				FROM government_offices_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
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
					city,
					district,

					country,
					alternative_mobile_no,
					landline_no,
					website,
					working_hour,
					business_description,
					special_offer,
					temple_image,
					reg_date,
					enter_by
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
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
				city = ?,
				district = ?,

				country = ?,
				alternative_mobile_no = ?,
				landline_no = ?,
				website = ?,
				working_hour = ?,
				business_description = ?,
				special_offer = ?,
				temple_image = ?,
				status = ?
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


		/////// Add Office Image //////////
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



		/////// Add Business Payment //////////
		public function addBusinessPayment($data = array()) {
			$sql = "
				INSERT INTO business_payment_images (
					business_id,
					subscription_no,
					file_path,
					subscription_type,
					amount,
					start_date,
					end_date
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBusinessPayment($condition = null) {
			$sql = "
				SELECT *
				FROM business_payment_images
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}


		public function updateBusinessPayment($data) {
			$sql = "
				UPDATE business_payment_images
				SET 
				file_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeBusinessPayment($data = array()) {
			$sql = "
				DELETE
				FROM business_payment_images 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}




		/////// Add Business Personal Chat //////////
		public function addPersonalChat($data = array()) {
			$sql = "
				INSERT INTO business_personal_chat_details (
					user_id,
					business_id,
					business_enter_by,
					message,
					user_code,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPersonalChat($condition = null) {
			$sql = "
				SELECT *
				FROM business_personal_chat_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}


		public function updatePersonalChat($data) {
			$sql = "
				UPDATE business_personal_chat_details
				SET 
				file_path = ?,
				subscription_type = ?,
				amount = ?,
				start_date = ?,
				end_date = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removePersonalChat($data = array()) {
			$sql = "
				DELETE
				FROM business_personal_chat_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}

	}

?>