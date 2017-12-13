<?php
session_start();
const TITLE_BLOG = 'My first blog';

function connectDb()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=phpblog', 'debian-sys-maint', 'eE8S4QRuM0o8UX9c');

        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

        return false;
    }
}

function myDbConnect() {
    $db = mysqli_connect('localhost', 'debian-sys-maint', 'eE8S4QRuM0o8UX9c', 'phpblog');
    
    return $db;
    //var_dump($db);
}

function myDbInsert($name, $password) {
    $db = myDbConnect();
    /*if (mysqli_query($db,"INSERT INTO users (name, password)) VALUES ('Glenn','Quagmire')")) {
        echo "ok";
    } else {
        echo "error";
    }
    var_dump($db);*/
    $result = mysqli_query($db, "INSERT INTO `users`(`name`, `password`) VALUES ('Borys', 'password')") ;
    //var_dump($result);
}



function myDbDelete() {
    $db = myDbConnect();
    $result = mysqli_query($db, "DELETE FROM `articles` WHERE id=15");

}



function insertArticle($title, $category, $author, $content, $date)
{
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO articles(title, category, author, content, date) VALUES ( :title,  :category, :author, :content, :date)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
    }
}



// добавляем новую категорию в админке
function insertCategory($title, $slug)
{
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO categories(title, slug) VALUES ( :title,  :slug)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        
    }
}



// добавляем нового пользователя в админке
function insertUser($name, $password)
{
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO users(name, password) VALUES ( :name,  :password)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        
    }
}



// выводим все посты
function getArticles()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}



// выводим все категории
function getCategories()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM categories";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}



// выводим всех авторов
function getAuthors()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM users";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}



function getUsers()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM users";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}


// вывод сокращенной версии контента со ссылкой read more
function shortContent($string, $link) {
    $result = substr($string, 0, 150).'...'.'<br><a href="single.php?article='.$link.'">Read more</a>';
    return $result;

}


// вывод содержимого одного поста
function getSingleArticle($id) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles WHERE id=$id";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;

}


// вывод всех постов из заданной категории
function getPostFromCategory($cat) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles WHERE category='$cat'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}


// вывод всех постов заданного автора
function getPostFromAuthor($author) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles WHERE author='$author'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;


}


// подсчет кол-ва постов в категории
function catCount($category) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT COUNT(id)  FROM articles WHERE category='$category'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;

}


// подсчет кол-ва постов заданного автора
function authorCount($author) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT COUNT(id)  FROM articles WHERE author='$author'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;

}

// поиск по слову
function mySearch($key) {
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles WHERE title LIKE '%$key%'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;


}



/*function getArticle($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM article WHERE id=$id";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}
*/
/*function updateArticle($article, $id)
{
    $db = connectDb();
    if ($db) {
        $sql = "UPDATE article 
              SET title = '" . $article['title'] . "', text = '" . $article['text'] . "' 
              WHERE id = $id";

        return $db->prepare($sql)->execute();
    }

    return false;
}
*/
function deleteArticle($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE id=$id";

        return $db->prepare($sql)->execute();
    }

    return false;
}

function deleteCategory($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM categories WHERE id=$id";

        return $db->prepare($sql)->execute();
    }

    return false;
}

function deleteUser($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM users WHERE id=$id";

        return $db->prepare($sql)->execute();
    }

    return false;
}

function getTitleBlog()
{
    return TITLE_BLOG;
}

function displayTitleBlog()
{
    echo TITLE_BLOG;
}

function displayNotFoundText()
{
    echo 'Not found articles';
}

function calc($arg1, $arg2, $action)
{
    if ($action == '+') {
        return ['arg1' => $arg1, 'arg2' => $arg2, 'action' => $action, 'result' => $arg1 + $arg2];
    } elseif ($action == '-') {
        return ['arg1' => $arg1, 'arg2' => $arg2, 'action' => $action, 'result' => $arg1 - $arg2];
    } elseif ($action == '*') {
        return ['arg1' => $arg1, 'arg2' => $arg2, 'action' => $action, 'result' => $arg1 * $arg2];
    } elseif ($action == '/') {
        return ['arg1' => $arg1, 'arg2' => $arg2, 'action' => $action, 'result' => $arg1 / $arg2];
    }

    return false;
}