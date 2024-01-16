<?php 
    include 'partials/header.php';
    //fetch users data from database but notcurrent user
    $current_admin_id = $_SESSION['user-id'];
    $query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
    $users = mysqli_query($connection, $query);
?>
    <!--  End header  -->


<section class="dashboard">
   

<!-- shows if add user was successfully -->
<?php if(isset($_SESSION['add-user-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>

        </div>
       <!-- shows if edit user was successfully -->
        <?php elseif(isset($_SESSION['edit-user-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>

        </div>
        <!-- shows if edit user was not successfully -->
        <?php elseif(isset($_SESSION['edit-user-success'])) : ?> 
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>

        </div>

        <!-- shows if delete user was successfully -->
        <?php elseif(isset($_SESSION['delete-user'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>

        </div>
        <!-- shows if delete user was not successfully -->
        <?php elseif(isset($_SESSION['delete-user-success'])) : ?> 
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
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
                    <a href="manage-users.php" class="active"><img src="img/dashboard.png" alt="">
                     <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><img src="img/dashboard.png" alt="">
                     <h5>Add Categories</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-category.php" ><img src="img/dashboard.png" alt="">
                     <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2>Manage Users</h2>
            <?php if(mysqli_num_rows($users) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users)) : ?>

                    <tr>
                        <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                        <td><?= "{$user['username']}" ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="category_btn sn">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="category_btn sn danger">Delete</a></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                    </tr>
                   <?php endwhile ?>
                </tbody>


            </table>

            <?php else : ?>
                <div class="alert_message error"> No users Found</div>

                <?php endif ?>
        </main>
    </div>
</section>



<?php 
    include 'partials/footer.php';
?>