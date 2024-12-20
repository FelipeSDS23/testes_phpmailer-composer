<?php
    require '../vendor/autoload.php';
    require_once './.envConfig.php';
    require_once '../mail.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        if (!empty($_POST)) {
            $from = isset($_POST['from']) ? $_POST['from'] : null;
            $to = isset($_POST['to']) ? $_POST['to'] : null;
            $subject = isset($_POST['subject']) ? $_POST['subject'] : null;
            $message = isset($_POST['message']) ? $_POST['message'] : null;
    
            Mail::sendMail($from, $to, $subject, $message);
        }
    
    }