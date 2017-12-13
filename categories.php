<?php require 'header.php';
;
include 'adminnav.php';
?>

<?php
    if (isset($_POST['categories']) && !empty($_POST['categories'])) {
        insertCategory($_POST['categories']['title'], $_POST['categories']['slug']);
    } 
    if (isset($_POST['deletecat']) && !empty($_POST['deletecat'])) {
          foreach ($_POST['deletecat'] as $key => $value) {
            deleteCategory($key);
            //echo $_POST['delete'][$key];
          }

          
        }
        

?>
<H2>Categories</H2>
<table class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Title</th>
		<th>Slug</th>
	</thead>
	<tbody>
		<?php $categories = getCategories(); ?>
      <?php if (is_array($categories) && !empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <tr>
              <td>
              <?php echo $category['id']; ?>
              </td>
              <td>
              <?php echo $category['title']; ?>
              </td>
              <td>
              <?php echo $category['slug']; ?>
              </td>
              <td>
              
        <form action="" method="POST">
        <button type="submit" class="btn btn-default" name="deletecat[<?php echo $category['id']; ?>]">Delete</button>
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
<H4>Add new category</H4>
<form action="categories.php" method="POST">
      <div class="form-group">
        <div class="col-xs-10">
        <input name="categories[title]" type="title" class="form-control" id="inputEmail" placeholder="Title" >
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <input type="author" name="categories[slug]" class="form-control" placeholder="Slug">
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

?>
















<?php include 'footer.php';
?>