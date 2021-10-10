<?php

	require "config/operation.php";

	$object = new Operations();
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
						<h2 class="text-center mt-4">Singup Form</h2>
						<?php $object->storeRecord(); ?>
					</div>
					<div class="card-body">
						<form method="POST">
							<input type="text" name="first" placeholder="first name" class="form-control mb-2" required="on">
							<input type="text" name="last" placeholder="last name" class="form-control mb-2" required="on">
							<input type="text" name="username" placeholder="user name" class="form-control mb-2" required="on">
							<input type="email" name="useremail" placeholder="user email" class="form-control mb-2" required="on">
					</div>
					<div class="card-footer">
						<button class="btn btn-success" name="btn_save">Save</button>
						</form>
						<a href="view.php" class="btn btn-info">Employies</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>