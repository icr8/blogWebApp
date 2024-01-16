<?php 
    include 'partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        //feetch category from database
        $query = "SELECT * FROM categories WHERE id=$id";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)==1){
            $category = mysqli_fetch_assoc($result);
        }
    }
    else{
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
        die();
    }
?>


<section class="form_section">
    <div class="container form_section_container">
        <h2>Edit Category</h2>
        

        <form action="<?php ROOT_URL ?>edit-category-logic.php" method="POST">

        <input type="hidden" name="id" value="<?= $category['id']?>" >
            <input type="text" name="title" value="<?= $category['title']?>" placeholder="title">
            <textarea rows="4" name="description" placeholder="Discription"><?= $category['description'] ?></textarea>
            
            
            <button class="category_btn" name="submit" type="submit">Update Category</button>
            
        </form>
    </div>
</section>


<?php 
    include 'partials/footer.php';
?>