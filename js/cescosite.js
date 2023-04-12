import Post from "../components/Post.js"
import decodeEntity from "../utils/decodeEntity.js"   
import getAllParents from "../utils/getAllParents.js"


function getPostsData() 
{
    const postApiPath = "../getPosts.php";
    const ajaxOptions = {
        url: postApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions);
    return JSON.parse(response.responseText);
}

function loadPosts(data)
{
    for (let i = 0; i < data.length; i++) {
        const article = array[i];
        const 
        
    }
}

$( document ).ready(function() 
{
    const data = getPostsData();

});