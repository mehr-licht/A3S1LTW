function userVoted(username, postId, vote) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', '/api/post_vote.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    xmlhttp.send(JSON.stringify({
        postId: postId,
        vote: vote,
        username: 'fabioD'
    }));
}

document.addEventListener('DOMContentLoaded', function() {

    let allArticles = document.querySelectorAll("#stories > article");

    for(let articleNode of allArticles) {
        let postId = articleNode.getAttribute("--data-id-post");
        let upvoteBtn = articleNode.querySelector(".votes.upvote");
        let downvoteBtn = articleNode.querySelector(".votes.downvote");
        console.log(upvoteBtn);
        upvoteBtn.addEventListener('click', function() {userVoted('fabioD', postId, 1)});
        downvoteBtn.addEventListener('click', function() {userVoted('fabioD', postId, -1)});
    }
}, false);

