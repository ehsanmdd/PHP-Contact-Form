<?php

require_once("./config/loader.php");


function mobile_validation($mobile)
{
    return preg_match('/^[0-9]{11}+$/', $mobile);
}

function email_validation($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

$old_name = "";
$old_email = "";
$old_mobile = "";
$old_message = "";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['tell'];
    $message = $_POST['message'];

    $validationMsg = [];
    $validationMsgSuccess = ["message" => "", "class" => ""];
    $validationError = false;

    // Name input validation
    if ($name == "") {
        array_push($validationMsg, ["message" => "خطا! مقدار نام خالی می باشد", "class" => "danger"]);
        $validationError = true;
    } else if (strlen($name) <= 3) {
        array_push($validationMsg, ["message" => "خطا! مقدار نام باید بیشتر از 3 کارکتر باشد", "class" => "danger"]);
        $validationError = true;
    }

    // Mobile input validation
    if ($mobile == "") {
        array_push($validationMsg, ["message" => "خطا! مقدار موبایل خالی می باشد", "class" => "danger"]);
        $validationError = true;
    } else if (!mobile_validation($mobile)) {
        array_push($validationMsg, ["message" => "خطا! مقدار موبایل باید 11 رقم باشد است", "class" => "danger"]);
        $validationError = true;
    }


    // Email input validation
    if ($email == "") {
        array_push($validationMsg, ["message" => "مقدار ایمیل خالی می باشد"]);
        $validationError = true;
    } else if (!email_validation($email)) {
        array_push($validationMsg, ["message" => "ایمیل وارد شده نا معتبر میباشد"]);
    }


    // Message input validation
    if ($message == "") {
        array_push($validationMsg, ["message" => "باکس پیغام خالی می باشد"]);
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
            $validationMsgSuccess["message"] = "فرم شما ثبت شد";
            $validationMsgSuccess["class"] = "success";
        } else {
            $validationMsg["message"] = "خطا! فرم شما ارسال نشد مجدداارسال بفرمایید";
            $validationMsg["class"] = "danger";
        }
    } else {
        $old_name = $name;
        $old_email = $email;
        $old_mobile = $mobile;
        $old_message = $message;
    }
}
