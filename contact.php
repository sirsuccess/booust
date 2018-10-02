<?php
require_once "header.php";
?>

<div class="row">
<div class="col-md-4 col-md-offset-3">
  <div class="box">

  <form action="contact.php" method="post">
    <fieldset>
      <legend><h3><i class="glyphicon glyphicon-phone"></i>&nbsp;CONTACT US</h3></legend>
      <label for="name"> </label><br>
      <input type="text" name="name" placeholder="Full name" class="form-control">
      <br>
      <input type="tel" name="phone" placeholder="phone No." class="form-control"><br>
      <input type="text" name="email" placeholder="email@domain.com" class="form-control">
      <br>
      MESSAGE:<br>
      <textarea  name="message" rows="5" class="form-control"></textarea>
      <br>
      	<input type="RESET" name="addnew" class="btn btn-danger" value="Clear">
      	<input type="submit" name="sent_message" class="btn btn-success" value="Send">
    </fieldset>
  </form>
</div>
</div>
</div>
  <HR>

</div>
<style>
body{
  background-image: url("./img/hero1.jpg");
  background-repeat: no-repeat;
  background-size:cover;

}
</style>

<?php
if(isset($_POST["sent_message"])){
$Name= $_POST["name"];
$Email= $_POST["email"];
$Message= $_POST["message"];




// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
"use PHPMailer\PHPMailer\PHPMailer";
"use PHPMailer\PHPMailer\Exception";

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sirsuccess';                 // SMTP username
    $mail->Password = 'blessing@1';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom("kanuamani@gmail.com", "Amani Kanu");

    $mail->addAddress( $Email, $Name);     // Add a recipient




    //Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FEEDBACK FROM:'. $Name;
    $mail->Body    = 'Hi! <br>you have recieved a mail from '. $Name ." the Message is: " .$_POST["message"] .' contact him through: '. $Email;
    $mail->AltBody = 'you have recieved a new mail from your site';

//Message send aknowlegment
    $mail->send();
    echo "<div class='container' align='center' bgcolor='#60AABC'> <B><h2> Hi! " .$Name. '<br><br>Thank you for Contacting Us
  <br>We are Grateful. <br>we will get back to you soon.</H2></B></div>';
} catch (Exception $e) {
    echo '<h1 class="container" align="center" bgcolor="#60AABC"> Oop!'.$Name."<br> your Message was not sent ".' Mailer Error: </h1>', $mail->ErrorInfo;
}
//OPEN OR CREATE A CSV FILE
$handle = fopen("formLog.csv", 'a');

//csv column header
//fputcsv($handle, array('NAME', 'EMAIL', 'MESSAGE'));

//PUT CONTENT INTO CSV FILE
fputcsv($handle, array($Name, $Email, $Message));
}
//CLOSE CSV FILE
fclose($handle)



 ?>


  <?php
  require_once "footer.php";
  ?>
