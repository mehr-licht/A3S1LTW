<?php
    include_once('../database/db_list.php');
    include_once('../templates/tpl_common.php');
    draw_header(NULL);
    if(isset($_GET['postId'])) {
        $post = getPostByID($_GET['postId']);
        print_r($post);?> 
        <section>
            <h1><?=$post['titulo']?></h1>
            <p>By <?=$post['iduser']?> | <?=$post[data]?></p>
            <p><?=$post['conteudo']?></p>
            <div>
                <span>Up: <?=$post['votesUp']?></span>
                <span>Down: <?=$post['votesDown']?></span>
            </div>
        </section>

        <section>
            <h2>Comments</h2>
            <?php
            $comments = getComments($_GET['postId']);
            print_r($comments);
            foreach ($comments as $comment) { ?>
                <article>
                    <header>
                        <span><?=$comment['iduser']?></span>
                        <span><?=$comment['data']?></span>
                    </header>
                    <p><?=$comment['comentConteudo']?></p>
                    <footer>
                        <span>Votes (soon)</span>
                        <span>Reply (soon)</span>
                    </footer>
                </article>
            <?php } ?>
        </section>
    <?php } ?>  