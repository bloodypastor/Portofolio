<?php
if (empty($_POST) === false) {
    $errors = array();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) === true || empty($email) === true || empty($message) === true) {
        $errors[] = 'Name, mail and message are required!';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = "That's not a valid email address!";
        }
        if (ctype_alpha($name) === false) {
            $errors[] = 'Name must only contain letters!';
        }
    }

    if (empty($errors) === true) {
        mail('bloodypastor7@gmail.com', 'Contact form', $message, 'Form: ' . $email);
        header('Location: index.php?sent');
        exit();
    }

}
?>
