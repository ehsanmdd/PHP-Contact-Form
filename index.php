<?php

require_once("./contact-us.php")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Contact-US</title>
</head>
<body>
    <h2>تماس با ما</h2>

    <form id="shorten-form" method="POST">
        <input type="text" value="<?= $old_name ?>" name="name" id="shorten-input" placeholder="نام خود را وارد کنید" >
        <input type="email" value="<?= $old_email ?>" name="email" id="shorten-input-link" placeholder="ایمیل خود را وارد کنید" >
        <input type="text" value="<?= $old_mobile ?>" name="tell" id="shorten-input-link" maxlength="11" placeholder="موبایل خود را وارد کنید" >
        <textarea type="text" name="message" id="shorten-input" placeholder="پیام شما"><?= $old_message ?></textarea>
        <br>
        <button type="submit" name="submit" class="btn btn-primary" id="shorten-button">ثبت</button>
        <?php
        if (isset($_POST["submit"])) {
            if ($validationError == false) {
                echo '<p class="alert alert-'.$validationMsgSuccess["class"].'">'.$validationMsgSuccess["message"].'</p>';
            } else {
                if(count($validationMsg) >= 1) echo '<ul class="msg-items alert alert-'.$validationMsg[0]["class"].'">'; 
                foreach ($validationMsg as $item) echo '<li class="msg-items">'.$item["message"].'</li>';
                if(count($validationMsg) >= 1) echo '</ul>';
            }
        }
        ?>
    </form>
    
</body>
</html>