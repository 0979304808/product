<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once 'db/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Bai Kiem Tra</title>
</head>
<body>
<div class="header">
    <nav class="container-fluid navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/product">Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Sản phẩm</a>
                    <?php
                        $categories = getAll('select * from category');
                    ?>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $value ){?>
                            <li><a class="dropdown-item" href="?controller=category&category=<?php echo $value['slug'] ?>"><?php echo $value['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-4">
                <?php
                    if (isset($_SESSION['username'])){?>
                        <li class="nav-item dropstart" >
                            <a  href="#" class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $_SESSION['username'] ?></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/product/?page=logout">
                                            Đăng xuất
                                        </a>
                                    </li>
                            </ul>
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

<div class="container">
    <?php
    $controller = isset($_GET['controller']) ? $_GET['controller'] : '';
    if ($controller){
        if ($controller == 'category'){
            include 'listCategory.php';
        }
        if ($controller == 'detail'){
            include 'detail.php';
        }
        if ($controller == 'list'){
            include 'list.php';
        }
    }else {
        include 'list.php';
    }
    ?>
</div>

<div class="container-fluid footer bg-light justify-content-center">
    <h5 class="text-center">footer</h5>
</div>
</body>
</html>