<?php 
    include 'parials\header.php';

    //fetch featured post from database
    $featured_query = "SELECT * FROM posts WHERE is_featured = 1";
    $featured_result = mysqli_query($connection, $featured_query);
    $featured = mysqli_fetch_assoc($featured_result);

    //fetch 9 posts frompost table in database
    $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
    $posts = mysqli_query($connection, $query);



?>


    <!--  End header  -->

    <!--  body  ------------------------------------------------------->
   <!-- show featured post if any -->
   <?php if(mysqli_num_rows($featured_result) == 1) : ?>
    <section class="featured">
    
    <div class="container featured_container">

        <div class="post post_thumbnail">
            <img id="thumbnailpic" src="img/images/<?= $featured['thumbnail'] ?>" alt="">
        </div>

        <div class="post-info">
        <?php
        //fetch category from categories table using category_id of post
        $category_id = $featured['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        
        ?>

            <a class="category_btn" href="<?= ROOT_URL?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
            <h1 class="post_title"><a href="<?php ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h1>

                <p class="post_body">
                <?= substr($featured['body'], 0, 300)  ?>...
                </p>

                <div class="post_author">
                <?php
                $author_id = $featured['author_id'];
                $author_query = "SELECT * FROM users WHERE id= $author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);

                ?>    
                

                    <div class="post_author-avartar">
                        <img src="img/images/<?= $author['avatar']?>" width="60px" alt="">
                    </div>

                    <div class="post_author-info">
                        <h4>By: <?= "{$author['firstname']} {$author['lastname']}" ?> </h4>
                            <small>
                                <?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?>
                            </small>
                    </div>
                    
                </div>

            </div>
        </div>

    </div>

    <!--  End of featured -->
   </section>
   <?php endif ?>








   <!--  start of posts -->

   
   <section class="posts">
        <div class="container post_container">

        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post_thumbnail">
                    <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><img src="img/images/<?= $post['thumbnail'] ?>" alt=""></a>
                </div>
                <div class="post_info">

                <?php
        //fetch category from categories table using category_id of post
        $category_id = $post['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        
        ?>

                    <a href="<?= ROOT_URL ?>category-post.php?id=<?= $post['category_id'] ?>" class="category_btn"><?= $category['title'] ?></a>
                    <h2 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                    <p  class="post_body"><?= substr($post['body'], 0, 300)  ?>...</p>
                    <div class="post_author">

                    <?php
                $author_id = $post['author_id'];
                $author_query = "SELECT * FROM users WHERE id= $author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);

                ?>

                        <div class="post_author-avartar">
                            <img src="img/images/<?= $author['avatar'] ?>" alt="">
                        </div>
                        <div class="post_author-info">
                            <h4>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                            <small>
                            <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                            </small>
                        </div>
                    </div>
                </div>

            </article>
            <?php endwhile ?>

            
        </div>

   </section>

    <!--  End body  -->

    <!--  Category section  -->

    <section class="container category">
        
<?php
    $all_categories_query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $all_categories_query);
    
?>
        <h4>CATEGORIES</h4>
        <div class="container category_container">
            <?php while($category= mysqli_fetch_assoc($all_categories)) : ?>
            <a class="category_btn" href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
            <?php endwhile ?>
    </div>

    </section>


<?php include 'parials\footer.php'; 
?>