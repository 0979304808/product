<?php require_once 'db/function.php' ?>
<?php
    $data = getAll('select * from product');
?>
<div class="list">
    <h2 class="mt-3 mb-3">Tất cả các sản phẩm</h2>
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
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