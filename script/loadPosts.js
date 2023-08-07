function createPostButtons(ID) {
    const postButtonsDiv = document.createElement('div');
    postButtonsDiv.classList.add('post-buttons');

    const buttonLabels = ['↑', '↕', '↓'];
    for (let i = 2; i >= 0; i--) {
        const button = document.createElement('button');
        button.classList.add('action-button', i === 2 ? 'up-action-button' : (i === 1 ? 'multi-action-button' : 'down-action-button'));
        button.innerHTML = `<p class="action-button-text">${buttonLabels[i]}</p>`;
        button.onclick = () => vote(ID, i);
        postButtonsDiv.appendChild(button);
    }

    const warnButton = document.createElement('button');
    warnButton.classList.add('action-button', 'warn-action-button');
    warnButton.innerHTML = '<p class="action-button-text">!</p>';
    postButtonsDiv.appendChild(warnButton);

    const delButton = document.createElement('button');
    delButton.classList.add('action-button', 'del-action-button');
    delButton.innerHTML = '<p class="action-button-text">X</p>';
    postButtonsDiv.appendChild(delButton);

    return postButtonsDiv;
}

function createPostHeader(author, date) {
    const headerDiv = document.createElement('div');
    headerDiv.classList.add('header');

    const authorName = document.createElement('p');
    authorName.classList.add('name-post');
    authorName.textContent = `@${author}`;
    headerDiv.appendChild(authorName);

    const separatorDash = document.createElement('p');
    separatorDash.classList.add('separator-dash');
    separatorDash.textContent = '-';
    headerDiv.appendChild(separatorDash);

    const postDate = document.createElement('p');
    postDate.classList.add('date-post');
    postDate.textContent = date;
    headerDiv.appendChild(postDate);

    return headerDiv;
}

function createVotesCount(votes) {
    const votesCountDiv = document.createElement('div');
    votesCountDiv.classList.add('votesCount');

    const voteCountTypes = ['↑', '↕', '↓'];
    for (let i = 0; i < voteCountTypes.length; i++) {
        const voteCountChild = document.createElement('p');
        voteCountChild.classList.add('votesCountChild');
        voteCountChild.textContent = `${voteCountTypes[i]} ${votes[i]}`;
        votesCountDiv.appendChild(voteCountChild);
    }

    return votesCountDiv;
}

function createPost(content, ID, author, date, votes) {
    const postDiv = document.createElement('div');
    postDiv.classList.add('post');
    postDiv.id = `post_${ID}`;

    const leftPostDiv = document.createElement('div');
    leftPostDiv.classList.add('left-post');

    // ... Create profile image and append

    const postButtonsDiv = createPostButtons(ID);
    leftPostDiv.appendChild(postButtonsDiv);
    postDiv.appendChild(leftPostDiv);

    const midPostDiv = document.createElement('div');
    midPostDiv.classList.add('mid-post');

    const headerDiv = createPostHeader(author, date);
    midPostDiv.appendChild(headerDiv);

    const votesCountDiv = createVotesCount(votes);
    midPostDiv.appendChild(votesCountDiv);

    const contentParagraph = document.createElement('p');
    contentParagraph.classList.add('text-post');
    contentParagraph.textContent = content;
    midPostDiv.appendChild(contentParagraph);

    postDiv.appendChild(midPostDiv);

    return postDiv;
}

function formatPosts(posts, without_root_div) {
    const container = document.createElement('div');
    posts.forEach(post => {
        const postDiv = createPost(post.content, post.ID, [post.votes_positives_count, post.votes_neutrals_count, post.votes_negatives_count]);
        container.appendChild(postDiv);
    });

    return without_root_div ? container.innerHTML : container;
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
            $("#post_" + ID).html(formatPosts(data, true));
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
            $("#theZone").html(formatPosts(data, false));
        },
        error: function() {
            alert("Error with loading posts.");
        }
    });
});
