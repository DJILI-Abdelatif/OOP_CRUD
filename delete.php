<?php

	require "config/operation.php";

	$object = new Operations();

	// get id by GET request method 
	$id = isset($_GET["u_id"]) & is_numeric($_GET["u_id"]) ? intval($_GET["u_id"]) : 0;

	$object->deleteRecord($id);

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
						<h2 class="text-center my-4">Record Deleted</h2>
						<?php echo $object->displayMessage(); ?>
					</div>
					<div class="card-body">
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>