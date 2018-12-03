document.addEventListener('DOMContentLoaded', function() {
    $allArticles = document.getElementsByTagName('article');
    console.log($allArticles);
    for($article of $allArticles) {
        $article.children[2].addEventListener('click', () => {
            xmlhttp= new XMLHttpRequest();
            id = $article.getAttribute('--data-postid');
            xmlhttp.open('GET', 'view_post.php?postId=' + id);
            xmlhttp.send();
            xmlhttp.close;
        });
    } 
}, false);