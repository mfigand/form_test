<?php

require 'PHPMailer/PHPMailerAutoload.php';
include ('db_connection.php');

saveToDB($connect);

//Save data to Data Base
    function saveToDB($connect){
        //Get POST data from form
        $name = $_POST['name'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $day_birth = $_POST['day_birth'];
        $mont_birth = $_POST['month_birth'];
        $year_birth = $_POST['year_birth'];
        $cp = $_POST['cp'];
        $instagram_user = $_POST['instagram_user'];

        //Insert POST data into Data Base
        $sqlInsert = "INSERT INTO form_data (name,lastname,email,tel,day_birth,month_birth,year_birth,cp,instagram_user) VALUES ('$name','$lastname','$email','$tel','$day_birth','$mont_birth','$year_birth','$cp','$instagram_user')";

        if(!mysqli_query($connect, $sqlInsert)){
            die('Data not inserted');
        }else{
            echo 'Form data inserted successfully into Data Base';
            sendConfirmationEmail($name,$email);
        }
    }

//Configure and send confirmation Email
    function sendConfirmationEmail($name,$email){

        $mail = new PHPMailer;

       //$mail->S MTPDebug = 3;                                 // Enable verbose debug output

        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'codechallengemeelowlab@gmail.com';  // SMTP username
        $mail->Password = 'codechallenge';                      // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('codechallengemeelowlab@gmail.com', 'App Mailer');
        $mail->addAddress($email, $name);     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Confirmation Email';
        $mail->Body    = 'Thanks to fill out our form';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }

?>