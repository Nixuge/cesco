import getAllParents from "../utils/getAllParents.js";
import getPostsData from "../utils/getPostsData.js";
import Comment from "../components/Comment.js"

const artZone = document.getElementById("artZone");
const commentEmplacement = document.getElementById("comsjs");
const data = getPostsData();

function loadComments(article_pk)
{
    commentEmplacement.innerHTML = ''
    let art_index = Object.keys(data).find(key => data[key].ARTICLES_PK == article_pk)
    sendButton.addEventListener("mouseup", function(e) {
        sendComData(article_pk);
        loadComments(article_pk)
        
    })
    console.log(art_index)
    if(data[art_index].comments != "undefined"){
        const comments = data[art_index].comments
        for (let ii = 0; ii < comments.length; ii++) {
            const com = comments[ii];
            const comAuthor = "username"
            const comDate = com.dat
            const comContent = com.content
            const comHtml = Comment(comAuthor, comDate, comContent)
            commentEmplacement.appendChild(comHtml)
        }
    }

}
artZone.addEventListener(
"mouseover",
(event) => {
    
    
    let parents = getAllParents(event.target)
    const sendButton = document.getElementById("sendComButton");
    for (let i = 0; i < parents.length; i++) {
        let element = parents[i]
        let infos = element.id.split("#")
        if(infos[0] == "art"){
            loadComments(infos[1])
        }
        

    }

});