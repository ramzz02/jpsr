<?php

	class Service {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Video //////////
		public function addVideo($data = array()) {
			$sql = "
				INSERT INTO jpsr_videos (
					video_path,
					video_code
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchVideo($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_videos
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateVideo($data) {
			$sql = "
				UPDATE jpsr_videos
				SET 
				video_path = ?,
				video_code = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateVideoStatus($data) {
			$sql = "
				UPDATE jpsr_videos
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeVideo($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_videos 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Services //////////
		public function addService($data = array()) {
			$sql = "
				INSERT INTO jpsr_services (
					service_name
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateService($data) {
			$sql = "
				UPDATE jpsr_services
				SET 
				service_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

		public function updateServiceStatus($data) {
			$sql = "
				UPDATE jpsr_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Service category //////////
		public function addCategory($data = array()) {
			$sql = "
				INSERT INTO jpsr_services_category (
					service_id,
					category_name
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
				FROM jpsr_services_category
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateCategory($data) {
			$sql = "
				UPDATE jpsr_services_category
				SET 
				service_id = ?,
				category_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateCategoryStatus($data) {
			$sql = "
				UPDATE jpsr_services_category
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
				FROM jpsr_services_category 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Home Service //////////
		public function addHomeService($data = array()) {
			$sql = "
				INSERT INTO jpsr_home_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchHomeService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_home_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateHomeServiceStatus($data) {
			$sql = "
				UPDATE jpsr_home_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeHomeService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_home_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}




		/////// Business Service //////////
		public function addBusinessService($data = array()) {
			$sql = "
				INSERT INTO jpsr_business_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchBusinessService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_business_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateBusinessServiceStatus($data) {
			$sql = "
				UPDATE jpsr_business_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeBusinessService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_business_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Property Service //////////
		public function addPropertyService($data = array()) {
			$sql = "
				INSERT INTO jpsr_property_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPropertyService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_property_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePropertyServiceStatus($data) {
			$sql = "
				UPDATE jpsr_property_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removePropertyService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_property_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// Other Service //////////
		public function addOtherService($data = array()) {
			$sql = "
				INSERT INTO jpsr_other_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchOtherService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_other_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateOtherServiceStatus($data) {
			$sql = "
				UPDATE jpsr_other_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeOtherService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_other_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Doctor Service //////////
		public function addDoctorService($data = array()) {
			$sql = "
				INSERT INTO jpsr_doctor_appointment (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					specialist,
					doctor_name,
					appointment_date,
					timings,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchDoctorService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_doctor_appointment
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateDoctorServiceStatus($data) {
			$sql = "
				UPDATE jpsr_doctor_appointment
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeDoctorService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_doctor_appointment 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// renting Service //////////
		public function addRentingService($data = array()) {
			$sql = "
				INSERT INTO jpsr_renting_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					renting,
					property_address,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchRentingService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_renting_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateRentingServiceStatus($data) {
			$sql = "
				UPDATE jpsr_renting_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeRentingService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_renting_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// reselling Service //////////
		public function addResellingService($data = array()) {
			$sql = "
				INSERT INTO jpsr_reselling_services (
					user_id,
					name,
					mobile_no,
					email,
					category_id,
					category_name,
					reselling,
					property_address,
					address,
					description,
					image_path,
					audio_path,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchResellingService($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_reselling_services
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateResellingServiceStatus($data) {
			$sql = "
				UPDATE jpsr_reselling_services
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeResellingService($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_reselling_services 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Grocery Service //////////
		public function addGrocery($data = array()) {
			$sql = "
				INSERT INTO jpsr_groceries (
					user_id,
					name,
					mobile_no,
					category_id,
					category_name,
					file_path,
					description,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchGrocery($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_groceries
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateGroceryStatus($data) {
			$sql = "
				UPDATE jpsr_groceries
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeGrocery($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_groceries 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Query Service //////////
		public function addQuery($data = array()) {
			$sql = "
				INSERT INTO jpsr_query_details (
					user_id,
					name,
					mobile_no,
					category,
					other_category,
					feedback,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchQuery($condition = null) {
			$sql = "
				SELECT *
				FROM jpsr_query_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

        public function removeQuery($data = array()) {
			$sql = "
				DELETE
				FROM jpsr_query_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>