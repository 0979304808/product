<?php require_once 'db/function.php' ?>

<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $data = first($id, 'product');
    }
?>
<div class="list">
    <h2 class="mt-3 mb-3">Chi tiết bài viết</h2>
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/product">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
        </ol>
    </nav>

    <div class="row content">
        <div class="col-md-5">
            <div class="box-image">
                <img width="100%" src="<?php echo $data['image'] ?>">
            </div>
        </div>
        <div class="col-md-7 d-flex flex-column">

            <h2><?php echo $data['TenSanPham'] ?></h2>
            <p class="mt-1"><?php echo $data['MoTa'] ?></p>
            <h6 class="mt-auto">Giá bán: <strong><?php echo $data['GiaBan'] ?> VND</strong></h6>
        </div>
        <div class="col-12 mt-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Đọc thêm</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Liên hệ</button>
                </div>
            </nav>
            <div class="tab-content mt-4" style="min-height: 200px" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p>Lịch sử ra đời...</p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <p>Sdt: 0232131</p>
                    <p>facebook: 0232131</p>
                    <p>zalo: 0232131</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    $id_category = $data['category_id'];
    $id = $data['id'];

    $data = getAll('select * from product where product.id != '.$id.' AND product.category_id = '.$id_category.'  limit 3');
    ?>
    <hr>
    <div class="list">
        <h2 class="mt-3 mb-3">Các sản phẩm liên quan</h2>
        <div class="row">
            <?php
            if (count($data) > 0){
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
            }
            ?>

        </div>
    </div>
</div>