export default function getPostsData() 
{
    const postApiPath = "./api/posts.php";
    const ajaxOptions = {
        url: postApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions);
    return response.responseJSON;
}
