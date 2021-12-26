<?php require_once 'db/function.php' ?>
<?php
$category = getAll('select * from category where slug="'.$_GET['category'].'"');
$data = getAll('select * from product where category_id='.$category[0]['id']);
?>
<div class="list">
    <h2 class="mt-3 mb-3"><?php echo $category[0]['name'] ?></h2>
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a class="text-decoration-none" href="/product">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
        </ol>
    </nav>
    <div class="row">
        <?php
        foreach ($data as $value){?>
            <div class="col-md-4 p-4">
                <div class="box-item">
                    <a href="/product/?controller=detail&id=<?php echo $value['id'] ?>">
                        <img width="100%" src="<?php echo $value['image'] ?>">
                    </a>
                    <div class="box-body p-3">
                        <a href="/product/?controller=detail&id=<?php echo $value['id'] ?>">
                            <h4><?php echo $value['TenSanPham'] ?></h4>
                        </a>
                        <p><?php echo $value['MoTa'] ?></p>
                        <div class="d-flex justify-content-between">
                            <span>Giá bán: <strong><?php echo $value['GiaBan'] ?></strong>.VND</span>
                            <a class="view-detail" href="/product/?controller=detail&id=<?php echo $value['id'] ?>">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        ?>

    </div>
</div>