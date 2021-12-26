<?php require_once './db/function.php';?>
<?php require_once './helper.php';?>
<?php
$sql = "select * from category";
$data = getAll($sql);
?>
<div class="">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tất cả danh mục</li>
        </ol>
    </nav>
    <a href="/product/?page=admin&controller=category&action=add" class="btn btn-success mb-3">+ Thêm danh mục mới</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="45px" class="text-center">STT</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $key => $value){?>
            <tr>
                <td class="text-center"><?php echo $key + 1 ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['slug'] ?></td>
                <td>
                    <a class="btn btn-success" href="/product/?page=admin&controller=category&action=add&id=<?php echo $value['id'] ?>">Sửa</a>
                    <a class="btn btn-danger" href="/product/?page=admin&controller=category&action=delete&id=<?php echo $value['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

