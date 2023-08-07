function formatePosts(posts) {
    console.log(posts)
    let html = '';
    posts.forEach(post => {
        html += formatePost(post.content, post.author, post.date, post)
    });

    return html;
}

function formatePost(content, author, date, ID){
    return (`
        <div class='post'>
            <div class='left-post'>
                <img src='images/example.png' alt='profile.picture' class='post-profile'>
                <div class='post-buttons'>
                    <button onclick='vote(${ID}, 2)' class='action-button up-action-button'><p class='action-button-text'>↑</p></button>
                    <button onclick='vote(${ID}, 1)' class='action-button multi-action-button'><p class='action-button-text'>↕</p></button>
                    <button onclick='vote(${ID}, 0)' class='action-button down-action-button'><p class='action-button-text'>↓</p></button>
                    <button class='action-button warn-action-button'><p class='action-button-text'>!</p></button>
                    <button class='action-button del-action-button'><p class='action-button-text'>X</p></button>
                </div>
            </div>
            <div class='mid-post'>
                <div class='header'>
                    <p class='name-post'>@${author}</p>
                    <p class='separator-dash'>-</p>
                    <p class='date-post'>${date}</p>
                </div>
                <p class='text-post'>${content}</p>
            </div>
        </div>
    `);
}

$(document).ready(function() {
    $.ajax({
        url: "api/posts.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            $("#theZone").html(formatePosts(data));
        },
        error: function() {
            alert("Error with loading posts.");
        }
    });
});
