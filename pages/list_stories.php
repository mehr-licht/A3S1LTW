
<?php
    include_once '../includes/session.php';
    include_once '../templates/tpl_common.php';
    include_once '../templates/tpl_auth.php';
    include_once '../database/dbPosts.php';
    
    
    //Verify if user is logged in
    if (checkTimeout() || !isset($_SESSION['username'])){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Session time-out. Please log in again!');
        die(header('Location: ../pages/login.php'));
    }
    
    regenerateSession();
 
    draw_header($_SESSION['username']);
  
?>  
<script src="../js/post.js"></script>
<link href="/css/post.css" type="text/css" rel="stylesheet">
<body>
    <section id="stories">
    <div class="pill-nav">
       
        <a href="/pages/list_stories.php?sort=mostRecent" id="mRecent" class=<?= (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == 'mostRecent')) ? "order" : "active" ?>
        >Most recent</a>
        <a href="/pages/list_stories.php?sort=mostVoted" id="mVoted" class=<?= (isset($_GET['sort']) && $_GET['sort'] == 'mostVoted') ? "order" : "active" ?>>Most Voted</a>
        <a href="/pages/list_stories.php?sort=mostComent" id="mComent" class=<?= (isset($_GET['sort']) && $_GET['sort'] == 'mostComent') ? "order" : "active" ?>>Most commented</a>
    </div>
        <?php //get kind of sort chosen
            if( !isset($_GET['sort']) ){
                $futureArray = getAllPostsOrderByDate();
            }elseif( $_GET['sort'] == 'mostRecent'   ){
                $futureArray = getAllPostsOrderByDate(); 
            }elseif(    $_GET['sort'] == 'mostVoted'    ){
                $futureArray =  getAllPostsOrderByMostVoted();
            }elseif(  $_GET['sort'] == 'mostComent'   ){
                $futureArray =  getAllPostsOrderByMostComent();
            }
            
            foreach( $futureArray as $post) { 
                // get user vote on this post
                $vote = getPostVoteByUser($post['idPost'], $_SESSION['username']);
                ?>
                <article class="post preview" --data-id-post="<?= $post['idPost'] ?>">
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
                    <div class="content">
                        <h1 title="<?=$post['title']?>"><?=$post['title']?></h1>
                        <div>
                            <span><span class="author"><a href="/pages/profile.php?user=<?= $post['idUser']?>"><?=$post['idUser']?></a></span> <span class="date">• <?=$post['date']?></span></span>
                            <p>
                                <?php if(isset($post['image'])) { ?>
                                    <a href="<?=$post['image']?>"><img class="thumb" src="<?=$post['image']?>"></a>
                                <?php } else { ?>
                                <img class="thumb" src="/res/default-thumb.png">
                                <?php } ?>
                                <span><?=$post['content']?></span>
                            </p>
                        </div>
                        <div class="more"><a href="postView.php?postId=<?=$post['idPost']?>">Read More</a></div>
                    </div>
                </article>
            <?php } ?>
    </section>
</body>
<?php
    draw_footer();
?>