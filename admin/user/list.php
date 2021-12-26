<?php require_once './db/function.php';?>
<?php require_once './helper.php';?>

<?php
$sql = "select * from users";
$data = getAll($sql);
?>
<div class="">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tất cả tài khoản</li>
        </ol>
    </nav>
    <a href="/product/?page=admin&controller=user&action=add" class="btn btn-success mb-3">+ Tạo tài khoản mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45px" class="text-center">STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value){?>
                <tr>
                    <td class="text-center"><?php echo $key + 1 ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo status($value['status']) ?></td>
                    <td><?php echo date("h:i d-m-y", strtotime($value['created_at']))  ?></td>
                    <td>
                        <a class="btn btn-success" href="/product/?page=admin&controller=user&action=add&id=<?php echo $value['id'] ?>">Sửa</a>
                        <a class="btn btn-danger" href="/product/?page=admin&controller=user&action=delete&id=<?php echo $value['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>