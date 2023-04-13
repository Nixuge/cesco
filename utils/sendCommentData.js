function sendComData(art_pk)
{

    console.log("send com data");
    user_pk = document.getElementById("user_pk").value


    if(user_pk == ''){
        show_connection();
       

    }else{


    var comcontent = document.getElementById("comsContent").value;

    $.ajax({
        type: 'post',
        url: './api/sendComment.php',
        data: {
            textC:comcontent,
            articlePK:art_pk,
            async : false,
        },
        success: function(response) {
         
            comcontent = ""
        }
    });
    
        
     
    }
}