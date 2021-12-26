<?php require_once './db/function.php';?>
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    if (query('DELETE FROM product WHERE id='.$id)){
        header('location: /product/?page=admin&controller=product');
    }
}
?>