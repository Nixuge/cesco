const MAX_POST_LENGHT = 1000
let content = ""
let contentLength = 0
const post_lenght_emp = document.getElementById("postLenght")
$('#editor')
.trumbowyg() 
.on('tbwchange', function(){
    content = $('#editor').trumbowyg('html').textContent;
    contentLength = content.length()
    post_lenght_emp.innerHTML(contentLength + "/" + MAX_POST_LENGHT)
});