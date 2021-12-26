<?php require_once './db/function.php';?>
<?php
$sql = "select *, product.id as id,category.name as category_name,users.username as user_name from product left join category on product.category_id = category.id 
left join users on product.NguoiDang = users.id";
$data = getAll($sql);
?>
<div class="">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
        </ol>
    </nav>
    <a href="/product/?page=admin&controller=product&action=add" class="btn btn-success mb-3">+ Thêm sản phẩm mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45px" class="text-center">STT</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th class="text-center">Ảnh</th>
                <th width="74px">Giá bán</th>
                <th>Người đăng</th>
                <th>Danh mục</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value){?>
                <tr>
                    <td class="text-center"><?php echo $key + 1 ?></td>
                    <td><?php echo $value['TenSanPham'] ?></td>
                    <td><?php echo $value['MoTa'] ?></td>
                    <td class="text-center">
                        <img width="120px" src="<?php echo $value['image'] ?>">
                    </td>
                    <td class="text-center"><?php echo $value['GiaBan'] ?></td>
                    <td><?php echo $value['user_name'] ?></td>
                    <td><?php echo $value['category_name'] ?></td>
                    <td><?php echo date("h:i d-m-y", strtotime($value['created_at'])) ?></td>
                    <td>
                        <a class="btn btn-success" href="/product/?page=admin&controller=product&action=add&id=<?php echo $value['id'] ?>">Sửa</a>
                        <a class="btn btn-danger" href="/product/?page=admin&controller=product&action=delete&id=<?php echo $value['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>