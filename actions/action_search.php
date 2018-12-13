<?php
include_once '../includes/session.php';
include_once '../database/db_user.php';
include_once '../database/dbPosts.php';
include_once '../templates/tpl_common.php';


if (!isset($_SESSION['username'])) {
  die(header('Location: ../pages/login.php'));
}

draw_header($_SESSION['username']);


switch ($_GET['choice']) {
    case 'users': ?>
<!-- list of Users-->
<section id="users">
  <div class="users">
    <?php $users = searchUser($_GET['search']); 
    if (count($users)) ?> <h1>Users</h1> 
    <?php  foreach ($users as $user) { ?>
    <article class="userSearch">
      <div class="<?= $user['username'] ?>">
        <a href="../pages/profile.php?userId=<?= $user['username'] ?>#<?= $user['username'] ?>">
          <?= $user['username']; ?>
      </div>
    </article>
    <?php 
    } ?>
  </div>
</section>
<?php
                break;
            case 'comments': ?>
<!-- list of Comments-->
<section id="comments">
  <div class="comments">
    <?php $allComments = searchComents($_GET['search']); ?>
    <?php if(count($allComments)) ?> <h1>Comments:</h1> 
    <?php foreach ($allComments as $comment) { ?>
    <article class="commentSearch">
      <div class="<?= $comment['idComent'] ?>">
        <a href="../pages/postView.php?postId=<?= $comment['idPost'] ?>#<?= $comment['idComent'] ?>">
          <?= $comment['idComent']; ?> :
          <?= substr($comment['comentContent'], 0, 50) ?></a>• 
        <?= $comment['data'] ?>
        <!-- plus owner of post? -->
      </div>
    </article>
    <?php 
    } ?>
  </div>
</section>
<?php
                break;
            case 'posts': ?>
<!-- list of Posts-->
<section id="posts">
  <div class="posts">
    <?php $allPosts = searchPosts($_GET['search']); 
    if(count($allPosts)) ?> <h1>Posts</h1>
    <?php foreach ($allPosts as $post) { ?>
    <article class="postSearch">
      <div class="<?= $post['title'] ?>">
        <a href="../pages/postView.php?postId=<?= $post['idPost'] ?>">
          <?= $post['title'] ?> </a>
        <?= $post['date'] ?>
        <!-- plus votes? -->
      </div>
    </article>
    <?php 
            } ?>
  </div>
</section>
<?php
                        break;
                    case 'any': ?>
<section id="users">
  <div class="users">
    <?php $users = searchUser($_GET['search']); 
              if(count($users)) ?> <h1>Users</h1>
             <?php foreach ($users as $user) { ?>
    <article class="userSearch">
      <div class="<?= $user['username'] ?>">
        <a href="../pages/profile.php?userId=<?= $user['username'] ?>#<?= $user['username'] ?>">
          <?= $user['username']; ?>
      </div>
    </article>
    <?php 
            } ?>
  </div>
</section>
<section id="comments">
    <div class="comments">
    <?php $allComments = searchComments($_GET['search']); 
if(count($allComments)) ?> <h1>Comments</h1>
    <?php foreach ($allComments as $comment) { ?>
    <article class="commentSearch">
      <div class="<?= $comment['idComent'] ?>">
        <a href="../pages/postView.php?postId=<?= $comment['idPost'] ?>#<?= $comment['idComent'] ?>">
          <?= substr($comment['comentContent'], 0, 50) ?></a>
        <?= $comment['data'] ?>
        <!-- plus owner of post? -->
      </div>
    </article>
    <?php 
    } ?>
  </div>
</section>
<!-- list of Posts-->
<section id="posts">
  <div class="posts">
    <?php $allPosts = searchPosts($_GET['search']); 
    if(count($allPosts)) ?> <h1>Posts</h1>
    <?php foreach ($allPosts as $post) { ?>
    <article class="postSearch">
      <div class="<?= $post['title'] ?>">
        <a href="../pages/postView.php?postId=<?= $post['idPost'] ?>">
          <?= $post['title'] ?> </a>
        <?= $post['date'] ?>
        <!-- plus votes? -->
      </div>
    </article>
    <?php 
        } ?>
  </div>
</section>
<?php
                    break;
                default:
                    break;
            }

draw_footer();
?>