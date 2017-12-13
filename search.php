<?php require_once 'header.php'; ?>
<?php $resSearch = mySearch($_GET['search']);
//var_dump($resSearch);
?>
<!-- Page Heading -->
<?php if (is_array($resSearch) && !empty($resSearch)):?>
<h1 class="my-4">
 <?php echo 'Results for: '.$_GET['search']; ?></h1>
<?php endif;?>
<div class="row">

<?php include 'sidebar.php'; ?>

    <div class="col-md-10">

<?php if (is_array($resSearch) && !empty($resSearch)): ?>
        <div class="row">
	  		<?php foreach ($resSearch as $article): ?>
		        <div class="col-lg-4 col-md-4 portfolio-item">
		          <div class="card h-100">
		            <!--<a href="single.php?article=<?php echo $article['id']; ?>"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>-->
		            <div class="card-body">
		              <h4 class="card-title">
		                <a href="single.php?article=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
		              </h4>
                  <h6>Category<a href="category.php?category=<?php echo $article['category'];?>"><?php echo ' '.$article['category'];?></a> </h6>
                  <h6>By<a href="author.php?author=<?php echo $article['author'];?>"><?php echo ' '.$article['author'];?></a> </h6>
                  <h6><?php echo ' '.$article['date'];?></h6>
		              <p class="card-text"><?php echo shortContent($article['content'], $article['id']); ?></p>
		            </div>
		          </div>
		        </div>
	        <?php endforeach; ?>
          </div>
        <?php else: ?>
        	<p class="card-text"><?php displayNotFoundText(); ?></p>
    	<?php endif; ?>
    </div> <!-- / content> --> 
</div><!-- /.row -->

<?php require_once 'footer.php'; ?>
