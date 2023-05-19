<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
include('connect.php');
//session_start();
$a = $_POST['user_id'];
$b = $_POST['name'];
$c = $_POST['username'];
$d = $_POST['pass'];
$e = $_POST['email'];
$f = $_POST['address'];
$g = $_POST['position'];
$sub = "Account Deatils";
$message = "Hello " . $b . ", "
. "Your account has been created successfully.<br>"
. "Username: " . $c . "<br>"
. "Password: " . $d . "<br>"
. "Welcome to E-Challan Famaily!<br>"
. "Best regards,<br>"
. "Echallan"; 
// query
$sql = "INSERT INTO user (user_id,name,username,pass,email,address,position) VALUES (:a,:b,:c,:d,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $g)); {
    if($q){
        // Send email with username and password
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sandeshkoiralait@gmail.com';
        $mail->Password = 'siiemqtjvrgdifwz';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom('noreply@gmail.com');
        $mail->addAddress($e);
        $mail->Subject = ($sub);
        $mail->Body = $message;
        $mail->send();
        // Send the email
        header("location:add-user.php?success=true");
        
    } else {
        header("location:add-user.php?failed=true");
    }
}
