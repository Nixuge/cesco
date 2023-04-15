export default function getUserPK(){
    const pkApiPath = "./api/userPK.php";
    const ajaxOptions = {
        url: pkApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions).text;
    if (response == 0)
    {
        return false;
    }else{
        return response;
    }
}