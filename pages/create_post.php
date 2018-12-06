<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../database/db_list.php');

if (!isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

$username=$_SESSION['username'];
draw_header($username);

//$user_array=getUserInformation($username);
//print_r($user_array[0]); //em vez de echo var, print_r(var) imprime partes de arrays  

//DEBUG
//$today = date("d-m-Y", $timestamp = time());                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
//print_r("$today"); 

//print_r($_SESSION['signup'][0]['type']);

if( $_SESSION['signup'][0]['type'] == 'error'){
    die(header('Location: ../pages/signup.php'));
}

?>

<div>
    <form action="/action_page.php">
        <label id="postTitle" class="pTitle">Title:
            <input type="text" name="titulo">
        </label></p>
        <!-- //tyle="width:200px; height:600px" -->
        <textarea id="newpost" name="newestpost" maxlength=512>Drop your post here.
        </textarea>
        <button id="buttonSubmit" type="submmit" formaction="../actions/action_post.php" formmethod="post">Post Me!</button>
        
    </form>
</div>



<link href="../css/list_news.css" type="text/css" rel="stylesheet">
    <section id="stories">
        <?php 
            // ou podemos subsituir a funcao em baixo por getAllPostsUSER($_SESSION['username'] 
            foreach(getAllPostsOrderByDate() as $post) {
                echo 
                "<article --data-postid=\"$post[idPost]\">
                    <h1>$post[titulo]</h1>
                    <div class=\"post_content\">
                        <div class=\"post_votes\">
                            <div>Up: $post[votesUp]</div>
                            <div>Down: $post[votesDown]</div>
                        </div>
                        <img alt=\"Some random image\" src=\"https://picsum.photos/200\">
                        <p>$post[conteudo]</p>
                    </div>
                    <a href=\"postView.php?postId=$post[idPost]\">Read More</a>
                </article>";
            }
        ?>
    </section>



<?
  draw_footer();
?>