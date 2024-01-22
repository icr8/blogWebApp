<?php 
    include 'parials/header.php';

    //fetch 9 posts frompost table in database
    $query = "SELECT * FROM posts ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
?>
    <!--  End header  -->

    <!--  body  -->
   <section class="search">

    <form class="container search_container" action="<?= ROOT_URL ?>search.php" method="GET">
        <input class="textfield" type="text" name="search" placeholder="Enter your search keyword...">
        <input type="submit" name="submit" class="seachBtn" value="SEARCH" >
    </form>
   

    <div class="container featured_container">

    </div>

    <!--  End of featured -->
   </section>







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

    <!--  End body  -->

    <?php 
    include 'parials/footer.php';
?>
