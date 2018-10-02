
		<?php
		//header inclusion
		require_once "connection/connect.php";
		require_once 'header.php';
		?>

		<body id="LoginForm">
	<div class="container">

		<div class="login-form" style="margin-top: 70px;" >
			<div class="main-div">
				 <div class="panel">
              <h2>Login</h2>
                 </div>

		<form method="post" action="login.php">
			<div class="form-group" >
			<input type="text" name="username" class="form-control" placeholder="Username" id="username" required="required">
		</div>
			<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password" required="required">
		</div>

			<button type="submit" name="user_login" class="btn btn-primary"> Login</button>
		</form>
		<div class="forgot">Not registered?<a href="register.php"> Register</a>
                    </div>
		</div>

		</div>
	</div>
	<style>
	body#LoginForm{
	  background-image: url("./img/pound.jpg");
	  background-repeat: no-repeat;
	  background-size:cover;

	}
</style>';
<?php
// LOGIN USER
if (isset($_POST['user_login'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);


  	$query = "SELECT userID, username FROM users WHERE username='$username' AND password = '" . sha1($_POST['password']) . "'";
  	$results = mysqli_query($con, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
			if($_SESSION['username'] === 'admin'){
				header('location: admin/index.php');
			}
			elseif ($_SESSION['username'] === 'deliveryman'){
				header('location: deliveryMan/index.php');
			}else {
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: user/index.php');}
  	}else {
			echo "<script type=\"text/javascript\">window.alert('you have supplied incorret username or password.');
header('location: index.php');</script>";
exit;
  	}
  }
 ?>
</html>
