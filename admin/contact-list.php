<?php
require_once("../config/loader.php");


$show_iist = true;
$message = "''";

$query = "SELECT * FROM `data`";
$result = $conn->query($query);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_OBJ);


if (isset($_GET["messageid"])) {
    $query = "SELECT * FROM `data` WHERE id = ?";
    $result = $conn->prepare($query);
    $result->bindValue(1, $_GET["messageid"]);
    $result->execute();
    
    $data = $result->fetch(PDO::FETCH_OBJ);
    $message = $data->contact_message;
    $show_iist = false;
}


?>





<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin- panel</title>
</head>

<body>


    <div class="container table-responsive py-5">
            <h1 class="text-center pt-4">لیست اشخاص</h1>
            <table class="table table-bordered table-hover" dir="rtl">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">آدرس ایمیل</th>
                        <th scope="col">شماره موبایل</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $item): ?>
                        <tr>
                            <th scope="row"><?= ++$key ?></th>
                            <td><?= $item->contact_name ?></td>
                            <td><?= $item->contact_email ?></td>
                            <td><?= $item->contact_phone ?></td>
                            <td>
                                <a href="?messageid=<?= $item->id ?>" class="btn btn-primary">
                                    <i class="bi bi-chat-right-text-fill"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</body>

</html>