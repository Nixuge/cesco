import Post from "../components/Post.js"
   
function decodeEntity(inputStr) {
    var textarea = document.createElement("textarea");
    textarea.innerHTML = inputStr;
    return textarea.value;
}


function isUserLike(Type, userPK, likes){

   
    //"+", data[i].reaction
    
 //   console.log(likes.length)
    for (let i = 0; i < Object.keys(likes).length; i++) {
        if(likes[i].type == Type ){
            if(likes[i].USER_FK == userPK ){
                return true
            }
        }
        
    }
    return false
}

function countLike(Type, likes){
    //"+", data[i].reaction
    let result = 0
 //   console.log(likes.length)
    for (let i = 0; i < Object.keys(likes).length; i++) {
        if(likes[i].type == Type ){
            result ++
            //console.log(likes["reaction#" + i].type )
        }
        
    }
    return result;
}

function getCloudData(){
    return $.get('getPosts.php',true)
}

function reaction(type, PK){

    $.get('getPosts.php',true)


    is_co = document.getElementById("user_pk").value


    if(is_co == 'false'){
        window.location.href = ".?page=connection"
       

    }else{
      
    //  window.location.href = 'like.php?num='+PK + "&type="+encodeURIComponent(type)

        $.post("like.php",{
            num : PK,
            type : type
        })
        /*
        
        $.get('getPosts.php',true , function(result) {

    
            data =  JSON.parse(decodeEntity(result))

            updateLikes(data[Object.keys(data).find(key => data[key].ARTICLES_PK == PK)])
            
        
            
        })
        
        */

        $.when(getCloudData()).done(function (result) {
            data =  JSON.parse(decodeEntity(result))

            updateLikes(data[Object.keys(data).find(key => data[key].ARTICLES_PK == PK)])
         });
        
    }
}


function updateLikes(article){


    pk = article.ARTICLES_PK


      
        let nbLike = 0
        let nbNeutre = 0
        let nbDislike = 0
        let scrLike = "./img/upvote_vide.png"
        let scrNeutre = "./img/neutrevote_vide.png"
        let scrDislike = "./img/downvote_vide.png"



            if(typeof article.reaction != "undefined"){

                
                nbLike = countLike( "+", article.reaction)
                nbNeutre = countLike( "=", article.reaction)
                nbDislike = countLike( "-", article.reaction)
                user_pk = document.getElementById("user_pk").value
                if (isUserLike("+", user_pk, article.reaction)) {
                    scrLike = "./img/upvote_plein.png"
                }
                if (isUserLike("=", user_pk, article.reaction)) {
                    scrNeutre = "./img/neutrevote_plein.png"
                }
                if (isUserLike("-", user_pk, article.reaction)) {
                    scrDislike = "./img/downvote_plein.png"
                }
            
            }
  
            document.getElementById("imgLike" + pk).src = scrLike
            document.getElementById("imgDislike" + pk).src = scrDislike
            document.getElementById("imgNeutrelike" + pk).src = scrNeutre

          
            document.getElementById("LikeP" + pk).innerHTML = nbLike
            document.getElementById("NeutreP" + pk).innerHTML = nbNeutre
            document.getElementById("DislikeP" + pk).innerHTML = nbDislike


    
        

    
}





function sendComData(a_pk)
{

    

    console.log("SEND COM DATAAAAAAAAAAAAAAAAAAAAAAAAA")
    user_pk = document.getElementById("user_pk").value


    if(user_pk == ''){
        window.location.href = ".?page=connection"
       

    }else{


    var comcontent = document.getElementById("comsContent").value;




   
   

    $.ajax({
        type: 'post',
        url: 'coment.php',
        data: {
            textC:comcontent,
            articlePK:a_pk,
           
        },
        success: function(response) {
         
            $.when(getCloudData()).done(function (result) {
                let i = Object.keys(data).find(key => data[key].ARTICLES_PK == a_pk)
                data =  JSON.parse(result)
         
                loadCom(data[i].comments, a_pk)

                document.getElementById("comsContent").value = ""
            });
        }
    });
    
        
     
    }
}

