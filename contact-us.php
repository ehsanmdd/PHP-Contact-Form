<?php

require_once("./config/loader.php");


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['tell'];
    $message = $_POST['message'];




    $query = "INSERT INTO `data` 
                    SET contact_name = ?, 
                    contact_email = ?, 
                    contact_phone = ?, 
                    contact_message = ?";

    $result = $conn->prepare($query);

    $result->bindValue(1, $name);
    $result->bindValue(2, $email);
    $result->bindValue(3, $mobile);
    $result->bindValue(4, $message);

    $result->execute();

    if ($result) echo '<p class="alert alert-success">فرم شما ثبت شد</p>';
    else echo '<p class="alert alert-danger">خطا! فرم شما ارسال نشد مجددا ارسال بفرمایید</p>';
}
