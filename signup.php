
<?php 
    
    require 'config/constants.php';

    //get back form data if there was a registration error
    $firstname = $_SESSION['signup-data']['firstname'] ?? null;
    $lastname = $_SESSION['signup-data']['lastname']?? null;
    $username = $_SESSION['signup-data']['username'] ?? null;
    $email = $_SESSION['signup-data']['email'] ?? null;
    $createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
    $confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
    $avatar = $_SESSION['signup-data']['avatar'] ?? null;
    //delete signup data session
    unset($_SESSION['signup-data']);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>


<section class="form_section">
    <div class="container form_section_container">
        <h2>Sign up</h2>
        <?php
            if(isset($_SESSION['signup'])) :
        ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
            

        </div>
        <?php endif ?>

        <form action="<?=ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="First Last">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
            <input type="text" name="email" value="<?= $email ?>" placeholder="email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>"  placeholder="Create Password">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
            
            <div class="form_control">
                <label for="avatar" >User Avatar</label>
                <input type="file" name="avatar" value=<?= "$avatar" ?> id="avatar">
            </div>
            <button class="category_btn" type="submit" name="submit">Sign Up</button>
            <small >Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>

</body>

</html>