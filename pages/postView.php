<?php
    include_once('../database/dbPosts.php');
    include_once('../templates/tpl_common.php');
    draw_header(NULL);
    if(isset($_GET['postId'])) {
        $post = getPostByID($_GET['postId']);
        print_r($post);
        echo 
        "<h1>$post[title]</h1>
        <p>$post[content]</p>
        ";
    }
?>  