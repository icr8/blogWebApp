<?php 

require 'config\database.php';

if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">

</head>

<body>

   
    <!--  header  -->
    <header class="blog_header">

        
        <nav>
            <div class="container nav_container">
                <a href="<?= ROOT_URL ?>">
                    <img src="img/sitlogo.png" width="50px" height="50px" alt="site logo">
                </a>
                <a class="headtitle"> <h3>I-CREATE BLOGS</h3></a>

            <ul class= "nav_items">
                
                <li><a  href="<?= ROOT_URL ?>blog.php">BLOGS</a></li></li>
                <li><a href="<?= ROOT_URL ?>about.php">ABOUT</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">SERVICES</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">CONTACT</a></li>
                
                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li class="nav-profile">

                        <div class="avartar" >
                                    <img id="pic" src="<?= ROOT_URL . 'img/images/' . $avatar['avatar'] ?>"  alt="profile picture">
                                    
                        </div>

                            <ul>        
                                <li><a href="<?= ROOT_URL ?>admin/index.php">DASHBOARD</a></li>
                                <li> <a  href="<?= ROOT_URL ?>about.php">MY PROFILE</a></li>
                                <li><a href="<?= ROOT_URL ?>logout.php">LOGOUT</a></li>
                            </ul>

                                
                            
                                
                    </li>
                
                    <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">SIGN IN</a></li>
                    <?php endif ?>
                
                
                
                
                
</ul> 

<button id="open_nav-btn"><img src="img\menu.png" alt=""></button>
<button id="close_nav-btn"><img src="img\close.png" alt=""></button>

</div>

</nav>



</header>