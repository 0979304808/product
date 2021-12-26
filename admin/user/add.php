<?php require_once './db/function.php';?>
<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $user = first($id, 'users');
    }
?>
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/product/?page=admin&controller=user">Tất cả tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php
                if (isset($_GET['id'])){
                    echo "Cập nhật tài khoản";
                }else{
                    echo 'Tạo tài khoản mới';
                }
                ?>
            </li>
        </ol>
    </nav>

    <?php
    if (isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $id = '';
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if ($id){
            if (query('UPDATE users SET username = "'.$username.'",email="'.$email.'",password="'.$password.'",status="'.$status.'" WHERE id='.$id)){
                $user['username'] = $username;
                $user['email'] = $email;
                $user['password'] = $password;
                $user['status'] = $status;
                ?>
                <div class="alert alert-success" role="alert">
                    Cập nhật danh mục thành công
                </div>
            <?php };
        }else {
            if ($username and $email and $password and $status){
                if (!getAll('select * from users where email="'.$email.'"' )){
                    if (query('insert into users(username, email, password, status ) values ("'.$username.'", "'.$email.'", "'.$password.'", "'.$status.'") ')){?>
                        <div class="alert alert-success" role="alert">
                            Thêm mới tài khoản thành công
                        </div>
                    <?php }
                }else {?>
                    <div class="alert alert-danger" role="alert">
                        Tài khoản đã tồn tại
                    </div>
                <?php }
            }
        }

        ?>
<!--        <div class="alert alert-success" role="alert">-->
<!--            Thêm mới sản phẩm thành công-->
<!--        </div>-->
    <?php

    }
    ?>

    <form class="was-validated" method="post">

        <div class="mb-3">
            <label for="username" class="form-label">Họ Tên</label>
            <input name="username" class="form-control is-invalid" id="username" placeholder="Nhập họ tên" value="<?php echo isset($user['username']) ? $user['username'] : '' ?>" required/>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control is-invalid" id="email" placeholder="Nhập email" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>" required/>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control is-invalid" id="password" placeholder="Nhập họ tên" value="<?php echo isset($user['password']) ? $user['password'] : '' ?>" required/>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Quyền</label>
            <select name="status" class="form-select" id="status" required aria-label="select example">
                <option value="">Chọn quyền</option>
                <?php $data = [0 => 'Chưa kích hoạt' ,1 => 'user', 2 => 'admin'] ?>
                <?php
                    foreach ($data as $key => $value){?>
                        <option value="<?php echo $key ?>" <?php echo isset($user['status']) ? ($user['status'] == $key) ? 'selected' : '' : '' ?>> <?php echo $value ?> </option>
                    <?php }

                ?>
            </select>
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