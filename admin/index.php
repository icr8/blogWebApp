<?php 
    include 'partials/header.php';

    //fetch current user's posts from database
    $current_user_id = $_SESSION['user-id'];
    $query = "SELECT id, title, category_id FROM posts WHERE author_id =$current_user_id ORDER BY id DESC";
    $posts = mysqli_query($connection, $query);
    
?>
    <!--  End header  -->


<section class="dashboard">

    <!-- shows if delete category was successfully -->
    <?php if (isset($_SESSION['add-post-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>

        </div>
        <?php endif ?>

    <div class="container dashboard_container">
        
        <button class="sidebar_toggle" id="show_sidebar-btn"><img src="<?php ROOT_URL ?>img/arrow-24-512.png" alt=""></button>
        <button class="sidebar_toggle" id="hide_sidebar-btn"><img src="<?php ROOT_URL ?>img/close.png" alt=""></button>

        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Add Posts</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active"> <img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Edit Post</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-user.php"><img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" ><img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Add Categories</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-category.php" ><img src="<?= ROOT_URL ?>img/dashboard.png" alt="">
                     <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2>Manage Posts</h2>
            <?php if(mysqli_num_rows($posts) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts))  : ?>
                        <!-- get category title of each post from categories table -->
                        <?php
                            $category_id =$post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id=$category_id";
                            $category_result = mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                        
                        ?>
                    <tr>
                        <td><?= $post['title'] ?></td>
                        <td><?= $category['title'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="category_btn sn">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="category_btn sn danger">Delete</a></td>
                        
                    </tr>
                    <?php endwhile ?>
                   
                    
                </tbody>


            </table>
            <?php else : ?>
                <div class="alert_message error"> No posts Found</div>

            <?php endif ?>
        </main>
    </div>
</section>


<?php 
    include 'partials/footer.php';
?>