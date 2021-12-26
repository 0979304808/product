<?php
if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION['status'])){
    if ($_SESSION['status'] != 2){
        header('location: /product');
    }
}
?>
<?php include 'layout/header.php' ?>

<div class="container">
    <?php

    $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
    $action =  isset($_GET['action']) ? $_GET['action'] : null;

    switch ($controller){
        case 'product':
            echo '<h2 class="mt-3 mb-3">Quản lý sản phẩm</h2>';
            echo '<hr>';
            if ($action){
                if ($action == 'list'){
                    include 'product/list.php';
                }
                if ($action == 'add'){
                    include 'product/add.php';
                }
                if ($action == 'delete'){
                    include 'product/delete.php';
                }
            }else {
                include 'product/list.php';
            }
            break;
        case 'category':
            echo '<h2 class="mt-3 mb-3">Quản lý danh mục</h2>';
            echo '<hr>';
            if ($action){
                if ($action == 'list'){
                    include 'category/list.php';
                }
                if ($action == 'add'){
                    include 'category/add.php';
                }
                if ($action == 'delete'){
                    include 'category/delete.php';
                }
            }else {
                include 'category/list.php';
            }
            break;
        case 'user':
            echo '<h2 class="mt-3 mb-3">Quản lý tài khoản</h2>';
            echo '<hr>';
            if ($action){
                if ($action == 'list'){
                    include 'user/list.php';
                }
                if ($action == 'add'){
                    include 'user/add.php';
                }
                if ($action == 'delete'){
                    include 'user/delete.php';
                }
            }else {
                include 'user/list.php';
            }
            break;
        default:
            echo 'Admin';
            break;
    }

    ?>
</div>

<?php include 'layout/footer.php' ?>

