function sendChatData()
{
  user_pk = document.getElementById("user_pk").value


  if(user_pk == ''){
    show_connection();
     

  }else{
    let chatcontent = document.getElementById("chatContent").value;


    $.ajax({
      type: 'post',
      url: '../api/sendChat.php',
      data: {
    
          text:chatcontent
      },
      
    });


    document.getElementById("chatContent").value = ""



    return false;
  }
}
