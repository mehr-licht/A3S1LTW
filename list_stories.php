<?php
    include_once('database/db_list.php');
    include_once('templates/tpl_common.php');
    draw_header(null);
?>  
    <link href="css/list_news.css" type="text/css" rel="stylesheet">
    <section id="stories">
        <?php 
            foreach(getAllPostsOrderByDate() as $post) {
                echo 
                "<article>
                    <h1>$post[titulo]</h1>
                    <div class=\"post_content\">
                        <div class=\"post_votes\">
                            <div>Up: $post[votesUp]</div>
                            <div>Down: $post[votesDown]</div>
                        </div>
                        <img alt=\"Some random image\" src=\"https://picsum.photos/200\">
                        <p>$post[conteudo]</p>
                    </div>
                </article>";
            }
        ?>
    </section>

    <aside>
        <p>aside</p>
    </aside>

<?php
    draw_footer();
?>