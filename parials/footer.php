    
    
    <!--  footer  -->
    <footer class="container footer">
        
        <h4> SOCIAL HANDLES</h4>
        
        <div class="container social_handle">
            <a href="https://youtube.com/@deepen_center" target="_blank"><img src="<?= ROOT_URL ?>img\Youtube_logo.png" alt=""></a>
            <a href="https://facebook.com" target="_blank"><img src="<?= ROOT_URL ?>img\pngtree-facebook-social-media-icon-png-image_6315968.png" alt=""></a>
            <a href="https://whatsapp.com" target="_blank"><img src="<?= ROOT_URL ?>img\whatsapp_logo_icon_229310.png" alt=""></a>
        </div>

        <div class="container footer_container">

        
    <article class="category_con">
        <h4>CATEGORIES</h4>

<?php
    $all_categories_query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $all_categories_query);
    
?>

        <div class="container footer_nav">
            <?php while($category= mysqli_fetch_assoc($all_categories)) : ?>
            <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
            <?php endwhile ?>
        </div>
    </article>


    <article class="category_con">

        <h4>SUPPORT</h4>

        <div class="container footer_nav">
            <a href="">Online support</a>
            <a href="">Call Numbers</a>
            <a href="">Emails</a>
            <a href="">Social Support</a>
            <a href="">Location</a>
            
        </div>

    </article>

    <article class="category_con">

        <h4>PERMALINKS</h4>

        <div class="container footer_nav">
            <a href="index.php">Home</a>
            <a href="blog.php">blogs</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="contact.php">Contact</a>
            
        </div>

    </article>

    </div>

    <article class="copyrigh">
        <ul>
            <h5>&COPY;</h5>
            <h5>I-CREATE BLOGS</h5>
        </ul>
    </article>


    </footer>
    <!--  End footer  -->

    <script src= "<?= ROOT_URL ?>js/action.js"></script>
</body>
</html>