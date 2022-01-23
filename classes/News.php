<?php

	class News {

		private $_db = null;

		public function __construct() {
			$this->_db = Database::getInstance();
		}


		/////// Transformation //////////
		public function addTransformation($data = array()) {
			$sql = "
				INSERT INTO transformation_list (
					location,
					user_id,
					title,
					image_path,
					description,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchTransformation($condition = null) {
			$sql = "
				SELECT *
				FROM transformation_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateTransformation($data) {
			$sql = "
				UPDATE transformation_list
				SET 
				location = ?,
				user_id = ?,
				title = ?,
				image_path = ?,
				description = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateTransformationStatus($data) {
			$sql = "
				UPDATE transformation_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeTransformation($data = array()) {
			$sql = "
				DELETE
				FROM transformation_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add Category //////////
		public function addCategory($data = array()) {
			$sql = "
				INSERT INTO news_category_list (
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
				FROM news_category_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateCategory($data) {
			$sql = "
				UPDATE news_category_list
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
				UPDATE news_category_list
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
				FROM news_category_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add gold list //////////
		public function addGold($data = array()) {
			$sql = "
				INSERT INTO gold_list (
					gold_price_18,
					gold_price_22,
					gold_price_24,
					silver_price,
					platinum_price,
					image_path
				) VALUES (
                    ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchGold($condition = null) {
			$sql = "
				SELECT *
				FROM gold_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateGold($data) {
			$sql = "
				UPDATE gold_list
				SET 
				gold_price_18 = ?,
				gold_price_22 = ?,
				gold_price_24 = ?,
				silver_price = ?,
				platinum_price = ?,
				image_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeGold($data = array()) {
			$sql = "
				DELETE
				FROM gold_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add petrol list //////////
		public function addPetrol($data = array()) {
			$sql = "
				INSERT INTO petrol_list (
					petrol_price,
					diesel_price,
					image_path
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchPetrol($condition = null) {
			$sql = "
				SELECT *
				FROM petrol_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updatePetrol($data) {
			$sql = "
				UPDATE petrol_list
				SET 
				petrol_price = ?,
				diesel_price = ?,
				image_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removePetrol($data = array()) {
			$sql = "
				DELETE
				FROM petrol_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// Add vegitables & Groceries list //////////
		public function addStore($data = array()) {
			$sql = "
				INSERT INTO store_list (
					file_path,
					image_path,
					type
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchStore($condition = null) {
			$sql = "
				SELECT *
				FROM store_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateStore($data) {
			$sql = "
				UPDATE store_list
				SET 
				file_path = ?,
				image_path = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeStore($data = array()) {
			$sql = "
				DELETE
				FROM store_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add News //////////
		public function addNews($data = array()) {
			$sql = "
				INSERT INTO news_list (
					location,
					user_id,
					language,
					category,
					title,
					image_path,
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

	
		public function fetchNews($condition = null) {
			$sql = "
				SELECT *
				FROM news_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateNews($data) {
			$sql = "
				UPDATE news_list
				SET 
				language = ?,
				category = ?,
				title = ?,
				image_path = ?,
				description = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateNewsStatus($data) {
			$sql = "
				UPDATE news_list
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeNews($data = array()) {
			$sql = "
				DELETE
				FROM news_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add wishes //////////
		public function addWishes($data = array()) {
			$sql = "
				INSERT INTO birthday_wishes (
					location,
					user_id,
					person_name,
					birthday_date,
					sender_name,
					sender_image_path,
					image_path,
					wishes_detail,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchWishes($condition = null) {
			$sql = "
				SELECT *
				FROM birthday_wishes
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateWishes($data) {
			$sql = "
				UPDATE birthday_wishes
				SET 
				location = ?,
				user_id = ?,
				person_name = ?,
				birthday_date = ?,
				sender_name = ?,
				sender_image_path = ?,
				image_path = ?,
				wishes_detail = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateWishesStatus($data) {
			$sql = "
				UPDATE birthday_wishes
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeWishes($data = array()) {
			$sql = "
				DELETE
				FROM birthday_wishes 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add wishes likes //////////
		public function addWishesLike($data = array()) {
			$sql = "
				INSERT INTO wishes_like_list (
					user_id,
					wishes_id,
					likes
				) VALUES (
                    ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchWishesLike($condition = null) {
			$sql = "
				SELECT *
				FROM wishes_like_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateWishesLike($data) {
			$sql = "
				UPDATE wishes_like_list
				SET 
				likes = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeWishesLike($data = array()) {
			$sql = "
				DELETE
				FROM wishes_like_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add wishes comments //////////
		public function addWishesComment($data = array()) {
			$sql = "
				INSERT INTO wishes_comments_list (
					user_id,
					wishes_id,
					comments,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchWishesComment($condition = null) {
			$sql = "
				SELECT *
				FROM wishes_comments_list
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateWishesComment($data) {
			$sql = "
				UPDATE wishes_comments_list
				SET 
				likes = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}

        public function removeWishesComment($data = array()) {
			$sql = "
				DELETE
				FROM wishes_comments_list 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}



		/////// add articles //////////
		public function addArticle($data = array()) {
			$sql = "
				INSERT INTO article_details (
					location,
					user_id,
					student_name,
					student_age,
					school_name,
					photo_path,
					city,
					area,
					article_title,
					article_photo,
					article_description,
					reg_date,
					reg_time
				) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			";

			$query = $this->_db->query($sql, $data);
                        
                        return $query;
		}

	
		public function fetchArticle($condition = null) {
			$sql = "
				SELECT *
				FROM article_details
			";

			if(isset($condition)) {
				$sql .= " " . $condition;
			}

			$query = $this->_db->query($sql, null);

			return $query;
		}

		public function updateArticle($data) {
			$sql = "
				UPDATE article_details
				SET 
				location = ?,
				user_id = ?,
				student_name = ?,
				student_age = ?,
				school_name = ?,
				photo_path = ?,
				city = ?,
				area = ?,
				article_title = ?,
				article_photo = ?,
				article_description = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


		public function updateArticleStatus($data) {
			$sql = "
				UPDATE article_details
				SET 
				status = ?
				WHERE id = ?
			";
			
			$query = $this->_db->query($sql, $data);

			return $query;
		}


        public function removeArticle($data = array()) {
			$sql = "
				DELETE
				FROM article_details 
                WHERE id = ?
			";
			$query = $this->_db->query($sql, $data);

			return $query;
		}
		

	}

?>