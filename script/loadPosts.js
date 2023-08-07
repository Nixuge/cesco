function formatePosts(posts, without_root_div) {
    const container = document.createElement('div'); 
    posts.forEach(post => {
        const postDiv = formatePost(without_root_div, post.content, post.author, post.date, post.ID, post.votes_positives_count, post.votes_neutrals_count, post.votes_negatives_count);
        container.appendChild(postDiv); 
    });

    return container.innerHTML; 
}

function formatePost(without_root_div, content, author, date, ID, positives_votes, neutral_votes, negative_votes) {
    // Create main container div
    const postDiv = document.createElement('div');
    postDiv.classList.add('post');
    postDiv.id = `post_${ID}`;

    // Create left-post div
    const leftPostDiv = document.createElement('div');
    leftPostDiv.classList.add('left-post');
    
    // Create profile image
    const profileImg = document.createElement('img');
    profileImg.src = 'images/example.png';
    profileImg.alt = 'profile.picture';
    profileImg.classList.add('post-profile');
    leftPostDiv.appendChild(profileImg);

    // Create post-buttons div
    const postButtonsDiv = document.createElement('div');
    postButtonsDiv.classList.add('post-buttons');
    
    // Create vote buttons
    for (let i = 2; i >= 0; i--) {
        const button = document.createElement('button');
        button.classList.add('action-button');
        if (i === 2) {
            button.classList.add('up-action-button');
            button.innerHTML = '<p class="action-button-text">↑</p>';
        } else if (i === 1) {
            button.classList.add('multi-action-button');
            button.innerHTML = '<p class="action-button-text">↕</p>';
        } else {
            button.classList.add('down-action-button');
            button.innerHTML = '<p class="action-button-text">↓</p>';
        }
        button.onclick = () => vote(ID, i);
        postButtonsDiv.appendChild(button);
    }
    
    // Create warning button
    const warnButton = document.createElement('button');
    warnButton.classList.add('action-button', 'warn-action-button');
    warnButton.innerHTML = '<p class="action-button-text">!</p>';
    postButtonsDiv.appendChild(warnButton);

    // Create delete button
    const delButton = document.createElement('button');
    delButton.classList.add('action-button', 'del-action-button');
    delButton.innerHTML = '<p class="action-button-text">X</p>';
    postButtonsDiv.appendChild(delButton);

    leftPostDiv.appendChild(postButtonsDiv);
    postDiv.appendChild(leftPostDiv);

    // Create mid-post div
    const midPostDiv = document.createElement('div');
    midPostDiv.classList.add('mid-post');

    // Create header div
    const headerDiv = document.createElement('div');
    headerDiv.classList.add('header');
    
    // Create author name
    const authorName = document.createElement('p');
    authorName.classList.add('name-post');
    authorName.textContent = `@${author}`;
    headerDiv.appendChild(authorName);

    // Create separator dash
    const separatorDash = document.createElement('p');
    separatorDash.classList.add('separator-dash');
    separatorDash.textContent = '-';
    headerDiv.appendChild(separatorDash);

    // Create post date
    const postDate = document.createElement('p');
    postDate.classList.add('date-post');
    postDate.textContent = date;
    headerDiv.appendChild(postDate);

    midPostDiv.appendChild(headerDiv);

    // Create votesCount div
    const votesCountDiv = document.createElement('div');
    votesCountDiv.classList.add('votesCount');
    
    // Create vote count paragraphs
    const voteCountTypes = ['↑', '↕', '↓'];
    const voteCountValues = [positives_votes, neutral_votes, negative_votes];
    for (let i = 0; i < voteCountTypes.length; i++) {
        const voteCountChild = document.createElement('p');
        voteCountChild.classList.add('votesCountChild');
        voteCountChild.textContent = `${voteCountTypes[i]} ${voteCountValues[i]}`;
        votesCountDiv.appendChild(voteCountChild);
    }
    
    midPostDiv.appendChild(votesCountDiv);

    // Create content paragraph
    const contentParagraph = document.createElement('p');
    contentParagraph.classList.add('text-post');
    contentParagraph.textContent = content;
    midPostDiv.appendChild(contentParagraph);

    postDiv.appendChild(midPostDiv);

    return postDiv;
}



function updatePost(ID){
    $.ajax({
        url: "api/posts.php",
        type: "GET",
        data: {
            id: ID,
        },
        dataType: "json",
        success: function(data) {
            $("#post_" + ID).html(formatePosts(data, true));
        },
        error: function() {
            alert("Error with loading posts.");
        }
    });

}

$(document).ready(function() {
    $.ajax({
        url: "api/posts.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            $("#theZone").html(formatePosts(data, false));
        },
        error: function() {
            alert("Error with loading posts.");
        }
    });
});
