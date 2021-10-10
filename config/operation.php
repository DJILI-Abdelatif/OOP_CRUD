<?php

	require_once "connect.php";

	class Operations extends DBConfig {

		// isert record to database
		public function storeRecord() {
			if(isset($_POST["btn_save"])) {
				$first     = $this->check($_POST["first"]);
				$last      = $this->check($_POST["last"]);
				$username  = $this->check($_POST["username"]);
				$useremail = $this->check($_POST["useremail"]);
				
				if($this->insert($first, $last, $username, $useremail)) {
					echo "<div class='alert alert-success'> Your Record Has Been Inserted :)</div>";
				} else {
					echo "<div class='alert alert-danger'> Failed !</div>";
				}
			}
		}

		// isert record to database
		public function insert($first, $last, $username, $useremail) {
			$stmt = $this->connection->prepare("INSERT INTO users(firstname, lastname, username, email) 
													VALUES (
														:first,
														:last,
														:username,
														:useremail)");
			$stmt->execute(array(
								'first'     => $first, 
								'last'      => $last, 
								'username'  => $username, 
								'useremail' => $useremail));
			return $stmt->rowcount();
		}
	
		// view database records
		public function viewRecord() {
			$stmt = $this->connection->prepare("SELECT * FROM users");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		// get record from database 
		public function getRecord($id) {
			$stmt = $this->connection->prepare("SELECT * FROM users WHERE id = $id");
			$stmt->execute(array($id));
			return $stmt->fetch();
		}

		// set session message 
		public function setMessage($message) {
			if(!empty($message)) { $_SESSION["message"] = $message; }
			else { $message = "";}
		}

		// display session message 
		public function displayMessage() {
			if(isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}
		}

		// update database record
		public function updateRecord() {
			if(isset($_POST["btn_update"])) {
				$first     = $this->check($_POST["first"]);
				$last      = $this->check($_POST["last"]);
				$username  = $this->check($_POST["username"]);
				$useremail = $this->check($_POST["useremail"]);
				$id        = $this->check($_POST["id"]);
				if($this->update($first, $last, $username, $useremail, $id)) {
					$this->setMessage("<div class='alert alert-success'> Your Record Has Been Updated :)</div>");
					header("refresh:3; url=view.php");
				} else {
					$this->setMessage("<div class='alert alert-danger'> Failed !</div>");
				}
			}
		}

		// update database record
		public function update($first, $last, $username, $useremail, $id) {
			$stmt = $this->connection->prepare("UPDATE 
													users 
												SET 
													firstname = ?,
													lastname  = ?,
													username  = ?,
													email     = ?
												WHERE
													id = ?");
			$stmt->execute(array($first, $last, $username, $useremail, $id));
			return $stmt->rowcount();
		}

		// delete function
		public function delete($id) {
			$stmt = $this->connection->prepare("DELETE FROM users WHERE id = :zid");
			$stmt->bindParam(':zid', $id);
			$stmt->execute();
			return $stmt->rowcount();
		}

		// delete record 
		public function deleteRecord($id) {
			if($this->delete($id)) {
				$this->setMessage("<div class='alert alert-success'> Your Record Has Been Deleted </div>");
				header("refresh:3; url=view.php");
			} else {
				$this->setMessage("<div class='alert alert-danger'> Failed !</div>");
			}
		}

	}


?>