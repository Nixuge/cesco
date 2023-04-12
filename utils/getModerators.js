export default function getModerators() 
{
    const modoApiPath = "./api/moderators.php";
    const ajaxOptions = {
        url: modoApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions);
    return response.responseJSON;
}
