<?php

	class Location {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// add location //////////
		public function addLocation($data = array()) {
			$sql = "
				INSERT INTO available_location (
					location_name
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchLocation($condition = null) {
			$sql = "
				SELECT *
				FROM available_location
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateLocation($data) {
			$sql = "
				UPDATE available_location
				SET 
				location_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateLocationStatus($data) {
			$sql = "
				UPDATE available_location
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeLocation($data = array()) {
			$sql = "
				DELETE
				FROM available_location 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add ward no //////////
		public function addWard($data = array()) {
			$sql = "
				INSERT INTO wardno_list (
					location,
					ward_no
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchWard($condition = null) {
			$sql = "
				SELECT *
				FROM wardno_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateWard($data) {
			$sql = "
				UPDATE wardno_list
				SET 
				location = ?,
				ward_no = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateWardStatus($data) {
			$sql = "
				UPDATE wardno_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeWard($data = array()) {
			$sql = "
				DELETE
				FROM wardno_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// add area //////////
		public function addArea($data = array()) {
			$sql = "
				INSERT INTO area_list (
					location,
					ward_no,
					area
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchArea($condition = null) {
			$sql = "
				SELECT *
				FROM area_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateArea($data) {
			$sql = "
				UPDATE area_list
				SET 
				location = ?,
				ward_no = ?,
				area = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateAreaStatus($data) {
			$sql = "
				UPDATE area_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeArea($data = array()) {
			$sql = "
				DELETE
				FROM area_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add state //////////
		public function addState($data = array()) {
			$sql = "
				INSERT INTO state_list (
					state_name
				) VALUES (
                    ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchState($condition = null) {
			$sql = "
				SELECT *
				FROM state_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateState($data) {
			$sql = "
				UPDATE state_list
				SET 
				state_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateStateStatus($data) {
			$sql = "
				UPDATE state_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeState($data = array()) {
			$sql = "
				DELETE
				FROM state_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		/////// add district //////////
		public function addDistrict($data = array()) {
			$sql = "
				INSERT INTO district_list (
					state_id,
					district_name
				) VALUES (
                    ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchDistrict($condition = null) {
			$sql = "
				SELECT *
				FROM district_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateDistrict($data) {
			$sql = "
				UPDATE district_list
				SET 
				state_id = ?,
				district_name = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateDistrictStatus($data) {
			$sql = "
				UPDATE district_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeDistrict($data = array()) {
			$sql = "
				DELETE
				FROM district_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}


	}

?>