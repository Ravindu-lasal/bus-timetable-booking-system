<?php
require_once 'database.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Check if the signup button was clicked
if (isset($_POST["signup"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    // Validate inputs (assuming your validation functions are already defined)
    if (empty($username) || empty($email) || empty($pwd)) {
        header("Location:../User Login.php?error=emptyinput");
        exit();
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../User Login.php?error=invalidUid");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../User Login.php?error=invalidEmail");
        exit();
    }

    // Check if username or email already exists
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../User Login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if (mysqli_fetch_assoc($resultData)) {
        header("Location:../User Login.php?error=useroremailtaken");
        exit();
    }

    mysqli_stmt_close($stmt);

    // Insert new user into database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../User Login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    // Send confirmation email
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;            // Disable verbose debug output for production
        $mail->isSMTP();                               // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';          // Resolves to IPv4
        $mail->SMTPAuth   = true;                      // Enable SMTP authentication
        $mail->Username   = 'add_gmail_here';           // SMTP username
        $mail->Password   = 'code';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
        $mail->Port       = 465;                       // TCP port for SSL/TLS

        // Recipients
        $mail->setFrom('add_gmail_here', 'Bus Timetable System');
        $mail->addAddress($email, $username);          // Add recipient from signup form

        // Content
        $mail->isHTML(true);                           // Set email format to HTML
        $mail->Subject = 'Welcome to Our Bus management!';
        $mail->Body    = '<p>Hi ' . htmlspecialchars($username) . ',</p><p>Thank you for signing up! We are excited to have you on board.</p><p>Now you can booking your tickets</P>';
        $mail->AltBody = 'Hi ' . $username . ', Thank you for signing up! We are excited to have you on board.';
        $mail->send();
        header("Location:../User Login.php?created=none");
        exit();
    } catch (Exception $e) {
        echo "Signup successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    
} else {
    header('Location:../User Login.php');
    exit();
}
