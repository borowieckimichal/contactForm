<?php
require_once 'src/connection.php';
require_once 'src/Message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : null;
    $mail = isset($_POST['mail']) ? $conn->real_escape_string(trim($_POST['mail'])) : null;
    $phone = isset($_POST['phone']) ? $conn->real_escape_string(trim($_POST['phone'])) : null;
    $message = isset($_POST['message']) ? $conn->real_escape_string(trim($_POST['message'])) : null;

    $newMessage = new Message();
    $newMessage->setName($name);
    $newMessage->setMail($mail);
    $newMessage->setPhone($phone);
    $newMessage->setText($message);

    if ($newMessage->saveToDB($conn)) {
        header("Location: status.html");
    } else {
        echo "error during message sending !<br>";
    }

    $conn->close();
    $conn = null;
}
?>


<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form</title>
    </head>
    <body>
        <form action="#" method="post" align="center">
            <fieldset>
                <label>
                    Your Name:<br>
                    <input type="text" name="name"/><br>
                </label>
                <label>
                    Your e-mail:<br>
                    <input type="email" name="mail"/><br>
                </label>
                <label>
                    Your phone number:<br>
                    <input type="text" name="phone"/><br>
                </label>  
                <label>
                    Your message: <br>
                    <textarea type="text" name="message">    
                    </textarea><br>    
                </label>
                <label>      
                    <input type="submit" value="send message" />
                </label>
            </fieldset>
        </form>
    </body>
</html>
