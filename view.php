<?php

	require "config/operation.php";

	$object = new Operations();
	$rows   = $object->viewRecord();

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
			<div class="col mt-5">
				<div class="card m-auto">
					<div class="card-header">
						<h2 class="text-center text-dark">Employies Record</h2>
					</div>
					<div class="card-body">
						<a href="index.php" class="btn btn-info mb-4">Insert Emoloies</a>
						<table class="table table-bordered">
							<tr>
								<td>ID</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td>User Name</td>
								<td>User Email</td>
								<td>Operations</td>
							</tr>
								<?php foreach ($rows as $row) { ?>
							<tr>
								<td><?php echo $row["id"] ?></td>
								<td><?php echo $row["firstname"] ?></td>
								<td><?php echo $row["lastname"] ?></td>
								<td><?php echo $row["username"] ?></td>
								<td><?php echo $row["email"] ?></td>
								<td>
									<a href="edit.php?u_id=<?php echo $row['id']?>" class="btn btn-success">Edit</a>
									<a href="delete.php?u_id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
								</td>
								<?php } ?>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>