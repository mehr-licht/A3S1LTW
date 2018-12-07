<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');

if (!isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

$username=$_SESSION['username'];
draw_header($username);

//if( $_SESSION['signup']['type'] == 'error'){
//    die(header('Location: ../pages/signup.php'));
//}

?>

<div>
    <form action="/action_page.php">
        <p>
        <label id="postTitle" class="createtitle" >
            <input type="text" name="titulo" placeholder="Title">
        </label></p>
        
        <p>
        <label id="postContent" class="createpost">
            <input type="text" name="content" placeholder="Drop your post here">
        </label>
        </p>

        
        <label id="postContent" class="createpost" >
            <input type="file"/>
        </label>
        
        <button id="buttonSubmit" type="submmit" formaction="../actions/action_post.php" formmethod="post">Post Me!</button>
        </p>
    </form>
</div>


<?php
  draw_footer();
?>