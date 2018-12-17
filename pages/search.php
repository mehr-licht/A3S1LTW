<?php
include_once '../includes/session.php';
include_once '../database/db_user.php';
include_once '../database/dbPosts.php';
include_once '../templates/tpl_common.php';


if (!isset($_SESSION['token_id'])) {
  $idSession = $_SESSION['token_id'];
  if (!validateToken($idSession, trimAndStripHtmlPHPtags($_POST[$idSession]))) {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid session token!');
      die(header('Location: ../pages/login.php'));
  }
}

if (checkTimeout() || !isset($_SESSION['username'])){
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Session time-out. Please log in again!');
  die(header('Location: ../pages/login.php'));
}

regenerateSession();

draw_header($_SESSION['username']);

draw_results(trimAndStripHtmlPHPtags($_GET['choice']),trimAndStripHtmlPHPtags($_GET['search']));

 /**
         * Draws the results of the search query.
         * @param choice type of choice: any,users,posts,comments
         * @param search pattern to search
         */
        function draw_results($choice,$search){
          switch ($choice) {
              case 'users': ?>
<!-- list of Users-->

<body>
    <section id="users">
        <div class="users">
            <?php $users = searchUser($search); 
              if (count($users)) { ?>
            <h1>Users</h1>
            <?php  foreach ($users as $user) { ?>
            <article class="userSearch">
                <div class="<?= $user['username'] ?>">
                    <a href="../pages/profile.php?user=<?= $user['username'] ?>">
                        <?= $user['username']; ?></a>
                </div>
            </article>
            <?php 
            }  } ?>
        </div>
    </section>
    <?php
                          break;
                      case 'comments': ?>
    <!-- list of Comments-->
    <section id="comments">
        <div class="comments">
            <?php $allComments = searchComents($search); ?>
            <?php if(count($allComments)) { ?>
            <h1>Comments:</h1>
            <?php foreach ($allComments as $comment) { ?>
            <article class="commentSearch">
                <div class="<?= $comment['idComent'] ?>">
                    <a href="../pages/postView.php?postId=<?= $comment['idPost'] ?>#<?= $comment['idComent'] ?>">
                        <?= $comment['idComent']; ?> :
                        <?= substr($comment['comentContent'], 0, 50) ?> • </a>
                        <?php 
                          if(substr($comment['data'], 0, strrpos( $comment['data'], ':') )){
                          echo substr($comment['data'], 0, strrpos( $comment['data'], ':') ); 
                        }else{
                            echo $comment['data']  ;
                          } ?>
                </div>
            </article>
            <?php 
             } } ?>
        </div>
    </section>
    <?php
                          break;
                      case 'posts': ?>
    <!-- list of Posts-->
    <section id="posts">
        <div class="posts">
            <?php $allPosts = searchPosts($search); 
              if(count($allPosts)) { ?>
            <h1>Posts</h1>
            <?php foreach ($allPosts as $post) { ?>
            <article class="postSearch">
                <div class="<?= $post['title'] ?>">
                    <a href="../pages/postView.php?postId=<?= $post['idPost'] ?>">
                        <?= $post['title'] ?> </a>
                    <?= substr($post['date'], 0, strrpos( $post['date'], ':') ) ?>
                    <!-- plus votes? -->
                </div>
            </article>
            <?php 
                    }  } ?>
        </div>
    </section>
    <?php
                                  break;
                              case 'any': ?>
    <section id="users">
        <div class="users">
            <?php $users = searchUser($search); 
                        if(count($users)) { ?>
            <h1>
                <?=count($users)?> Users</h1>
            <?php foreach ($users as $user) { ?>
            <article class="userSearch">
                <div class="<?= $user['username'] ?>">
                    <a href="../pages/profile.php?user=<?= $user['username'] ?>">
                        <?= $user['username']; ?></a>
                </div>
            </article>
            <?php 
                    }  } ?>
        </div>
    </section>
    <section id="comments">
        <div class="comments">
            <?php $allComments = searchComments($search); 
          if(count($allComments)) { ?>
            <h1>
                <?=count($allComments)?> Comments</h1>
            <?php foreach ($allComments as $comment) { ?>
            <article class="commentSearch">
                <div class="<?= $comment['idComent'] ?>">
                    <a href="../pages/postView.php?postId=<?= $comment['idPost'] ?>#<?= $comment['idComent'] ?>">
                        <?= substr($comment['comentContent'], 0, 50) ?></a>
                    <?php 
                          if(substr($comment['data'], 0, strrpos( $comment['data'], ':') )){
                          echo substr($comment['data'], 0, strrpos( $comment['data'], ':') ); 
                        }else{
                            echo $comment['data']  ;
                          } ?>
                </div>
            </article>
            <?php 
              } } ?>
        </div>
    </section>
    <!-- list of Posts-->
    <section id="posts">
        <div class="posts">
            <?php $allPosts = searchPosts($search); 
              if(count($allPosts)) { ?>
            <h1>
                <?=count($allPosts)?> Posts</h1>
            <?php foreach ($allPosts as $post) { ?>
            <article class="postSearch">
                <div class="<?= $post['title'] ?>">
                    <a href="../pages/postView.php?postId=<?= $post['idPost'] ?>">
                        <?= $post['title'] ?>• </a>
                        <?php 
                          if(substr($post['date'], 0, strrpos($post['date'], ':') )){
                          echo substr($post['date'], 0, strrpos($post['date'], ':') ); 
                        }else{
                            echo $post['date']  ;
                          } ?>
                </div>
            </article>
            <?php 
                  } } ?>
        </div>
    </section>
</body>
<?php
                              break;
                          default:
                              break;
                      }
                  }
      
      

draw_footer();

?>