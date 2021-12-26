<?php require_once './db/function.php';?>
<?php require_once './helper.php';?>
<?php
    $img = '';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $product = first($id, 'product');
        $img = $product['image'];
    }
?>
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/product/?page=admin&controller=product">Tất cả sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php
                if (isset($_GET['id'])){
                    echo "Cập nhật sản phẩm";
                }else{
                    echo 'Thêm sản phẩm mới';
                }
                ?>
            </li>
        </ol>
    </nav>

    <?php
    $users = getAll('select id,username from users');
    $categories = getAll('select id,name from category');
    if (isset($_POST['submit'])){

        $tsp = $_POST['TenSanPham'];
        $mt = $_POST['MoTa'];
        $gb = $_POST['GiaBan'];
        $nd = $_POST['NguoiDang'];
        $dm = $_POST['DanhMuc'];
        $file = $_FILES['file'] ;
        $id = '';
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(!empty($file['name'])){
            $img = upload($file);
        }



        if ($id){
            if (query('UPDATE product SET TenSanPham = "'.$tsp.'",MoTa="'.$mt.'",GiaBan="'.$gb.'",NguoiDang="'.$nd.'",category_id="'.$dm.'", image="'.$img.'" WHERE id='.$id)){
                $product['TenSanPham'] = $tsp;
                $product['MoTa'] = $mt;
                $product['GiaBan'] = $gb;
                $product['NguoiDang'] = $nd;
                $product['category_id'] = $dm;
                ?>
                <div class="alert alert-success" role="alert">
                    Cập nhật danh mục thành công
                </div>
            <?php };
        }else {
            if ($tsp and $mt and $gb and $nd and $dm){
                if (!getAll('select * from product where TenSanPham="'.$tsp.'"' )){
                    if ($img){
                        $sql = 'insert into product(TenSanPham, MoTa, GiaBan, NguoiDang, category_id, image ) values ("'.$tsp.'", "'.$mt.'", "'.$gb.'", "'.$nd.'", "'.$dm.'","'.$img.'") ';
                    }else{
                        $sql = 'insert into product(TenSanPham, MoTa, GiaBan, NguoiDang, category_id ) values ("'.$tsp.'", "'.$mt.'", "'.$gb.'", "'.$nd.'", "'.$dm.'") ';
                    }
                    if (query($sql)){?>
                        <div class="alert alert-success" role="alert">
                            Thêm mới sản phẩm thành công
                        </div>
                    <?php }
                }else {?>
                    <div class="alert alert-danger" role="alert">
                        Sản phẩm đã tồn tại
                    </div>
                <?php }
            }
        }
        ?>
    <?php

    }
    ?>

    <form class="was-validated" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="tsp" class="form-label">Tên sản phẩm</label>
            <input name="TenSanPham" class="form-control is-invalid" id="tsp" placeholder="Nhập tên sản phẩm" value="<?php echo isset($product['TenSanPham']) ? $product['TenSanPham'] : '' ?>" required/>
        </div>

        <div class="mb-3">
            <label for="mt" class="form-label">Mô tả</label>
            <textarea name="MoTa" class="form-control is-invalid" id="mt" placeholder="Nhập mô tả" required><?php echo isset($product['MoTa']) ? $product['MoTa'] : '' ?></textarea>
        </div>

        <div class="mb-3">
            <label for="gb" class="form-label">Giá bán</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">VND</span>
                <input name="GiaBan" type="text" class="form-control" id="gb" aria-describedby="validationTooltipUsernamePrepend" placeholder="Nhập giá bán" value="<?php echo isset($product['GiaBan']) ? $product['GiaBan'] : '' ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="nd" class="form-label">Người đăng</label>
            <select name="NguoiDang" class="form-select" id="nd" required aria-label="select example">
                <option value="">Chọn người đăng</option>
                <?php
                    foreach ($users as $value){?>
                        <option value="<?php echo $value['id'] ?>" <?php echo isset($product['NguoiDang']) ? ($product['NguoiDang'] == $value['id']) ? 'selected' : '' : '' ?> ><?php echo $value['username'] ?></option>
                    <?php }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="dm" class="form-label">Danh mục</label>
            <select name="DanhMuc" class="form-select" id="dm" required aria-label="select example">
                <option value="">Chọn danh mục</option>
                <?php
                foreach ($categories as $value){?>
                    <option value="<?php echo $value['id'] ?>" <?php echo isset($product['category_id']) ? ($product['category_id'] == $value['id']) ? 'selected' : '' : '' ?>> <?php echo $value['name'] ?></option>
                <?php }
                ?>
            </select>
        </div>

        <?php
        if (isset($_GET['id'])){?>
        <div class="text-center mb-3 mt-3">
            <img width="300px" src="<?php echo $img ?>">
        </div>
        <?php
        }
        ?>
        <div class="mb-3">
            <label for="img" class="form-label">Hình ảnh</label>
            <input name="file" type="file" class="form-control" id="img" aria-label="file example">
        </div>

        <div class="mb-3">
            <button name="submit" class="btn btn<?php echo isset($_GET['id']) ? '-success' : '-primary' ?>" type="submit">
                <?php
                if (isset($_GET['id'])){
                    echo "Cập nhật";
                }else{
                    echo 'Thêm mới';
                }
                ?>
            </button>
        </div>
    </form>

</div>