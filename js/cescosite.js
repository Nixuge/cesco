import Post from "../components/Post.js"
import decodeEntity from "../utils/decodeEntity.js"   
import getAllParents from "../utils/getAllParents.js"



function getPostsData(){
    const postApiPath = "../getPosts.php"
    $.get(postApiPath, function(data){
        return (data);
    });
}

console.log(getPostsData());