<?php
session_start();
$user_id = $_POST['user_id'];
$email_body = $_POST['email_body'];

include 'connect-db.php';
$sql = "SELECT * FROM user
        WHERE user_id =$user_id ";

$result = $conn->query($sql);

foreach ($result as $row) {

        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
}


        include 'mailSender.php';

        /// the message
        $mail->Body = 'Dear ' . $user_name . ', <br><br>' . $email_body.
// notification
        $mail->addAddress($user_email, $user_name);


        if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
                // success msg
                $_SESSION['successEmail'] = 'ok';
                header('location:sentEmail.php');
        }



