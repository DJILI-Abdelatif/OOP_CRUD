<?php

	require "config/operation.php";

	$object = new Operations();

	// get id by GET request method 
	$id = isset($_GET["u_id"]) & is_numeric($_GET["u_id"]) ? intval($_GET["u_id"]) : 0;
	
	$row = $object->getRecord($id);
	$object->updateRecord();

?>

<!DOCTYPE html>
<html>
<head>
	<title>oop_crud_php</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class="bg-dark">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 m-auto">
				<div class="card mt-5">
					<div class="card-title">
						<h2 class="text-center mt-4">Update Form</h2>
						<?php $object->displayMessage(); ?>
					</div>
					<div class="card-body">
						<form method="POST">
							<input type="hidden" name="id" value="<?php echo $row["id"]?>">
							<input type="text" name="first" value="<?php echo $row["firstname"] ?>" placeholder="first name" class="form-control mb-2" required="on">
							<input type="text" name="last" value="<?php echo $row["lastname"] ?>" placeholder="last name" class="form-control mb-2" required="on">
							<input type="text" name="username" value="<?php echo $row["username"] ?>" placeholder="user name" class="form-control mb-2" required="on">
							<input type="email" name="useremail" value="<?php echo $row["email"] ?>" placeholder="user email" class="form-control mb-2" required="on">
					</div>
					<div class="card-footer">
						<button class="btn btn-success" name="btn_update">Save Update</button>
						</form>
						<a href="view.php" class="btn btn-info">Employies</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>