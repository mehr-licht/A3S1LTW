<?php
    include_once '../includes/session.php';
    include_once '../database/dbPosts.php';
    include_once '../templates/tpl_common.php';
    include_once '../templates/tpl_comment.php';


    if (checkTimeout() || !isset($_SESSION['username'])){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Session time-out. Please log in again!');
    die(header('Location: ../pages/login.php'));
    }
    
    regenerateSession();
      
    draw_header($_SESSION['username']);
    

    if(isset($_GET['postId'])) {
        $post = getPostByID(trimAndStripHtmlPHPtags($_GET['postId']));
    } else {
    }
   
    $vote = getPostVoteByUser(trimAndStripHtmlPHPtags($_GET['postId']), $_SESSION['username']);
?>
<script src="../js/post.js"></script>
<!-- the post content section -->
<section id="post_view" class="post view" --data-id-post="<?=$post['idPost']?>">
    <aside class="votes">
        <svg class="votes upvote <?= ($vote > 0) ? 'active' : '' ?>" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444.819px" height="444.819px" viewBox="0 0 444.819 444.819">
            <g><!-- up arrow svg -->
                <path d="M433.968,278.657L248.387,92.79c-7.419-7.044-16.08-10.566-25.977-10.566c-10.088,0-18.652,3.521-25.697,10.566
                    L10.848,278.657C3.615,285.887,0,294.549,0,304.637c0,10.28,3.619,18.843,10.848,25.693l21.411,21.413
                    c6.854,7.23,15.42,10.852,25.697,10.852c10.278,0,18.842-3.621,25.697-10.852L222.41,213.271L361.168,351.74
                    c6.848,7.228,15.413,10.852,25.7,10.852c10.082,0,18.747-3.624,25.975-10.852l21.409-21.412
                    c7.043-7.043,10.567-15.608,10.567-25.693C444.819,294.545,441.205,285.884,433.968,278.657z"/>
            </g>
        </svg>
        <span><?=isset($post['points']) ? $post['points'] : 0 ?></span>
        <svg class="votes downvote <?= ($vote < 0) ? 'active' : '' ?>" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444.819px" height="444.819px" viewBox="0 0 444.819 444.819">
            <g><!-- down arrow svg -->
                <path d="M434.252,114.203l-21.409-21.416c-7.419-7.04-16.084-10.561-25.975-10.561c-10.095,0-18.657,3.521-25.7,10.561
                    L222.41,231.549L83.653,92.791c-7.042-7.04-15.606-10.561-25.697-10.561c-9.896,0-18.559,3.521-25.979,10.561l-21.128,21.416
                    C3.615,121.436,0,130.099,0,140.188c0,10.277,3.619,18.842,10.848,25.693l185.864,185.865c6.855,7.23,15.416,10.848,25.697,10.848
                    c10.088,0,18.75-3.617,25.977-10.848l185.865-185.865c7.043-7.044,10.567-15.608,10.567-25.693
                    C444.819,130.287,441.295,121.629,434.252,114.203z"/>
            </g>
        </svg>
    </aside>
    <!-- post details and content -->
    <article class="content">
        <h1><?=$post['title']?></h1>
        <p> Published by
        <a href="/pages/profile.php?user=<?= $post['idUser']?>">
            <span class="author"><?=$post['idUser']?></span>
            <span class="rating">• </a><?= processingGetPoints($post['idUser'])?> points</span>
            <span class="date">• 
                        <?php 
                          if(substr($post['date'], 0, strrpos($post['date'], ':') )){
                          echo substr($post['date'], 0, strrpos($post['date'], ':') ); 
                        }else{
                            echo $post['date']  ;
                          } ?></span>
        </p>
        <?php 

$imageName = substr(strrchr($post['image'], "/"), 1);
$imagePath = substr($post['image'], 0, strrpos($post['image'], '/') );
$thumbsURL = $imagePath . '/thumb_' . $imageName;

        if(file_exists($post['image'])) { ?><p>
        <a href="<?=$post['image'] ?>"><img alt="Post thumbnail" <?php
        if(file_exists($thumbsURL)) {
           ?> src="<?=$thumbsURL?>"<?php
        }else{
            ?> src="<?=$post['image']?>"<?php
        }
               
        ?> height="200"></a>
        <?php } ?> 
        <?=$post['content']?></p>
    </article>
</section id="postReply">

<!-- post comments -->
<?php 
    $postComments = getCommentsByPost(trimAndStripHtmlPHPtags($_GET['postId']));

  
?>

<section id="comments"  --data-last-comment="<?php
if(count( $postComments)){
$postComments[0]['idComent'];
} ?>" --data-post-id="<?=trimAndStripHtmlPHPtags($_GET['postId'])?>">
    <h1>Comments:</h1> 
    <section>
        <textarea id="comment_txt" placeholder="New comments go here" rows="auto"></textarea>
        <input type="hidden" name="<?=$_SESSION['token_id']?>" value="<?=$_SESSION['token_value']?>"/>
        <button id="submit_comment_btn">Submit</button>
    </section>
    <?php if(count( $postComments)){
    foreach(getCommentsByPost(trimAndStripHtmlPHPtags($_GET['postId'])) as $comment) {
     
                          if(substr($post['date'], 0, strrpos($post['date'], ':') )){
                          $dataecho= substr($post['date'], 0, strrpos($post['date'], ':') ); 
                        }else{
                            $dataecho= $post['date']  ;
                          } 
        draw_comment($comment['idComent'], $comment['idUser'], $comment['comentContent'], $dataecho);
    } } ?>
</section>

    <?php 
draw_footer();
?>