function vote(postId, vote_type) {
    $.post("api/newVote.php", {
        post_id: postId,
        type: vote_type
    })
    .done(function(response) {
        updatePost(postId)
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Vote failed:", errorThrown); 
        alert("An error occurred while voting. Please try again later."); 
    });
}
