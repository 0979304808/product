<?php require_once './db/function.php';?>
<?php require_once './helper.php';?>
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/product/?page=admin&controller=category">Tất cả danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php
                if (isset($_GET['id'])){
                    echo "Cập nhật danh mục";
                }else{
                    echo 'Thêm danh mục mới';
                }
                ?>
                </li>
        </ol>
    </nav>
    <?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $category = first($id, 'category');
    }
    ?>
    <?php if (isset($_POST['submit'])){
        $id = '';
        $name = $_POST['name'];
        $slug = create_slug($name);
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if ($id){
            if (query('UPDATE category SET name = "'.$name.'", slug="'.$slug.'" WHERE id='.$id)){
                $category['name'] = $_POST['name'];
                ?>
                <div class="alert alert-success" role="alert">
                    Cập nhật danh mục thành công
                </div>
            <?php };

        }else {
            if (!getAll("SELECT * FROM category WHERE name='$name' LIMIT 1")){
                if (query('insert into category(name, slug) values ("'.$name.'", "'.$slug.'")')){?>
                    <div class="alert alert-success" role="alert">
                        Thêm mới danh mục thành công
                    </div>
                <?php
                }
            }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Danh mục đã tồn tại
            </div>
            <?php
            }
        }
        ?>

    <?php } ?>
    <form class="was-validated" method="post">

        <div class="mb-3">
            <label for="tsp" class="form-label">Tên danh mục</label>
            <input name="name" class="form-control is-invalid" id="tsp" placeholder="Nhập tên danh mục" value="<?php echo isset($category['name']) ? $category['name'] : ''  ?>" required/>
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