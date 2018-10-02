    <?php
      //form.php
      session_start();
      require_once 'connection/connect.php';
      require_once 'header.php';
      ?>
      <?php


      echo '<h2 class="glyphicon glyphicon-user">&nbsp;<U>USERS SIGNUP</U></h2><br />';

      if($_SERVER['REQUEST_METHOD'] != 'POST')
      {
          /*the form hasn't been posted yet, display it
      	  note that the action="" will cause the form to post to the same page it is on */

          echo '<h4><div class="col-md-4 col-md-offset-0"> <form method="post" action="">
       	 	Username: <br><input type="text" name="username" class="form-control"/>
       		Password: <br><input type="password" name="password" class="form-control">
      		Password again: <br><input type="password" name="password_check"class="form-control">
      		E-mail: <br><input type="email" name="email" class="form-control"><br>
          <input type="reset" name="reset" class="btn btn-danger" value="RESET"> &nbsp;&nbsp;
       		<input type="submit" value="SIGN UP" class="btn btn-success" />
       	 </form></div></h4>';


         echo "<div class='col-md-12 col-md-offset-0'>Do You have an account? <a href='signin.php'><button>LOG IN</button></a>instead</div>";
      }

      else
      {
          /* so, the form has been posted, we'll process the data in three steps:
      		1.	Check the data
      		2.	Let the user refill the wrong fields (if necessary)
      		3.	Save the data
      	*/
      	$errors = array(); /* declare the array for later use */

      	if(isset($_POST['username']))
      	{
      		//the user name exists
      		if(!ctype_alnum($_POST['username']))
      		{
      			$errors[] = 'The username can only contain letters and digits.';
      		}
      		if(strlen($_POST['username']) > 50)
      		{
      			$errors[] = 'The username cannot be longer than 30 characters.';
      		}
      	}
      	else
      	{
      		$errors[] = 'The username field must not be empty.';
      	}


      	if(isset($_POST['password']))
      	{
      		if($_POST['password'] != $_POST['password_check'])
      		{
      			$errors[] = 'The two passwords did not match.';
      		}
      	}
      	else
      	{
      		$errors[] = 'The password field cannot be empty.';
      	}

      	if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
      	{
      		echo 'Uh-oh.. a couple of fields are not filled in correctly..<br /><br />';
      		echo '<ul>';
      		foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
      		{
      			echo '<li>' . $value . '</li>'; /* this generates a nice error list */
      		}
      		echo '</ul>';
      	}
      	else
      	{
      		//the form has been posted without, so save it
      		//notice the use of mysql_real_escape_string, keep everything safe!
      		//also notice the sha1 function which hashes the password
          $username = $_POST['username'];
          $email = $_POST['email'];
          //$password = mysqli_real_escape_string($con, $_POST['age']);

      		$sql = "INSERT INTO
      					users(username, password, email)
      				VALUES('$username', '" . sha1($_POST['password']) . "', '$email')";

                   if ( $con->query($sql) !== TRUE) {
                     die('Error: Something went wrong while registering. Please try again later. ');
                   }
                   echo 'Succesfully registered. '.$_POST['username']. ' You can now <a href="signin.php"><button class="btn btn-success">sign in</button></a> to view your profile';
                   }
                   mysqli_close($con);
      	            }

      ?>
    </div>
    <br>

<?php
require_once 'footer.php'
 ?>
</div>
