<div class="col-md-2">

    <form action="search.php" method="GET">
            <p><input type="text"
                      name="search"
                      placeholder="search"
                      value=""></p>

            <p><input type="submit"></p>
    </form>
    



    <h5>Categories</h5>
      <?php $categories = getCategories();?>
      <ul class="list-unstyled">
      <?php if (is_array($categories) && !empty($categories)): ?>
        <?php foreach ($categories as $category): ?> 
          <?php $catCountRes = catCount($category['slug']); ?>
    
          <li >
            <a href="category.php?category=<?php echo $category['slug'];?>"><?php echo $category['title'];?></a><?php echo ' ('.$catCountRes[0]['COUNT(id)'].')';?>
          </li>
        <?php endforeach;?>
      <?php endif;?>
      </ul>
    <h5>Authors</h5>
          <?php $authors = getAuthors();?>
          <ul class="list-unstyled">
          <?php if (is_array($authors) && !empty($authors)): ?>
            <?php foreach ($authors as $author): ?> 
              <?php $authorCountRes = authorCount($author['name']); ?>
              <li >
                <a href="author.php?author=<?php echo $author['name'];?>"><?php echo $author['name'];?></a><?php echo ' ('.$authorCountRes[0]['COUNT(id)'].')';?>
              </li>
            <?php endforeach;?>
          <?php endif;?>
          </ul>  

    </div>

