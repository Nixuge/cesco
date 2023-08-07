function vote(postId, vote_type){
    $.post("api/newVote.php",
        {
            post_id: postId,
            type: vote_type
        }
    )
}