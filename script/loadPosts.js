function formatePosts(posts, withPostDiv, isModerator) {
    let html = '';
    let postHtml
    let postDiv
    posts.forEach(post => {
        postHtml = formatePost(post.content, post.author, post.date, post.ID, post.votes_positives_count, post.votes_neutrals_count, post.votes_negatives_count);
        if (withPostDiv) {
            postDiv = document.createElement('div');
            postDiv.setAttribute("id", "post_" + post.ID);
            postDiv.innerHTML = postHtml;;
            html += postDiv.outerHTML; 
        }else{
            html += postHtml
        }
    });
    
    return html;
}

function formatePost(content, author, date, ID, positivesVotes, neutralVotes, negativeVotes, ismoderator) {
    let moderatorActionButton

    if (ismoderator) {
        moderatorActionButton = '<button class="action-button del-action-button"><p class="action-button-text">X</p></button>';
    }else{
        moderatorActionButton = "";
    }


    return `
        <div class="post">
            <div class="left-post">
                <img src="images/example.png" alt="profile.picture" class="post-profile">
                <div class="post-buttons">
                    <button onclick="vote(${ID}, 2)" class="action-button up-action-button"><p class="action-button-text">↑</p></button>
                    <button onclick="vote(${ID}, 1)" class="action-button multi-action-button"><p class="action-button-text">↕</p></button>
                    <button onclick="vote(${ID}, 0)" class="action-button down-action-button"><p class="action-button-text">↓</p></button>
                    <button class="action-button warn-action-button"><p class="action-button-text">!</p></button>
                    ${moderatorActionButton}

                </div>
            </div>
            <div class="mid-post">
                <div class="header">
                    <p class="name-post">@${author}</p>
                    <p class="separator-dash">-</p>
                    <p class="date-post">${date}</p>
                </div>
                <div class="votesCount">
                    <p class="votesCountChild">↑ ${positivesVotes}</p>
                    <p class="votesCountChild">↕ ${neutralVotes}</p>
                    <p class="votesCountChild">↓ ${negativeVotes}</p>
                </div>
                <p class="text-post">${content}</p>
            </div>
        </div>
    `;
}

function updatePost(ID) {
    $.ajax({
        url: "api/posts.php",
        type: "GET",
        data: {
            id: ID,
        },
        dataType: "json",
        success: function(data) {
            $("#post_" + ID).html(formatePosts(data, false));
        },
        error: function() {
            alert("Error loading posts.");
        }
    });
}

function getSessionInfo(){
    $.ajax({
        url: "api/getMySessionInfos.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            return data;
        },
        error: function() {
            alert("Error getting api/getMySessionInfos.php.");
        }
    });

}

$(document).ready(function() {
    $.ajax({
        url: "api/posts.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            let sessionInfo = getSessionInfo();
            let isModerator = sessionInfo.isModerator
            $("#theZone").html(formatePosts(data, true, isModerator));
        },
        error: function() {
            alert("Error loading posts.");
        }
    });
});
isModeratorismoderator