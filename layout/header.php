<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bai Kiem Tra</title>
</head>
<body>
<div class="container-fluid header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/product/?page=admin">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link <?php echo isset($_GET['controller']) ? ($_GET['controller'] == 'product') ? 'active' : '' : '' ?>" href="/product/?page=admin&controller=product">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isset($_GET['controller']) ? ($_GET['controller'] == 'category') ? 'active' : '' : '' ?>" href="/product/?page=admin&controller=category">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isset($_GET['controller']) ? ($_GET['controller'] == 'user') ? 'active' : '' : '' ?>" href="/product/?page=admin&controller=user">Tài khoản</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
                if (isset($_SESSION['username'])){?>
                    <li class="nav-item">
                        <a  href="#" class="nav-link"><?php echo $_SESSION['username'] ?></a>
                    </li>
                <?php }else{?>
                    <li class="nav-item">
                        <a  href="/product/?page=login" class="nav-link">Đăng nhập</a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
    </nav>
</div>
