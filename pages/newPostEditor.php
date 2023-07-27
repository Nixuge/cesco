<?php 
include_once("config.php"); 
if (!isset($_SESSION["userId"])) { 
    header("location: index.php?p=signin"); 
} 
?> 
<form action="api/newPost.php" method="post"> 
    <textarea name="postEditorTextArea" id="postEditorTextArea" minlength="2" maxlength="<?php echo MAX_POSTS_LENGTH; ?>" cols="30" rows="10"></textarea> 
    <p id="postLength"></p> 
    <button type="submit">PUBLISH TO THE INTERNET</button> 
</form> 

<script> 
    const postLength = document.getElementById("postLength"); 
    const maxlength = <?php echo MAX_POSTS_LENGTH; ?>; 
    const postEditorTextArea = document.getElementById("postEditorTextArea"); 

    postEditorTextArea.addEventListener("input", function(e){ 
        
        const currentLength = e.target.value.length; 
        postLength.textContent = `${currentLength} / ${maxlength}`; 

        if (currentLength > maxlength) { 
            postLength.style.color = "red"; 
        } else { 
            postLength.style.color = "white"; 
        } 
    }); 
</script>
