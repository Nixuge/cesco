

import Chat from "../components/Chat.js";


function getChatData() 
{
    const chatApiPath = "./api/chat.php";
    const ajaxOptions = {
        url: chatApiPath,
        async: false
    };
    const response = $.ajax(ajaxOptions);
    return response.responseJSON;
}

function sendChatData()
{
  user_pk = document.getElementById("user_pk").value


  if(user_pk == ''){
      window.location.href = ".?page=connection"
     

  }else{
    let chatcontent = document.getElementById("chatContent").value;


    $.ajax({
      type: 'post',
      url: 'chat.php',
      data: {
    
          text:chatcontent
      },
      
    });


    document.getElementById("chatContent").value = ""



    return false;
  }
}

function loadChat(data){
  const chatEmplacement = document.getElementById("chatjs")
  chatEmplacement.innerHTML = "";
  for (let i = 0; i < data.length; i++) {
    const actChat = data[i];
    const date = actChat.dat
    const author = actChat.username
    const message = actChat.content 
    const chatHtml = Chat(author, date, message)
    console.log(chatHtml)
    chatEmplacement.appendChild(chatHtml)
    
  }
}


$( document ).ready(function() 
{
    const data = getChatData();

    loadChat(data);

});