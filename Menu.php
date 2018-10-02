<?php
include_once "header.php"
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body id="LoginForm">
	<div class="container">
		<div class="login-form" style="margin-top: 70px">
		<div class="main-div">
			<div class="panel">
				<h2>Menu</h2>
			</div>
			<form id="" method="post">
				<div class="form-group">
					<select name="Menu" class="form-control">
						<option value="Amala">Amala</option>
						<option value="Iyan">Iyan</option>
						<option value="Jollof Rice">Jollof Rice</option>
						<option value="Starch">Starch</option>
						<option value="Sea food Rice">Sea food Rice</option>
					</select>
				</div>
				<div class="form-group">
					<select name="Price" class="form-control">
						<option value="N200">N200</option>
						<option value="N300">N300</option>
						<option value="N1500">N1500</option>
						<option value="N400">N400</option>
						<option value="N1800">N1800</option>
					</select>
				</div>

				<button type="submit" name="submit" class="btn btn-primary"> Order</button>
			</form>

		</div>
	</div>
	</div>
	<style>
	body#LoginForm{
		background-image: url("./img/8.jpg");
		background-repeat: no-repeat;
		background-size:cover;

	}
	</style>
</body>
</html>
