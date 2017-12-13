<?php require 'header.php';
;
include 'adminnav.php';
?>

<?php
    if (isset($_POST['users']) && !empty($_POST['users'])) {
        insertUser($_POST['users']['name'], $_POST['users']['password']);
    } 
    if (isset($_POST['deleteuser']) && !empty($_POST['deleteuser'])) {
          foreach ($_POST['deleteuser'] as $key => $value) {
            deleteUser($key);
            //echo $_POST['delete'][$key];
          }

          
        }
        

?>
<H2>Authors</H2>
<table class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Password</th>
    <th>Delete</th>
	</thead>
	<tbody>
		<?php $users = getUsers(); ?>
      <?php if (is_array($users) && !empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
              <td>
              <?php echo $user['id']; ?>
              </td>
              <td>
              <?php echo $user['name']; ?>
              </td>
              <td>
              <?php echo $user['password']; ?>
              </td>
              <td>
              
        <form action="" method="POST">
        <button type="submit" class="btn btn-default" name="deleteuser[<?php echo $user['id']; ?>]">Delete</button>
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
<H4>Add new Author</H4>
<form action="user.php" method="POST">
      <div class="form-group">
        <div class="col-xs-10">
        <input name="users[name]" type="title" class="form-control" id="inputEmail" placeholder="Name" >
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-10">
        <input type="author" name="users[password]" class="form-control" placeholder="Your password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" class="btn btn-default">Add</button>
        </div>
      </div>
                    
</form>


<?php 
//var_dump($_POST);

?>
















<?php include 'footer.php';
?>