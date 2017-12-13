<?php require_once 'header.php'; ?>

<?php
    if (isset($_POST['article']) && !empty($_POST['article'])) {
        insertArticle($_POST['article']['title'], $_POST['article']['text']);
    }
?>

<!-- Page Heading -->
<h1 class="my-4">Admin</h1>
<div class="row">
    <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
            <div class="card-body">
                <h4 class="card-title">Insert article</h4>
                <form action="/admin-insert.php" method="POST">
                    <p><input type="title" name="article[title]" value="<?php echo $_POST['article']['title']; ?>"></p>
                    <p><textarea name="article[text]"><?php echo $_POST['article']['text']; ?></textarea></p>
                    <p><input type="submit"></p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php require_once 'footer.php'; ?>
