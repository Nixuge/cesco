const MAX_POST_LENGHT = 1000
let content = ""
let contentLength = 0
const stringToHtmlElement = document.createElement('div')
const post_lenght_emp = document.getElementById("postLenght")
var editor = $('#editor')

editor.on('keyup', function() {
    content = $('#editor').trumbowyg('html');
    stringToHtmlElement.innerHTML = content
    contentText = stringToHtmlElement.innerText
    contentLength = contentText.length
    post_lenght_emp.innerHTML = contentLength + "/" + MAX_POST_LENGHT
    if(contentLength > MAX_POST_LENGHT)
    {
        var truncated = contentText.substr(0, MAX_POST_LENGHT);
        editor.trumbowyg('html', truncated);
    }
});