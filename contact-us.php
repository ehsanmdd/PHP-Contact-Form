<?php

require_once("./config/loader.php");


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['tell'];
    $message = $_POST['message'];

    $validationMsg = ["message" => "", "class" => ""];
    $validationError = false;

    if ($name == "") {
        $validationMsg ["message"] = "خطا! مقدار نام خالی است";
        $validationMsg ["class"] = "danger";
        $validationError = true;
    } else if (strlen($name) <= 3) {
        $validationMsg ["message"] = "خطا! مقدار نام باید بیشتر از 3 کارکتر باشد";
        $validationMsg ["class"] = "danger";
        $validationError = true;
    }

    if (!$validationError) {

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

        if ($result) {
            $validationMsg["message"] = "فرم شما ثبت شد";
            $validationMsg["class"] = "success";
        }else {
            $validationMsg["message"] = "خطا! فرم شما ارسال نشد مجدداارسال بفرمایید";
            $validationMsg["class"] = "danger";
        }
    }
}
