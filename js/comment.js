'use strict';

const HTTPREQUEST_STATE_DONE = 4;

function api_user_commented_post(postId, comment) {
    let xmlhttp = new XMLHttpRequest();

    // callback for handling the request response
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === HTTPREQUEST_STATE_DONE) {
            let response = xmlhttp.response; // Javascript object (json)
            if(response.code === 0) {
                document.querySelector('#comments > section').insertAdjacentHTML('afterend', response.comment_HTML);
            } else {
                alert(`Something went wrong (${response.code}): ${response.description}`);
            }
        }
    }
    xmlhttp.open('POST', '../api/post_comment.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    xmlhttp.responseType = "json";
    xmlhttp.send(JSON.stringify({
        id_post: postId,
        comment: comment
    }));
}


document.addEventListener('DOMContentLoaded', function() {
    // Add click event for submit new comment
    let btn = document.getElementById('submit_comment_btn');
    if(btn === null) return; // button doesn't exist
    let postId = (document.getElementById('comments')).getAttribute('--data-post-id');
    btn.addEventListener('click', function(ev) {
        // api call goes here
        let comment_txt = document.getElementById('comment_txt');
        if(comment_txt == null)
            throw "Expected textarea with id = 'comment_txt'";
        api_user_commented_post(postId, comment_txt.value);
    });
}, false);