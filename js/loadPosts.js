import Post from "../components/Post.js"
import decodeEntity from "../utils/decodeEntity.js"   
import getAllParents from "../utils/getAllParents.js"
import getModerators from "../utils/getModerators.js";

function getPostsData() 
{
    const postApiPath = "./api/posts.php";
    const ajaxOptions = {
        url: postApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions);
    return response.responseJSON;
}

function loadPosts(data)
{
    const moderators = getModerators();
    const user_pk = document.getElementById("user_pk").value
    const articles_emplacement = document.getElementById("artZone")
    console.log(data)
    for (let i = 0; i < data.length; i++) {
        const article = data[i];
        const article_pk = article.ARTICLES_PK
        const creator = article.username
        const article_date = article.dat
        const article_title = article.title
        const article_content = article.content
        const post = Post(moderators, user_pk, article_pk, creator, article_date, article_title, article_content);
        articles_emplacement.appendChild(post);
    }
}

$( document ).ready(function() 
{
    const data = getPostsData();

    loadPosts(data);

});