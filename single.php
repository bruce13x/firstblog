<?php require_once 'header.php'; ?>
<?php $article = getSingleArticle($_GET['article']);
//var_dump($article);
?>
<!-- Page Heading -->
<h1 class="my-4"><?php echo $article[0]['title']; ?></h1>
<div class="row">

<?php include 'sidebar.php'; ?>

    <div class="col-md-10">


    <?php if (is_array($article) && !empty($article)): ?>
            <div class="col-lg-10 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                    <div class="card-body">
                        <p class="card-text"><?php echo $article[0]['content']; ?></p>
                    </div>
                </div>
            </div>
        
    <?php else: ?>
        <p class="card-text"><?php displayNotFoundText(); ?></p>
    <?php endif; ?>
    </div>
</div>
<!-- /.row -->

<?php require_once 'footer.php'; ?>
