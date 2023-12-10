<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('dbcon.php');
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<!-- Rest of your code -->
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            background: linear-gradient(to bottom, #007bff, #ff8c00);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container input[type="email"],
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php 
        if(isset($_POST['submit'])){
            $email = $_POST['email'];

            // Check if email exists
            $query = $conn->prepare("SELECT * FROM organizer WHERE email=:email");
            $query->execute(['email' => $email]);

            if($query->rowCount() > 0){
                // Generate a unique token
                $token = bin2hex(random_bytes(50));

                // Store the token in the database
                $query = $conn->prepare("UPDATE organizer SET token=:token WHERE email=:email");
                $query->execute(['token' => $token, 'email' => $email]);

                // Create a new PHPMailer instance
                $mail = new PHPMailer();

                try {
                    //Server settings
                    $mail->isSMTP();                                      
                    $mail->Host       = 'smtp.gmail.com';                 
                    $mail->SMTPAuth   = true;                             
                    $mail->Username   = 'cleearr.canillas@lsu.edu.ph';           
                    $mail->Password   = 'Tajmahal123456789!!!!!!!!!';                  
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            
                    $mail->Port       = 587;                              

                    //Recipients
                    $mail->setFrom('cleearr.canillas@lsu.edu.ph', 'Mailer');
                    $mail->addAddress($email);     

                    //Content
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Reset your password';
                    $mail->Body    = "Click the following link to reset your password: http://localhost/judging/reset_password.php?token=$token";
                    
                    echo "Sending email to: $email"; 
                    $mail->send();
                    echo "<p class='message'>A password reset link has been sent to your email.</p>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "<p class='message'>No account found with that email.</p>";
            }
        }
        ?>
        <form method="POST" action="">
            <input type="email" name="email" required>
            <input type="submit" name="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>