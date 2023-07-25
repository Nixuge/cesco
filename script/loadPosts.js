function formatePosts(posts) {
    console.log(posts)
    let html = '';
    posts.forEach(post => {
        html += formatePost(post.content, post.author, post.date)
    });

    return html;
}

function formatePost(content, author, date){
    return(`
        <div class='post'>
            <div class='info-post'>
                <img src='images/example.png' alt='profile.picture' class='post-profile'>
                <div class='name-date-post'>
                    <p class='name-post'>${author}</p>
                    <p class='date-post'>${date}</p>
                </div>
            </div>
            <div class='line'></div>
            <p class='text-post'>${content}</p>

            <div class='post-footer'>
                <button class='button-bottom'><p class='button-bottom-text'>!</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>X</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↑</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↕</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↓</p></button>
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
