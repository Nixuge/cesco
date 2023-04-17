

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


function loadChat(data){
  const chatEmplacement = document.getElementById("chatjs")
  chatEmplacement.innerHTML = "";
  for (let i = 0; i < data.length; i++) {
    const actChat = data[i];
    const date = actChat.dat
    const author = actChat.username
    const message = actChat.content 
    const pdpPath = "uploads/" + article.USER_FK + ".png"
    const chatHtml = Chat(author, date, message, pdpPath)
    

    chatEmplacement.appendChild(chatHtml)
    
  }
}
const chatSource = new EventSource('./api/chat.php');

chatSource.addEventListener('chatUpdate', function(event) {
  const chatData = JSON.parse(event.data);
  console.log(chatData);
  loadChat(chatData);
});