function getAllParents(element) {
    var parents = [];
  
    // Ajouter le parent direct de l'élément
    var parent = element.parentElement;
    while (parent !== null) {
      parents.push(parent);
      parent = parent.parentElement;
    }
  
    return parents;
  }

function signal(id, title) {
    let sure = prompt("Cette article ne respect pas les règle de CescoSite ? (oui/non)", "non");
    if (sure == "oui") {
    
        location.href = "./signal.php?id=" + id
    }
    
}

function loadCom(coments, pk)
{
   

 

    comentsHtml = "";
        
   
  
        comsEmp = document.getElementById("comsjs")

        if(typeof coments != 'undefined'){
            for (let ii = 0; ii < Object.keys(coments).length; ii++) {
                
                com = coments[ii]
                comentsHtml += '<div class="hight_chat">';
                comentsHtml += "<button class='chat_profile'></button>"
                comentsHtml += '<div class="user_date_chat">'
              //  comentsHtml += '<p class="chat_user">'+com.creator+'</p>'
                comentsHtml += '<p class="chat_date">'+ com.dat +'</p>'
                comentsHtml += "</div><br>"
                comentsHtml += '</div>'
                comentsHtml += '<p class="chat_text">'+com.content+'</p>'
                comentsHtml += '<div class="line"></div> '
                comentsHtml += '<div class="jépludidé"></div>'
                    
                    
                
            }
            
        }
        comsEmp.innerHTML = comentsHtml
       
    
}


function loadPost(index, data){
    let modods_pk = ["157", "150", "181", "183"]
    let user_pk = document.getElementById("user_pk").value
    let article = data[index]
    let pk = article.ARTICLES_PK

    let artZone = document.getElementById("artZone")
    let post = Post(modods_pk, user_pk, pk, article.username, article.dat, article.title, article.content)
    console.log(post)
    artZone.appendChild(post)

   
    



}
function shuffle(array) {
    array.sort(() => Math.random() - 0.5);
  }
function loadAll(){
    $.when(getCloudData()).done(function (result) {
        var data =  result
        let range = document.getElementById("range").value
        //just a test :
    

       
        
      
        if(range == "more_times"){

        }else if(range == "more_likes"){
            
            data.sort(function(a, b) {
                let aReactions = 0;
                let bReactions = 0;
                if (a.reaction) {
                  Object.values(a.reaction).forEach(function(reaction) {
                    if (reaction.type === '+') {
                      aReactions += 1;
                    }
                  });
                }
                
                if (b.reaction) {
                  Object.values(b.reaction).forEach(function(reaction) {
                    if (reaction.type === '+') {
                      bReactions += 1;
                    }
                  });
                }

                return bReactions - aReactions;
                
              });
              
              
              
        }else if(range == "random"){
            shuffle(data);
        }
        document.getElementById("artZone").innerHTML = ""

        for (let i = 0; i < data.length; i++) {
        
        
            loadPost(i, data)
            
            
        }
        
        loadCom(data[-1].comments, data[-1].ARTICLES_PK)
     });

     
    
}


loadAll()   

$(document).ready(function() {
    
    $('#range').change(function(){
     loadAll()
    });


});


artZone = document.getElementById("artZone")
artZone.addEventListener(
    "mouseover",
    (event) => {
        
        
        parents = getAllParents(event.target)
        

        for (let i = 0; i < parents.length; i++) {
            element = parents[i]
            infos = element.id.split("#")
            if(infos[0] == "art"){

                let i = Object.keys(data).find(key => data[key].ARTICLES_PK == infos[1])
                loadCom(data[i].comments, infos[1])
               document.getElementById("sendComButton").setAttribute("onclick", "sendComData("+infos[1]+")")
    
                break;
            }
            
    
        }

    }
        
        
)