function formatePosts(posts) {
    console.log(posts)
    let html = '';
    posts.forEach(post => {
        html += `<h3>${post.title}</h3>`
    });

    return html;
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
