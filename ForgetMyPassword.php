<?php
include "dbconnect.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['UserID'])) {

    $ID = mysqli_real_escape_string($conn, $_POST['UserID']);
    $sql = "SELECT * FROM `users` WHERE studentid = '$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_array($result);
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        define("PSU_Store", "http://localhost/");
        setcookie('CanReset', "You can reset your password for 15min", time() + 1800, "/");
        $emailBody = "<div><b>" . $user["firstname"] . " " . $user["lastname"] . "</b>,<br><br><p>Click this link to recover your password<br><a href='" . PSU_Store . "PSU_ecommerce/page-password-reset.php?studentid=" . $user["studentid"] . "'>" . PSU_Store . "PSU_ecommerce/page-password-reset.php?studentid=" . $user["studentid"] . "</a><br><br></p>Regards,<br> Admin.</div>";

        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'psu.ecommerce@gmail.com';                 // SMTP username
        $mail->Password = '214110377';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('psu.ecommerce@gmail.com', 'PSU-Ecommerce');
        $mail->addAddress($user["studentid"] . "@psu.edu.sa");     // Add a recipient
        $mail->addReplyTo('psu.ecommerce@gmail.com', 'Admin');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Forgot Password Recovery';
        $mail->MsgHTML($emailBody);

        

        if ($mail->Send()) {
            header_remove();
            header("location: page-forget-password.php?success_message=success");
        } else {
            header("location: page-forget-password.php?error_message=error");
        }
    } else {
        header("location: page-forget-password.php?error_message=error2");
    }
}
?>