<?php 
    include 'partials/header.php';

    //fetch categories from database
    $query = "SELECT * FROM categories ORDER BY title";
    $categories = mysqli_query($connection, $query);
    
?>
    <!--  End header  -->


<section class="dashboard">

     <!-- shows if add categories was successfully -->
<?php if(isset($_SESSION['add-category-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>

        </div>

<!-- shows if add category was not successfully -->
<?php elseif (isset($_SESSION['add-category'])) : ?> 
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>

        </div>

<!-- shows if a edit category was not successfully -->
<?php elseif (isset($_SESSION['edit-category'])) : ?> 
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>

        </div>

<!-- shows if add category was successfully -->
<?php elseif (isset($_SESSION['edit-category-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>

        </div>
        
<!-- shows if delete category was successfully -->
        <?php elseif (isset($_SESSION['delete-category-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>

        </div>

<?php endif ?>

    <div class="container dashboard_container">
        
        <button class="sidebar_toggle" id="show_sidebar-btn"><img src="img\arrow-24-512.png" alt=""></button>
        <button class="sidebar_toggle" id="hide_sidebar-btn"><img src="img\close.png" alt=""></button>

        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><img src="img/dashboard.png" alt="">
                     <h5>Add Posts</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"> <img src="img/dashboard.png" alt="">
                     <h5>Edit Post</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-user.php"><img src="img/dashboard.png" alt="">
                     <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php"><img src="img/dashboard.png" alt="">
                     <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><img src="img/dashboard.png" alt="">
                     <h5>Add Categories</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-category.php" class="active"><img src="img/dashboard.png" alt="">
                     <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2>Manage Category</h2>
            <?php if(mysqli_num_rows($categories) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($category = mysqli_fetch_assoc($categories) ) :  ?>
                    <tr>
                        <td><?= $category['title'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id']?>" class="category_btn sn">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id']?>" class="category_btn sn danger">Delete</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>


            </table>
            
            <?php else : ?>
                <div class="alert_message error">No Categories Found</div>
                <?php endif ?>

        </main>
    </div>
</section>



<?php 
    include 'partials/footer.php';
?>