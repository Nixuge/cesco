import report from "../utils/report.js";
export default function Post(is_moderator, art_pk, creator, date, title, content) {
   

    const poste = document.createElement("div");
    poste.setAttribute("id", "art#" + art_pk);
    poste.setAttribute("class", "post_zone");

    const topOfPost = document.createElement("div");
    topOfPost.setAttribute("class", "top_of_post");

    const hightLeftPost = document.createElement("div");
    hightLeftPost.setAttribute("class", "hight_left_post");
    const profilePhotoPost = document.createElement("button");
    profilePhotoPost.setAttribute("class", "profile_photo_post");
    hightLeftPost.appendChild(profilePhotoPost);

    const userDatePost = document.createElement("div");
    userDatePost.setAttribute("class", "user_date_post");
    const postUser = document.createElement("p");
    postUser.setAttribute("class", "post_user");
    postUser.innerText = creator;
    const postDate = document.createElement("p");
    postDate.setAttribute("class", "post_date");
    postDate.innerText = date;
    userDatePost.appendChild(postUser);
    userDatePost.appendChild(postDate);
    hightLeftPost.appendChild(userDatePost);

    topOfPost.appendChild(hightLeftPost);
    topOfPost.appendChild(document.createElement("br"));

    const little = document.createElement("div");
    little.setAttribute("class", "little");
    const postLittleTitle = document.createElement("p");
    postLittleTitle.setAttribute("class", "post_little_title");
    postLittleTitle.innerText = title;
    little.appendChild(postLittleTitle);
    topOfPost.appendChild(little);

    topOfPost.appendChild(document.createElement("div")).setAttribute("class", "line");

    poste.appendChild(topOfPost);

    const postText = document.createElement("div");
    postText.setAttribute("class", "post_text");
    postText.innerHTML = content;
    poste.appendChild(postText);

    const bottomPostButton = document.createElement("div");
    bottomPostButton.setAttribute("class", "bottom_post_button");
    const reportElement = document.createElement("div");
    reportElement.setAttribute("class", "report");
    const textInButtonBottomLeft = document.createElement("p");
    textInButtonBottomLeft.setAttribute("class", "text_in_button_bottom_left");
    textInButtonBottomLeft.innerText = "!";
    reportElement.addEventListener("click", function() {
        report(art_pk);
      });
      
    reportElement.appendChild(textInButtonBottomLeft);
    
    bottomPostButton.appendChild(reportElement);
    const moderationButton = document.createElement("button");
    moderationButton.innerText = "Remove"
    if (!is_moderator) {
        moderationButton.style.display = "none";
    }
    moderationButton.addEventListener("click", function(){
        report(art_pk)
    })
    bottomPostButton.appendChild(moderationButton);
    poste.appendChild(bottomPostButton);

    return poste;
}
