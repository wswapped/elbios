<?php
    require '../core/mail.php';

    //get email contents
    // $
    $contents = file_get_contents('email.php');
    // echo "$contents";
    $status = $Mail->send('placidelunis@gmail.com', 'Test email', $contents);
?>