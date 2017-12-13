<?php require 'header.php';
;
include 'adminnav.php';
?>

<?php
    if (isset($_POST['articles']) && !empty($_POST['articles'])) {
        insertArticle($_POST['articles']['title'], $_POST['articles']['category'], $_POST['articles']['author'], $_POST['articles']['content'], $_POST['articles']['date'] );
    }
    if (isset($_POST['delete']) && !empty($_POST['delete'])) {
          foreach ($_POST['delete'] as $key => $value) {
            deleteArticle($key);
            echo $_POST['delete'][$key];
          }

          
    }
    if (isset($_POST['edit']) && !empty($_POST['edit'])) {
      //echo $_POST['edit'];
      # edir function here 

    }
    //var_dump($_POST['edit']);    

?>
<H2>Articles</H2>
<table class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
		<th>Update</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php $articles = getArticles(); ?>
      <?php if (is_array($articles) && !empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <tr>
              <td>
              <?php echo $article['id']; ?>
              </td>
              <td>
              <?php echo $article['title']; ?>
              </td>
              
              <td>
              <?php echo $article['author']; ?>
              </td>
              <td>
              <?php echo $article['category']; ?>
              </td>
              <td>
              <?php echo $article['date']; ?>
              </td>
              <td>
              <form action="" method="POST">
        <!--<button type="submit" class="btn btn-default" name="edit[<?php echo $article['id']; ?>]">Edit</button>-->
        </form>
              </td>
              <td>
              
        <form action="" method="POST">
        <button type="submit" class="btn btn-default" name="delete[<?php echo $article['id']; ?>]">Delete</button>
        </form>
              </td>
            </tr>  
                
          <?php endforeach; ?>
        <?php else: ?>
          <p class="card-text"><?php displayNotFoundText(); ?></p>
      <?php endif; ?>




	</tbody>


</table>
<hr>
<H4>Add new article</H4>
<form action="admin.php" method="POST">
      <div class="form-group">
        <div class="col-xs-10">
        <input name="articles[title]" type="title" class="form-control" id="inputEmail" placeholder="Title" >
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <textarea name="articles[content]" class="form-control" rows="5" placeholder="Content"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <input type="author" name="articles[author]" class="form-control" placeholder="Your name">
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <input type="category" name="articles[category]" class="form-control" placeholder="Category">
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <input type="date" name="articles[date]" class="form-control" >
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" class="btn btn-default">Send</button>
        </div>
      </div>
                    
</form>


<?php 
//var_dump($_POST);
//var_dump($_POST['delete']);
?>
















<?php include 'footer.php';
?>