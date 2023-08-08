<?php 
include_once("config.php"); 
if (!isset($_SESSION["userId"])) { 
    header("location: index.php?p=signin"); 
} 
?> 
<form class="main-form" action="api/newPost.php" method="post"> 
    <textarea class="new-area" name="postEditorTextArea" id="postEditorTextArea" minlength="2" maxlength="<?php echo MAX_POSTS_LENGTH; ?>"></textarea> 
    <div class="sub-area">
        <p class="text-length" id="postLength"></p>
        <div class="sub-buttons">
            <button class="sub-button">Images</button>
            <button class="sub-button">Gras</button>
            <button class="sub-button">Italique</button>
            <button class="sub-button">Souligné</button>
        </div>
    </div> 
    <button class="send" type="submit">Publish</button> 
</form> 

<script> 
    const postLength = document.getElementById("postLength"); 
    const maxlength = <?php echo MAX_POSTS_LENGTH; ?>; 
    const postEditorTextArea = document.getElementById("postEditorTextArea"); 

    postEditorTextArea.addEventListener("input", function(e){ 
        
        const currentLength = e.target.value.length; 
        postLength.textContent = `${currentLength} / ${maxlength}`; 

        if (currentLength >= maxlength) { 
            postLength.style.color = "red";
        } else if (currentLength < 1) {
            postLength.style.display = "none";
        }
        else { 
            postLength.style.color = "white";
            postLength.style.display = "block";
        } 
    }); 
</script>
