<?php

require_once '../connection/connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php

	if(isset($_POST['update'])){

		if( empty($_POST['username']) || empty($_POST['password']) ||
			empty($_POST['email']) )
		{
			echo "Please fillout all required fields";
		}else{
			$username  = $_POST['username'];
			$password 	= $_POST['password'];
			$email 	= $_POST['email'];
			$sql = "UPDATE users SET username='{$username}', password = '{$password}',
						email = '{$email}'
						WHERE userID=" . $_POST['userID'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated  user</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
			}
		}
	}
	$id = isset($_GET['userID']) ? (int) $_GET['userID'] : 0;
	$sql = "SELECT * FROM users WHERE userID={$id}";
	$result = $con->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3>
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['userID']; ?>" name="userid">
				<label for="username">USER NAME</label>
				<input type="text" id="username"  name="username" value="<?php echo $row['username']; ?>" class="form-control"><br>
				<label for="password">PASSWORD</label>
				<input type="password"  name="password" id="password" value="<?php echo $row['password']; ?>" class="form-control"><br>
				<label for="check_password">COMFIRM PASSWORD</label>
				<input type="password"  name="check_password"id="password" value="<?php echo $row['password']; ?>" class="form-control"><br>
				<label for="email"> Email Address</label><br>
				<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"> <br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>
</div>
<?php

 require_once 'footer.php';
