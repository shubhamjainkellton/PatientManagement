<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP;
?>
          
            
<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
require("./vendor/autoload.php");

if(!isset($_GET['forgot'])){
    
    header("Location: index.php");
}
$private_secret_key = '1f4276388ad3214c873428dbef42243f' ;
if(ifItIsMethod('post')){
    
    if(isset($_POST['email'])){
      $email =  $_POST['email'];
      $length = 50;
      $token = encrypt(bin2hex(openssl_random_pseudo_bytes($length)), $private_secret_key); 
    if(email_exists($email)){
        
       if($stmt = mysqli_prepare($connection,"UPDATE users SET token='{$token}' WHERE email=?")) {
            
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
      
        mysqli_stmt_close($stmt);
        
         
 
           //phpmailer
           
           
          $mail = new PHPMailer();
           
        try{  
            
          $mail->isSMTP();											 
	      $mail->Host	    = 'smtp.gmail.com';					 
	      $mail->SMTPAuth   = true;							 
	      $mail->Username   = 'choudhary.ayush6897@gmail.com';				 
	      $mail->Password   = 'C06@ayush';						 
	      $mail->SMTPSecure = 'tls';							 
	      $mail->Port	    = 587;
          $mail->isHTML(true);      
          $mail->CharSet    = 'UTF-8';   
           
          $mail->setFrom('choudhary.ayush6897@gmail.com', 'Ayush');
          $mail->addAddress($email);
          $mail->Subject = 'Change password';
          $mail->Body = '<p>Please click to reset your password
                    <a href="http://localhost:/Php_files/patient_management_system/reset.php?email='.$email.'&token='.$token.' ">http://localhost:/Php_files/patient_management_system/reset.php?email='.$email.'&token='.$token.'</a>
                    </p>';
            
          $mail->send();
             echo "<div class='form-group'>
                  <h3>You are send mail successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
          
          } 
           catch(Exception $e){
              
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
          }   

       }
       
    }    
    }
}

?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->

