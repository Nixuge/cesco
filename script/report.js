function report(postid){
    const reasonUser = prompt("Quel est le problème ?");

    $.post("api/report.php", {
        post_id: postid,
        reason: reasonUser
    })
    .done(function(response) {
        alert("Votre signalement à bien été reçu. Merci.")
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Vote failed:", errorThrown); 
        alert("An error occurred while voting. Please try again later."); 
    });

}