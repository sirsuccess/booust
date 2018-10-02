<?php
require_once '../connection/connect.php';

if (!isset($_SESSION))
{
  session_start();

}
?>

<?php
include "Header.php"
?>

            <div class="article">
                <h2><span><a href="#">Welcome <?php echo $_SESSION['firstname'];?></a></span></h2>
               <?php
$ID=$_SESSION['userID'];


// Specify the query to execute
$sql = "select * from users where userId ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records
$row = mysql_fetch_array($result)
?>
<form method="post" action="UpdateProfile.php">
                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><strong>Company ID:</strong></td>
                    <td><span id="sprytextfield1">
                      <label>
                      <input name="txtId" type="text" id="txtId" value="<?php echo $row['EmployerId'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Company Name:</strong></td>
                    <td><span id="sprytextfield2">
                      <label>
                      <input name="txtName" type="text" id="txtName" value="<?php echo $row['CompanyName'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Contact Person:</strong></td>
                    <td><span id="sprytextfield3">
                      <label>
                      <input name="txtContact" type="text" id="txtContact" value="<?php echo $row['ContactPerson'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Address:</strong></td>
                    <td><span id="sprytextarea1">
                      <label>
                      <textarea name="txtAddress" id="txtAddress" cols="35" rows="3"><?php echo $row['Address'];?></textarea>
                      </label>
                    <span class="textareaRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>City:</strong></td>
                    <td><span id="sprytextfield4">
                      <label>
                      <input name="txtCity" type="text" id="txtCity" value="<?php echo $row['City'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><span id="sprytextfield5">
                      <label>
                      <input name="txtEmail" type="text" id="txtEmail" value="<?php echo $row['Email'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Mobile:</strong></td>
                    <td><span id="sprytextfield6">
                      <label>
                      <input name="txtMobile" type="text" id="txtMobile" value="<?php echo $row['Mobile'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Area of Work:</strong></td>
                    <td><span id="sprytextfield7">
                      <label>
                      <input name="txtArea" type="text" id="txtArea" value="<?php echo $row['Area_Work'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>User Name:</strong></td>
                    <td><span id="sprytextfield8">
                      <label>
                      <input name="txtUser" type="text" id="txtUser" value="<?php echo $row['UserName'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Password:</strong></td>
                    <td><span id="sprytextfield9">
                      <label>
                      <input name="txtPassword" type="password" id="txtPassword" value="<?php echo $row['Password'];?>" />
                      </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>

                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="button" id="button" value="Submit" />
                    </label></td>
                  </tr>
                </table>
</form>
              <p>&nbsp;</p>

                <p class="btn-more box noprint">&nbsp;</p>
          </div> <!-- /article -->

            <hr class="noscreen" />

        </div> <!-- /content -->

<?php
include "right.php"
?>

    </div> <!-- /page-in -->
    </div> <!-- /page -->


<?php
include "footer.php"
?>
</div> <!-- /main -->

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
//-->
</script>
</body>
</html>
