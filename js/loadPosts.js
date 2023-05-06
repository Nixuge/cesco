import Post from "../components/Post.js";
import getAllParents from "../utils/getAllParents.js";
import getPostsData from "../utils/getPostsData.js";
import getUserPK from "../utils/getUserPK.js";

function loadPosts(data) {
  const moderators = [157, 150, 181, 183];
  const userPk = Number(getUserPK());
  const is_moderator = moderators.indexOf(userPk) != -1;
  console.log(is_moderator);

  const articles_emplacement = document.getElementById("artZone");
  console.log(data);
  for (let i = 0; i < data.length; i++) {
    const article = data[i];
    const article_pk = article.ARTICLES_PK;
    const creator = article.username;
    const article_date = article.dat;
    const article_title = article.title;
    const article_content = article.content;
    const pdpPath = "uploads/" + article.USER_FK + ".png";
    const post = Post(
      is_moderator,
      article_pk,
      creator,
      article_date,
      article_title,
      article_content,
      pdpPath
    );
    articles_emplacement.appendChild(post);
  }
}

$(document).ready(function () {
  const data = getPostsData();

  loadPosts(data);
});
