import report from "../utils/report.js";
export default function Post(modo_pks, user_pk, art_pk, creator, date, title, content) {
    const is_moderator = modo_pks.indexOf(user_pk) !== -1;

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
    const report = document.createElement("div");
    report.setAttribute("class", "report");
    const textInButtonBottomLeft = document.createElement("p");
    textInButtonBottomLeft.setAttribute("class", "text_in_button_bottom_left");
    textInButtonBottomLeft.innerText = "!";
    report.appendChild(textInButtonBottomLeft);
    report.onclick = function(){report(art_pk)}
    bottomPostButton.appendChild(report);

    if (!is_moderator) {
        const button = document.createElement("button");
        button.style.display = "none";
        bottomPostButton.appendChild(button);
    }

    poste.appendChild(bottomPostButton);

    return poste;
}
