export default function Comment(author, date, message, art_pkp){
    const chat = document.createElement('div');
    const hight_chat = document.createElement('div');
    hight_chat.setAttribute("class", "hight_chat")
    const profile = document.createElement("button")
    profile.setAttribute("class", "chat_profile")
    hight_chat.appendChild(profile)
    const user_date = document.createElement("div")
    user_date.setAttribute("class", "user_date_chat")
    hight_chat.appendChild(user_date)
    const chat_user = document.createElement("p")
    chat_user.setAttribute("class", "chat_user")
    chat_user.innerText = author
    user_date.appendChild(chat_user)
    const chat_date = document.createElement("p")
    chat_date.setAttribute("class", "chat_date")
    chat_date.innerText = date
    user_date.appendChild(chat_date)
    const br = document.createElement("br")
    hight_chat.appendChild(br)
    chat.appendChild(hight_chat)
    const textContent = document.createElement("p")
    textContent.innerText = message
    textContent.setAttribute("class", "chat_text")
    chat.appendChild(textContent)
    const line = document.createElement("div")
    line.setAttribute("class", "line")
    chat.appendChild(line)
    const jsp = document.createElement("div")
    jsp.setAttribute("class", "jépludidé") // if there is a problem with this class name, ask Asteroidus at `asteroidus@protonmail.com`. Don't ask JdM but you can follow him on Github : https://github.com/judemont 
    chat.appendChild(jsp)

    return chat;
}

ouais