<?php
require "includes/db.php";
require "includes/header.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Validate and sanitize form data
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);

        // Set up PHPMailer for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ha5403905@gmail.com';
        $mail->Password = 'cvzv flth kksx ohjr';
        $mail->SMTPSecure = 'tls'; // or 'ssl'
        $mail->Port = 587; // or 465

        // Set email parameters
        $mail->setFrom($email);
        $mail->addAddress('ha5403905@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Enable verbose debug output (for debugging purposes)
        //$mail->SMTPDebug = 2;

        // Send email
        $mail->send();
//        echo 'Email Sent';
    }
} catch (Exception $e) {
    echo 'Email Failed. Error: ', $mail->ErrorInfo;
}

// Navigation
require "includes/navigation.php";

// Page Content
echo '<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                            </div>
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <hr>';

// Footer
require "includes/footer.php";
?>
