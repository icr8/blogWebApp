<?php 
    include 'parials/header.php';

//fetch post from database if id is set
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $query);

    $post = mysqli_fetch_assoc($result);

}
else{
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>

    <!--  End header  -->

    <!--  body  -->
   


   <!--  start of posts -->
   <section class="posts">
        <div class="container read_post">

            
    
            <div class="post-info">
            <?php
        //fetch category from categories table using category_id of post
        $category_id = $post['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        
        ?>
                <a class="category_btn" href="<?= ROOT_URL?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
                <h1 class="post_title"><?= $post['title'] ?></h1>

                <div class="post post_thumbnail">
                    <img id="thumbnailpic" src="img/images/<?= $post['thumbnail'] ?>"  alt="">
                </div>
    
                    <p class="post_body">
                    <?= $post['body'] ?>
                    </p>
    
                    <div class="post_author"> 
                    <?php
                $author_id = $post['author_id'];
                $author_query = "SELECT * FROM users WHERE id= $author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);

                ?>  
                        <div class="post_author-avartar">
                            <img src="img/images/<?= $author['avatar']?>" width="60px" alt="">
                        </div>
    
                        <div class="post_author-info">
                            <h4>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                                <small>
                                <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                                </small>
                        </div>
                        
                    </div>
    
                </div>
            </div>
    
           
        </div>

   </section>

    <!--  End body  -->

    <!--  Category section  -->

    <section class=" category">
    <?php
    $all_categories_query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $all_categories_query);
    
?>
        <h4>CATEGORIES</h4>
        <div class="container category_container">
        <?php while($category= mysqli_fetch_assoc($all_categories)) : ?>
            <a class="category_btn" href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
            <?php endwhile ?>
           

    </section>


    <?php 
    include 'parials/footer.php';
?>