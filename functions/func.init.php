<?php
	
	class dbc {

		private $dbhost = 'localhost';
		private $dbuser = 'hdx';
		private $dbpass = 'qwerty';
		private $dbname = 'blog';
		
		public $link;
		public $message;
		
		public function connect () {
			$this->link = new MySQLi($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		}
		
		public function __construct () {
			$this->connect();
		}
		
		public function select($query) {
			$results = $this->link->query($query);
			
			if($results->num_rows > 0) {
				return($results);
			} else {
				return false;
			}
		}
	}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

	class commentClass extends dbc{
	
		
		public function getComment($id) {
			$idc = (int)$id;
			$select = $this->link->query("SELECT * FROM comments WHERE news_id = '$id' ORDER BY ID DESC");
			
			if($select) {
				if(mysqli_num_rows($select) > 0) {
					return $select;
				}
			}
			
		}
		
		public function insertComment($comment_text, $user_name, $news_id) {
			
			//mysqli_query("INSERT INTO comments (comment_text, date_added) VALUES ('$comment_text','$user_name')");
			$insert = $this->link->query("INSERT INTO comments (comment_text, user_name, news_id) VALUES ('$comment_text','$user_name','$news_id')");
			
			if ($insert) {
				
				$std = new stdClass();
				$std->comment = nl2br(htmlentities($comment_text));
				$std->comment_id = mysqli_insert_id($this->link);
				$std->user_name = $user_name;
			
				return $std;
				
			} else {
				//echo '3';
				//echo(mysqli_error($this->link));
				return null;
			}
			
		}
		
		public function updateComment($data ) {
			
		}
		
		public function deleteComment(  $comment_id ) {
			
			$delete = $this->link->query("DELETE FROM comments WHERE ID='$comment_id'");
			
		//mysqli_query("DELETE FROM comments WHERE ID='$comment_id'");
			if($delete) {
				return(true);
			} else return(false);
			
		}
		
		
	}


class reviewClass extends dbc{
	
		
		public function getReview($id) {
			$idc = (int)$id;
			$select = $this->link->query("SELECT * FROM reviews WHERE product_id = '$id' ORDER BY ID ASC");
			
			if($select) {
				if(mysqli_num_rows($select) > 0) {
					return $select;
				}
			}
			
		}
		
		public function insertReview($review_text, $user_name, $product_id) {
			
			$insert = $this->link->query("INSERT INTO reviews (review_text, user_name, product_id) VALUES ('$review_text','$user_name','$product_id')");
			
			if ($insert) {
				
				$std = new stdClass();
				$std->review = nl2br(htmlentities($review_text));
				$std->review_id = mysqli_insert_id($this->link);
				$std->user_name = $user_name;
			
				return $std;
				
			} else {
				//echo '3';
				//echo(mysqli_error($this->link));
				return null;
			}
			
		}
		
		public function updateReview($data) {
			
		}
		
		public function deleteReview(  $review_id ) {
			
			$delete = $this->link->query("DELETE FROM reviews WHERE ID='$review_id'");
			
			if($delete) {
				return(true);
			} else return(false);
			
		}
		
		
	}



?>
