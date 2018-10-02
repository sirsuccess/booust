<?php
if (!isset($_SESSION))
{
  session_start();

}

include "Header.php"
?>

                <h2><span><a href="#">Welcome <?php echo $_SESSION['firstname'];?></a></span></h2>
               <div class="container"<?php
$ID=$_SESSION['userID'];
// Establish Connection with Database
require_once '../connection/connect.php';

// Specify the query to execute
$sql = "select * from users where userID ='".$ID."'  ";
// Execute query
$result = mysqli_query($sql,$con);
// Loop through each records
$row = mysqli_fetch_array($result)
?>
                <table width="50%" border="1" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><strong>First Name:</strong></td>
                    <td><?php echo $row['firstname'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Last Name:</strong></td>
                    <td><?php echo $row['lastname'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Email Address:</strong></td>
                    <td><?php echo $row['email'];?></td>
                  </tr>
                  <tr>
                    <td><strong>User Name:</strong></td>
                    <td><?php echo $row['username'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Password:</strong></td>
                    <td><?php echo $row['password'];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><a href="EditProfile.php?userID=<?php echo $row['userID']; ?>">Edit Profile</a></td>
                  </tr>
                </table>

              <p>&nbsp;</p>

                <p class="btn-more box noprint">&nbsp;</p>
          </div> <!-- /article -->



</div> <!-- /main -->

</body>
</html>
