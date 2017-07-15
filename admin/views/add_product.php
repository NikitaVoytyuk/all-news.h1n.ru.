<?require_once 'header.php'?>
<div class="page-wrap">
    <div class="content">
        <h1>Добавление статьи</h1>
        <?get_flash();?>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-10">
                <input type="file" name="uploadfile" id="photoimg">
            </div>
            <div class="form-group col-md-10">
                <label for="title">Название статьи</label>
                <input type="text" class="form-control" id="title" name="title" value="" required>
            </div>
            <div class="form-group col-md-10">
                <label for="title">Автор</label>
                <input type="text" class="form-control" id="title" name="author" value="<?=$_SESSION['auth']['user']?>" required>
            </div>
            <div class="form-group col-md-10" id="description">
                <label for="price">Описание:</label>
                <textarea class="form-control editor" name="description" id="content"></textarea>
            </div>
            <div class="form-group col-md-10" id="tags">
                <label for="price">Теги:</label>
                <textarea class="form-control editor" name="keywords" id="content"></textarea>
            </div>
            <div class="form-group col-md-10">
                <label for="content">Категория:</label>
                <select class="form-control" name="parent">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>6</option>
                    <option>7</option>
                </select>
            </div>
            <div class="form-group col-md-10" id="text-edit">
                <label for="content">Статья:</label>
                <textarea class="form-control editor" name="text" id="content"></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-10 text-right">
                <input type="hidden" name="id" value="">
                <button type="submit" class="btn btn-success" name="add_product">Добавить</button>
            </div>
        </form>
    </div>
<div>
    <?php require_once 'sidebar.php'; ?>
</div>
</div>
<?php require_once 'footer.php' ?>
