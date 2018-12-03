<?php
    include_once('../database/db_list.php');
    include_once('../templates/tpl_common.php');
    
    echo $GET['postId'];
    if(isset($GET['postId'])) {
        echo $GET['postId'];
        echo getPostByID($GET['postId']);
    }
?>  