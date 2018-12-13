<?php 
include_once '../includes/session.php';
include_once '../templates/tpl_common.php';
include_once '../includes/csrf.class.php';

if (!isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

$csrf = new csrf();
    // Generate Token Id and Valid
   $token_id = $csrf->get_token_id();
   $token_value = $csrf->get_token($token_id);

$username=$_SESSION['username'];
draw_header($username);

//if( $_SESSION['signup']['type'] == 'error'){
//    die(header('Location: ../pages/signup.php'));
//}

?>

<div>
    <form action="../actions/action_post.php" enctype="multipart/form-data">
        <p>
        <label id="postTitle" class="createtitle" >
            <input type="text" name="titulo" placeholder="Title">
        </label></p>
        
        <p>
        <label id="postContent" class="createpost">
        <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
            <input type="text" name="content" placeholder="Drop your post here">
        </label>
        </p>
        <!-- <div class="profile edit avatar hide" id="imageEdit"> -->
            <input type="file" name="imageToUpload" id="imageToUpLoad" accept="image/jpg, image/jpeg">
        <!--    <button type="submit" class="button" formaction="../actions/action_post.php" formmethod="post" value="Upload">Upload</button>
         </div> --->
            <button id="buttonSubmit" name="submit" type="submmit" formaction="../actions/action_post.php" formmethod="post">Post Me!</button>
        </p>
    </form>
</div>


<?php
  draw_footer();
?>