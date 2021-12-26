<?php
require_once './db/function.php';
if(!isset($_SESSION))
{
    session_start();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getAll('select * from users where email="'.$email.'" and password="'.$password.'"');
    if ($user){
        $_SESSION['username'] = $user[0]['username'];
        $_SESSION['status'] = $user[0]['status'];
        header('location: /product');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="master.css">
    <title>Bai Kiem Tra</title>
</head>
<body>
<div class="container ">
    <div class="login">
        <h2 class="text-center mt-5">Đăng nhập hệ thống</h2>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
            </div>
            <div class="d-flex">
                <button name="submit" type="submit" class="btn btn-primary me-auto">Đăng nhập</button>
                <a href="/product/?page=register">Đăng ký ngay</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>