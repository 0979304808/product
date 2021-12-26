<?php
if (!isset($_SESSION)) {
    session_start();
}
$page = isset($_GET['page']) ? $_GET['page'] : null;
$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
if (isset($_SESSION['username'])){
    if ($page) {
        switch ($page) {
            case 'admin':
                include('admin/index.php');
                break;
            case 'login':
                include('auth/login.php');
                break;
            case 'register':
                include('auth/register.php');
                break;
            case 'logout':
                include('auth/logout.php');
                break;
            default:
                include('home.php');
                break;
        }
    } else {
        include('home.php');
    }
}else {
    if ($page == 'register'){
        include('auth/register.php');
    }else{
        include('auth/login.php');
    }
}

?>

